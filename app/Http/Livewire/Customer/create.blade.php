<form wire:submit.prevent="updateCustomer()">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control rounded" placeholder="Name" wire:model="name">
                <small class="text-danger">
                    @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </small>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control rounded" placeholder="Phone" wire:model="phone">
                <small class="text-danger">
                    @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </small>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-6">
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control rounded" placeholder="Email Address" wire:model="email">
                <small class="text-danger">
                    @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </small>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-6">
            <div class="form-group">
                <input type="submit" class="btn btn-success btn-block rounded" value="Submit" >
            </div>
        </div>
    </div>
</form>
