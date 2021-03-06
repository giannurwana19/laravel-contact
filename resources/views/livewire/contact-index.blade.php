<div>
    @if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    @if($status_update)
    <livewire:contact-update />
    @else
    <livewire:contact-create />
    @endif

    <hr>

    <div class="row">
        <div class="col">
            <select wire:model="paginate" class="form-control form-control-sm w-auto">
                <option value="3">3</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
            </select>
        </div>
        <div class="col">
            <input type="text" wire:model="search" class="form-control form-control-sm" placeholder="search..."
                autofocus>
        </div>
    </div>

    <hr>

    <table class="table table-bordered">
        <thead class="thead-dark text-center">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->phone }}</td>
                <td>
                    <button wire:click="getContact({{ $contact->id }})"
                        class="btn btn-success btn-sm font-weight-bold">Edit</button>
                    <button wire:click="destroy({{ $contact->id }})"
                        class="btn btn-danger btn-sm font-weight-bold">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $contacts->links() }}
</div>






{{-- 
    
    
    panggil comp dan lempar data ke comp
    <livewire:contact-create :contacts="$contacts" />
    
    
    
    
    --}}