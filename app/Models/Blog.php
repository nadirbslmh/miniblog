<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'user_id', 'image'];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['title'] ?? false) {
            $query->where('title', 'like', '%' . request('title') . '%');
        }
    }


    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}