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
                <h4 class="header-title mt-0 mb-1">Officer list <a href="{{route('add.officer')}}" class="btn btn-primary mr-1">Add new</a></h4>
                <table id="officer_table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Sl</th>
                        <th>BA number</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Photo</th>
                        <th>Date</th>
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
<div class="modal fade" id="officer_edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Edit officer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="{{route('officer.update')}}" enctype="multipart/form-data" class="parsley-examples">
                    @csrf
                    <input type="hidden" name="officer_id" id="officer_id">
                    <div class="form-group row">
                        <label for="ba_number" class="col-md-3 col-form-label">BA number<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="ba_number" required parsley-type="text" class="form-control"
                                   id="ba_number" placeholder="BA number" value="{{old('ba_number')}}">
                            <span class="text text-danger">{{$errors->first('ba_number')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-3 col-form-label">Name<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="name" required parsley-type="text" class="form-control"
                                   id="name" placeholder="Name" value="{{old('name')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="designation" class="col-md-3 col-form-label">Designation<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="designation" required parsley-type="text" class="form-control"
                                   id="designation" placeholder="Designation" value="{{old('designation')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="unit_or_institute_or_center" class="col-md-3 col-form-label">Unit/Institute/Center<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input name="unit_or_institute_or_center"  id="unit_or_institute_or_center" type="text" placeholder="Unit/Institute/Center" required
                                   class="form-control" value="{{old('unit_or_institute_or_center')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="current_address" class="col-md-3 col-form-label">Current address
                            <span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <textarea name="current_address" required id="current_address" parsley-type="text" class="form-control" placeholder="Current address">{{old('current_address')}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="permanent_address" class="col-md-3 col-form-label">Permanent address
                            <span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <textarea name="permanent_address" required id="permanent_address" parsley-type="text" class="form-control" placeholder="Permanent address">{{old('permanent_address')}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mobile_number" class="col-md-3 col-form-label">Mobile number <span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="mobile_number" required parsley-type="text" class="form-control"
                                   id="mobile_number" placeholder="Mobile number" value="{{old('mobile_number')}}">

                            <span class="text text-danger">{{$errors->first('mobile_number')}}</span></div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-3 col-form-label">Email<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="email" name="email" required parsley-type="email" class="form-control"
                                   id="email" placeholder="Email" value="{{old('email')}}">
                            <span class="text text-danger">{{$errors->first('email')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="service_id_card_photo" class="col-md-3 col-form-label">Service ID card photo</label>
                        <div class="col-md-1">
                            <img id="service_id_card_photo_show" src="" style="width: 50px;height: 50px" alt="image">

                        </div>
                        <div class="col-md-6">
                            <input type="file" name="service_id_card_photo"  parsley-type="file" class="form-control"
                                   id="service_id_card_photo">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="officer_photo" class="col-md-3 col-form-label">Officer photo</label>

                        <div class="col-md-1">
                            <img style="width: 50px;height: 50px" src="" id="officer_photo_show" alt="">
                        </div>
                        <div class="col-md-6">
                            <input type="file" name="officer_photo" parsley-type="file" class="form-control"
                                   id="officer_photo">

                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="officer_signature_photo" class="col-md-3 col-form-label">Officer signature photo</label>
                        <div class="col-md-1">
                            <img style="width: 50px;height: 50px" id="officer_signature_photo_show" src="" alt="">
                        </div>
                        <div class="col-md-6">
                            <input type="file" name="officer_signature_photo" parsley-type="file" class="form-control"
                                   id="officer_signature_photo">
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
<div class="modal fade" id="officer_delete" tabindex="-1" role="dialog" aria-labelledby="modal-errorLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-errorLabel">Delete officer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <i class="uil-no-entry text-warning display-3"></i>
                <h4 class="text-danger mt-4">Are you sure delete this?</h4>
                <form action="{{route('officer.delete')}}" method="post">
                    @csrf
                    <input type="hidden" id="officer_id_delete" name="officer_id">
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
            $('#officer_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url:"{{ route('all.officer') }}",
                },
                columns:[
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data:'ba_number',
                        name:'ba_number'
                    },

                    {
                        data:'name',
                        name:'name'
                    },
                    {
                        data:'designation',
                        name:'designation'
                    },
                    {
                        data:'mobile_number',
                        name:'mobile_number'
                    },
                    {
                        data:'email',
                        name:'email'
                    },
                    {
                        data:'officer_photo',
                        name:'officer_photo',
                        render:function (data,type,full,meta) {
                        return "<img src={{asset('/')}}"+data+" width='50px' height='40px' class='img-thumbnail'>";
                        },
                        orderable:false
                    },
                    {
                        data:'created_at',
                        name:'created_at',

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
        function officer_edit(id) {
            $.ajax({
                method: "GET",
                url: "{{route('officer.edit')}}",
                data: {id:id}
            }).done(function (data) {
                $('#officer_id').val(data.id);
                $('#ba_number').val(data.ba_number);
                $('#name').val(data.name);
                $('#designation').val(data.designation);
                $('#unit_or_institute_or_center').val(data.unit_or_institute_or_center);
                $('#current_address').val(data.current_address);
                $('#permanent_address').val(data.permanent_address);
                $('#mobile_number').val(data.mobile_number);
                $('#email').val(data.email);

                var service_id='{{asset('/')}}'+data.service_id_card_photo;
                var service_id2='{{asset('/')}}'+data.officer_photo;
                var service_id3='{{asset('/')}}'+data.officer_signature_photo;

                $('#service_id_card_photo_show').attr('src',service_id);
                $('#officer_photo_show').attr('src',service_id2);
                $('#officer_signature_photo_show').attr('src',service_id3);

                $('#officer_edit').modal('show');
            });

        }
        function officer_delete(id) {

            $('#officer_id_delete').val(id);

            $('#officer_delete').modal('show');
        }
    </script>
@endsection
@endsection
