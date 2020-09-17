<?php

namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;

class ContactUpdate extends Component
{
    public $name;
    public $phone;
    public $contact_id;

    protected $listeners = [
        'getContact' => 'showContact'
    ];

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3',
            'phone' => 'required|min:3'
        ]);

        // cek apakah ada contact_id
        if($this->contact_id){
            $contact = Contact::find($this->contact_id);
            $contact->update([
                'name' => $this->name,
                'phone' => $this->phone
            ]);

            $this->resetInput();
    
            $this->emit('contactUpdated', $contact);
        }
    }

    private function resetInput()
    {
        $this->name = null;
        $this->phone = null;
    }

    // $contact dari emit getContact() pd ContactIndex
    public function showContact($contact)
    {
        $this->name = $contact['name'];
        $this->phone = $contact['phone'];
        $this->contact_id = $contact['id'];
    }

    public function render()
    {
        return view('livewire.contact-update');
    }
}
