<div>
    <form wire:submit.prevent="store">
        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <input wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Name">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col">
                    <input wire:model="phone" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Phone">
                    @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

            </div>
        </div>
        <button type="submit" class="btn btn-primary font-weight-bold">Submit</button>
    </form>

</div>






{{--
    directive wire model
    data binding, kita akan mengisi property name yg sudah dibuat di ContactCreate.php
    wire:model="name" 
    
    cegah proses submit dengan mengarahkan ke method store pada ContactCreate 
    <form wire:submit.prevent="store">
        
        


    --}}