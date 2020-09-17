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

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->phone }}</td>
                <td>
                    <button wire:click="getContact({{ $contact->id }})" type="submit" class="btn btn-success btn-sm font-weight-bold">Edit</button>
                    <button type="submit" class="btn btn-danger btn-sm font-weight-bold">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>






{{-- 
    
    
    {{-- panggil comp dan lempar data ke comp --}}
    {{-- <livewire:contact-create :contacts="$contacts" /> --}}
    
    
    
    
    --}}