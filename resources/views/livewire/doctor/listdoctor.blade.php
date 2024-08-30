<?php

use Livewire\Volt\Component;

new class extends Component {

    public function with():array
    {
        return [
            'staffs'=>\App\Models\StaffMedical::all(),
        ];
    }
    //
}; ?>

<div class="content">
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Doctors</h4>
        </div>
        <div class="text-right col-sm-8 col-9 m-b-20">
            <a href="{{route('admin.adddoctor')}}" class="float-right btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add
                Doctor</a>
        </div>
    </div>
    <div class="row doctor-grid">
        @foreach ($staffs as $item)
        <div class="col-md-4 col-sm-4 col-lg-3">
            <div class="profile-widget">
                <div class="doctor-img">
                    <a class="avatar" href="#"><img alt="" src="/assets/img/doctor-thumb-03.jpg"></a>
                </div>
                <div class="dropdown profile-action">
                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                            class="fa fa-ellipsis-v"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{route('admin.editdoctor',$item)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor"><i
                                class="fa fa-trash-o m-r-5"></i> Delete</a>
                    </div>
                </div>
                <h4 class="doctor-name text-ellipsis"><a href="profile.html">{{$item->nom}} - {{$item->prenom}}</a></h4>
                <div class="doc-prof">{{$item->departement->intitule}}</div>
                <div class="user-country">
                    <i class="fa fa-map-marker"></i> {{$item->adresse}}
                </div>
            </div>
        </div>

        @endforeach



    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="see-all">
                <a class="see-all-btn" href="javascript:void(0);">Load More</a>
            </div>
        </div>
    </div>
</div>
