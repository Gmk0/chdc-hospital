<?php

use Livewire\Volt\Component;

new class extends Component {
    //
   public $data = [];

   public function with():array
    {
        return [
            'users'=>\App\Models\User::all(),
            'departements'=>\App\Models\Departement::all(),
        ];
    }

public function addNew()
{
    $this->validate([
        'data.nom' => 'required|string|max:255',
        'data.postnom' => 'required|string|max:255',
        'data.prenom' => 'required|string|max:255',
        'data.matricule' => 'required|string|max:255', // Remplacez "table_name" par le nom de votre table
        'data.date_naiss' => 'required|date',
        'data.sexe' => 'required|string|in:male,female', // Assurez-vous que 'male' et 'female' sont les seules options
        'data.adresse' => 'required|string|max:255',
        'data.departement_id' => 'nullable|exists:departements,id', // Vérifie que l'ID du département existe
        'data.etat_civil' => 'nullable|string|in:single,married,divorced', // Assurez-vous que les options sont correctes
        'data.user_id' => 'nullable|exists:users,id', // Vérifie que l'ID de l'utilisateur existe
        'data.status' => 'required|string|in:active,conger', // Assurez-vous que 'active' et 'conger' sont les seules options
    ]);

    try{





    \App\Models\StaffMedical::create($this->data);

    $this->dispatch('event',['icon'=>'success', 'title'=>'reussie']);

    $this->data=[];


    }catch(\Exception $e){
    $this->dispatch('event',['icon'=>'error', 'title'=>$e->getMessage()]);
    }

    // Vous pouvez maintenant enregistrer les données dans la base de données ou effectuer d'autres actions
    // Exemple: Model::create($this->data);
}
}; ?>

<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Add Doctor</h4>
        </div>
    </div>
    <div class="row">
       <div class="col-lg-8 offset-lg-2">
        <form wire:submit.prevent="addNew">
            <div class="row">
                <!-- Nom -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nom <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" wire:model="data.nom">
                        @error('data.nom') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Postnom -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Postnom <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" wire:model="data.postnom">
                        @error('data.postnom') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Prénom -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Prénom <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" wire:model="data.prenom">
                        @error('data.prenom') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Matricule -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Matricule <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" wire:model="data.matricule">
                        @error('data.matricule') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Date de Naissance -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Date de Naissance <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" wire:model="data.date_naiss">
                        @error('data.date_naiss') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Sexe -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Sexe <span class="text-danger">*</span></label>
                        <select class="form-control select" wire:model="data.sexe">
                            <option value="">Choisir...</option>
                            <option value="male">Homme</option>
                            <option value="female">Femme</option>
                        </select>
                        @error('data.sexe') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Adresse -->
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Adresse <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" wire:model="data.adresse">
                        @error('data.adresse') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>




                <!-- Département -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Département</label>
                        <select class="form-control" wire:model="data.departement_id">
                            <option value="">Choisir...</option>

                            @foreach ($departements as $item)
                            <option value="{{$item->id}}">{{$item->intitule}}</option>

                            @endforeach
                            <!-- Remplir les options avec les départements disponibles -->
                        </select>
                        @error('data.departement_id') <span class="text-danger">{{ $message }}</span> @enderror
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
                        @error('data.etat_civil') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- User ID -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>User ID</label>

                        <select class="form-control" wire:model="data.user_id">
                            <option value="">Choisir...</option>

                            @foreach ($users as $item)
                            <option value="{{$item->id}}">{{$item->name}}-{{$item->firstname}}</option>

                            @endforeach
                            <!-- Remplir les options avec les départements disponibles -->
                        </select>
                        @error('data.user_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Status -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Status <span class="text-danger">*</span></label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="active" value="active"
                                wire:model="data.status">
                            <label class="form-check-label" for="active">Actif</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="conger" value="conger"
                                wire:model="data.status">
                            <label class="form-check-label" for="conger">Congé</label>
                        </div>
                        @error('data.status') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

            </div>
            <div class="text-center m-t-20">
                <button type="submit" class="btn btn-primary submit-btn">Créer</button>
            </div>
        </form>
    </div>
    </div>
</div>
