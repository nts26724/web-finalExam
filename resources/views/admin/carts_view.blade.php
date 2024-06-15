@extends('admin_layout')
@section('content')
{{--    see detail --}}
    <div class="customer">
        <ul>
            <li>Tên khách hàng: <strong>
                        {{$customer->name}}
                </strong></li>
            <li>Địa chỉ: <strong>
                        {{$customer->address}}
                </strong></li>
            <li>Số điện thoại: <strong>
                        {{$customer->phone}}
                </strong></li>
        </ul>
    </div>
    <div class="carts">
        @php $total = 0; @endphp
        <table class="table">
            <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Ảnh</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Thành tiền</th>
            </tr>
            </thead>
            <tbody>
            @foreach($carts as $cart)
                <tr>
                    <td>{{$cart->product->name}}</td>
                    <td><img src="{{asset('uploads/'.$cart->product->image)}}" alt="" style="width: 100px"></td>
                    <td>{{$cart->quantity}}</td>
                    <td>{{number_format($cart->product->price)}} $</td>
                    <td>{{number_format($cart->product->price * $cart->quantity)}}$</td>
                    @php $total += $cart->product->price * $cart->quantity; @endphp
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td colspan="4">Tổng cộng</td>
                <td>{{number_format($total)}}$</td>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
