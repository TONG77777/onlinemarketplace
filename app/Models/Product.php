<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name', 'condition', 'category', 'price', 'description', 'user_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category');
    }

    public function images()
    {

        return $this->hasMany(Image::class, 'product_id', 'id');
    }

    public function counters()
    {
        return $this->belongsTo(Counter::class, 'id');
    }
}
