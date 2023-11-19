<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Subscriber;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{

    public function category_list(){
        $category_list = Category::all();
        return view('user.header',compact('category_list'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required|numeric',
            'message' => 'required',
        ]);

        // Create a new FormData instance and fill it with the validated data
        $message = new Message();
        $message->name = $validatedData['name'];
        $message->email = $validatedData['email'];
        $message->number = $validatedData['number'];
        $message->message = $validatedData['message'];

        // Save the data to the database
        $message->save();

        return redirect()->back()->with('success', 'Message data has been submitted.');
    }

    public function subscribe(Request $request)
    {
        // echo $request->email;
        $request->validate([
            'email' => 'required',
        ]);

   Subscriber::create([
            'email' => $request->email,
        ]);


        return redirect()->back()->with('success', 'Thank you for subscribing!');
    }


    public function showCategories()
    {
        $categories = Category::all(); // Fetch categories from the database
        return view('user.home', compact('categories'));
    }

    public function show_product(Request $request)
    {
        $category_list = Category::all();
        $products = Product::all(); // Fetch all products from the database
        if (!empty($request->get('search'))) {
            // echo $request->get('search');
            $products = Product::where('name', 'like', '%' . $request->get('search') . '%')->get(); // Fetch all products from the database
        }
        if(!empty($request->get('category'))) {
            $products = Product::where('category',$request->get('category'))->get(); // Fetch all products from the database

        }

        return view('user.product', compact('products','category_list'));
    }

    public function show_homeProduct()
    {
        $category_list = Category::all();
        $products = Product::limit(6)->get(); // Fetch 6 products
        return view('user.home', compact('products','category_list'));
    }

    public function showHome()
    {
        $category_list = Category::all();
        $products = Product::limit(6)->get();
        $categories = Category::all();

        return view('user.home', compact('products', 'categories','category_list'));
    }

    // Example of a controller method to add a product to favorites


public function favorite(Request $request){
    // echo $request->fav;
    $id =$request->id;
    $change = $request->fav;
    $fav = Product::find($id);
    $fav->favorite = $change;
    $fav->save();
    return redirect()->back();

}

}
