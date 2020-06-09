@extends('layouts.admin')
@section('content')
@section('page_header')
    {{$page_header}}
@endsection

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0 mb-1">Add unit</h4>
                 <form role="form" method="post" action="{{route('add.unit.save')}}" class="parsley-examples" enctype="multipart/form-data">
                   @csrf
                    <div class="form-group row">
                        <label for="unit_name" class="col-md-3 col-form-label">Unit name<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="unit_name" required parsley-type="text" class="form-control"
                                   id="unit_name" placeholder="Unit name" maxlength="100" value="{{old('unit_name')}}">
                            <span class="text text-danger">{{$errors->first('unit_name')}}</span>
                        </div>
                    </div>
                     <div class="form-group row">
                         <label for="unit_photo" class="col-md-3 col-form-label">Unit photo<span class="text-danger">*</span></label>
                         <div class="col-md-7">
                             <input type="file" name="unit_photo" required parsley-type="file" class="form-control"
                                    id="unit_photo">
                             <span class="text text-danger">{{$errors->first('unit_photo')}}</span>
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
