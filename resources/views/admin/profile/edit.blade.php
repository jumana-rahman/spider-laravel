@extends('layouts.starlight')

@section('title')
Edit Profile
@endsection

@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('/home')}}">Dashboard</a>
        <a class="breadcrumb-item" href="">Edit Profile</a>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Change Name</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/profile/update')}}" method="POST">
                            @csrf
                            <div class="mt-2">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Change Password</h3>
                    </div>
                    @if(session('old_pass'))
                        <div class="alert alert-warning">
                            {{session('old_pass')}}
                        </div>
                    @endif
                    @if(session('update_pass'))
                        <div class="alert alert-success">
                            {{session('update_pass')}}
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{url('/password/update')}}" method="POST">
                            @csrf
                            <div class="mt-2">
                                <label for="" class="form-label">Current Password</label>
                                <input type="password" name="old_password" class="form-control">
                            </div>
                            <div class="mt-2">
                                <label for="" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="mt-2">
                                <label for="" class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control">
                                @error('password')
                                    <div class="alert alert-warning">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Change Photo</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/photo/change')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mt-2">
                                <label for="" class="form-label">Profile Photo</label>
                                <input type="file" name="photo" class="form-control">
                                @error('photo')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection