@include('admin.admin_header')
{{--form register--}}
<form action="{{route('customer.register.store')}}" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col
            -md-8 col-lg-6 col-xl-5">
                <div class="card text-white" style="border-radius: 1rem; background-color: #0e5b44">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                            <p class="text-white-50 mb-5">Hãy nhập tên đăng nhập và mật khẩu của bạn!</p>

                            @include('alert')

                            <div data-mdb-input-init class="form-outline form-white mb-4">
                                <label class="form-label" for="typeEmailX">Username</label>
                                <input type="text" name="username" id="username" class="form-control form-control-lg"/>
                            </div>

                            <div data-mdb-input-init class="form-outline form-white mb-4">
                                <label class="form-label" for="typePasswordX">Mật khẩu</label>
                                <input type="password" name="password" id="password" class="form-control form-control-lg" />
                            </div>

                            <div data-mdb-input-init class="form-outline form-white mb-4">
                                <label class="form-label" for="">Họ tên</label>
                                <input type="text" name="name" id="name" class="form-control form-control-lg"/>
                            </div>

                            <div data-mdb-input-init class="form-outline form-white mb-4">
                                <label class="form-label" for="">Địa chỉ</label>
                                <input type="text" name="address" id="address" class="form-control form-control-lg"/>
                            </div>

                            <div data-mdb-input-init class="form-outline form-white mb-4">
                                <label class="form-label" for="">Số điện thoại</label>
                                <input type="text" name="phone" id="phone" class="form-control form-control-lg"/>
                            </div>

                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit">Đăng ký</button>
                        </div>

                        <div>
                            <p class="mb-0">Bạn đã có tài khoản? <a href="{{route('customer.login')}}" class="text-white-50 fw-bold">Đăng nhập</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@include('admin.admin_footer')
