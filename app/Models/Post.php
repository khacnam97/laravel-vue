<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'describer', 'category_id'];
    public function photos()
    {
        return $this->hasMany('App\Models\Photo');
    }
}
