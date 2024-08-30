<?php

use function Livewire\Volt\{mount,rules,with, state};

use App\Models\Patient;

state(['data'=>[]]);
rules(['data.nom' => 'required|string|max:255',
'data.postnom' => 'required|string|max:255',
'data.prenom' => 'required|string|max:255',
// Remplacez "table_name" par le nom de votre table
'data.date_naiss' => 'required|date',
'data.sexe' => 'required', // Assurez-vous que 'male' et 'female' sont les seules options
'data.adresse' => 'required|string|max:255',
'data.telephone' => 'nullable', // Vérifie que l'ID du département existe
'data.etat_civil' => 'nullable|string|in:single,married,divorced',]);


mount(function(Patient $patient){


     $this->data=$patient->toArray();
});


$update= function(){

    $this->validate();

    try{

        $test= \App\Models\Patient::find($this->data['id'])->update($this->data);
        $this->dispatch('event',['icon'=>'success', 'title'=>'reussie']);

    }catch(\Exception $e){


        $this->dispatch('event',['icon'=>'error', 'title'=>$e->getMessage()]);

    }


};



?>
<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Add Patient</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form wire:submit.prevent="update">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>First Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" wire:model="data.nom">
                            @error('data.prenom') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>First Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" wire:model="data.prenom">
                            @error('data.prenom') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" wire:model="data.postnom">
                            @error('data.postnom') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span></label>
                            <input class="form-control" type="email" wire:model="data.email">
                            @error('data.email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <div class="cal-icon">
                                <input type="date" class="form-control datetimepicker" wire:model="data.date_naiss">
                                @error('data.date_naiss') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group gender-select">
                            <label class="gen-label">Gender:</label>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="sexe" class="form-check-input" value="male"
                                        wire:model="data.sexe">Male
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="sexe" class="form-check-input" value="female"
                                        wire:model="data.sexe">Female
                                </label>
                            </div>
                            @error('data.sexe') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" wire:model="data.adresse">
                            @error('data.adresse') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phone</label>
                            <input class="form-control" type="text" wire:model="data.telephone">
                            @error('data.telephone') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <!-- État Civil -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>État Civil</label>
                            <select class="form-control" wire:model="data.etat_civil">
                                <option value="">Choisir...</option>
                                <option value="single">Célibataire</option>
                                <option value="married">Marié</option>
                                <option value="divorced">Divorcé</option>
                            </select>
                            @error('data.data.etat_civil') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Avatar</label>
                            <div class="profile-upload">
                                <div class="upload-img">
                                    <img alt="" src="assets/img/user.jpg">
                                </div>
                                <div class="upload-input">
                                    <input type="file" class="form-control" wire:model="data.avatar">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center m-t-20">
                    <button class="btn btn-primary submit-btn">Modifier Patient</button>
                </div>
            </form>
        </div>
    </div>
</div>
