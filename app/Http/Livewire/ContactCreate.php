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
        $contact = Contact::create([
            'name' => $this->name,
            'phone' => $this->phone
        ]);

        $this->resetInput();

        $this->emit('contactStored', $contact);
    }
    
    // private hanya dipanggil di sini saja
    // tidak di dalam view component nya
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
