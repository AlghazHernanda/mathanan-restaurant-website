<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(10);

        //logic untuk ngambil data cart dari database
        $order = Order::find('2');
        $order->cart = json_decode($order->cart);
        // dd($order->cart);
        // foreach ($order->cart as $item) {
        //     //mengakses kuantiti menu nya ada diluar model
        //     // dd($item);
        //     dd($item->model->name);
        // }

        return view('livewire.admin.admin-dashboard-component', ['orders' => $orders]);
    }
}
