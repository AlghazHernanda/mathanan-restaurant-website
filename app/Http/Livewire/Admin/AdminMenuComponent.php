<?php

namespace App\Http\Livewire\Admin;

use App\Models\Menu;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminMenuComponent extends Component
{
    use WithPagination;
    public $menu_id;

    // public function deleteProduct()
    // {
    //     $menu = Menu::find($this->menu_id);
    //     unlink('assets/imgs/menu/' . $menu->image);
    //     $menu->delete();
    //     session()->flash('message', 'menu has been deleted successfully!');
    // }

    public function render()
    {
        $menus = Menu::orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.admin.admin-menu-component', ['menus' => $menus]);
    }
}
