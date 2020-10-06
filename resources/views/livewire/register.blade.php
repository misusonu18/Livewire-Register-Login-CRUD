<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 mt-2 bg-light p-4 rounded">
            <p class="h1 text-center">Register</p>
            <hr>

            <form wire:submit.prevent="register">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control rounded" placeholder="Name" wire:model="name" >
                    <small class="text-danger">
                        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </small>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control rounded" placeholder="Email" wire:model="email">
                    <small class="text-danger">
                        @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </small>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control rounded" placeholder="Password" wire:model="password">
                    <small class="text-danger">
                        @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </small>
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password"
                        class="form-control rounded"
                        placeholder="Confirm Password"
                        wire:model="passwordConfirmation"
                    >
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-block rounded" value="Register">
                </div>

            </form>
        </div>
    </div>
</div>
