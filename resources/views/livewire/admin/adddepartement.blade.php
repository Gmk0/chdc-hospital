<?php

use Livewire\Volt\Component;
use App\Models\Departement;

new class extends Component {

    public ?array $form=[];

    public function addForm()
    {
        $this->validate([
            'form.intitule' => 'required',
            'form.status'=>'required',
        ]);


        Departement::create($this->form);


        $this->form=[];

      $this->dispatch('event',['icon'=>'success', 'title'=>'reussie']);


    }



}; ?>


<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Add Department</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form wire:submit='addForm'>
                <div class="form-group">
                    <label>Nom departement</label>
                    <input class="form-control" wire:model='form.intitule' type="text">


                    <x-input-error :messages="$errors->get('form.intitule')" class="mt-2" />

                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea cols="30" rows="4" wire:model='form.description' class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label class="display-block">Department Status</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" wire:model='form.status'
                         type="radio" name="status" id="product_active"
                          value="active"
                            checked>
                        <label class="form-check-label" for="product_active">
                            Active
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"  wire:model='form.status'  type="radio" name="status" id="product_inactive"
                            value="inactive">
                        <label class="form-check-label" for="product_inactive">
                            Inactive
                        </label>
                    </div>

                    <x-input-error :messages="$errors->get('form.status')" class="mt-2" />
                </div>
                <div class="text-center m-t-20">
                    <button class="btn btn-primary submit-btn">Create Department</button>
                </div>
            </form>
        </div>
    </div>
</div>
