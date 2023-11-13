<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cloudinary;
use App\Models\Community;

class CommunityController extends Controller
{
    public function create()
    {
        return view('community.create');
    }
    
    public function store(Request $request, Community $community)
    {
        $input = $request['community'];
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $input += ['url' => $image_url];
        $input += ['user_id' => $request->user()->id];
        $community->fill($input)->save();
        
        //ユーザをコミュニティのメンバーに追加
        $community->users()->attach($request->user()->id);
        
        // ユーザーを管理者として追加
         $community->administrator()->create(['user_id' => $request->user()->id]);
        
       
        return redirect()->route('community');
    }
}
