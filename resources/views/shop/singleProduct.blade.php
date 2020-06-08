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


@endsection
