@extends('template.layout.app')
@section('title','Login')
@section('content')
    <style>
        /*.authincation {*/
        /*    background: var(--rgba-primary-1);*/
        /*    display: flex;*/
        /*    min-height: 100vh;*/
        /*}*/

        /*.h-100 {*/
        /*    height: 100% !important;*/
        /*}*/
        /*.align-items-center {*/
        /*    align-items: center !important;*/
        /*}*/
        /*.justify-content-center {*/
        /*    justify-content: center !important;*/
        /*}*/

        /*.authincation-content {*/
        /*    background: #fff;*/
        /*    box-shadow: 0 0 2.1875rem 0 rgba(154, 161, 171, 0.15);*/
        /*    border-radius: 0.3125rem;*/
        /*}*/

        /*.auth-form {*/
        /*    padding: 3.125rem 3.125rem;*/
        /*}*/

    </style>
    <div class="login-page-section h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="login-page-container">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">

                                    <h4 class="mb-4">Login to Your Account</h4>
                                    @if($errors->any())
                                        {{ implode('', $errors->all('<div>:message</div>')) }}
                                    @endif

                                    <form action="{{route('login')}}" method="post">
                                        @csrf
                                        @method('post')
                                        <div class="mb-3">
                                            <label class="mb-1">Email</label>
                                            <input type="text" class="form-control" placeholder="Enter email" name="email">
                                            @error('email')
                                            {{$message}}
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="mb-1">Password</label>
                                            <input type="password" class="form-control" value="Password" name="password" placeholder="Enter Password">
                                        </div>

                                        <div class="text-center mt-4">
                                            <button type="submit" class="register-button">Sign In</button>
                                        </div>

                                        <div class="mt-4">
                                            <label class="mb-1"><input type="checkbox" value="yes" name="remember"> Remember Me</label>
                                        </div>

                                        <hr/>
                                        <p>Don't have an account? <a href="{{route('register')}}">Register</a> </p>

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
