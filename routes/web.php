<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\StripePaymentController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\admin\PaymentController;
use App\Http\Controllers\admin\SoldProductController;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
////////////////////////// User ///////////////////////////////////////////////////////


 Route::get('/login', function () {

        return view('Admin.login');
    });

    Route::get('/register', function () {

        return view('Admin.register');
    });
Route::get('/main', function () {
    $category_list = Category::all();
    return view('user/main', compact('category_list'));
});
Route::get('/user_profile', function () {
    $category_list = Category::all();
    if (!empty(Auth::user())) {

        return view('user.profile', compact('category_list'));
    }
    return redirect()->route('login');
})->name('user_profile');


Route::get('/', function () {
    return view('user/home');
});

Route::get('/', [HomeController::class, 'showHome'])->name('user.home');



Route::get('/product', [HomeController::class, 'show_product'])->name('user.products');
Route::get('/category', function () {
    return view('user/category');
});
Route::get('/products', function () {
    return view('user/product');
});



Route::get('/contact', function () {
    $category_list = Category::all();
    return view('user/contact', compact('category_list'));
});

Route::post('/contact-form', [HomeController::class, 'store'])->name('contact.form');


Route::get('/newslatter', function () {
    $category_list = Category::all();
    return view('user/newslatter', compact('category_list'));
});
Route::post('/subscribe', [HomeController::class, 'subscribe'])->name('subscriber.store');



Route::get('/about', function () {
    $category_list = Category::all();
    return view('user/about', compact('category_list'));
});

///////////////////////// cart //////////////////////////

Route::get('/view_cart', [CartController::class, 'index'])->name('view_cart');
Route::get('/add_cart/{id}', [CartController::class, 'add_cart'])->name('add_cart');
Route::get('/delete_cart/{id}', [CartController::class, 'delete_cart'])->name('delete_cart');


Route::get('/home1', function () {
    return view('admin/home');
});

///////////////////// favorite /////////////

Route::post('/home1', [HomeController::class, 'favorite'])->name('favorite');



Route::prefix('stripe')->group(function () {
    Route::get('/', [StripePaymentController::class, 'stripe'])->name('stripe.index');
    Route::post('/', [StripePaymentController::class, 'stripePost'])->name('stripe.post');
});





// Admin Panel Routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/payments', 'AdminController@payments')->name('admin.payments');
});



// Routes for Users
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
// Add more user-related routes as needed

// Routes for Products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
// Add more product-related routes as needed

// Routes for Payments (admin section)
Route::prefix('admin')->group(function () {
    Route::get('/payments', [PaymentController::class, 'index'])->name('admin.payments.index');
    Route::get('/payments/create', [PaymentController::class, 'create'])->name('admin.payments.create');
    Route::post('/payments', [PaymentController::class, 'store'])->name('admin.payments.store');
    Route::get('/payments/{id}', [PaymentController::class, 'show'])->name('admin.payments.show');
    // Add more payment-related routes as needed
});

Route::get('/set-visibility/{imageName}', function ($imageName) {
    Storage::setVisibility("public/product_images/$imageName", 'public');
    // Any additional logic you need
});




Route::get('/admin/sold-products', [SoldProductController::class, 'index'])->name('admin.sold-products');


Route::get('/sold_product', 'SoldProductController@index');



// web.php

// Route::get('/cart', 'user\CartController@index')->name('cart.index');
// Route::post('/cart/add/{id}', 'user\CartController@add_cart')->name('cart.add');
// Route::post('/cart/checkout', 'user\CartController@checkout')->name('cart.checkout');
// Route::get('/cart/checkout', 'user\CartController@checkout')->name('cart.checkout');
// Route::get('/cart/delete/{id}', 'user\CartController@delete_cart')->name('cart.delete');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/cart', [CartController::class,'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class,'add_cart'])->name('cart.add');
    Route::post('/cart/checkout', [CartController::class,'checkout'])->name('cart.checkout');
    Route::get('/cart/checkout', [CartController::class,'checkout'])->name('cart.checkout');
    Route::get('/cart/delete/{id}', [CartController::class,'delete_cart'])->name('cart.delete');
});





//////////// Admin route/////////////////









// Route::post('/add-to-cart/{product}', [CartController::class, 'addToCart'])
//     ->middleware('auth')
//     ->name('cart.addToCart');



Auth::routes();
Route::get('/logoutt', function () {
    Auth::logout();
    return redirect()->back();
})->name('logoutt');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('usuarios', 'UserController@index');











Route::middleware('checkUserRole')->group(function () {
    Route::get('/admin', function () {
        return view('Admin.index');
    });


    //////////////////// DATA ///////////////////////

    Route::get('/product-insert', function () {

        return view('Admin.product-insert');
    });
    Route::get('/view-product', function () {

        return view('Admin.view-product');
    });

    Route::get('/category-insert', [ProductController::class, 'create'])->name('category-insert');
    Route::post('/product-store', [ProductController::class, 'store_product'])->name('product.store');

    Route::get('/view-product', [ProductController::class, 'view_product'])->name('view-products');
    Route::delete('Admin/product-delete/{id}', [ProductController::class, 'deleteProduct'])->name('admin.product.delete');

    ///////////////category //////////////////////////////////
    // Route::post('/product', [ProductController::class, 'store_category'])->name('categories.store');
    // Route::match(['get', 'post'], '/product', [ProductController::class, 'store_category'])->name('categories.store');
    // Route::get('/categories/{category}', [ProductController::class, 'show'])->name('categories.show');
    Route::get('/categories', function () {

        return view('Admin.categories');
    });
    Route::get('/create_categories', function () {

        return view('Admin.create_category');
    });

    Route::post('/category', [ProductController::class, 'store_category'])->name('category.store');
    Route::get('/categories', [ProductController::class, 'view_category'])->name('categories.view');

    Route::delete('Admin/category-delete/{id}', [ProductController::class, 'deleteCategory'])->name('admin.category.delete');
    // Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('category.show');

    /////////////////////////////TABLE ///////////////////

    Route::get('/view-table', function () {

        return view('Admin.view-table');
    });


    /////////////////////// contact us ////////////////

    Route::get('/contact-us', function () {

        return view('Admin.contact-us');
    });
   


    Route::get('/contact-us', [AdminController::class, 'contact'])->name('admin.contact');
    Route::delete('/admin/messages/{id}', [AdminController::class, 'deleteMessage'])->name('admin.messages.delete');

    /////////////////////////////// register ////////////////////

   

    ////////////////////////// log in /////////////
   

    /////////////////////////  Subscriber /////////////////////////
    Route::get('/subscriber', function () {

        return view('Admin.subscriber');
    });
    Route::get('/subscriber', [AdminController::class, 'subscribe'])->name('admin.subscriber');
    Route::delete('/admin/subscriber/{id}', [AdminController::class, 'deletesubscriber'])->name('admin.subscriber.delete');

    ////////////////////////////  User ////////////////////////////////////
    Route::get('/user', function () {

        return view('Admin.user');
    });
    Route::get('/user', [AdminController::class, 'view_user'])->name('admin.user');
    Route::delete('/admin/user/{id}', [AdminController::class, 'deleteUser'])->name('admin.user.delete');
});





// Define a group of routes under the 'admin' namespace
// Route::prefix('admin')->group(function () {
//     // Payments Routes
//     Route::get('payments', [PaymentController::class, 'index'])->name('admin.payments.index');
//     Route::get('payments/create', [PaymentController::class, 'create'])->name('admin.payments.create');
//     Route::post('payments/store', [PaymentController::class, 'store'])->name('admin.payments.store');

//     // Other admin routes...
//



