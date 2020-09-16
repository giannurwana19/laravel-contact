<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactCreate extends Component
{
    // public $contacts;

    // h: $contacts dari parameter yg dikirim oleh contact-index
    // k: mount() seperti __contsruct
    // public function mount($contacts)
    // {
    //     $this->contacts = $contacts;
    // }

    public function render()
    {
        return view('livewire.contact-create');
    }
}
