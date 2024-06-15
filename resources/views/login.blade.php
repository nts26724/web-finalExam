<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<section class="vh-100" style="background-color: lightgreen;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="https://i.pinimg.com/564x/69/60/58/6960584bb473af82e581eb6a3494e5ef.jpg"
                                 alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form action="{{ route('login.store') }}" method="post">
                                    @csrf
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <span class="h1 fw-bold mb-0">LOGIN</span>
                                    </div>
                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
                                    @include('alert')
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="email" name="email" id="form2Example17" class="form-control form-control-lg" placeholder="Email"/>
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="password" name="password" id="form2Example27" class="form-control form-control-lg" placeholder="Password"/>
                                    </div>
                                    <div class="pt-1 mb-4 ">
                                        <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
