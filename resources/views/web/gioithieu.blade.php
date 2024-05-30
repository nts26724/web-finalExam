@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/gioithieu.css')}}">
{{-- <link rel="stylesheet" href="{{ asset('css/web.css')}}"> --}}

<div class="" id='contain_gioithieu'>
    <h1 class="text-white text-center p-3" >About Us</h1>

    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-5 col-md-10 justify-content-center d-flex">
            <img src="{{asset('img/about_1_2.jpg')}}" alt="">
        </div>

        <div class="col-lg-5 col-md-10 d-grid p-5" style="font-family: 'Shadows Into Light Two', cursive;">
            <span class="d-flex align-items-center" style="color: #FF9C00;">
                <img class="p-2" src="{{asset('img/logofooter.svg')}}" alt="">About Our Company
            </span>
            <h2 class="text-white">Eating Right Start With Organic Food</h2>
            <p class="text-ccc">Organic foods are produced through a farming system that avoids the use of synthetic pesticides, herbicides, genetically modified organism (GMOs), and artificial fertilizers. Instead, organic farmers rely on natural methods like crop rotation. composting, and biological pest control.</p>

        </div>
    </div>

    <div class="d-flex justify-content-center align-items-center my-5" id="counter">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-2 col-md-6 col-sm-12 mx-5 d-flex">
                <div class="mx-1"><img src="{{asset('img/counter_card_1.svg')}}" alt=""></div>
                <div class="text-white">
                    <h2>15663+</h2>
                    <p class="text-nowrap">Our Total Products</p>
                </div>
            </div>
    
            <div class="col-lg-2 col-md-6 col-sm-12 mx-5 d-flex">
                <div class="mx-1"><img src="{{asset('img/counter_card_2.svg')}}" alt=""></div>
                <div class="text-white">
                    <h2>365+</h2>
                    <p class="text-nowrap">Team Members</p>
                </div>
            </div>
    
            <div class="col-lg-2 col-md-6 col-sm-12 mx-5 d-flex">
                <div class="mx-1"><img src="{{asset('img/counter_card_3.svg')}}" alt=""></div>
                <div class="text-white">
                    <h2>2365+</h2>
                    <p class="text-nowrap">Satisfied Customers</p>
                </div>
            </div>
    
            <div class="col-lg-2 col-md-6 col-sm-12 mx-5 d-flex">
                <div class="mx-1"><img src="{{asset('img/counter_card_4.svg')}}" alt=""></div>
                <div class="text-white">
                    <h2>156+</h2>
                    <p class="text-nowrap">Awards Winning</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection