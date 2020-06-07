@extends('layouts.admin')

@section('title', 'Admin Products')

@section('content')

    <div class="content">
        <div class="card">
            <div class="card-header bg-light">
                Admin Products
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Thumbnail</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td><img src="{{ $product->thumbnail }}" width="100"></td>
                                <td class="text-nowrap"><a href="{{ route('adminEditProduct', $product->id) }}" target="_blank">{{ $product->title }}</a></td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }} USD</td>
                                <td class="text-nowrap">
                                    <span class="align-baseline">
                                    <a href="{{ route('adminEditProduct', $product->id) }}" class="btn btn-outline-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteProductModal-{{ $product->id }}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @foreach($products as $product)
        <div class="modal fade" id="deleteProductModal-{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Post?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        You are about to delete {{ $product->title }}
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <form method="POST" id="deleteProduct-{{ $product->id }}" action="#">@csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection

