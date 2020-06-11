@extends('layouts.admin')
@section('style')
    <style>
        .card:hover{
            box-shadow: 0 0 10px 1px #0000007f;
            cursor: pointer;
        }
    </style>
@endsection
@section('content')
        <h1>Dashboard</h1>

    <div class="row mt-5">
        <div class="col-xl-3 col-md-6 ">
            <a href="{{route('admin.location.index')}}" class="card d-flex w-100 mb-4 overflow-hidden">
                <div class="row no-gutters row-bordered row-border-light h-100 overflow-hid">
                    <div class="d-flex col-auto align-items-center bg-primary">
                        <div class="card-body media align-items-center">
                            <i class="feather dripicons-location display-4 d-block text-white"></i>
                        </div>
                    </div>
                    <div class="d-flex col align-items-center">
                        <div class="card-body text-dark">
                            <h2 class="mb-0">{{$locationCount}}</h2>
                            <p class="text-primary mb-0">Locations</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 ">
            <a href="{{route('admin.theme.index')}}" class="card d-flex w-100 mb-4 overflow-hidden">
                <div class="row no-gutters row-bordered row-border-light h-100 overflow-hid">
                    <div class="d-flex col-auto align-items-center bg-primary">
                        <div class="card-body media align-items-center">
                            <i class="mdi mdi-checkbox-multiple-blank display-4 d-block text-white"></i>
                        </div>
                    </div>
                    <div class="d-flex col align-items-center">
                        <div class="card-body text-dark">
                            <h2 class="mb-0">{{$themeCount}}</h2>
                            <p class="text-primary mb-0">Themes</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 ">
            <a  href="{{route('admin.m-theme-location.index')}}" class="card d-flex w-100 mb-4 overflow-hidden">
                <div class="row no-gutters row-bordered row-border-light h-100 overflow-hid">
                    <div class="d-flex col-auto align-items-center bg-primary">
                        <div class="card-body media align-items-center">
                            <i class="feather icon-box display-4 d-block text-white"></i>
                        </div>
                    </div>
                    <div class="d-flex col align-items-center">
                        <div class="card-body text-dark">
                            <h2 class="mb-0">{{$locationThemeCount}}</h2>
                            <p class="text-primary mb-0">Location-Themes</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 ">
            <a  href="{{route('admin.special-date.index')}}" class="card d-flex w-100 mb-4 overflow-hidden">
                <div class="row no-gutters row-bordered row-border-light h-100 overflow-hid">
                    <div class="d-flex col-auto align-items-center bg-primary">
                        <div class="card-body media align-items-center">
                            <i class="mdi mdi-calendar-star display-4 d-block text-white"></i>
                        </div>
                    </div>
                    <div class="d-flex col align-items-center">
                        <div class="card-body text-dark">
                            <h2 class="mb-0">{{$specialDateCount}}</h2>
                            <p class="text-primary mb-0">Special Dates</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 ">
            <a  href="{{route('admin.deal.index')}}" class="card d-flex w-100 mb-4 overflow-hidden">
                <div class="row no-gutters row-bordered row-border-light h-100 overflow-hid">
                    <div class="d-flex col-auto align-items-center bg-primary">
                        <div class="card-body media align-items-center">
                            <i class="mdi mdi-camera-image display-4 d-block text-white"></i>
                        </div>
                    </div>
                    <div class="d-flex col align-items-center">
                        <div class="card-body text-dark">
                            <h2 class="mb-0">{{$dealCount}}</h2>
                            <p class="text-primary mb-0">Deals</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>
@endsection

@section('script')
@endsection
