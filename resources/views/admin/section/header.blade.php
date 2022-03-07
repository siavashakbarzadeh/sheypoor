<nav class="navbar navbar-toggleable-sm navbar-inverse bg-inverse">
    <div class="container" style="color:white">
        <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="{{ url('admin') }}" class="navbar-brand">پنل مدیریت</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ Url('/admin') }}" class="nav-link active">داشبورد</a>
                </li>

                <li class="nav-item">
                    <a href="{{ Url('/admin/post') }}" class="nav-link">آگهی ها</a>
                </li>
                <li class="nav-item">
                    <a href="{{ Url('/admin/category') }}" class="nav-link">دسته بندی ها</a>
                </li>
                <li class="nav-item">
                    <a href="{{ Url('/admin/user') }}" class="nav-link">کاربران</a>
                </li>

            </ul>

            <ul class="navbar-nav navbar-toggler-left">
                <li class="nav-item dropdown mt-2">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                        مدیر خوش آمدید
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ Url('/') }}" target="_blank">
                            <i class="fa fa-user-circle ml-3"></i> صفحه اصلی
                        </a>
                        <a  class="dropdown-item" onclick="event.preventDefault();document.getElementById('login-form').submit()">
                            <i class="fa fa-gear ml-3"></i>خروج
                        </a>
                        <form id="login-form" action="{{ Url('/logout') }}" method="post" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
                <li class="nav-item"></li>
            </ul>
        </div>
    </div>
</nav>