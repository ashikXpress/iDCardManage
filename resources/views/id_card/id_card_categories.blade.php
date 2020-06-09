@extends('layouts.admin')
@section('content')
@section('page_header')
{{$page_header}}
@endsection

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0 mb-1">Add category</h4>
                <form role="form" method="post" action="{{route('add.id.card.category.save')}}" class="parsley-examples">
                    @csrf
                    <div class="form-group row">
                        <label for="category_name" class="col-md-3 col-form-label">Category name<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="category_name" required parsley-type="text" class="form-control"
                                   id="category_name" placeholder="Category name" maxlength="100" value="{{old('category_name')}}">
                            <span class="text text-danger">{{$errors->first('category_name')}}</span>
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
