<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompositionTitle;
use Cloudinary;

class CompositionTitleController extends Controller
{
    public function store(Request $request,  CompositionTitle $composition_title)
    {
        $input = $request['composition_title'];
        $input += ['user_id' => $request->user()->id]; 
       
        $composition_title->fill($input)->save();
        return redirect('/practicenote');
    }
    
    public function index(CompositionTitle $composition_title)
    {
        return view('performances.index')->with(['performances' => $composition_title->getByCompositionTitle(),'composition_title' => $composition_title]);
    }
    
    public function delete(CompositionTitle $composition_title)
    {
        // CompositionTitleに関連するPerformanceを取得
        $performances = $composition_title->performances;
        
       // Performanceごとに関連するCloudinaryの音声ファイルを削除
        foreach ($performances as $performance) {
            // $performanceのurl,public_id取得
            $cloudinaryUrl = $performance->url;
            $cloudinaryPublicId = $performance->public_id;
    
            // Cloudinaryの音声ファイルを削除
            Cloudinary::uploadApi()->destroy($cloudinaryPublicId, ['resource_type' => 'video']);
    
            // Performanceに関連するFeedbackを削除
            $performance->feedbacks()->delete();
        }
        
        // CompositionTitleに関連するPerformanceを削除
        $composition_title->performances()->delete();
    
        // CompositionTitleを削除
        $composition_title->delete();
    
        return redirect('/');
    }

}
