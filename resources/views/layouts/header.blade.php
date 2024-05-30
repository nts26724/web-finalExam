<div class="header shadow position-sticky " id="header">
    <div class="navbar d-flex align-items-center" id="navbar">
        <div class="d-flex" id="navpage">
            <span class="m-1">
                <img src="{{asset('img/logo3.png')}}"  width="50" height="auto" alt="">
            </span>
            <ul class="d-md-flex d-sm-none m-0 p-0 align-items-center">
                <li><a class="fw-medium d-block d-md-block d-none {{request()->is('/')}} ? 'active' : '' " href="{{ route('web.out')}}">Trang Chủ      </a></li>
                <li><a class="fw-medium d-block d-md-block d-none {{request()->is('gioithieu')}} ? 'active' : '' " href="{{ route('web.about')}}">Giới Thiệu    </a></li>
                <li><a class="fw-medium d-block d-md-block d-none {{request()->is('lienhe')}} ? 'active' : '' " href="{{ route('web.contact')}}">Liên Hệ  </a></li>
            </ul>
        </div>

        <div class="d-flex align-items-center" id="div-header-center">
            <form class="d-flex m-2" role="search">
                <input class="form-control me-2 rounded-pill px-3" type="search" placeholder="Search" aria-label="Search">
                <button class="border-0" type="submit" id="btn-search"><i class="fs-5 bi bi-search"></i></button>
            </form>

            @if(isset($cart_products) && isset($id))
                <a href="{{route('cart', ['id' => $id])}}" class="{{request()->is('web/logged/*') ? 'd-block' : 'd-none'}}"> 
                    <i class="fs-5 bi bi-cart" id="btn-cart"></i>
                    <span class="position-absolute top-10 start-90 translate-middle badge rounded-pill bg-danger">
                      {{count($cart_products)}}
                      <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
            @endif
        </div>

        <div class="d-md-flex d-none align-items-center" id="navfunc">
            <a class="{{request()->is('web/logged/*') ? 'd-none' : 'd-block'}} btn btn-success fw-medium text-white rounded-4" href="">Đăng nhập</a>
            <a class="{{request()->is('web/logged/*') ? 'd-block' : 'd-none'}} btn btn-outline-success fw-medium m-2 text-success rounded-4" href="{{route('web.out')}}">Đăng xuất</a>
        </div>

        <div class="d-md-none d-sm-block">
            <span class="mx-1 " id="btn-toogle" onclick="showTooglePopup()" href=""><i class="fs-5 bi bi-list"></i></span>
        </div>
    </div>

    <div class="toogle-popup d-none" id="toogle-popup">
        <div class="login-overlay" onclick="hideTooglePopup()"></div>

        <div class="page-box shadow" id="toogle-page">
            <span class="my-3 mx-2">
                <img src="{{asset('img/logo3.png')}}"  width="50" height="auto" alt="">
            </span>
            <a href="{{ route('web.out') }}" class="text-success fw-medium text-nowrap my-2 mx-3" id="btn-trangchu-toogle"> <i class="p-2 bi bi-house-fill"></i>Trang Chủ</a>
            <a href="{{ route('web.about') }}" class="text-success fw-medium text-nowrap my-2 mx-3" id="btn-gioithieu-toogle"><i class="p-2 bi bi-person-lines-fill"></i>Giới thiệu</a>
            <a href="{{ route('web.contact') }}" class="text-success fw-medium text-nowrap my-2 mx-3" id="btn-lienhe-toogle">   <i class="p-2 bi bi-telephone-fill"></i>Liên Hệ</a>
            <a href="" class="text-success fw-medium text-nowrap my-2 mx-3" id="btn-dangnhap-toogle"> <i class="p-2 bi bi-box-arrow-in-right"></i>Đăng Nhập</a>
            <a href="" class="text-success fw-medium text-nowrap my-2 mx-3" id="btn-xuat-toogle">     <i class="p-2 bi bi-box-arrow-left"></i>Đăng Xuất</a>
        </div>
    </div>
</div>