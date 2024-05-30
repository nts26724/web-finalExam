@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
<script src="{{ asset('js/detail.js') }}" defer></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">

<div class="container" id='contain_detail'>
    <div class="product-container">
        <div class="product-image text-center">
            <img src="{{ asset($product->path_img) }}" alt="Fresh Cherry Juice">
        </div>
        <div class="product-details">
            <h1 id="product-name">{{$product->name}}</h1>
            <p class="rating">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
            </p>
            <p class="price" id="product-price">{{$product->price}}</p>
            <p id="product-description">{{$product->decription}}</p>

            <div class="add-to-cart mt-4">
                <form action="">
                    <input type="hidden" name="id_customer" value="{{$id}}">
                    <input type="hidden" name="id_product" value="{{$product->id_product}}">
                    <input type="number" value="1" min="1" style="width: 60px;" class="tapNumber">
                    <button type="submit">Add to Cart</button>
                </form>
            </div>
            <div class="product_meta custom mt-4">
                <span class="sku_wrapper">
                    <span class="label">SKU:</span>
                    <span class="sku">Organic-Drinks</span>
                </span>
                <span class="posted_in">
                    <span class="label">Category:</span>
                    <a href="" rel="tag">Fruit Juice</a>
                </span>
                <span class="tag">
                    <span class="label">Tag:</span>
                    <a href="" rel="tag">Organic</a>
                </span>
            </div>
        </div>
    </div>

    <div class="similar-products p-4">
        <h2 class="my-3">Sản phẩm tương tự</h2>
        <div class="row">
            @foreach($related_products as $related_product)
            <div class="col">

                <div class="card rounded-4 shadow" style="background: #ebffef">
                    <img src="{{ asset($related_product->path_img) }}" class="card-img-top p-3" alt="${product.name}" >
                    <div class="card-body text-center">
                        <h5 class="card-title">{{$related_product->name}}</h5>
                        <p class="card-text">${{$related_product->price}}</p>
                        <a href="#" class="btn btn-success rounded-pill" onclick='showSimilarProductDetails(${JSON.stringify(product)})'>Xem chi tiết</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
