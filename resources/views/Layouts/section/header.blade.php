<nav class="navbar navbar-inverse bg-primary">
    <div class="container">
        <nav class="navbar navbar-toggleable-md navbar-light ">
            <a class="navbar-brand hidden-sm-down" href="{{ Url('/') }}">
                <img src="img/logo.png" alt="" width="85" height="50">
            </a>

            <ul class="navbar-nav  mt-2 mt-lg-0">
                <li class="nav-item active border-left-here">
                    <a class="nav-link" href="{{ Url('/all') }}">همه آگهی ها</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i> حساب من
                    </a>
                    <div class="dropdown-menu text-center" aria-labelledby="navbarDropdownMenuLink">

                        @if(Auth::guest())
                        <a class="dropdown-item" href="{{ Url('/login') }}">ورود</a>
                        <a class="dropdown-item" href="{{ Url('/register') }}">ثبت نام</a>
                        @elseif( Auth::user() && !Auth::user()->check_role() )
                        <a class="dropdown-item" href="{{ Url('myfavorites') }}">پسندیده ها</a>
                        <a class="dropdown-item" href="{{ Url('myposts') }}">پست های من</a>
                        <a class="dropdown-item">{{ Auth::user()->name }} خوش آمدید </a>
                        <a class="dropdown-item" href="{{ Url('/logout') }}" onclick="event.preventDefault();document.getElementById('login-form').submit()">خروج</a>
                            <form id="login-form" action="{{ Url('/logout') }}" method="post" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                        @else
                            <a class="dropdown-item">{{ Auth::user()->name }} خوش آمدید </a>
                            <a class="dropdown-item" href="{{ Url('/logout') }}" onclick="event.preventDefault();document.getElementById('login-form').submit()">خروج</a>
                            <form id="login-form" action="{{ Url('/logout') }}" method="post" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                        @endif
                    </div>
                </li>

            </ul>

            @if(Auth::user() && Auth::user()->check_role())
                <a target="_blank" class="btn btn-danger btn-sm " href="{{ Url('/admin') }}"> پنل مدیریت</a>
            @endif




            <div class="right-nav">
                <div class="d-flex justify-content-start">
                    <ul class="navbar-nav mt-2">
                        <li class="nav-item dropdown hidden-sm-down">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                پشتیبانی
                            </a>
                            <div class="dropdown-menu text-center" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">راهنما و پشتیبانی</a>
                                <a class="dropdown-item" href="#">تماس با پشتیبانی</a>
                            </div>
                        </li>
                    </ul>

                    <a class="btn btn-success btn-lg mr-2 " style="font-family:'irs'" href="{{ Url('/freeregister') }}">+ ثبت آگهی</a>

                </div>
            </div>

        </nav>
    </div>
</nav>