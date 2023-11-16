<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function sendComment(Request $request,Feedback $feedback)
    {
        
        $input = $request['feedback'];
        $input += ['user_id' => $request->user()->id];
        $feedback->fill($input)->save();
        return redirect()->route('show_performance',['performance' =>$input['performance_id']]);
    }
}
