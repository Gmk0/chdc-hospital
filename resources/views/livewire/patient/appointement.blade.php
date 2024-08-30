<?php

use Livewire\Volt\Component;

new class extends Component {

    public function with(){

        return [
            'appointements'=>\App\Models\Appointement::all(),
        ];
    }
    //
}; ?>


<div class="content">
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Appointments</h4>
        </div>
        <div class="text-right col-sm-8 col-9 m-b-20">
            <a href="{{route('patient.appointement.add')}}" class="float-right btn btn-primary btn-rounded"><i
                    class="fa fa-plus"></i> Add Appointment</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table">
                    <thead>
                        <tr>
                            <th>Appointment ID</th>
                            <th>Patient Name</th>
                            <th>Age</th>
                            <th>Doctor Name</th>
                            <th>Department</th>
                            <th>Appointment Date</th>
                            <th>Appointment Time</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($appointements as $apt)


                        <tr>
                            <td>APT00{{$apt->id}}</td>
                            <td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5"
                                    alt=""> {{$apt->patient->nomComplet()}}</td>
                            <td>{{$apt->patient->nomComplet()}}</td>
                            <td>{{$apt->staffMedical->nomComplet()}}</td>
                            <td>{{$apt->departement->intitule}}</td>
                            <td>{{$apt->date}}</td>
                            <td>{{$apt->heure}}</td>
                            @if ($apt->status=='en attente')
                            <td><span class="custom-badge status-green">{{$apt->status}}</span></td>

                            @else

                            <td><span class="custom-badge status-red">{{$apt->status}}</span></td>
                            @endif

                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{route('patient.appointement.edit',$apt)}}"><i
                                                class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#delete_appointment"><i class="fa fa-trash-o m-r-5"></i>
                                            Delete</a>
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
