@extends('template.layout.master')
@section('title',"Login")
@section('content')

    <div class="container d-flex justify-content-center align-items-center login-container">
        <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
            <h4 class="text-center mb-4">Admin Login</h4>
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>

@endsection
