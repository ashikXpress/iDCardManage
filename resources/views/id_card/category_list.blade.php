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
                <h4 class="header-title mt-0 mb-1">Category list <a href="{{route('add.id.card.category')}}" class="btn btn-primary mr-1">Add new</a></h4>
                    <table id="category_table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Sl</th>
                          <th>Category name</th>
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
<div class="modal fade" id="category_edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Edit category name</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="{{route('id.card.category.update')}}" class="parsley-examples">
                    @csrf
                    <input type="hidden" name="category_id" id="category_id">
                    <div class="form-group row">
                        <label for="category_name" class="col-md-3 col-form-label">Category name<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="category_name" required parsley-type="text" class="form-control"
                                   id="category_name" placeholder="Category name" maxlength="100">
                            <span class="text text-danger">{{$errors->first('category_name')}}</span>
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
<div class="modal fade" id="category_delete" tabindex="-1" role="dialog" aria-labelledby="modal-errorLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-errorLabel">Delete category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <i class="uil-no-entry text-warning display-3"></i>
                <h4 class="text-danger mt-4">Are you sure delete this?</h4>
                <form action="{{route('id.card.category.delete')}}" method="post">
                    @csrf
                    <input type="hidden" id="category_id_delete" name="category_id">
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
            $('#category_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url:"{{ route('all.category') }}",
                },
                columns:[
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data:'category_name',
                        name:'category_name'
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
        function category_edit(id) {
            $.ajax({
                method: "GET",
                url: "{{route('id.card.category.edit')}}",
                data: {id:id}
            }).done(function (data) {
                $('#category_name').val(data.category_name);
                $('#category_id').val(data.id);

                $('#category_edit').modal('show');
            });

        }
        function category_delete(id) {

            $('#category_id_delete').val(id);

            $('#category_delete').modal('show');
        }
    </script>
@endsection
@endsection
