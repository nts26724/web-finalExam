<html lang="en" style="height: auto;"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
</head>
<body class="sidebar-mini" style="height: auto;">
<div class="wrapper">
    @include('admin.admin_header')
    @include('admin.admin_sidebar')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                @include('alert')
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary mt-3">
                            <div class="card-header">
                                <h3 class="card-title"> {{$title}} </h3>
                            </div>
                            @yield('content')
                            </div>
                        </div>
                        <div class="col-md-6">
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.admin_footer')
</body></html>

