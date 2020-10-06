<div class="container">
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

    <div class="row justify-content-center">
        <div class="col-6 mt-2 bg-light p-4 rounded">
            <p class="h1 text-center">Login</p>
            <hr>

            <form wire:submit.prevent="login">
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
                    <input type="submit" class="btn btn-success btn-block rounded" value="Login">
                </div>

            </form>
        </div>
    </div>
</div>
