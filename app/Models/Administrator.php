<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Community;

class Administrator extends Model
{
    use HasFactory;
    
     protected $fillable = [
        'user_id',
        'community_id',
        'url',
    ];
    
    public function user(){
        return this->belongsTo(User::class);
    }
    
     public function community(){
        return this->belongsTo(Community::class);
    }
    
    
}
