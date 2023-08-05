<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class CobaController extends Controller
{
    public function coba_order(Request $request)
    {
        $orders = Order::orderBy('created_at', 'DESC')->get();

        // ddd($orders);
        return view('coba', [
            'orders' => $orders,
        ]);
    }
}
