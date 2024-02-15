<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Services;
use App\Models\orderconfirm;
// use Illuminate\Notifications\Notification;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Notifications\TechOrderNotification;
use Illuminate\Support\Facades\Notification;

class TechnicianController extends Controller
{
    public function intro()
    {
        return view('technician.pages.introduction');
    }
    public function dashboard()
    {
        $categ_id = auth()->user()->category_id; // Replace with your variable value
        // $order = DB::select('SELECT * from orders WHERE status = ? AND category_id = ?', ['shipped', $categ_id]);

        $order = DB::select('SELECT o.* FROM orders AS o
        INNER JOIN items AS i ON o.id = i.order_id
        WHERE o.status = ? AND i.category_id = ?', ['shipped', $categ_id]);
        // Log::error('The technician id is ==> ' . json_encode($order));

        return view('technician.pages.dashboard')->with(['order' => $order]);
    }
    public function view($id)
    {
        $states = ['accepted'];
        $order = Order::with('user', 'items', 'items.services', 'items.color')->findOrFail($id);
        return view('technician.pages.view', ['order' => $order, 'states' => $states]);
    }
    public function store(Request $request)
    {
        $user = User::all();
        $orderconfirm = orderconfirm::all();
        $orderconfirm = new orderconfirm;
        $orderconfirm->status = 'accepted';
        $orderconfirm->save();
        Notification::send($user, new TechOrderNotification($request->id));
        Log::error('\n\n\n sabh ggggggg  ==> ' . json_encode($request->order));


        // Order::findOrFail($request->order->id)->update(['status' => 'accepted']);
        return back()->with('success', ' Order has been Accepted');
    }

    public function confirmed()
    {
        $order = order::all();
        return view('technician.pages.confirmed')->with(['order' => $order]);
    }
    public function updateStatus($id)
    {
        Order::findOrFail($id)->update(['status' => 'accepted']);
        return back()->with('success', 'status Updated!');
    }

    public function chat()
    {
        return view('technician.pages.chat');
    }
}
