<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contact;
use Livewire\Component;

class AdminMessageComponent extends Component
{
    public function render()
    {
        // urutkan pesan terbaru
        $message_users = Contact::orderBy('created_at', 'DESC')->paginate(10);
        //kirim data kehalaman view
        return view('livewire.admin.admin-message-component', ['message_users' => $message_users]);
    }
}
