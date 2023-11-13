<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
        public function compositionTitleIndex(User $user)
    {
        return view('practicenote')->with(['titles' => $user->getOwnPaginateByLimit()]);
    }
        
        public function communityIndex(User $user)
    {
        return view('community.index')->with(['communities' => $user->getCommunityPaginateByLimit()]);
    }
}
