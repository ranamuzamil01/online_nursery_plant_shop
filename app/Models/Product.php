<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
  
 protected $table = 'products';
    protected $fillable = [
        'name',
        'category',
        'description',
        'price',
        'rate',
        'discount_price',
        'original_price',
        'quantity',
        'tags',
        'image',
    ];

    public function payments()
    {
        return $this->belongsToMany(Payment::class)->withPivot('quantity');
    }
    
}
