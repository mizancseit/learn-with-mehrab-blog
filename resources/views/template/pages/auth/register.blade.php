@extends('template.layout.app')
@section('title','Register')
@section('content')
    <div class="login-page-section h-100 register-page-margin">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="login-page-container">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">

                                    <h4 class="mb-4">Create Your Account</h4>

                                    <form action="{{route('register.submit')}}" method="post">
                                        @csrf
                                        @method('post')

                                        <div class="mb-3">
                                            <label class="mb-1">Name</label>
                                            <input type="text" class="form-control" placeholder="Enter your Name" name="name" value="{{old('name')}}">
                                            <div class="error-message-color">
                                                @error('name')
                                                {{$message}}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="mb-1">Email</label>
                                            <input type="text" class="form-control" placeholder="Enter your Email" name="email" value="{{old('email')}}">
                                            <div class="error-message-color">
                                            @error('email')
                                            {{$message}}
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="mb-1">Mobile</label>
                                            <input type="text" class="form-control" placeholder="Enter your Mobile Number" name="mobile" value="{{old('mobile')}}">
                                            <div class="error-message-color">
                                                @error('mobile')
                                                {{$message}}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div>
                                                    <label class="mb-1">Password</label>
                                                    <input type="password" class="form-control"  name="password" placeholder="Enter your Password">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div>
                                                    <label class="mb-1">Confirm Password</label>
                                                    <input type="password" class="form-control"  name="password_confirmation" placeholder="Confirm your Password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="error-message-color">
                                            @error('password')
                                            {{$message}}
                                            @enderror
                                        </div>


                                        <div class="text-center mt-4">
                                            <button type="submit" class="register-button">Register</button>
                                        </div>

                                        <hr style="border-color: rgba(192,192,192,0.82);margin-top: 40px"/>
                                        <p>Already have an account? <a href="{{route('login')}}">Log In</a> </p>

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
