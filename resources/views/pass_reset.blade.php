@extends('frontend.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card my-5">
                    <div class="card-header text-center" style="background: linear-gradient(155deg,#fd3f6b 0,#fd7863 98%,#f3dfe0 100%);">
                        <h3 style="color: #fff;">PASSWORD RESET</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('pass.reset.notification')}}" method="POST">
                            @csrf
                            <div class="mt-2">
                                <label for="" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Send Link</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection