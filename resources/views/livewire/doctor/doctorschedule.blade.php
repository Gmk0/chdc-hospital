<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>


<div class="content">
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Schedule</h4>
        </div>
        <div class="text-right col-sm-8 col-9 m-b-20">
            <a href="{{route('admin.addschedule')}}" class="float-right btn btn-primary btn-rounded"><i class="fa fa-plus"></i>
                Add Schedule</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table mb-0 table-border table-striped custom-table">
                    <thead>
                        <tr>
                            <th>Doctor Name</th>
                            <th>Department</th>
                            <th>Available Days</th>
                            <th>Available Time</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5"
                                    alt=""> Henry Daniels</td>
                            <td>Cardiology</td>
                            <td>Sunday, Monday, Tuesday</td>
                            <td>10:00 AM - 7:00 PM</td>
                            <td><span class="custom-badge status-green">Active</span></td>
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="edit-schedule.html"><i
                                                class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#delete_schedule"><i class="fa fa-trash-o m-r-5"></i>
                                            Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
