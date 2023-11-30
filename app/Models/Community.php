<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Administrator;
use App\Models\Performance;

class Community extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'explanation',
        'url',
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }
    
    public function administrator(){
    return $this->hasOne(Administrator::class);
    }
    
    public function performances(){
        return $this->belongsToMany(Performance::class);
    }
}
