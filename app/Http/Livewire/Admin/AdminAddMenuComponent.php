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
        // ddd($this->image->getClientOriginalName());
        // validasi secara realtime sebelum user mencet submit
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:menus',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => 'required|mimes:jpeg,png,',
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

        if ($this->image) {
            $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $this->image->getClientOriginalName());
            $this->image->storeAs('', $filename);
            $menu->image = $filename;
        }


        // $this->image->storeAs('', $this->image->getClientOriginalName());
        // $menu->image =  $this->image->getClientOriginalName();

        // ddd($menu);

        $menu->save();
        session()->flash('message', 'menu has been created suceessefully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-menu-component');
    }
}
