<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Session;

class StripePaymentController extends Controller
{
    public function stripe()
       {
           return view('user.stripe');
       }

/**

 * success response method.

 *

 * @return \Illuminate\Http\Response

 */

 public function stripePost(Request $request)

 {
 
     Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
 
    
     
         // Get the Stripe token from the request


         // Get the Stripe token from the request
        
 
     $customer = Stripe\Customer::create(array(
 
             "address" => [
 
                     "line1" => "Virani Chowk",
 
                     "postal_code" => "360001",
 
                     "city" => "Rajkot",
 
                     "state" => "GJ",
 
                     "country" => "IN",
 
                 ],
 
             "email" => "demo@gmail.com",
 
             "name" => "Hardik Savani",
 
             "source" => $request->stripeToken
 
          ));
 
   
 
     Stripe\Charge::create ([
 
             "amount" => 100 * 100,
 
             "currency" => "usd",
 
             "customer" => $customer->id,
 
             "description" => "Test payment from itsolutionstuff.com.",
 
             "shipping" => [
 
               "name" => "Jenny Rosen",
 
               "address" => [
 
                 "line1" => "510 Townsend St",
 
                 "postal_code" => "98140",
 
                 "city" => "San Francisco",
 
                 "state" => "CA",
 
                 "country" => "US",
 
               ],
 
             ]
 
     ]); 
     $cartItems = $request->session()->get('products', []);

     foreach ($cartItems as $key => $product) {
         // Assuming your cart item has a unique identifier like 'id'
         if (isset($product['id'])) {
             // Remove this item from the cart
             unset($cartItems[$key]);
         }
     }
 
     // Update the cart in the session
     $request->session()->put('products', $cartItems);
 
 
     Session::flash('success', 'Payment successful!');
 
            
 
     return back();
 
 }
}