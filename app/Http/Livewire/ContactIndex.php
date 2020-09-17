<?php

namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{
    use WithPagination;

    public $status_update = false;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'contactStored' => 'handleStored',
        'contactUpdated' => 'handleUpdated'
    ];

    public function getContact($id)
    {
        $this->status_update = true;
        $contact = Contact::find($id);
        $this->emit('getContact', $contact);
    }

    public function destroy($id)
    {
        if ($id) {
            $contact = Contact::find($id);
            $contact->delete();

            session()->flash('message', "Contact was deleted!");
        }
    }

    public function handleStored($contact)
    {
        session()->flash('message', "Contact {$contact['name']} was stored!");
    }

    public function handleUpdated($contact)
    {
        session()->flash('message', "Contact {$contact['name']} was updated!");
    }

    public function render()
    {
        return view('livewire.contact-index', [
            'contacts' => Contact::latest()->paginate(3)
        ]);
    }
}






// k: dd() pada livewire menmunculkan seperti modal

// k: dengan menggunakan emit()
// setiap comp yg kita panggil, maka akan melakukan proses re render
// artinya melakukan refresh pada comp tsb

// k: $contact pd method handleStored() dari ContactCreate.php
// $contact berbentuk array
// setiap terjadi emit dengan key contactStored dimanapun,
// maka akan menjalan kan method yang ada di comp ContactIndex ini 

// k: untuk menggunakan pagination, definisikan variablenya di dalam view

// k: default livewire sekaran menggunakan tailwind
// jadi kita tambahkan ini untuk bootstrap
// protected $paginationTheme = 'bootstrap';