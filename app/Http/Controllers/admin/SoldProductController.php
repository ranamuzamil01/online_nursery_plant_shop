<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SoldProduct;
class SoldProductController extends Controller
{
    public function index()
    {
        // Fetch and display a list of sold products along with payment and user data
        $soldProducts = SoldProduct::with(['payment.user', 'product'])->get();

        return view('admin.sold_products', compact('soldProducts'));
    }
}
