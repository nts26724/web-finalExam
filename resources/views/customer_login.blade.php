<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@include('admin.admin_header')
<form action="{{route('customer.login.store')}}" enctype="multipart/form-data" method="POST">
    @csrf
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card text-white" style="border-radius: 1rem; background-color: #0e5b44">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Đăng nhập</h2>
                                <p class="text-white-50 mb-5">Hãy nhập tên đăng nhập và mật khẩu của bạn!</p>
                                @include('alert')
                                <div data-mdb-input-init class="form-outline form-white mb-4">
                                    <label class="form-label" for="typeEmailX">Username</label>
                                    <input type="text" name="username" id="username" class="form-control form-control-lg"/>
                                </div>

                                <div data-mdb-input-init class="form-outline form-white mb-4">
                                    <label class="form-label" for="typePasswordX">Password</label>
                                    <input type="password" name="password" id="password" class="form-control form-control-lg" />
                                </div>

                                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Quên mật khẩu?</a></p>

                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                            </div>

                            <div>
                                <p class="mb-0">Bạn chưa có tài khoản? <a href="{{route('customer.register')}}" class="text-white-50 fw-bold">Đăng ký</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
@include('admin.admin_footer')
</body>
</html>
