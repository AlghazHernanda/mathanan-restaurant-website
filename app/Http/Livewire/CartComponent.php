<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartComponent extends Component
{
    // untuk menambah quantity
    public function increaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId, $qty); //kirim rowId (id dari product) dan QTY nya ke dalam JSON Cart
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId, $qty);
        $this->emitTo('cart-icon-component', 'refreshComponent'); //memanggil refreshComponent di CartIconComponent
    }

    //untuk delete item di cart
    public function destroy($id)
    {
        Cart::remove($id);
        session()->flash('success_message', 'Item has been removed');
        $this->emitTo('cart-icon-component', 'refreshComponent'); //memanggil refreshComponent di CartIconComponent
    }

    public function clearAll()
    {
        Cart::destroy();
        $this->emitTo('cart-icon-component', 'refreshComponent'); //memanggil refreshComponent di CartIconComponent
    }


    public function render()
    {
        return view('livewire.cart-component');
    }
}
