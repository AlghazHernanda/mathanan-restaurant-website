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
        // return "berhasil";

        // $order = Order::find('1');

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'phonenumber' => 'required|numeric|digits_between:10,12', //jadi cuma 10-12 angka nomor telepon
            'address' => 'required',
            'email' => 'required|email:dns',
        ]);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        //agar harga berubah jadi string
        $str =  $request->total_price;
        $val = (float) str_replace(',', '', $str);

        // error handling jika user tidak memilih menu, jadi harga engga bisa 0
        if ($val <= 0) {
            return back()->with('message', 'Harus Memilih Menu, Silahkan Coba Lagi');
        } else {
            $params = array(
                'transaction_details' => array(
                    'order_id' => rand(),
                    'gross_amount' => $val,
                ),
                'customer_details' => array(
                    'first_name' => $request->name,
                    'phone' => $request->phonenumber,
                ),
            );

            //kirim snaptoken ke halaman
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            // dd($snapToken);

            //kirim data kehalaman checkout
            return view('checkout', [
                'snapToken' => $snapToken,
                'name' => $validatedData['name'],
                'phonenumber' => $validatedData['phonenumber'],
                'total_price' => $request->total_price,
                'address' => $validatedData['address'],
                'email' =>  $validatedData['email'],
                'cart' => $request->cart
            ]);
        }
    }

    // kompleksitas waktu dari kode di bawah didominasi oleh operasi dekode JSON yang berjalan dalam O(n), 
    // di mana n adalah ukuran data JSON yang diterima dari permintaan. Operasi lainnya memiliki kompleksitas konstan (O(1)), 
    // yang artinya tidak tergantung pada ukuran data input.

    public function payment_post(Request $request)
    {
        // //untuk test liat hasil data payment yang diambil sebelum dimasukin ke database
        // return $request;

        //jadiin format json lagi
        $json = json_decode($request->get('json'));

        $order = new Order();

        $order->name = $request->get('name');
        $order->email = $request->get('email'); //data email
        $order->address = $request->get('address'); //data alamat
        $order->cart = $request->get('cart'); //data cart
        $order->phonenumber = $request->get('phonenumber'); //data telepon

        $order->status_antar = "BELUM";

        $order->transaction_id = $json->transaction_id; //ambil transaction_id yang di dalam JSON
        $order->total_price = $json->gross_amount;  //ambil gross_amount yang di dalam JSON
        $order->payment_type = $json->payment_type;  //ambil payment_type yang di dalam JSON
        $order->status = $json->transaction_status; //ambil transaction_status yang di dalam JSON

        //jika payment_code ada maka masukan datanya, jika tidak maka kasih null
        $order->payment_code = isset($json->payment_code) ? $json->payment_code : null;
        //jika pdf_url ada maka masukan datanya, jika tidak maka kasih null
        $order->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;

        return $order->save() ? redirect(url('/'))->with('alert-success', 'Order berhasil dibuat') : redirect(url('/'))->with('alert-failed', 'Terjadi kesalahan');
    }
}
