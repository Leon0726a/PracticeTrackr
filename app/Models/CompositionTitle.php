<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Models\User;
use App\Models\Performance;
use App\Models\Feedback;

class CompositionTitle extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'user_id',
        ];
    

    public function performances(){
    return $this->hasMany(Performance::class);
    }
    
    public function user(){
    return $this->belongsTo(User::class);
    }
    
    public function getByCompositionTitle(int $limit_count = 5)
    {
    return $this->performances()->with('compositionTitle')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
