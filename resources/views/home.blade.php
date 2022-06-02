@extends('layouts.starlight')

@section('home')
active
@endsection

@section('title')
Home
@endsection

@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('/home')}}">Dashboard</a>
    </nav>

    <div class="sl-pagebody">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><h2>Welcome, {{$logged_user}} <span class="float-right">Total Users: {{$total_user}}</span></h2></div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>SL No.</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Role</th>
                                    <th>Created at</th>
                                </tr>
                                @foreach ($all_users as $key=>$user)
                                <tr>
                                    <td>{{$all_users->firstitem()+$key}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @php
                                            if($user->role == 1){
                                                echo 'Admin';
                                            }
                                            else if($user->role == 2){
                                                echo 'Moderator';
                                            }
                                            else if($user->role == 3){
                                                echo 'Editor';
                                            }
                                            else if($user->role == 4){
                                                echo 'Shopkeeper';
                                            }
                                            else{
                                                echo 'Not Assigned';
                                            }
                                        @endphp
                                    </td>
                                    <td>{{($user->created_at->diffInHours() > 24)?$user->created_at->format('d-m-y h:i:s A'):$user->created_at->diffForHumans()}}</td>
                                </tr>
                                @endforeach
                            </table>
                            {{$all_users->links()}}
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Add User</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{url('/add/user')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group mt-2">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="form-group mt-2">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group mt-2">
                                    <select name="role" class="form-control">
                                        <option value="">--- Select Role ---</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Moderator</option>
                                        <option value="3">Editor</option>
                                        <option value="4">Shopkeeper</option>
                                    </select>
                                </div>
                                <div class="form-group mt-2">
                                    <button type="submit" class="btn btn-primary">Add User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection
