@extends('layouts.admin')
@section('content-wrapper-header')
    <section class="content-header">
        <h1>
            User Profile
        </h1>
        <ol class="breadcrumb">
            <li ><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="#">Profile</a></li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{asset($user->profile->profile_image)}}" alt="">

                        {{--                        <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>--}}
                        <h3 class="profile-username text-center">{{$user->name}}</h3>

                        <p class="text-muted text-center">{{$user->profile->designation}}</p>


                        <a href="#" class="btn btn-primary btn-block"><b>Send Message</b></a>
                        <a href="#" class="btn btn-primary btn-block"><b>Send File</b></a>
                        <a href="#" class="btn btn-primary btn-block"><b>Access History</b></a>
                        <a href="#" class="btn btn-primary btn-block"><b>Rename User</b></a>
                        <a href="#" class="btn btn-primary btn-block"><b>Ban User</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">About Me</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                        <p class="text-muted">
                            {{$profile->education}}
                        </p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                        <p class="text-muted">{{$profile->current_location}}</p>

                        <hr>

                        {{--                        <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>--}}

                        {{--                        <p>--}}
                        {{--                            <span class="label label-danger">UI Design</span>--}}
                        {{--                            <span class="label label-success">Coding</span>--}}
                        {{--                            <span class="label label-info">Javascript</span>--}}
                        {{--                            <span class="label label-warning">PHP</span>--}}
                        {{--                            <span class="label label-primary">Node.js</span>--}}
                        {{--                        </p>--}}

                        {{--                        <hr>--}}

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                        <p class="text-muted">
                            {{ $profile->notes }}
                        </p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#view-profile" data-toggle="tab">View Profile</a></li>
                        <li><a href="#edit-profile" data-toggle="tab">Edit Detail</a></li>
                        {{--                        <li><a href="#settings" data-toggle="tab">Settings</a></li>--}}
                    </ul>
                    <div class="tab-content">
                        {{--                        View profile tab content--}}
                        <div class="active tab-pane" id="view-profile">
                            <!-- Post -->
                            <h5 class="text-black mt-4">
                                <strong>Personal Information</strong>
                            </h5>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group"><br>
                                        <label class="form-control-label" for="l6"><b>Profile Image</b></label><br><br>
                                        <img src="{{asset($user->profile->profile_image)}}"><br><br>
                                    </div>
                                </div>
                            </div>

                            {{--                            Name and email--}}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="l0"><b>Name</b></label>
                                        <p>{{ $user->name }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="l1"><b>Email</b></label>
                                        <p>{{$user->email }}</p>
                                    </div>
                                </div>

                            </div><br>

                            {{--                            National Id and Phone Number--}}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="l0"><b>National ID Number</b></label>
                                        <p>{{ $user->profile->nid_number }}</p>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="l3"><b>Mobile</b></label>
                                        {{--                                        <p>{{ Auth::user()->profile()->phone_number }}</p>--}}
                                        <p>{{ $user->profile->phone_number }}</p>
                                    </div>
                                </div>
                            </div>
                            <br>

                            {{--                            present_address--}}
                            {{--                            permanent_address--}}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="10" class="form-control-label"><b>Present Address</b></label>
                                        <p>{{ $profile->present_address }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="10" class="form-control-label"><b>Permanent Address</b></label>
                                        <p>{{ $profile->permanent_address }}</p>
                                    </div>
                                </div>
                            </div>
                            <br>

                            {{--                            Office Address--}}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="10" class="form-control-label"><b>Office Address</b></label>
                                        <p>{{ $profile->office_address }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="10" class="form-control-label"><b>Designation</b></label>
                                        <p>{{ $profile->designation }}</p>
                                    </div>
                                </div>
                            </div>
                            <br>


                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="form-group"><br>
                                        <label class="form-control-label" for="l6"><b>Profile Summary / Description</b></label><br>
                                        {{--                                        <p>{{ Auth::user()->profile_summary }}</p>--}}
                                        <p>{{$profile->profile_summary }}</p>
                                    </div>
                                </div>
                            </div>



                            <!-- /.post -->
                        </div>
                        <!-- /.tab-pane -->
                        {{--                        Edit Profile tab content--}}
                        <div class="tab-pane" id="edit-profile">

                            <h5 class="text-black mt-4">
                                <strong>Edit Information</strong>
                            </h5><br>
                            {{--                            {!! Form::open(array('url' => ['/update/'.$profileimage->user_id],'method'=>'POST', 'id'=>'form-validation', 'name'=>'form-validation', 'enctype'=>'multipart/form-data')) !!}--}}
                            {{--                            {!! Form::open(array('url' => [],'method'=>'POST', 'id'=>'form-validation', 'name'=>'form-validation', 'enctype'=>'multipart/form-data')) !!}--}}

                            <form action="{{route("admin.profile.update", [$user->id])}}" method="POST", enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group"><br>
                                            <label class="form-control-label" for="l6"><b>Profile Image</b></label><br><br>
                                            <img src="{{ asset($user->profile->profile_image) }}" width="60px" height="60px">&nbsp; &nbsp;&nbsp; &nbsp;
                                            <input type="hidden" name="profile_image" value="{{ $user->profile->profile_image }}">
                                            <input type="file" name="profile_image">
                                        </div>
                                    </div>
                                </div>

                                {{--                                Name and Email--}}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="l0"><b>Name</b></label>
                                            {{--                                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">--}}
                                            <input type="text" class="form-control" name="name" value="{{ old('name',isset($user)? $user->name : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="l3"><b>Email</b></label>
                                            <input type="email" class="form-control" name="email" value="{{ old('email',isset($user)? $user->email : '') }}">
                                        </div>
                                    </div>
                                </div><br>

                                {{--                                NID and mobile number--}}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="14" class="form-control-label">National ID Number</label>
                                            <input type="number" class="form-control" name="nid_number" value="{{ old('nid_number',isset($user) ? $user->profile->nid_number : '') }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="l4"><b>Mobile</b></label>
                                            <input type="number" class="form-control" name="phone_number" value="{{ old('phone_number',isset($user)? $user->profile->phone_number : '') }}">
                                        </div>
                                    </div>
                                </div><br>

                                {{--                                Education and Designation--}}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="l0"><b>Education</b></label>
                                            <input type="text" class="form-control" name="education" value="{{ old('education',isset($profile)? $profile->education : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="l3"><b>Designation</b></label>
                                            <input type="text" class="form-control" name="designation" value="{{ old('designation',isset($profile)? $profile->designation : '') }}">
                                        </div>
                                    </div>
                                </div><br>

                                {{--                                Present Address and Permanent Address--}}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="l0"><b>Present Address</b></label>
                                            <input type="text" class="form-control" name="present_address" value="{{ old('present_address',isset($profile)? $profile->present_address : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="l3"><b>Permanent Address</b></label>
                                            <input type="text" class="form-control" name="permanent_address" value="{{ old('permanent_address',isset($profile)? $profile->permanent_address : '') }}">
                                        </div>
                                    </div>
                                </div><br>

                                {{--                                Office address and Current Location--}}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="l0"><b>Office Address</b></label>
                                            <input type="text" class="form-control" name="office_address" value="{{ old('name',isset($profile)? $profile->office_address : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="l3"><b>Current Location</b></label>
                                            <input type="text" class="form-control" name="current_location" value="{{ old('current_location',isset($profile)? $profile->current_location : '') }}">
                                        </div>
                                    </div>
                                </div><br>

                                {{--                                Notes--}}
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="l6"><b>Short Note</b></label>
                                            <textarea name="notes" class="form-control" cols="10" rows="5">{{ old('notes', isset($user) ? $user->profile->notes : '') }}</textarea>
                                        </div>
                                    </div>
                                </div>


                                {{--                                profile summary--}}
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="l6"><b>Profile Summary / Description</b></label>
                                            <textarea name="profile_summary" class="form-control" cols="10" rows="5">{{ old('profile_summary', isset($profile) ? $user->profile->profile_summary : '') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <div class="form-group">
                                        <button type="submit" class="btn width-200 btn-primary">Update Profile</button>
                                    </div>
                                </div>
                            </form>


                        </div>
                        <!-- /.tab-pane -->

                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /.content -->
@endsection
