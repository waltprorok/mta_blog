@extends('layouts.admin')
@section('title', 'Edit User')

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
                        <div class="card-header bg-light"> Editing {{ $user->name}}</div>
                        <form action="{{ route('adminEditUserPost', $user->id) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label">User name</label>
                                            <input name="name" type="text" id="normal-input" class="form-control"
                                                   placeholder="User name" value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label">User email</label>
                                            <input name="email" type="email" id="normal-input" class="form-control"
                                                   placeholder="User email" value="{{ $user->email }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label">Permissions</label>
                                            <div class="col-md-6">
                                                <div class="toggle-switch" data-ts-color="primary">
                                                    <label for="ts1" class="ts-label">Author</label>
                                                    <input id="ts1" type="checkbox" hidden="hidden" name="author" value=1 {{ $user->author == true ? 'checked' : '' }}>
                                                    <label for="ts1" class="ts-helper"></label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="col-md-6">
                                                <div class="toggle-switch" data-ts-color="primary">
                                                    <label for="ts2" class="ts-label">Admin</label>
                                                    <input id="ts2" type="checkbox" hidden="hidden" name="admin" value=1 {{ $user->admin == true ? 'checked' : '' }}>
                                                    <label for="ts2" class="ts-helper"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="submit">Update user</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
