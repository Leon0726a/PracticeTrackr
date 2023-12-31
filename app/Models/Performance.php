<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\CompositionTitle;
use App\Models\Feedback;
use App\Models\Community;


class Performance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'comment',
        'instrument',
        'url',
        'public_id',
        'composition_title_id',
        ];
        
    public function user(){
    return $this->belongsTo(User::class);
    }
    
    public function feedbacks(){
        return $this->hasMany(Feedback::class);
    }
    
    public function compositionTitle(){
        return $this->belongsTo(CompositionTitle::class);
    }
    
    public function communities(){
        return $this->belongsToMany(Community::class);
    }
}
