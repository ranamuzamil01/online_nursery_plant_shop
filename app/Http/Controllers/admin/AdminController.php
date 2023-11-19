<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Models\Message; // Make sure to import the Message model
use App\Models\User;
use App\Models\Payment; // Replace with your payment model
use App\Models\Product;


class AdminController extends Controller
{

// public function contact_table(){
//     return view('contact-us');
// }
// public function index()
// {
//   return view(admin.index);
// } 
    public function contact()
    {
        $messages = Message::all(); // Fetch all messages from the database

        return view('Admin.contact-us', compact('messages'));
    }

    public function subscribe()
    {
        $subscribers = Subscriber::all(); // Fetch all messages from the database

        return view('Admin.subscriber', compact('subscribers'));
    }
    public function deleteMessage(Request $request, $id)
    {
        $message = Message::find($id);

        if (!$message) {
            return back()->with('error', 'Message not found.');
        }

        $message->delete();

        return back()->with('success', 'Message deleted successfully.');
    }

    public function deletesubscriber(Request $request, $id)
    {
        $subscriber = Subscriber::find($id);

        if (!$subscriber) {
            return back()->with('error', 'subscriber not found.');
        }

        $subscriber->delete();

        return back()->with('success', 'subscriber deleted successfully.');
    }



    public function view_user()
    {
        $users = User::all(); // Fetch all messages from the database
    
        return view('Admin.user', compact('users'));
    } 

     public function deleteUser(Request $request, $id)
    {
        $users = User::find($id);

        if (!$users) {
            return back()->with('error', 'User not found.');
        }

        $users->delete();

        return back()->with('success', 'User deleted successfully.');
    }


   
    
        public function index()
        {
            return view('admin.dashboard');
        }
    
        public function payments()
        {
            // Retrieve a list of payments with their associated products
            $payments = Payment::with('products')->get();
    
            return view('admin.payments', compact('payments'));
        }
    














}
