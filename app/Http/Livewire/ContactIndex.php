<?php

namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{
    use WithPagination;

    public $status_update = false;
    public $paginate = 3;
    public $search;

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

    protected $queryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);  
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
            'contacts' =>  $this->search === null ?
                Contact::latest()->paginate($this->paginate) :
                Contact::latest()->where('name', 'like', "%{$this->search}%")-> orWhere('phone', 'like', "%{$this->search}%")->paginate($this->paginate)
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
// p: protected $paginationTheme = 'bootstrap';

// k: mount()
// method ini akan dieksekusi terlebih dahulu sebelum ditampilkan ke blade
// p: $this->search = request()->query('search', $this->search);
// * kita akan set property search sesuai dengan requrest query string yg dikirmkan client, kemudian akan tampil di url
// jangan lupa tambahkan ini
// p: protected $queryString = ['search'];