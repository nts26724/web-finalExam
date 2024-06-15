@extends('admin_layout')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <table class="table">
        <thread>
            <tr>
                <th style="width: 50px">Id</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Trạng thái</th>
                <th>Số lượng</th>
                <th>Ngày cập nhật</th>
                <th style="width: 150px">&nbsp;</th>
            </tr>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>
                            <img src="{{asset('uploads/'.$product->image)}}" alt="{{ $product->name }}" style="width: 100px">
                        </td>
                        <td>{{ $product->menu ? $product->menu->name : 'No Menu' }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{!! \App\Helpers\Helper::active($product->active) !!}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->updated_at }}</td>
                        <td>
                            <a href="edit/{{$product->id}}" class="btn btn-sm btn-primary">Edit</a>
                            <a onclick="removeRow({{$product->id}}, '{{route('admin.products.destroy')}}')" href="#" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </thread>
    </table>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <div class="text-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>

@endsection

