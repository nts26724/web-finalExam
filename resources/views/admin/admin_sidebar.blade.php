<aside class="main-sidebar sidebar-dark-primary elevation-4" style="height: 140vh">

    <a href="" class="brand-link">
        <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">ADMIN</a>
            </div>
        </div>

        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div><div class="sidebar-search-results"><div class="list-group"><a href="#" class="list-group-item"><div class="search-title"><strong class="text-light"></strong>N<strong class="text-light"></strong>o<strong class="text-light"></strong> <strong class="text-light"></strong>e<strong class="text-light"></strong>l<strong class="text-light"></strong>e<strong class="text-light"></strong>m<strong class="text-light"></strong>e<strong class="text-light"></strong>n<strong class="text-light"></strong>t<strong class="text-light"></strong> <strong class="text-light"></strong>f<strong class="text-light"></strong>o<strong class="text-light"></strong>u<strong class="text-light"></strong>n<strong class="text-light"></strong>d<strong class="text-light"></strong>!<strong class="text-light"></strong></div><div class="search-path"></div></a></div></div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Dashboard</p>
                        <i class="right fas fa-angle-left">

                        </i>
                    </a>
                    <ul class="nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.menus.add')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm Danh Mục</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.menus.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách Danh Mục</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Sản Phẩm</p>
                        <i class="right fas fa-angle-left">

                        </i>
                    </a>
                    <ul class="nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.products.add')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm Sản Phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.products.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách Sản Phẩm</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Khách hàng</p>
                        <i class="right fas fa-angle-left">

                        </i>
                    </a>
                    <ul class="nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.customers.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách Khách hàng</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Giỏ hàng</p>
                        <i class="right fas fa-angle-left">

                        </i>
                    </a>
                    <ul class="nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.carts.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách giỏ hàng</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

    </div>

</aside>
