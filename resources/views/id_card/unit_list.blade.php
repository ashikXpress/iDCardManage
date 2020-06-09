@extends('layouts.admin')
@section('content')
@section('page_header')
    {{$page_header}}
@endsection
@section('additionalCSS')
    <link href="{{asset('assets/admin/libs/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/libs/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/libs/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/libs/datatables/select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0 mb-1">Unit list <a href="{{route('add.unit')}}" class="btn btn-primary mr-1">Add new</a></h4>
                <table id="unit_table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Unit name</th>
                        <th>Unit photo</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->

<!--  Modal Id category Edit -->
<div class="modal fade" id="unit_edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Edit unit name</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" enctype="multipart/form-data" action="{{route('unit.update')}}" class="parsley-examples">
                    @csrf
                    <input type="hidden" name="unit_id" id="unit_id">
                    <div class="form-group row">
                        <label for="category_name" class="col-md-3 col-form-label">Unit name<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="unit_name" required parsley-type="text" class="form-control"
                                   id="unit_name" placeholder="Unit name" maxlength="100">
                            <span class="text text-danger">{{$errors->first('unit_name')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="unit_photo" class="col-md-3 col-form-label">Unit photo</label>
                        <div class="col-md-1">
                            <img style="width: 50px;height: 50px" id="unit_photo_show" src="" alt="">
                        </div>
                        <div class="col-md-6">
                            <input type="file" name="unit_photo" class="form-control"
                                   id="unit_photo">
                            <span class="text text-danger">{{$errors->first('unit_photo')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-8 offset-md-3">
                            <button type="submit" class="btn btn-primary mr-1">
                                Update
                            </button>
                            <button type="reset"
                                    class="btn btn-secondary">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--  Modal Id category Delete -->
<div class="modal fade" id="unit_delete" tabindex="-1" role="dialog" aria-labelledby="modal-errorLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-errorLabel">Delete unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <i class="uil-no-entry text-warning display-3"></i>
                <h4 class="text-danger mt-4">Are you sure delete this?</h4>
                <form action="{{route('unit.delete')}}" method="post">
                    @csrf
                    <input type="hidden" id="unit_id_delete" name="unit_id">
                    <button class="btn btn-danger"></i>Delete</button>
                    <a href="#" class="btn btn-primary"  data-dismiss="modal"></i>Cancel</a>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@section('additionalJS')

    <!-- datatable js -->
    <script src="{{asset('assets/admin/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/admin/libs/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/admin/libs/datatables/responsive.bootstrap4.min.js')}}"></script>

    <script src="{{asset('assets/admin/libs/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/admin/libs/datatables/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/admin/libs/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/admin/libs/datatables/buttons.flash.min.js')}}"></script>

    <script src="{{asset('assets/admin/libs/datatables/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('assets/admin/libs/datatables/dataTables.select.min.js')}}"></script>

    <script src="{{asset('assets/admin/libs/parsleyjs/parsley.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/pages/form-validation.init.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('#unit_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url:"{{ route('all.unit') }}",
                },
                columns:[
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data:'unit_name',
                        name:'unit_name'
                    },
                    {
                        data:'unit_photo',
                        name:'unit_photo',
                        render:function (data,type,full,meta) {
                            return "<img src={{asset('/')}}"+data+" width='50px' height='40px' class='img-thumbnail'>";
                        },
                        orderable:false
                    },
                    {
                        data:'action',
                        name:'action',
                        orderable:false
                    },
                ]

            });


        });
    </script>
    <script>
        function unit_edit(id) {
            $.ajax({
                method: "GET",
                url: "{{route('unit.edit')}}",
                data: {id:id}
            }).done(function (data) {
                $('#unit_name').val(data.unit_name);
                $('#unit_id').val(data.id);
                var unit_photo='{{asset('/')}}'+data.unit_photo;

                $('#unit_photo_show').attr('src',unit_photo);
                $('#unit_edit').modal('show');
            });

        }
        function unit_delete(id) {

            $('#unit_id_delete').val(id);

            $('#unit_delete').modal('show');
        }
    </script>
@endsection
@endsection
