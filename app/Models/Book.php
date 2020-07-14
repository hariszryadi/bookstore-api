<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'author',
        'publisher',
        'cover',
        'price',
        'weight',
        'stock',
        'status'
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }
}
