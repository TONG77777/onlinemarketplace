<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name', 'image', 'condition', 'category','price', 'description', 'user_id'
    ];

    public function users(){

        return $this->belongsTo(User::class, 'id');

    }

    // public function categories(){

    //     return $this->belongsToMany(Category::class, 'id');

    // }
}
