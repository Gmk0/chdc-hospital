<?php

use Livewire\Volt\Component;

new class extends Component {
   public function with():array
    {
        return [
            'users'=>\App\Models\User::all(),
        ];
    }
}; ?>

<div class="content">
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Employee</h4>
        </div>
        <div class="text-right col-sm-8 col-9 m-b-20">
            <a href="{{route('admin.addemployee')}}" class="float-right btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add
                Employee</a>
        </div>
    </div>

    <div class="row filter-row">
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <label class="focus-label">Employee ID</label>
                <input type="text" class="form-control floating">
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <label class="focus-label">Employee Name</label>
                <input type="text" class="form-control floating">
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus select-focus">
                <label class="focus-label">Role</label>
                <select class="select floating">
                    <option>Select Role</option>
                    <option>Nurse</option>
                    <option>Pharmacist</option>
                    <option>Laboratorist</option>
                    <option>Accountant</option>
                    <option>Receptionist</option>
                </select>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <a href="#" class="btn btn-success btn-block"> Search </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table">
                    <thead>
                        <tr>
                            <th style="min-width:200px;">Name</th>
                            <th>Employee ID</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th style="min-width: 110px;">Join Date</th>
                            <th>Role</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $user )


                        <tr>
                            <td>
                                <img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle" alt="">
                                <h2>{{$user->name}}</h2>
                            </td>
                            <td>NS-000{{$user->id}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->join}}</td>
                            <td>
                                <span class="custom-badge status-green">{{$user->role}}</span>
                            </td>
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{route('admin.modifieremploye',$user)}}"><i
                                                class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>
