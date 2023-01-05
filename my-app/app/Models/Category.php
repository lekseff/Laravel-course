<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

// Все посты с категорией найденой в контроллере
    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}
