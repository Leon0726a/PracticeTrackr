<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompositionTitle;

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

}
