@extends('layouts.admin')
@section('content')

@section('page_header')
    {{$page_header}}
@endsection

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0 mb-1">Add officer reference</h4>


                <form role="form" method="post" action="{{route('add.officer.worker.save')}}" enctype="multipart/form-data" class="parsley-examples">
                    @csrf
                    <div class="form-group row" id="select_option">
                        <label for="select_bl_or_unit" class="col-md-3 col-form-label">Officer BA number/Unit<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <select class="form-control" name="ba_or_unit" data-parsley-required="true" id="select_ba_or_unit">
                                <option value="">Select Officer BA number/Unit</option>
                                <option value="1" {{ old('ba_or_unit') == 1 ? 'selected' : '' }}>Officer BA number</option>
                                <option value="2" {{ old('ba_or_unit') == 2 ? 'selected' : '' }}>Unit</option>
                            </select>
                            <span class="text text-danger">{{$errors->first('ba_or_unit')}}</span>
                        </div>
                    </div>

                    <div class="form-group row" id="officer_hide">
                        <label for="officer_ba_number" class="col-md-3 col-form-label">Officer BA number<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <select class="form-control" name="ba_number" id="officer_ba_number">
                                <option value="">Select BA number</option>
                                @foreach($officers as $officer)
                                <option value="{{$officer->id}}" {{ old('ba_number') == $officer->id ? 'selected' : '' }}>{{$officer->ba_number}}</option>
                                @endforeach
                            </select>
                            <span style="padding-top: 16px;display: inline-block;" class="text text-danger">{{$errors->first('ba_number')}}</span>
                        </div>
                    </div>
                    <div class="form-group row" id="unit_hide">
                        <label for="unit_id" class="col-md-3 col-form-label">Unit name<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <select class="form-control" name="unit_name" id="unit_id">
                                <option value="">Select unit</option>
                                @foreach($units as $unit)
                                    <option value="{{$unit->id}}" {{ old('unit_name') == $unit->id ? 'selected' : '' }}>{{$unit->unit_name}}</option>
                                @endforeach
                            </select>
                            <span style="padding-top: 16px;display: inline-block;" class="text text-danger">{{$errors->first('unit_name')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_card_category" class="col-md-3 col-form-label">ID card category<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <select class="form-control" required parsley-type="text" name="id_card_category" id="id_card_category">
                                <option value="">Select ID card category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{ old('id_card_category') == $category->id ? 'selected' : '' }}>{{$category->category_name}}</option>
                                @endforeach
                            </select>
                            <span class="text text-danger">{{$errors->first('id_card_category')}}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-3 col-form-label">Name<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="name" required parsley-type="text" class="form-control"
                                   id="name" placeholder="Name" value="{{old('name')}}">
                            <span class="text text-danger">{{$errors->first('name')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="father_or_husband" class="col-md-3 col-form-label">Father/Husband<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="father_or_husband" required parsley-type="text" class="form-control"
                                   id="father_or_husband" placeholder="Father/Husband" value="{{old('father_or_husband')}}">
                            <span class="text text-danger">{{$errors->first('father_or_husband')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="date_of_birth" class="col-md-3 col-form-label">Date of birth<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="date" name="date_of_birth" required parsley-type="date" class="form-control"
                                   id="date_of_birth" value="{{old('date_of_birth')}}">
                            <span class="text text-danger">{{$errors->first('date_of_birth')}}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="designation" class="col-md-3 col-form-label">Designation<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="designation" required parsley-type="text" class="form-control"
                                   id="designation" placeholder="Designation" value="{{old('designation')}}">
                            <span class="text text-danger">{{$errors->first('designation')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="age" class="col-md-3 col-form-label">Age<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="number" name="age" required parsley-type="number" class="form-control"
                                   id="age" placeholder="Age" value="{{old('age')}}">
                            <span class="text text-danger">{{$errors->first('age')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="profession" class="col-md-3 col-form-label">Profession<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="profession" required parsley-type="text" class="form-control"
                                   id="profession" placeholder="Profession" value="{{old('profession')}}">
                            <span class="text text-danger">{{$errors->first('profession')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="current_address" class="col-md-3 col-form-label">Current address
                            <span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <textarea name="current_address" required id="current_address" parsley-type="text" class="form-control" placeholder="Current address">{{old('current_address')}}</textarea>
                            <span class="text text-danger">{{$errors->first('current_address')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="permanent_address" class="col-md-3 col-form-label">Permanent address
                            <span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <textarea name="permanent_address" required id="permanent_address" parsley-type="text" class="form-control" placeholder="Permanent address">{{old('permanent_address')}}</textarea>
                            <span class="text text-danger">{{$errors->first('permanent_address')}}</span>
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
                        <label for="identification_sign" class="col-md-3 col-form-label">Identification sign <span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="identification_sign" required parsley-type="text" class="form-control"
                                   id="identification_sign" placeholder="Identification sign" value="{{old('identification_sign')}}">

                            <span class="text text-danger">{{$errors->first('identification_sign')}}</span></div>
                    </div>
                    <div class="form-group row">
                        <label for="national_id_or_birth_certificate_no" class="col-md-3 col-form-label">National id/Birth certificate no.<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="number" name="national_id_or_birth_certificate_no" required parsley-type="number" class="form-control"
                                   id="national_id_or_birth_certificate_no" placeholder="National id/Birth certificate no." value="{{old('national_id_or_birth_certificate_no')}}">
                            <span class="text text-danger">{{$errors->first('national_id_or_birth_certificate_no')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="national_id_or_birth_certificate_photo" class="col-md-3 col-form-label">National id/Birth certificate photo<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="file" name="national_id_or_birth_certificate_photo" required parsley-type="file" class="form-control"
                                   id="national_id_or_birth_certificate_photo">
                            <span class="text text-danger">{{$errors->first('national_id_or_birth_certificate_photo')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="worker_photo" class="col-md-3 col-form-label">Passport size photo<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="file" name="worker_photo" required parsley-type="file" class="form-control"
                                   id="worker_photo">
                            <span class="text text-danger">{{$errors->first('worker_photo')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="worker_signature" class="col-md-3 col-form-label">Signature photo<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="file" name="worker_signature" required parsley-type="file" class="form-control"
                                   id="worker_signature">
                            <span class="text text-danger">{{$errors->first('worker_signature')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="delivery_date" class="col-md-3 col-form-label">Delivery date<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="date" name="delivery_date" required parsley-type="date" class="form-control"
                                   id="delivery_date" placeholder="Delivery date" value="{{old('delivery_date')}}">
                            <span class="text text-danger">{{$errors->first('delivery_date')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="expiry_date" class="col-md-3 col-form-label">Expiry date<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="date" name="expiry_date" required parsley-type="date" class="form-control"
                                   id="expiry_date" placeholder="Expiry date" value="{{old('expiry_date')}}">
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
        </div> <!-- end card -->
    </div>
</div>

<!-- end row -->
@section('additionalJS')
    <script src="{{asset('assets/admin/libs/parsleyjs/parsley.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/pages/form-validation.init.js')}}"></script>
    <script>
        $(document).ready(function() {
            $("#officer_ba_number,#unit_id").select2();


            $("#select_option").change(function () {
                var select_ba_or_unit = $('#select_ba_or_unit').val();

                if (select_ba_or_unit == '1') {
                    $('#officer_hide').show();
                    $('#unit_hide').hide();
                } else if (select_ba_or_unit == '2') {
                    $('#officer_hide').hide();
                    $('#unit_hide').show();
                } else {
                    $('#officer_hide').hide();
                    $('#unit_hide').hide();
                }
            });

            $("#select_option").trigger('change');

        });
    </script>

@endsection
@endsection
