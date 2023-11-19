<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
protected $table = 'categories';
    protected $fillable = ['categories','image'];

    // public function products()
    // {
    //     return $this->hasMany(Product::class);
    // }


//     public function show(Category $category)
// {
//     $products = $category->products;
//     return view('category.show', compact('category', 'products'));
// }
}
