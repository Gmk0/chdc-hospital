<?php

use function Livewire\Volt\{mount,rules, state};

use App\Models\Departement;

state(['departement'=>[]]);

rules(['departement.intitule'=>'required']);


mount(function(Departement $departement){

     $this->departement=$departement->toArray();
});

$update= function(){

    $this->validate();

    $test= Departement::find($this->departement['id'])->update($this->departement);


    $this->dispatch('event',['icon'=>'success', 'title'=>'reussie']);



}



?>


<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Edit Department</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">


            <form wire:submit.prevent='update'>
                <div class="form-group">
                    <label>Department Name</label>
                    <input class="form-control" type="text" wire:model='departement.intitule'>
                    <x-input-error :messages="$errors->get('departement.intitule')" class="mt-2" />
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea cols="30" rows="4" wire:model='departement.description' class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label class="display-block">Department Status</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" wire:model='departement.status' type="radio" name="status" id="product_active" value="active"
                            >
                        <label class="form-check-label" for="product_active">
                            Active
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model='departement.intitule' name="status" id="product_inactive"
                            value="inactive">
                        <label class="form-check-label" for="product_inactive">
                            Inactive
                        </label>
                    </div>
                </div>
                <div class="text-center m-t-20">
                    <button class="btn btn-primary submit-btn">Save Department</button>
                </div>
            </form>
        </div>
    </div>
</div>
