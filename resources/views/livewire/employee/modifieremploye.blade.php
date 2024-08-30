<?php

use function Livewire\Volt\{mount,rules, state};

use App\Models\User;

state(['user'=>[]]);

rules(['user.name'=>'required',
'user.firstname'=>'required',
'user.email'=>['required', 'string','email', 'max:255'],
'user.password'=>'required',
'user.phone'=>'required',
'user.join'=>'required',
'user.role'=>'required',]);


mount(function(User $user){

     $this->user=$user->toArray();
});

$update= function(){

    $this->validate();

    try{

        $test= \App\Models\User::find($this->user['id'])->update($this->user);
        $this->dispatch('event',['icon'=>'success', 'title'=>'reussie']);
    }catch(\Exception $e){

        $this->dispatch('event',['icon'=>'error', 'title'=>$e->getMessage()]);

    }





}



?>

<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">eDIT Employee</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form wire:submit.prevent="update">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>First Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" wire:model="user.name">
                            <x-input-error :messages="$errors->get('user.name')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" wire:model="user.firstname">
                            <x-input-error :messages="$errors->get('user.firstname')" class="mt-2" />
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
                            <input class="form-control" type="password" wire:model="user.password">
                            <x-input-error :messages="$errors->get('user.password')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input class="form-control" type="password" wire:model="user.confirm_password">
                            <x-input-error :messages="$errors->get('user.confirm_password')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phone</label>
                            <input class="form-control" type="text" wire:model="user.phone">
                            <x-input-error :messages="$errors->get('user.phone')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Joining Date <span class="text-danger">*</span></label>
                            <div class="cal-icon">

                                <input class="form-control " type="date" wire:model="user.join">
                                <x-input-error :messages="$errors->get('user.join')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" wire:model="user.role">
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
                        <x-input-error :messages="$errors->get('user.role')" class="mt-2" />
                    </div>
                </div>
                <div class="text-center m-t-20">
                    <button type="submit" class="btn btn-primary submit-btn">Create Employee</button>
                </div>
            </form>
        </div>
    </div>
</div>
