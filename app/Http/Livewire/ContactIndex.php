<?php

namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;

class ContactIndex extends Component
{   
    public $contacts;

    protected $listeners = [
        'contactStored' => 'handleStored'
    ];

    // $contact dari ContactCreate.php
    // setiap terjadi emit dengan key contactStored dimanapun,
    // maka akan menjalan kan method yang ada di comp ContactIndex ini 
    public function handleStored($contact) // $contact berbentuk array
    {
        // dd($contact);
        session()->flash('message', "Contact {$contact['name']} was stored!");
    }

    public function render()
    {
        $this->contacts = Contact::latest()->get();
        return view('livewire.contact-index');
    }
}






// dd() pada livewire menmunculkan seperti modal

// dengan menggunakan emit()
// setiap comp yg kita panggil, maka akan melakukan proses re render
// artinya melakukan refresh pada comp tsb