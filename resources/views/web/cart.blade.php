@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{asset('css/cart.css')}}">
    <script src="{{asset('js/cart.js')}}"></script>

    {{-- @if($products->isEmpty()) --}}
    @if($cart_products->isEmpty())
        <h2>Không có sản phẩm nào trong giỏ hàng</h2>
    @else
        <div style="background: #eff3f6">
            
            <div class="container py-5">
                <h2>Your Cart</h2>
                <p> <b>{{$cart_products->count()}} items</b> in your cart</p>
                
                <div class="row">
                    <div class="col-md-9 col-sm-12">
                        <table class="table table-borderless shadow overflow-hidden rounded-5" style="background: #ffffff">
                            <thead>
                                <tr>
                                    <th width='60%'>Product</th>
                                    <th width='10%'>Price</th>
                                    <th width='20%'>Quantity</th>
                                    <th width='10%'>Total</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach ($cart_products as $product)
                                        <tr>
                                            <td width='60%' class="d-flex align-items-center">
                                                <img class="rounded-5 shadow" src="{{asset( $product->path_img )}}" alt="" width="50%">
                                                <div class="mx-3 d-flex flex-column ">
                                                    <p class="text-shadow m-0" style="color: #787a7e">{{ $product->type_name }}</p>
                                                    <h4 class="text-nowrap">{{ $product->name }}</h4>
                                                    <form class="" action="{{ route('cart.delete', ['id' => $id]) }}" method="post" id="{{ $product->id_product }}-form-delete">
                                                        @csrf
                                                        <input type="hidden" name="id_customer" id="'{{$product->id_product}}-customer'" value="{{ $product->id_customer }}">
                                                        <input type="hidden" name="id_product" id="'{{$product->id_product}}-product'" value="{{ $product->id_product }}">
                                                        <button class="text-danger fs-5 fw-bold border-0 bg-white d-flex"><i onclick="deleteItem('{{ $product->id_product }}-form-delete')" class="bi bi-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td class="fw-bold" width='10%'>${{ $product->price }}</td>
                                            <td class="text-nowrap" width='20%' >
                                                <form action="{{ route('cart.update', ['id' => $id]) }}" method="post" id="{{ $product->id_product }}-form-update">
                                                    @csrf
                                                    <input type="hidden" name="id_customer" id="'{{$product->id_product}}-customer'" value="{{ $product->id_customer }}">
                                                    <input type="hidden" name="id_product" id="'{{$product->id_product}}-product'" value="{{ $product->id_product }}">

                                                    <button class="fs-5 border-0 bg-white"><i onclick="quantity_minus('{{$product->id_product}}-quantity')" class="bi bi-dash-square"></i></button>
                                                    <input class="text-center" size="1" id="{{$product->id_product}}-quantity" name="quantity" type='text' onchange="updateQuantity('{{ $product->id_product }}-form-update')" value="{{ $product->cart_product_qty }}">
                                                    <button class="fs-5 border-0 bg-white"><i onclick="quantity_plus('{{$product->id_product}}-quantity')" class="bi bi-plus-square"></i></button>
                                                </form>
                                            </td>
                                            <td class="fw-bold fs-5" width='10%' style="color: #ffd28d;">${{ $product->price * $product->cart_product_qty }}</td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <div class="rounded-5 shadow" style="background: #ffd28d">
                            <div class="container p-3">
                                <h4>Cart Total</h4>
                                @foreach ($cart_products as $cart_product)
                                    <div class="row">
                                        <div class="col-9">{{$cart_product->name}}</div>
                                        <div class="col-3 fw-medium">{{$cart_product->price * $cart_product->cart_product_qty}}</div>
                                    </div>
                                @endforeach
        
                                <hr>
        
                                <div class="row my-2">
                                    <div class="col-8 fw-bold fs-5">Total</div>
                                    <div class="col-3 fw-bold fs-5">${{$total}}</div>
                                </div>
                                
                                <a href="{{ route('order.pay', ['id' => $id])}}" class="btn btn-light rounded-pill m-auto d-block" style="width: 90%;">Order</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection