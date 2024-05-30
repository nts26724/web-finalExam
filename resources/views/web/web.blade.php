@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/web.css')}}">

<div class="" id='content'>
    <div class="title fw-light d-grid justify-content-center align-items-center">
        <span class="d-flex fw-light justify-content-center align-items-center" style="margin-left: -10px">
            <img class="p-2" src="{{asset('img/logofooter.svg')}}" alt=""> Organic Products
        </span>
        <h2 class="fw-bold text-success">Organic & Fresh Products Daily!</h2>
    </div>

    <div class="d-md-flex d-sm-grid align-items-center justify-content-center p-5" id="btns_category">
        <a class="{{request()->is('web/logged/'.$id) ? 'active' : ''}} m-2 btn btn-outline-success" href="{{ route('web', ['id' => $id]) }}">All</a>
        <a class="{{request()->is('web/*/category/1') ? 'active' : ''}} m-2 btn btn-outline-success text-nowrap" href="{{ route('web.category', ['id_Log' => $id, 'id_Type' => 1]) }}">Fresh Fruit</a>
        <a class="{{request()->is('web/*/category/2') ? 'active' : ''}} m-2 btn btn-outline-success text-nowrap" href="{{ route('web.category', ['id_Log' => $id, 'id_Type' => 2]) }}">Fruit Juice</a>
        <a class="{{request()->is('web/*/category/3') ? 'active' : ''}} m-2 btn btn-outline-success text-nowrap" href="{{ route('web.category', ['id_Log' => $id, 'id_Type' => 3]) }}">Meat Fish</a>
        <a class="{{request()->is('web/*/category/4') ? 'active' : ''}} m-2 btn btn-outline-success" href="{{ route('web.category', ['id_Log' => $id, 'id_Type' => 4]) }}">Salads</a>
        <a class="{{request()->is('web/*/category/5') ? 'active' : ''}} m-2 btn btn-outline-success" href="{{ route('web.category', ['id_Log' => $id, 'id_Type' => 5]) }}">Vegetables</a>
    </div>

    

    <div class="products">
        @for ($i = 0; $i < $quan_row; $i++)
            <div class="row d-flex justify-content-center align-items-center row-product">
                @for ($j = 0; $j < (count($products)-$i*4 < 4 ? count($products)-$i*4 : 4); $j++)
                    <div class="col-lg-2 col-md-6 col-sm-12 mx-4 rounded-4 p-4 shadow" style="background: #ebffef">
                        <img src="{{ asset( $products[$i*4+$j]->path_img )}}" class="card-img-top p-3" alt="...">
                        <div class="card-body text-center">
                            
                            @foreach ($types as $type)
                                @if($products[$j]->id_type == $type->id_type)
                                    <p class="card-text text-black">{{$type->name}}</p>
                                @endif
                            @endforeach

                            <h5 class="card-title text-nowrap"><a href="{{ route('web.product', ['id_cus' => $id, 'id_pro' => $products[$i*4+$j]->id_product]) }}" class="text-black" style="text-decoration: none;">{{ $products[$i*4+$j]->name }}</a></h5></h5>
                            <p class="card-text text-black">${{ $products[$i*4+$j]->price }}</p>
                            <p class="card-text" style="color: #FF9C00">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </p>
                            <form action="{{ route('cart.add', ['id' => $id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_customer"  value="{{$id}}">
                                <input type="hidden" name="id_product"  value="{{$products[$i*4+$j]->id_product}}">
                                <input type="hidden" name="quantity"  value="1">
                                <button type="submit" class="btn btn-primary">Add To Card</button>
                            </form>
                        </div>
                    </div>
                @endfor
            </div>
        @endfor
    </div>

    <div class="d-flex justify-content-center align-items-center" id="counter">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-2 col-md-3 col-sm-3 mx-5 d-flex">
                <div class="mx-1"><img src="{{asset('img/counter_card_1.svg')}}" alt=""></div>
                <div class="text-white">
                    <h2>15663+</h2>
                    <p class="text-nowrap">Our Total Products</p>
                </div>
            </div>
    
            <div class="col-lg-2 col-md-3 col-sm-3 mx-5 d-flex">
                <div class="mx-1"><img src="{{asset('img/counter_card_2.svg')}}" alt=""></div>
                <div class="text-white">
                    <h2>15663+</h2>
                    <p class="text-nowrap">Our Total Products</p>
                </div>
            </div>
    
            <div class="col-lg-2 col-md-3 col-sm-3 mx-5 d-flex">
                <div class="mx-1"><img src="{{asset('img/counter_card_3.svg')}}" alt=""></div>
                <div class="text-white">
                    <h2>15663+</h2>
                    <p class="text-nowrap">Our Total Products</p>
                </div>
            </div>
    
            <div class="col-lg-2 col-md-3 col-sm-3 mx-5 d-flex">
                <div class="mx-1"><img src="{{asset('img/counter_card_4.svg')}}" alt=""></div>
                <div class="text-white">
                    <h2>15663+</h2>
                    <p class="text-nowrap">Our Total Products</p>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection