@extends('layouts.admin')
@section('additionalCSS')
    <style>
        .user-dash{
            font-size: 53px;
            color: #006a4d;
        }
        .font-size-12 {
            font-size: 13px!important;
        }
    </style>
@endsection
@section('content')
  @section('page_header')
      {{$page_header}}
  @endsection
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <a href="{{route('all.officer')}}" class="card">
                <div class="card-body p-0">
                    <div class="media p-3">
                        <div class="media-body">
                              <span class="text-muted text-uppercase font-size-12 font-weight-bold">Officer</span>
                            <h2 class="mb-0">{{$officer_count}}</h2>
                        </div>
                        <div class="align-self-center">
                            <i class="fa fa-user-circle user-dash"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-xl-3">
            <a href="{{route('all.unit')}}" class="card">
                <div class="card-body p-0">
                    <div class="media p-3">
                        <div class="media-body">
                            <span class="text-muted text-uppercase font-size-12 font-weight-bold">Unit</span>
                            <h2 class="mb-0">{{$unit_count}}</h2>
                        </div>
                        <div class="align-self-center">
                            <i class="fa fa-user-circle user-dash"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-xl-3">
            <a href="{{route('all.officer.worker.category')}}" class="card">
                <div class="card-body p-0">
                    <div class="media p-3">
                        <div class="media-body">
                            <span class="text-muted text-uppercase font-size-12 font-weight-bold">Officer wise worker</span>
                            <h2 class="mb-0">{{$officer_worker_count}}</h2>
                        </div>
                        <div class="align-self-center">
                            <i class="fa fa-user-circle user-dash"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-xl-3">
            <a href="{{route('all.officer.worker.unit')}}" class="card">
                <div class="card-body p-0">
                    <div class="media p-3">
                        <div class="media-body">
                            <span class="text-muted text-uppercase font-size-12 font-weight-bold">Unit wise worker</span>
                            <h2 class="mb-0">{{$unit_worker_count}}</h2>
                        </div>
                        <div class="align-self-center">
                            <i class="fa fa-user-circle user-dash"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-xl-3">
            <a href="{{route('all.category')}}" class="card">
                <div class="card-body p-0">
                    <div class="media p-3">
                        <div class="media-body">
                            <span class="text-muted text-uppercase font-size-12 font-weight-bold">ID category</span>
                            <h2 class="mb-0">{{$category_count}}</h2>
                        </div>
                        <div class="align-self-center">
                            <i class="fa fa-user-circle user-dash"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>


    </div>

@endsection
