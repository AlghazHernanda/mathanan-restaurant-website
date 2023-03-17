<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Livewire\Component;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;

class MenuComponent extends Component
{
    use WithPagination;
    //untuk nyimpen pesanan ke Cart
    public function store($menu_id, $menu_name, $menu_price)
    {
        //1 = quantitiy
        Cart::add($menu_id, $menu_name, 1, $menu_price)->associate('\App\Models\Menu');
        session()->flash('success_message', 'Item added in Cart');
        return redirect()->route('menu.cart');
    }

    public function render()
    {
        $menus = Menu::paginate(9);
        // $menus = Menu::all();
        return view('livewire.menu-component', ['menus' => $menus]);
    }
}
