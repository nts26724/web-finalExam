@extends('admin_layout')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <form action="" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Tên Tài khoản</label>
                <input type="text" name="username" value="{{$customer->username}}" class="form-control" id="username" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label>Họ Tên</label>
                <input type="text" name="name" value="{{$customer->name}}" class="form-control" id="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" name="password" value="{{$customer->password}}" class="form-control" id="password" placeholder="Enter password">
            </div>
            <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" name="address" value="{{$customer->address}}" class="form-control" id="address" placeholder="Enter address">
            </div>
            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="text" name="phone" value="{{$customer->phone}}" class="form-control" id="phone" placeholder="Enter phone">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection
