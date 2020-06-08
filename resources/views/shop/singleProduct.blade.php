@extends('layouts.master')
@section('title', 'Product')
@section('content')

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{ asset('assets/img/home-bg.jpg') }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>{{ $product->title }}</h1>
                        <span class="subheading">Here is our T-Shirt Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset($product->thumbnail) }}" alt="">
            </div>
            <div class="col-md-8">
                <h3>{{ $product->title }}</h3>
                <hr />
                {{ $product->description }}
                <hr />
                <p><b>${{ $product->price }} USD</b></p>
                <a href="{{ route('shop.orderProduct', $product->id) }}" class="btn btn-primary">Checkout with PayPal</a>
            </div>
        </div>
    </div>

@endsection
