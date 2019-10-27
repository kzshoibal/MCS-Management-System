<header class="main-header">

    {{--            Logo--}}
    <a href="index2.html" class="logo">
        <span class="logo-mini"><b>{{ "MCS" }}</b></span>
        <span class="logo-lg">{{ trans('panel.site_title') }}</span>
    </a>


    {{--            Header Navbar--}}
    <nav class="navbar navbar-static-top navbar-expand-md" role="navigation">
        {{--                Sidebar Toggle Button--}}
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">{{ trans('global.toggleNavigation') }}</span>
        </a>

        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="{{ Auth::user()->profile->profile_image }}" class="user-image" alt="User Image">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{ Auth::user()->profile->profile_image }}" class="img-circle" alt="User Image">

                            <p>
                                Hello {{ Auth::user()->name }}
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            @if (Auth::guest())
                                <div class="pull-left">
                                    <a href="{{ route('login') }}" class="btn btn-default btn-flat">Login</a>
                                </div>
                            @else
                                <div class="pull-left">
                                    <a href="{{ route("admin.my-profile-informations.index") }}" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    {{--                                            <a class="btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form`').submit();">--}}
                                    <a class="btn btn-default btn-flat" href="#" onclick="event.preventDefault();document.getElementById('logoutform').submit();">
                                        Logout
                                    </a>
                                </div>
                            @endif
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
