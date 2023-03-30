<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactComponent extends Component
{
    public $name;
    public $email;
    public $phonenumber;
    public $subject;
    public $message;

    public function addMessage()
    {
        //validasi secara realtime sebelum user mencet submit
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'phonenumber' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $contact = new Contact();
        $contact->name = $this->name;
        $contact->email = $this->email;
        $contact->phonenumber = $this->phonenumber;
        $contact->subject = $this->subject;
        $contact->message = $this->message;
        $contact->save();

        session()->flash('message', 'thank you for your message and feedback!');
    }
    public function render()
    {
        return view('livewire.contact-component');
    }
}
