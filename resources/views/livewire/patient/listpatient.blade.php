<?php

use Livewire\Volt\Component;

new class extends Component {
   public function with():array
    {
        return [
            'patients'=>\App\Models\Patient::all(),
        ];
    }
}; ?>

<div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Patients</h4>
            </div>
            <div class="text-right col-sm-8 col-9 m-b-20">
                <a href="/patients/add" class="float-right btn btn-primary btn-rounded">
                    <i class="fa fa-plus"></i>
                    Add Patient</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table mb-0 table-border table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Dossier</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($patients as $patient)

                            <tr>
                                <td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> {{$patient->nomComplet()}}
                                </td>
                                <td>{{$patient->age()}}</td>
                                <td>{{$patient->adresse}}</td>
                                <td>{{$patient->telephone}}</td>
                                <td>{{$patient->email}}</td>
                                <td><a class="text-white btn btn-primary"><i class="fa fa-print"></i> Dossier</a></td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                                class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{route('patient.edit', $patient)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_patient"><i
                                                    class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty

                            @endforelse


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
