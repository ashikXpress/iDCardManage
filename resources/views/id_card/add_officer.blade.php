@extends('layouts.admin')
@section('content')
@section('page_header')
    {{$page_header}}
@endsection

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0 mb-1">Add officer</h4>


                <form role="form" method="post" action="{{route('add.officer.save')}}" enctype="multipart/form-data" class="parsley-examples">
                   @csrf
                    <div class="form-group row">
                        <label for="bl_number" class="col-md-3 col-form-label">BA number<span class="text-danger">*</span></label>
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
                        <label for="service_id_card_photo" class="col-md-3 col-form-label">Service ID card photo<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="file" name="service_id_card_photo" required parsley-type="file" class="form-control"
                                   id="service_id_card_photo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="officer_photo" class="col-md-3 col-form-label">Officer photo<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="file" name="officer_photo" required parsley-type="file" class="form-control"
                                   id="officer_photo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="officer_signature_photo" class="col-md-3 col-form-label">Officer signature photo<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="file" name="officer_signature_photo" required parsley-type="file" class="form-control"
                                   id="officer_signature_photo">
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
        </div> <!-- end card -->
    </div>
</div>

<!-- end row -->
@section('additionalJS')
    <script src="{{asset('assets/admin/libs/parsleyjs/parsley.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/pages/form-validation.init.js')}}"></script>
@endsection
@endsection
