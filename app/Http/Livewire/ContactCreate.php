<?php

namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;

class ContactCreate extends Component
{
    public $name;
    public $phone;


    public function store()
    {
        $this->validate([
            'name' => 'required|min:3',
            'phone' => 'required|min:3'
        ]);

        $contact = Contact::create([
            'name' => $this->name,
            'phone' => $this->phone
        ]);

        $this->resetInput();

        $this->emit('contactStored', $contact);
    }

    private function resetInput()
    {
        $this->name = null;
        $this->phone = null;
    }

    public function render()
    {
        return view('livewire.contact-create');
    }
}





// ================================================================
// private hanya dipanggil di sini saja
// tidak di dalam view component nya