<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        //logic untuk mengambil data cart dari view, json_code yaitu ubah datanya jadi format JSON
        // $cart = json_decode($request->get('cart'));
        // // dd($cart);
        // foreach ($cart as $item) {
        //     //mengakses kuantiti menu nya ada diluar model
        //     // dd($item);
        //     dd($item->model->name);
        // }

        // //logic untuk ngambil data cart dari database
        // $order = Order::find('2');
        // $order->cart = json_decode($request->get('cart'));
        // dd($order->cart);
        // foreach ($order->cart as $item) {
        //     //mengakses kuantiti menu nya ada diluar model
        //     // dd($item);
        //     dd($item->model->name);
        // }

        // $data = $request->except('_token');
        // $order = Order::create($data);
        // return view('home-component');


    }
}
