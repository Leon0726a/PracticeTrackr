<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedbacks';
    
    protected $fillable = [
        'performance_id',
        'user_id',
        'comment',
        ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function performance(){
        return $this->belongsTo(Performance::class);
    }
}
