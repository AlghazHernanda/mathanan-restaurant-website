<?php

namespace App\Http\Livewire\Admin;

use App\Models\Menu;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class AdminEditMenuComponent extends Component
{
    use WithFileUploads;

    public $menu_id;
    public $name;
    public $slug;
    public $description;
    public $regular_price;
    public $featured = 0;
    public $quantity;
    public $image;
    public $newimage;

    public function mount($menu_id)
    {
        $menu = Menu::find($menu_id);
        $this->menu_id = $menu->id;
        $this->name = $menu->name;
        $this->slug = $menu->slug;
        $this->description = $menu->description;
        $this->regular_price = $menu->regular_price;
        $this->featured = $menu->featured;
        $this->quantity = $menu->quantity;
        $this->image = $menu->image;
    }
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }


    public function updateMenu()
    {
        // validasi secara realtime sebelum user mencet submit
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'regular_price' => 'required',
            'featured' => 'required',
            'quantity' => 'required',
            'image' => 'required',
        ]);
        // $menu = '';

        $menu = Menu::find($this->menu_id);
        $menu->name = $this->name;
        $menu->slug = $this->slug;
        $menu->description = $this->description;
        $menu->regular_price = $this->regular_price;
        $menu->featured = $this->featured;
        $menu->quantity = $this->quantity;
        if ($this->newimage) {
            unlink('assets/imgs/menu/' . $menu->image);
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $image = $this->newimage->storeAs('', $imageName);
            $menu->image = $image;
        }

        $menu->save();

        session()->flash('message', 'menu Update Successfull');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-menu-component');
    }
}