<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactUpdate extends Component
{
    public $name;
    public $phone;
    public $contact_id;

    protected $listeners = [
        'getContact' => 'showContact'
    ];

    // $contact dari emit getContact() pd ContactIndex
    public function showContact($contact)
    {
        $this->name = $contact['name'];
        $this->phone = $contact['phone'];
        $this->contactId = $contact['id'];
    }

    public function render()
    {
        return view('livewire.contact-update');
    }
}
