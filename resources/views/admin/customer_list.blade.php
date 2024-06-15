@extends('admin_layout')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <table class="table">
        <thread>
            <tr>
                <th style="width: 50px">Id</th>
                <th>Tên tài khoản</th>
                <th>Họ Tên</th>
                <th>Mật khẩu</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Thời gian tạo</th>
                <th style="width: 150px">&nbsp;</th>
            </tr>
            <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->username }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->password }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->created_at }}</td>
                        <td>
                            <a href="edit/{{$customer->id}}" class="btn btn-sm btn-primary">Sửa</a>
                            <a onclick="removeRow({{$customer->id}}, '{{route('admin.customers.destroy')}}')" href="#" class="btn btn-sm btn-danger">Xóa</a>
                    </tr>
                @endforeach
        </thread>
    </table>
    <div class="d-flex justify-content-center">
        {{ $customers->links() }}
    </div>
@endsection
