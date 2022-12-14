<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'views'
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'id');
    }
}
