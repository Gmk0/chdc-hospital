<?php

use Livewire\Volt\Component;

use App\Models\Departement;

new class extends Component {



    public function with():array
    {
        return [
            'departement'=>Departement::all(),
        ];
    }

    public function delete(){


       dd('hello');
      //  $this->dispatch('delete-item',['name'=>$item->intitule,'id'=>$item->id]);
    }
}; ?>


<div class="content">
    <div class="row">
        <div class="col-sm-5 col-5">
            <h4 class="page-title">Departments</h4>
        </div>
        <div class="text-right col-sm-7 col-7 m-b-30">
            <a href="{{route('admin.adddepartement')}}" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add
                Department</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table mb-0 table-striped custom-table datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Department Name</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departement as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->intitule}}</td>
                            <td><span class="custom-badge status-green">{{$item->status}}</span></td>
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                            class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{route('admin.editdepartement',$item)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <button class="dropdown-item" wire:click='delete()'><i
                                                class="fa fa-trash-o m-r-5"></i>
                                            Delete</button>
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

    <div id="delete_asset" class="modal fade delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="text-center modal-body">
                    <img src="/assets/img/sent.png" alt="" width="50" height="46">
                    <h3>Are you sure want to delete this Asset?</h3>
                    <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@script
<script>
    $wire.on('delete-item', (event) => {
        Swal.fire({
       title: "Êtes-vous sûr ?",
        text: "Vous ne pourrez pas revenir en arrière !",
        icon: "warning",
        confirmButtonText: "Oui, continuer"
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",

        }).then((result) => {
        if (result.isConfirmed) {
        Swal.fire({
        title: "Deleted!",
        text: "Your file has been deleted.",
        icon: "success"
        });
        }
        });
    });
</script>
@endscript
