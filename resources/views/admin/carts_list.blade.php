@extends('admin_layout')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <table class="table">
        <thread>
            <tr>
               <th>Tên Khách Hàng</th>
               <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th style="width: 150px"></th>
            </tr>
            <tbody>
                @foreach($carts as $cart)
                    <tr>
                        <td>{{$cart->customer->name}}</td>
                        <td>{{$cart->product->name}}</td>
                        <td>{{$cart->quantity}}</td>
                        <td>
                            <a href="view/{{$cart->customer_id}}" class="btn btn-sm btn-primary">Xem</a>
                            <a onclick="removeRow({{$cart->customer_id}},{{$cart->product_id}}, '{{route('admin.carts.destroy')}}')" href="#" class="btn btn-sm btn-danger">Xóa</a>
                    </tr>
                @endforeach
        </thread>
    </table>
    <div class="d-flex justify-content-center">
        {{ $carts->links() }}
    </div>
@endsection
@section('footer')
    <script>
        function removeRow(customer_id, product_id, url) {
            if(confirm('Bạn có chắc chắn muốn xóa?')) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        customer_id: customer_id,
                        product_id: product_id,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        if (response.status) {
                            alert('Xóa thành công');
                            location.reload();
                        } else {
                            alert('Xóa thất bại');
                        }
                    }
                });
            }
        }
    </script>
@endsection


