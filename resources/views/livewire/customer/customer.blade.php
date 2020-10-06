<div class="container mt-3">
    <div class="row justify-content-end">
        <div class="col-5">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>

    @if($editingCustomer)
        <form wire:submit.prevent="updateCustomer()">
            <button wire:click="$set('editingCustomer', false)" class="btn btn-primary">Add Customer</button>
    @else
        <form wire:submit.prevent="addCustomer()">
    @endif
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

            <div class="col-6">
                <label>Photo</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" wire:model="photo" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                    <small class="text-danger">
                        @error('photo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </small>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-6">
                @if($editingCustomer)
                    <div class="form-group">
                        <input type="submit" class="btn btn-warning btn-block rounded" value="Edit" >
                    </div>
                @else
                    <div class="form-group">
                        <input type="submit" class="btn btn-success btn-block rounded" value="Submit" >
                    </div>
                @endif
            </div>
        </div>

    </form>

    <div class="row justify-content-end">
        <div class="col-4 mt-2 mb-3">
            <input class="form-control mr-sm-2 text-left" type="search" placeholder="Search" wire:model="search">
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <td>
                                {{ $customer->id }}
                            </td>

                            <td>
                                {{ $customer->name }}
                            </td>

                            <td>
                                {{ $customer->email }}
                            </td>

                            <td>
                                {{ $customer->phone }}
                            </td>

                            <td>
                                <img src="{{ asset('storage/photos/' . $customer->photo) }}" width="100px" class="rounded">
                            </td>

                            <td>
                                <div>
                                    <button wire:click="editCustomer('{{ $customer->id }}')"
                                        class="btn btn-warning"
                                        data-toggle="tooltip"
                                    >
                                        Edit
                                    </button>

                                    <button
                                        onclick="
                                            confirm('Do You Want To Delete Customer?') || event.stopImmediatePropagation()
                                        "
                                        wire:click="removeCustomer('{{ $customer->id }}')"
                                        class="btn btn-danger"
                                        data-toggle="tooltip"
                                    >
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $customers->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
</div>
