<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Livewire\Component;

class UserDashboardComponent extends Component
{
    public function render()
    {
        $total_all_price = Order::where('email', auth()->user()->email)->sum('total_price');
        $orders = Order::orderBy('created_at', 'DESC')->where('email', auth()->user()->email)->get();
        return view('livewire.user.user-dashboard-component', ['orders' => $orders, 'total_all_price' =>  $total_all_price]);
    }
}
