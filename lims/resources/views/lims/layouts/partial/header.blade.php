<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="lims/nhanmau/danhsach/{{session()->get('idDiadiem')}}">PXN LÊ UYÊN</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Nhận mẫu
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="lims/nhanmau/danhsach/{{session()->get('idDiadiem')}}">Danh sách</a>
                    <a class="dropdown-item" href="lims/nhanmau/them">Thêm</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Covid 19
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="lims/testnhanh/danhsach">Danh sách test nhanh</a>
                    <a class="dropdown-item" href="lims/pcr/danhsach">Danh sách pcr</a>
                </div>
            </li>
        </ul>
        <ul class="nav navbar-nav ml-md--auto">

            <li class="dropdown">
                @if(isset($user_login))
                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    Chào mừng: {{$user_login->name}} <b class="caret"></b>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="lims/dangxuat">Đăng Xuất</a>
                </div>
                @endif
            </li>
        </ul>
    </div>
</nav>
