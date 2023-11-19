<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Product;
use App\Models\SoldProduct; // Add this import at the top
use Auth;
class PaymentController extends Controller
{
    // ... Other methods ...

    public function store(Request $request)
    {
        // Store a new payment in the database
        $payment = new Payment();
        $payment->user_id = Auth::id();
        $payment->amount = $request->input('amount');
        $payment->date = now();
        $payment->save();

        // Associate products with the payment
        $payment->products()->attach($request->input('products'));

        // Create SoldProduct records for each sold product
        foreach ($request->input('products') as $productId) {
            SoldProduct::create([
                'payment_id' => $payment->id,
                'product_id' => $productId,
                'user_id' => Auth::id(),
            ]);
        }

        return redirect()->route('payments.index');
    }
    // private function savePaymentInfo(Request $request)
    // {
    //     // Create a new Payment record in the database
    //     $payment = new Payment();
    //     $payment->user_id = Auth::id(); // Assuming you have user authentication
    //     $payment->amount = 100 * 100; // Adjust this based on your logic
    //     $payment->date = now(); // Use the current timestamp
    //     // Add other payment-related fields here if needed
    //     $payment->save();
    // }
    public function index()
    {
        // Fetch and display a list of payments with associated products
        $payments = Payment::with('products')->get();

        return view('admin.payments', compact('payments'));
    }
}

