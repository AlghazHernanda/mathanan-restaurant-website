<?php

namespace App\Http\Livewire\Admin;

use App\Models\Menu;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class AdminAddMenuComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $description;
    public $regular_price;
    public $featured = 0;
    public $quantity;
    public $image;

    public $storedImage;


    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:menus',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'quantity' => 'required|numeric',
            // 'image' => 'required|mimes:jpeg,png',
        ]);
    }

    public function addMenu()
    {
        // validasi secara realtime sebelum user mencet submit
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:menus',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'quantity' => 'required|numeric',
            // 'image' => 'required|mimes:jpeg,png,jpg|image|file',
        ]);

        $menu = new Menu();
        $menu->name = $this->name;
        $menu->slug = $this->slug;
        $menu->description = $this->description;
        $menu->regular_price = $this->regular_price;
        $menu->featured = $this->featured;
        $menu->quantity = $this->quantity;

        // $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        // $this->image->storeAs('', $imageName);
        // $menu->image =  $imageName;

        $this->storedImage = $this->image->store('menu');
        $menu->image = $this->storedImage;


        $menu->save();
        session()->flash('message', 'menu has been created suceessefully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-menu-component');
    }
}
