<html>

<head>
    <title>Tech chain</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="/style.css" rel="stylesheet">
</head>

<body>
    <div id="container">
        <header>
            <img src="/images/logo.png" id="logo">
            <div id="giohang">Giỏ hàng có 1 sản phẩm</div>
            <div id="userinfo">
                @if (Auth::check())
                Chào {{Auth::user()->ho}} {{Auth::user()->ten}}!
                <a href="/thoat">Thoát</a>
                @else
                Chào bạn !
                <a href="/dangnhap">Đăng nhập</a>
                @endif
            </div>

        </header>
        <nav>
            <ul>
                <li> <a href="/"> Trang chủ </a></li>
                @foreach ($loaisp as $loai )
                <li>
                    <a href="/loai/{{$loai->id_loai}}"> {{$loai->ten_loai}} </a>
                </li>
                @endforeach
                <li> <a href="/lienhe"> Liên hệ </a></li>
                <li> <a href="/hiengiohang"> Giỏ hàng </a></li>
            </ul>
        </nav>
        <main>
            @yield('noidungchinh')
        </main>
        <footer>
            Dự án Tech chain ! Phát triển bởi sinh viên Nguyễn Văn Long
        </footer>
    </div>
</body>

</html>