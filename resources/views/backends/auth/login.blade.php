@extends('backends.layouts.auth_layout')
@section('title','Login')
@section('content')
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">

                                    <div class="text-center mb-3">
                                        <a href="#"><img src="{{asset('frontends/images/logo.webp')}}" alt=""></a>
                                    </div>

                                    <h4 class="text-center mb-4">Sign In your account</h4>
                                    @if($errors->any())
                                        {{ implode('', $errors->all('<div>:message</div>')) }}
                                    @endif

                                    <form action="{{route('login')}}" method="post">
                                        @csrf
                                        @method('post')
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="text" class="form-control" placeholder="Enter email" name="email">
                                            @error('email')
                                                {{$message}}
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control" value="Password" name="password" placeholder="Enter Password">
                                        </div>

                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
