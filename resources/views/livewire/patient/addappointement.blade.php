<?php

use Livewire\Volt\Component;

new class extends Component {

    public $data=[];
    public $departement_id='';
    public function with(){
        return [
            'doctors'=>\App\Models\StaffMedical::whereHas('user', function($q){
                $q->where('role','Medecin');
            })->where('departement_id',$this->departement_id)->get(),
            'departements'=>\App\Models\Departement::all(),
            'patients'=>\App\Models\Patient::all(),
        ];



    }

    public function addNew()
    {

        $this->validate([
            'data.patient_id'=>"required",
            'departement_id'=>'required',
            'data.staff_medical_id'=>"required",
            'data.date'=>"required",
            'data.heure'=>"required",
           // "data.status"=>"required",

        ]);

        try{


            $this->data['departement_id']=$this->departement_id;



                \App\Models\Appointement::create($this->data);


        $this->dispatch('event',['icon'=>'success', 'title'=>'reussie']);

        $this->data=[];


        }catch(\Exception $e){
        $this->dispatch('event',['icon'=>'error', 'title'=>$e->getMessage()]);
        }


    }

    //
}; ?>


<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Add Appointment</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form wire:submit.prevent='addNew'>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Patient Name</label>
                            <select wire:model='data.patient_id' class="form-control">
                                <option>Select</option>

                                @forelse ($patients as  $patient)
                                <option value="{{$patient->id}}">{{$patient->nomComplet()}}</option>

                                @empty

                                <option>Vide</option>
                                @endforelse

                            </select>
                            @error('data.patient_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Department</label>
                            <select wire:model.live='departement_id' class=" form-control">
                                <option>Select</option>
                                @forelse ($departements as $item)
                                <option value="{{$item->id}}">{{$item->intitule}}</option>

                                @empty

                                <option>Vide</option>
                                @endforelse
                            </select>
                            @error('departement_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Doctor</label>
                            <select wire:model='data.staff_medical_id' class=" form-control">
                                <option>Select</option>
                               @forelse ($doctors as $item)
                                <option value="{{$item->id}}">{{$item->nomComplet()}}</option>

                                @empty

                                <option>Vide</option>
                                @endforelse

                            </select>
                            @error('data.staff_medical_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date</label>
                            <div class="cal-icon">
                                <input wire:model='data.date' type="date" class="form-control ">
                            </div>

                            @error('data.date') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Time</label>
                            <div class="time-icon">
                                <input type="text" wire:model='data.heure' class="form-control" id="datetimepicker3">
                            </div>
                            @error('data.heure') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Message</label>
                    <textarea wire:model='message' cols="30" rows="4" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label class="display-block">Appointment Status</label>
                    <div class="form-check form-check-inline">
                        <input  class="form-check-input" type="radio" name="status" id="product_active" value="active"
                            checked>
                        <label class="form-check-label" for="product_active">
                            Active
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input  class="form-check-input" type="radio" name="status" id="product_inactive"
                            value="inactive">
                        <label class="form-check-label" for="product_inactive">
                            Inactive
                        </label>
                    </div>
                    @error('data.status') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="text-center m-t-20">
                    <button type="submit" class="btn btn-primary submit-btn">Create Appointment</button>
                </div>
            </form>
        </div>
    </div>
</div>