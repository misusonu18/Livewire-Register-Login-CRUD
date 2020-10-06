@extends('layouts.app')

    @section('content')
        <div class="row justify-content-end">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <div class="row justify-content-center mt-5">
            <form wire:submit.prevent="register">
                <div class="form-group">
                    <label>Name:</label>
                    <div class="form-input-group">
                        <input type="text" wire:model="name" class="form-control">
                    </div>
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label>Email:</label>
                    <div class="form-input-group">
                        <input type="email" wire:model="email" class="form-control">
                    </div>
                    @error('email') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label>Password:</label>
                    <div class="form-input-group">
                        <input type="password" wire:model="password" class="form-control">
                    </div>
                    @error('password') <span class="error">{{ $message }}</span> @enderror
                </div>

                <button class="btn btn-primary" type="submit">Save User</button>
            </form>
        </div>
    @endsection
