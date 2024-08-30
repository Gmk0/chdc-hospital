<?php

use Livewire\Volt\Component;
use App\Models\User;


new class extends Component {

    public ?array $data=[];
    public String $email='';


    public function addNew()
    {

        $this->validate([
            'data.name'=>'required',
            'data.firstname'=>'required',
            'email'=>['required', 'string','email', 'max:255', 'unique:'.User::class],
            'data.password'=>'required',
            'data.phone'=>'required',
            'data.join'=>'required',
            'data.role'=>'required',
        ]);

        try{

            $this->data['email']=$this->email;



            User::create($this->data);

            $this->dispatch('event',['icon'=>'success', 'title'=>'reussie']);

            $this->data=[];


        }catch(\Exception $e){
            $this->dispatch('event',['icon'=>'error', 'title'=>$e->getMessage()]);
        }
    }


}; ?>

<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Add Employee</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form wire:submit.prevent="addNew">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>First Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" wire:model="data.name">
                            <x-input-error :messages="$errors->get('data.name')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" wire:model="data.firstname">
                            <x-input-error :messages="$errors->get('data.firstname')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span></label>
                            <input class="form-control" type="email" wire:model="email">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" wire:model="data.password">
                            <x-input-error :messages="$errors->get('data.password')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input class="form-control" type="password" wire:model="data.confirm_password">
                            <x-input-error :messages="$errors->get('data.confirm_password')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phone</label>
                            <input class="form-control" type="text" wire:model="data.phone">
                            <x-input-error :messages="$errors->get('data.phone')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Joining Date <span class="text-danger">*</span></label>
                            <div class="cal-icon">

                                <input class="form-control " type="date" wire:model="data.join">
                                <x-input-error :messages="$errors->get('data.join')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" wire:model="data.role">
                                <option value="">Select Role</option>
                         <option value="Admin">Administrateur</option>
                        <option value="Medecin">Médecin</option>
                        <option value="Infirmier">Infirmier</option>
                        <option value="Laborantin">Laborantin</option>
                        <option value="Pharmacien">Pharmacien</option>
                        <option value="Comptable">Comptable</option>
                        <option value="Receptionniste">Réceptionniste</option>
                            </select>
                        </div>
                        <x-input-error :messages="$errors->get('data.role')" class="mt-2" />
                    </div>
                </div>
                <div class="text-center m-t-20">
                    <button type="submit" class="btn btn-primary submit-btn">Create Employee</button>
                </div>
            </form>
        </div>
    </div>
</div>
