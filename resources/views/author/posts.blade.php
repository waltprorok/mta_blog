@extends('layouts.admin')
@section('title', 'Author Posts')

@section('content')

    <div class="content">
        <div class="card">
            <div class="card-header bg-light">
                Author Posts
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Comments</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(Auth::user()->posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td class="text-nowrap"><a href="{{ route('singlePost', $post->id) }}"
                                                           target="_blank">{{ $post->title }}</a></td>
                                <td>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</td>
                                <td>{{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</td>
                                <td>{{ $post->comments->count() }}</td>
                                <td class="text-nowrap">
                                    <span class="align-baseline">
                                        <form method="POST" id="deletePost-{{ $post->id }}" action="{{ route('deletePost', $post->id) }}">@csrf</form>
                                    <a href="{{ route('postEdit', $post->id) }}" class="btn btn-outline-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a href="#" onclick="document.getElementById('deletePost-{{ $post->id }}').submit()" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
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

@endsection
