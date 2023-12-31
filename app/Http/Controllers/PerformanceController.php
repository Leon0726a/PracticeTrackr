<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Performance;
use Cloudinary;

class PerformanceController extends Controller
{
    public function store(Request $request,  Performance $performance)
    {
        $input = $request['performance'];
        $audio_url = Cloudinary::uploadVideo($request->file('audio')->getRealPath())->getSecurePath();
        $public_id=Cloudinary::getPublicId([$audio_url]);
        $input += ['url' => $audio_url];
        $input += ['public_id' => $public_id];
        $input += ['user_id' => $request->user()->id];
        $performance->fill($input)->save();
        return redirect()->route('performances',['composition_title' =>$input['composition_title_id']]);
    }
    
    public function update(Request $request, Performance $performance)
    {
        
        $input = $request['performance'];
        $performance->fill($input)->save();
        return redirect()->route('show_performance',['performance' => $performance,
                                                     'composition_title' =>$input['composition_title_id'],
                                                     'feedbacks' => $performance->feedbacks,
                                                     ]);
    }
    
    public function edit(Performance $performance)
    {
        return view('performances.edit')->with(['performance' => $performance]);
    }
    
    public function show(Performance $performance)
    {
        
        return view('performances.show')->with(['performance' => $performance,
                                                'composition_title' =>$performance->compositionTitle->title,
                                                'feedbacks' => $performance->feedbacks,
                                                ]);
    }
}
