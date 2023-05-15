<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\User;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public function accept($order_id)
    {
        $order = Order::find($order_id);
        $order->status_antar = 'SUDAH';
        $order->save();
        session()->flash('message', 'data berhasil diubah');
    }
    public function render()
    {
        $pengguna = User::all();
        $orders = Order::orderBy('created_at', 'DESC')->paginate(10);

        $total_all_price = Order::where('status', 'settlement')->sum('total_price'); //menghitung total semua transaksi

        //logic untuk ngambil data cart dari database
        // $order = Order::find('2');
        // $order->cart = json_decode($order->cart);
        // dd($order->cart);
        // foreach ($order->cart as $item) {
        //     //mengakses kuantiti menu nya ada diluar model
        //     // dd($item);
        //     dd($item->model->name);
        // }

        return view('livewire.admin.admin-dashboard-component', ['orders' => $orders, 'total_all_price' =>  $total_all_price, 'pengguna' => $pengguna]);
    }
}
