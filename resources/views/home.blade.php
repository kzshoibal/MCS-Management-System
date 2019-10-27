@extends('layouts.admin')

@section('content-wrapper-header')
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
{{--            <li><a href="#">Examples</a></li>--}}
{{--            <li class="active">User profile</li>--}}
        </ol>
    </section>
@endsection

{{--@section('content-wrapper')--}}
{{--    <div class="content-wrapper" style="min-height: 960px;">--}}

{{--        <section class="content-header">--}}
{{--            <h1>--}}
{{--                User Profile--}}
{{--            </h1>--}}
{{--            <ol class="breadcrumb">--}}
{{--                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>--}}
{{--                <li><a href="#">Examples</a></li>--}}
{{--                <li class="active">User profile</li>--}}
{{--            </ol>--}}
{{--        </section>--}}



{{--        --}}{{--            @if(session('message'))--}}
{{--        --}}{{--                <div class="row" style='padding:20px 20px 0 20px;'>--}}
{{--        --}}{{--                    <div class="col-lg-12">--}}
{{--        --}}{{--                        <div class="alert alert-success" role="alert">{{ session('message') }}</div>--}}
{{--        --}}{{--                    </div>--}}
{{--        --}}{{--                </div>--}}
{{--        --}}{{--            @endif--}}

{{--        @if(session('success'))--}}
{{--            <div class="row" style='padding:20px 20px 0 20px;'>--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="alert alert-success" role="alert">{{ session('success') }}</div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        @if($errors->count() > 0)--}}
{{--            <div class="row" style='padding:20px 20px 0 20px;'>--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="alert alert-danger">--}}
{{--                        <ul class="list-unstyled">--}}
{{--                            @foreach($errors->all() as $error)--}}
{{--                                <li>{{ $error }}</li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        @yield('content')--}}
{{--    </div>--}}
{{--@endsection--}}

@section('content')
<div class="content">
    <div class="row">

        <div class="col-lg-12">
            Welcome to Home Page
        </div>
{{--        <div class="col-lg-6">--}}
{{--            <div class="container">--}}
{{--                <div class="row justify-content-center">--}}
{{--                    <div class="col-md-4">--}}
{{--                        <div class="card">--}}

{{--                            <div class="card-body">--}}
{{--                                @if (Session::has('error'))--}}
{{--                                    <div class="alert alert-danger">--}}
{{--                                        {{ Session::get('error') }}--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                                @if (Session::has('success'))--}}
{{--                                    <div class="alert alert-success">--}}
{{--                                        {{ Session::get('success') }}--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection
