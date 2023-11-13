<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Performance;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\CompositionTitle;
use App\Models\Community;
use Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function communities(){
    return $this->belongsToMany(Community::class);
    }
    
     public function feedbacks(){
    return $this->hasMany(Feedback::class);
    }

    public function performances(){
    return $this->hasMany(Performance::class);
    }
    
    public function compositionTitles(){
    return $this->hasMany(CompositionTitle::class);
    }
    
    public function administrators(){
    return $this->hasMany(Adoministrator::class);
    }
    
    public function getOwnPaginateByLimit(int $limit_count = 5)
    {
    return $this::with('compositionTitles')->find(Auth::id())->compositionTitles()->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function getCommunityPaginateByLimit(int $limit_count = 5)
    {
    return $this::with('communities')->find(Auth::id())->communities()->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
