<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Livewire\Component;

class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $menu = Menu::where('slug', $this->slug)->first();
        $nmenus = Menu::latest()->take(4)->get();
        return view('livewire.details-component', ['menu' => $menu, 'nmenus' => $nmenus]);
    }
}
