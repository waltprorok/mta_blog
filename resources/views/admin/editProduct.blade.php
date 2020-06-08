@extends('layouts.admin')

@section('title', 'EditProduct')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if(Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            Edit Product
                        </div>
                        <form action="{{ route('adminEditProduct', $product->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label">Thumbnail</label>
                                            <input type="file" name="thumbnail" id="normal-input" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label">Current Image</label><br />
                                            <img class="img-thumbnail" src="{{ asset($product->thumbnail) }}" width="100" alt="">
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label">Title</label>
                                            <input name="title" id="normal-input" class="form-control"
                                                   placeholder="Add title" value="{{ $product->title }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label">Description</label>
                                            <textarea name="description" id="normal-input" rows="8" class="form-control"
                                                      placeholder="Add description">{{ $product->description }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label">Price</label>
                                            <input name="price" id="normal-input" class="form-control"
                                                   placeholder="Enter Price" value="{{ $product->price }}">
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="submit">Update Product</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
