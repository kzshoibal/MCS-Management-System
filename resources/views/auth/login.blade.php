{{--@extends('layouts.app')--}}
{{--@section('content')--}}
{{--<div class="login-box">--}}
{{--    <div class="login-logo">--}}
{{--        <a href="#">--}}
{{--            {{ trans('panel.site_title') }}--}}
{{--        </a>--}}
{{--    </div>--}}
{{--    <div class="login-box-body">--}}
{{--        <p class="login-box-msg">--}}
{{--            {{ trans('global.login') }}--}}
{{--        </p>--}}
{{--        @if(\Session::has('message'))--}}
{{--            <p class="alert alert-info">--}}
{{--                {{ \Session::get('message') }}--}}
{{--            </p>--}}
{{--        @endif--}}
{{--        <form method="POST" action="{{ route('login') }}">--}}
{{--            {{ csrf_field() }}--}}
{{--            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
{{--                <input type="email" name="email" class="form-control" required autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">--}}
{{--                @if($errors->has('email'))--}}
{{--                    <p class="help-block">--}}
{{--                        {{ $errors->first('email') }}--}}
{{--                    </p>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
{{--                <input type="password" name="password" class="form-control" required placeholder="{{ trans('global.login_password') }}">--}}
{{--                @if($errors->has('password'))--}}
{{--                    <p class="help-block">--}}
{{--                        {{ $errors->first('password') }}--}}
{{--                    </p>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-xs-8">--}}
{{--                    <div class="checkbox icheck">--}}
{{--                        <label><input type="checkbox" name="remember"> {{ trans('global.remember_me') }}</label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xs-4">--}}
{{--                    <button type="submit" class="btn btn-primary btn-block btn-flat">--}}
{{--                        {{ trans('global.login') }}--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--        <a href="{{ route('password.request') }}">--}}
{{--            {{ trans('global.forgot_password') }}--}}
{{--        </a>--}}


{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}

{{--@section('scripts')--}}
{{--<script>--}}
{{--    $(function () {--}}
{{--    $('input').iCheck({--}}
{{--      checkboxClass: 'icheckbox_square-blue',--}}
{{--      radioClass: 'iradio_square-blue',--}}
{{--      increaseArea: '20%' /* optional */--}}
{{--    });--}}
{{--  });--}}
{{--</script>--}}
{{--@endsection--}}


{{--@section('title', 'Login')--}}
@include('layouts.loginMain')
<body class="cat__pages__login">
<!-- START: pages/login -->
<div class="cat__pages__login cat__pages__login--fullscreen" style="background-image: url({!! asset('dist/modules/pages/common/img/login/1.jpg') !!}">
    <div class="cat__pages__login__block">
        <div class="row">
            <div class="col-xl-12">
                <div class="cat__pages__login__block__promo text-white text-center">
                    <h2 class="mb-3">
                        <strong>Multipurpose Co-Operative Society</strong>
                    </h2>
                </div>
                <div class="cat__pages__login__block__inner">
                    <div class="cat__pages__login__block__form">
                        <h4 class="text-uppercase">
                            <strong>Please log in</strong>
                        </h4>
                        <br />
                        @if(isset(Auth::user()->email))
                            <script>window.location="/main/dashboard"</script>
                        @endif
                        @if($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        @if (count($errors)>0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form id="form-validation" name="form-validation" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="form-label">Username</label>
                                <input id="validation-email"
                                       class="form-control"
                                       placeholder="Email"
                                       name="email"
                                       type="text"
                                       data-validation="[NOTEMPTY]">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input id="validation-password"
                                       class="form-control password"
                                       name="password"
                                       type="password" data-validation="[L>=4]"
                                       data-validation-message="$ must be at least 4 characters"
                                       placeholder="Password">
                            </div>
                            <div class="form-group">
                                <a href="{{ route('password.request') }}" class="pull-right cat__core__link--blue cat__core__link--underlined">Forgot Password?</a>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"  checked>
                                        Remember me
                                    </label>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary mr-3" name="login" value="login">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cat__pages__login__footer text-center">
        <ul class="list-unstyled list-inline">
            <li class="list-inline-item"><a href="javascript: void(0);">Terms of Use</a></li>
            <li class="active list-inline-item"><a href="javascript: void(0);">Compliance</a></li>
            <li class="list-inline-item"><a href="javascript: void(0);">Confidential Information</a></li>
            <li class="list-inline-item"><a href="javascript: void(0);">Support</a></li>
            <li class="list-inline-item"><a href="javascript: void(0);">Contacts</a></li>
        </ul>
    </div>
</div>
<!-- END: pages/login-alpha -->

<!-- START: page scripts -->
<script>
    $(function() {

        // Form Validation
        $('#form-validation').validate({
            submit: {
                settings: {
                    inputContainer: '.form-group',
                    errorListClass: 'form-control-error',
                    errorClass: 'has-danger'
                }
            }
        });

        // Show/Hide Password
        $('.password').password({
            eyeClass: '',
            eyeOpenClass: 'icmn-eye',
            eyeCloseClass: 'icmn-eye-blocked'
        });

        // Change BG
        var min = 1, max = 5,
            next = Math.floor(Math.random()*max) + min,
            final = next > max ? min : next;
        $('.random-bg-image').data('img', final);
        $('.cat__pages__login').data('img', final).css('backgroundImage', 'url(dist/modules/pages/common/img/login/' + final + '.jpg)');

    });
</script>
<!-- END: page scripts -->
</body>
