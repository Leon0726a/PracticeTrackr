<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cloudinary;
use App\Models\Community;
use App\Models\Performance;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    public function create()
    {
        return view('communities.create');
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
    
    public function search(Request $request ,Community $community)
    {
        $searchedCommunities = $community->where('name', 'like', '%' . $request->search . '%')->get();
        
        $ar_find = $request -> session()->get('find');
		$keyword = ($request -> input('search') !== NULl )? $request -> input('search'): $ar_find['search']; 
        
        
        $request -> session() -> forget('find');
        $request ->session() -> put('find',['keyword'=>$keyword,]);
        return view('communities.search')->with(['communities' => $searchedCommunities, 'keyword' => $keyword]);
    }
    
    public function show(Community $community,Performance $performance)
    {
        return view('communities.show')->with(['performances' =>$performance->get() ,'community' => $community]);

    }
    
    public function joinCommunity(Community $community)
    {
        $user = Auth::user(); 
        $user->communities()->attach($community->id);
    
        return redirect()->back();
    }
    
    public function leave(Community $community)
    {
        $user = Auth::user(); 
        $user->communities()->detach($community->id);
        return redirect()->back();
    }
    
    public function performanceStore(Request $request,  Community $community,Performance $performance)
    {
        $input = $request['performance'];
        $audio_url = Cloudinary::uploadVideo($request->file('audio')->getRealPath())->getSecurePath();
        $public_id=Cloudinary::getPublicId([$audio_url]);
        $input += ['url' => $audio_url];
        $input += ['public_id' => $public_id];
        $input += ['user_id' => $request->user()->id];
        $input += ['composition_title_id' => 1];
        $performance->fill($input)->save();
        $performance->communities()->attach($community->id);
        return redirect()->back();
    }
}
