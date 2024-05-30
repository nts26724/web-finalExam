@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{asset('css/order.css')}}">

    @if($products_bought->isEmpty())
        <div class="container-fluid p-2" style="background: #ffd28d">
            <h3 class="text-center p-4 text-success">Bạn Chưa Mua Sản Phẩm Nào</h3>
        </div>
    @else
        <div class="container-fluid" style="background: #ffd28d">
            <h3 class="text-center p-4 text-success">Sản Phẩm Bạn Đã Mua</h3>

            <div class="container p-3">
                <table class="table table-borderless shadow overflow-hidden rounded-5" style="background: #ffffff">
                    <thead>
                        <tr>
                            <th width='25%'>Image</th>
                            <th width='55%'>Name Product</th>
                            <th width='10%'>Price</th>
                            <th width='10%'>Quantity</th>
                        </tr>
                    </thead>
                        
                    <tbody>
                        @foreach ($products_bought as $product)
                                <tr>
                                    <td class="d-flex align-items-center "><img class="rounded-5 shadow" src="{{asset( $product->path_img )}}" alt="" width="50%"></td>
                                    <td class="fw-bold" width='10%'>{{ $product->name }}</td>
                                    <td class="fw-bold" width='10%'>${{ $product->price }}</td>
                                    <td class="text-nowrap text-center" width='10%' >{{ $product->OD_quantity }}</td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection