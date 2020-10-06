<?php

namespace App\Http\Livewire\Customer;

use App\Models\customer as ModelsCustomer;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Customer extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $name;
    public $phone;
    public $email;
    public $photo;
    public $editCustomer;
    public $editingCustomer = false;
    public $editingCustomerId;
    public $search;

    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search'];

    protected $rules = [
        'name' => 'required|max:255',
        'email' => 'required|email|unique:customers',
        'phone' => 'required|numeric',
        'photo' => 'image|max:2048|mimes:jpeg,png,svg,jpg,gif',
    ];

    protected $messages = [
        'name.required' => 'The Name cannot be empty.',
        'email.required' => 'The Email Address cannot be empty.',
        'email.email' => 'The Email Address format is not valid.',
        'phone.required' => 'Phone Number field cannot be empty.',
        'phone.numeric' => 'Phone Number contains Numbers only.',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetFields()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
    }

    public function addCustomer()
    {
        $this->validate();
        $name = md5($this->photo . microtime()).'.'.$this->photo->extension();
        $this->photo->storeAs('photos', $name);

        ModelsCustomer::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'photo' => $name,
        ]);
        session()->flash('message', 'Customer Created Successfully.');
        $this->resetFields();
        $this->customers = ModelsCustomer::all();
    }

    public function editCustomer($customerId)
    {
        $this->editingCustomer = true;
        $this->editCustomer = ModelsCustomer::whereId($customerId)->first();
        $this->editingCustomerId = $this->editCustomer->id;
        $this->name = $this->editCustomer->name;
        $this->email = $this->editCustomer->email;
        $this->phone = $this->editCustomer->phone;
    }

    public function updateCustomer()
    {
        $this->resetValidation();
        $name = md5($this->photo . microtime()).'.'.$this->photo->extension();
        $this->photo->storeAs('photos', $name);

        $this->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric',
        ]);

        ModelsCustomer::whereId($this->editingCustomerId)->first()->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'photo' => $name,
        ]);

        session()->flash('message', 'Customer Updated Successfully.');
        $this->resetFields();
        $this->editingCustomer = false;
    }

    public function removeCustomer($customerId)
    {
        $deletingCustomer = ModelsCustomer::whereId($customerId)->first();
        $imagePath = public_path(). '/storage/photos/' . $deletingCustomer->photo;

        if (File::exists($imagePath)) {
            unlink($imagePath);
        }
        $deletingCustomer->delete();
        session()->flash('message', 'Customer Deleted Successfully.');
        $this->customers = ModelsCustomer::all();
    }

    public function render()
    {
        return view('livewire.customer.customer', [
            'customers' => ModelsCustomer::where('name', 'like', '%'.$this->search.'%')->orWhere('email', 'like', '%'.$this->search.'%')->paginate(5),
        ])->section('body');
    }
}
