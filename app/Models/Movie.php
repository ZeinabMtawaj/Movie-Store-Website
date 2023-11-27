<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $casts = [
        'spoken_language' => 'array',
        'genres' => 'array',
        'similar_content' => 'array'

    ];
    
    public function scopeFilter($query, array $filters){
        if ($filters['genre'] ?? false){
            $query->where('genres', 'like', '%'.request('genre').'%');
        }

        if ($filters['search'] ?? false){
            $query->where('original_title','like','%'.request('search').'%')
            ->orWhere('overview','like','%'.request('search').'%');
        }

    }
}
