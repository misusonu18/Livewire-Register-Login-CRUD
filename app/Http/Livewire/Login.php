<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public $users;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function login()
    {
        $this->validate();

        if (Auth::attempt(array('email' => $this->email, 'password' => $this->password))) {
            session()->flash('message', "You are Login successful.");
            return redirect(route('home'));
        } else {
            session()->flash('error', 'email and password are wrong.');
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
