<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    // Here we store product with validdation/////////////

    public function store_product(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'rate' => 'required|numeric|min:1|max:5',
            'discount_price' => 'nullable|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'tags' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
        // Handle the image upload
        $imageName =  time() . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('storage/product_images'),$imageName);
        
        // Create and save the product
        $product = new Product($validatedData);
        $product->image = $imageName;
        $product->save();
        return back()->with('success', 'Product added successfully!');
    }

//  Here we show our product on admin panal/////////////

    public function view_product()
    {
        $products = Product::all(); // Fetch all products from the database

        return view('admin.view-product', compact('products'));
    }

// here we Delete our product /////////////////


    public function deleteProduct(Request $request, $id)
    {
        $products = Product::find($id);

        if (!$products) {
            return back()->with('error', 'Product not found.');
        }

        $products->delete();

        return back()->with('success', 'Product deleted successfully.');
    }




//////////////////////// Categories ///////////////////////////


//  There we store Our category///////////////////
    public function store_category(Request $request)
    {
        $validatedData = $request->validate([
            'categories' => 'required|unique:categories,categories',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('storage/category_images'),$imageName);



        // $imagePath = $request->file('image')->store('category_images', 'public');
        Category::create([
            'categories' => $validatedData['categories'],
            'image' => $imageName,

        ]);
        return back()->with('success', 'Category created successfully!');
    }

    //  There we show our category on admin panal /////////////////
    public function view_category()
{
    $categories = Category::all();
    // dd($categories); // This will show the retrieved categories
    return view('admin.categories', compact('categories'));
}

// There we delete our category /////////////////////

public function deleteCategory(Request $request, $id)
{
    $categories = Category::find($id);

    if (!$categories) {
        return back()->with('error', 'Category not found.');
    }

    $categories->delete();

    return back()->with('success', 'Category deleted successfully.');
}



public function updateImageVisibility($imageName) {
    Storage::setVisibility("public/product_images/$imageName", 'public');
    // Any additional logic you need
}







}
