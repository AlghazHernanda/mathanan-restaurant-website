<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.admin.admin-dashboard-component', ['orders' => $orders]);
    }
}
