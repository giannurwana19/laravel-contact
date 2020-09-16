<?php

namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;

class ContactIndex extends Component
{   
    public $contacts;

    public function render()
    {
        $this->contacts = Contact::latest()->get();
        return view('livewire.contact-index');
        
        // k: atau bisa dipanggil langsung seperti ini
        // tidak perlu pake public $contacts
    
        // return view('livewire.contact-index', [
        //     'contacts' => Contact::latest()->get()
        // ]);
        
    }
}
