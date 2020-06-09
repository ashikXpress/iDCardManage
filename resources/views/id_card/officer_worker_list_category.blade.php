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
                <h4 class="header-title mt-0 mb-1">Officer Worker list <a href="{{route('add.officer.worker')}}" class="btn btn-primary mr-1">Add new</a></h4>
                <table id="officer_worker_table" class="table table-bordered table-striped table-responsive">
                    <thead>
                    <tr>
                        <th>Sl</th>
                        <th>BA number</th>
                        <th>ID card category</th>
                        <th>Name</th>
                        <th>Mobile</th>
                       <th>Date</th>
                        <th>Delivery date</th>
                        <th>Expiry date</th>
                        <th>Photo</th>
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
<div class="modal fade" id="officer_worker_edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Edit officer worker</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="{{route('officer.worker.update')}}" enctype="multipart/form-data" class="parsley-examples">
                    @csrf
                    <input type="hidden" id="officer_worker_id" name="officer_worker_id">
                    <div class="form-group row">
                        <label for="name" class="col-md-3 col-form-label">Name<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="name" required parsley-type="text" class="form-control"
                                   id="name" placeholder="Name">
                            <span class="text text-danger">{{$errors->first('name')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="father_or_husband" class="col-md-3 col-form-label">Father/Husband<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="father_or_husband" required parsley-type="text" class="form-control"
                                   id="father_or_husband" placeholder="Father/Husband">
                            <span class="text text-danger">{{$errors->first('father_or_husband')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="date_of_birth" class="col-md-3 col-form-label">Date of birth<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="date" name="date_of_birth" required parsley-type="date" class="form-control"
                                   id="date_of_birth">
                            <span class="text text-danger">{{$errors->first('date_of_birth')}}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="designation" class="col-md-3 col-form-label">Designation<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="designation" required parsley-type="text" class="form-control"
                                   id="designation" placeholder="Designation">
                            <span class="text text-danger">{{$errors->first('designation')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="age" class="col-md-3 col-form-label">Age<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="number" name="age" required parsley-type="number" class="form-control"
                                   id="age" placeholder="Age">
                            <span class="text text-danger">{{$errors->first('age')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="profession" class="col-md-3 col-form-label">Profession<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="profession" required parsley-type="text" class="form-control"
                                   id="profession" placeholder="Profession">
                            <span class="text text-danger">{{$errors->first('profession')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="current_address" class="col-md-3 col-form-label">Current address
                            <span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <textarea name="current_address" required id="current_address" parsley-type="text" class="form-control" placeholder="Current address"></textarea>
                            <span class="text text-danger">{{$errors->first('current_address')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="permanent_address" class="col-md-3 col-form-label">Permanent address
                            <span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <textarea name="permanent_address" required id="permanent_address" parsley-type="text" class="form-control" placeholder="Permanent address"></textarea>
                            <span class="text text-danger">{{$errors->first('permanent_address')}}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mobile_number" class="col-md-3 col-form-label">Mobile number <span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="mobile_number" required parsley-type="text" class="form-control"
                                   id="mobile_number" placeholder="Mobile number">

                            <span class="text text-danger">{{$errors->first('mobile_number')}}</span></div>
                    </div>
                    <div class="form-group row">
                        <label for="identification_sign" class="col-md-3 col-form-label">Identification sign <span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="identification_sign" required parsley-type="text" class="form-control"
                                   id="identification_sign" placeholder="Identification sign">

                            <span class="text text-danger">{{$errors->first('identification_sign')}}</span></div>
                    </div>
                    <div class="form-group row">
                        <label for="national_id_or_birth_certificate_no" class="col-md-3 col-form-label">National id/Birth certificate no.<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="number" name="national_id_or_birth_certificate_no" required parsley-type="number" class="form-control"
                                   id="national_id_or_birth_certificate_no" placeholder="National id/Birth certificate no.">
                            <span class="text text-danger">{{$errors->first('national_id_or_birth_certificate_no')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="national_id_or_birth_certificate_photo" class="col-md-3 col-form-label">National id/Birth certificate photo<span class="text-danger">*</span></label>
                        <div class="col-md-1">
                            <img style="width: 50px;height: 50px" id="national_id_or_birth_certificate_photo_show" src="" alt="">
                        </div>
                        <div class="col-md-6">
                            <input type="file" name="national_id_or_birth_certificate_photo"  class="form-control"
                                   id="national_id_or_birth_certificate_photo">
                            <span class="text text-danger">{{$errors->first('national_id_or_birth_certificate_photo')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="worker_photo" class="col-md-3 col-form-label">Passport size photo<span class="text-danger">*</span></label>
                        <div class="col-md-1">
                            <img style="width: 50px;height: 50px" id="worker_photo_show" src="" alt="">
                        </div>
                        <div class="col-md-6">
                            <input type="file" name="worker_photo" class="form-control"
                                   id="worker_photo">
                            <span class="text text-danger">{{$errors->first('worker_photo')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="worker_signature" class="col-md-3 col-form-label">Signature photo<span class="text-danger">*</span></label>
                        <div class="col-md-1">
                            <img style="width: 50px;height: 50px" id="worker_signature_show" src="" alt="">
                        </div>
                        <div class="col-md-6">
                            <input type="file" name="worker_signature"  class="form-control"
                                   id="worker_signature">
                            <span class="text text-danger">{{$errors->first('worker_signature')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="delivery_date" class="col-md-3 col-form-label">Delivery date<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="date" name="delivery_date" required parsley-type="date" class="form-control"
                                   id="delivery_date" placeholder="Delivery date">
                            <span class="text text-danger">{{$errors->first('delivery_date')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="expiry_date" class="col-md-3 col-form-label">Expiry date<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="date" name="expiry_date" required parsley-type="date" class="form-control"
                                   id="expiry_date" placeholder="Expiry date">
                            <span class="text text-danger">{{$errors->first('expiry_date')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-8 offset-md-3">
                            <button type="submit" class="btn btn-primary mr-1">
                                Submit
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
<div class="modal fade" id="worker_photo_link" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Worker & Officer photo link</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p style="margin-bottom: 0 !important;"><b>Officer photo link copy:</b></p>
                <span style="background: #000;color: #fff;padding: 0 8px" id="officer_photo_link_set"></span>
                <p style="margin-top: 8px !important;margin-bottom: 0 !important;"><b>Worker photo link copy:</b></p>
                <span style="background: #000;color: #fff;padding: 0 8px" id="worker_photo_link_set"></span>


            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--  Modal Id category Delete -->
<div class="modal fade" id="officer_worker_delete" tabindex="-1" role="dialog" aria-labelledby="modal-errorLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-errorLabel">Delete officer worker</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <i class="uil-no-entry text-warning display-3"></i>
                <h4 class="text-danger mt-4">Are you sure delete this?</h4>
                <form action="{{route('officer.worker.delete')}}" method="post">
                    @csrf
                    <input type="hidden" id="officer_worker_id_delete" name="officer_worker_id">
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
            $('#officer_worker_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url:"{{ route('all.officer.worker.category') }}",
                },
                columns:[
                    {data: 'DT_RowIndex',name: 'DT_RowIndex'},
                    {data: 'officer', name: 'officer.ba_number'},
                    {data: 'category', name: 'category.category_name'},
                    {data:'name',name:'name'},

                    {data:'mobile_number',name:'mobile_number'},
                    {data:'delivery_date',name:'delivery_date',},
                    {data:'expiry_date',name:'expiry_date',},
                    {data:'created_at',name:'created_at',},
                    {
                        data:'worker_photo',
                        name:'worker_photo',
                        render:function (data,type,full,meta) {
                            return "<img src={{asset('/')}}"+data+" width='50px' height='40px' class='img-thumbnail'>";
                        },
                        orderable:false
                    },
                    {data:'action',name:'action',orderable:false},

                ]

            });


        });
    </script>
    <script>
        function officer_worker_edit(id) {
            $.ajax({
                method: "GET",
                url: "{{route('officer.worker.edit')}}",
                data: {id:id}
            }).done(function (data) {
                $('#officer_worker_id').val(data.id);
                $('#name').val(data.name);
                $('#father_or_husband').val(data.father_or_husband);
                $('#date_of_birth').val(data.date_of_birth);
                $('#designation').val(data.designation);
                $('#age').val(data.age);
                $('#profession').val(data.profession);
                $('#current_address').val(data.current_address);
                $('#permanent_address').val(data.permanent_address);
                $('#mobile_number').val(data.mobile_number);
                $('#national_id_or_birth_certificate_no').val(data.national_id_or_birth_certificate_no);
                $('#identification_sign').val(data.identification_sign);
                $('#delivery_date').val(data.delivery_date);
                $('#expiry_date').val(data.expiry_date);


                var service_id='{{asset('/')}}'+data.worker_photo;
                var service_id2='{{asset('/')}}'+data.worker_signature;
                var service_id3='{{asset('/')}}'+data.national_id_or_birth_certificate_photo;

                $('#worker_photo_show').attr('src',service_id);
                $('#worker_signature_show').attr('src',service_id2);
                $('#national_id_or_birth_certificate_photo_show').attr('src',service_id3);

                $('#officer_worker_edit').modal('show');
            });

        }
        function officer_worker_delete(id) {

            $('#officer_worker_id_delete').val(id);

            $('#officer_worker_delete').modal('show');
        }
        function worker_photo_link(id) {
            $.ajax({
                method: "GET",
                url: "{{route('officer.worker.photo.link')}}",
                data: {id:id}
            }).done(function (data) {

                var worker_photo='{{asset('/')}}'+data.worker_photo;
                var officer_photo='{{asset('/')}}'+data.officer.officer_photo;

                $('#officer_photo_link_set').html(officer_photo);
                $('#worker_photo_link_set').html(worker_photo);

                $('#worker_photo_link').modal('show');
            });

        }
    </script>
@endsection
@endsection
