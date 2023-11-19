<?php


namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Models\SoldProduct;
use Stripe\Stripe;
use Session;

class CartController extends Controller
{
    
    public function index()
{
    if (Auth::check()) {
        $cartItems = session('products', []);

        // Calculate the total amount
        $totalAmount = 0;
        foreach ($cartItems as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }

        return view('user.cart', compact('cartItems', 'totalAmount'));
    }

    return redirect()->route('login');
}
    









    public function add_cart($id)
    {
        // Add products to the cart session
        if (Auth::check()) {
            $product = Product::find($id);
    
            if (!empty($product)) {
                $cartItems = session('products', []);
    // Assuming you have a 'products' session variable
$productToAdd = [
    'id' => $product->id,
    'name' => $product->name,
    'price' => $product->price,
    'image' => $product->image,
    'category' => $product->category,
    'original_price' => $product->original_price,
    'discount_price' => $product->discount_price,
    'quantity' =>$product->quantity, // Set the initial quantity to 1
];

// Add the product to the cart session variable
$cartItems = session('products', []);
$cartItems[] = $productToAdd;
session(['products' => $cartItems]);
           
            }
    
            return redirect()->back();
        }
    
        return redirect()->route('login');
    }

    //     return redirect()->back();
    // }
    






/**
 * Calculate the total amount of items in the cart.
 *
 * @param array $cartItems
 * @return float
 */
private function calculateTotalAmount($cartItems)
{
    $totalAmount = 0;
    
    foreach ($cartItems as $productId => $item) {
        $totalAmount += $item['price'] * $item['quantity'];
    }

    return $totalAmount;
}





    
public function checkout(Request $request)
{
    // Process the payment using Stripe or other payment gateway
    // ...
    
    // Calculate the total amount (you need to implement this logic)
     // You should implement this function
    // Get the cart items from the session
    $cartItems = session('products', []);
      // Calculate the total amount using the calculateTotalAmount function
      $totalAmount = $this->calculateTotalAmount($cartItems);
    // Set your Stripe API key
    Stripe::setApiKey(env('STRIPE_SECRET'));

    // Get the token from the request (this should come from the Stripe.js script)
    $token = $request->input('stripeToken');

    try {
        // Create a charge using Stripe
        $stripeCharge = \Stripe\Charge::create([
            'amount' => $totalAmount * 100, // Stripe requires the amount in cents
            'currency' => 'usd', // Change this to your currency
            'source' => $token,
            'description' => 'Payment for products', // Customize this description
        ]);

        // If the payment is successful, you can proceed to store the order and clear the cart
        // ...

        // Create a Payment record
        $payment = new Payment();
        $payment->user_id = Auth::id();
        $payment->amount = $totalAmount;
        $payment->date = now();
        $payment->save();

        // Move products to the "soldproducts" table
        $cartItems = session('products', []);
        foreach ($cartItems as $cartItem) {
            $product = Product::find($cartItem['id']);
            SoldProduct::create([
                'payment_id' => $payment->id,
                'product_id' => $product->id,
                'user_id' => Auth::id(),
            ]);
        }

        // Clear the cart session
        session(['products' => []]);

        return redirect()->route('cart.index')->with('success', 'Payment successful!');
    } catch (\Exception $e) {
        // Handle payment failure
        return redirect()->route('cart.index')->with('error', 'Payment failed: ' . $e->getMessage());
    }
}

public function delete_cart($id)
{
    // Find the item in the cart by its ID and delete it
    $cartItems = session('products', []);

    if (isset($cartItems[$id])) {
        // Remove the item from the cart session
        unset($cartItems[$id]);

        // Update the session with the modified cart items
        session(['products' => $cartItems]);

        return redirect()->route('cart.index')->with('success', 'Item removed from the cart.');
    }

    return redirect()->route('cart.index')->with('error', 'Item not found in the cart.');
}

}