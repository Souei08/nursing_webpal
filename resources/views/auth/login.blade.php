@extends('layouts.app')
@section('styles')
<style type="text/css">
  body {
    padding-top: 66px  !important;
  }
</style>
@endsection
@section('content')
<div class="container">
  <div class="row mb-5">
    <div class="col-md-6 offset-md-3 d-flex align-items-center justify-content-center min-vh-100">
      <div class="card w-100">
        <div class="card-header bg-transparent border-0 text-center p-3">
          <h3 class="mb-0 text-capitalize">Welcome to {{ config('app.name') }}</h3>
          <p class="mb-0">Login to your account</p>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('login') }}" data-ajax="true">
            <input type="hidden" name="ref" value="{{ $ref ?? '' }}">
            @csrf
            @include('generate.input', [
              'label' => 'Email',
              'name' => 'email',
              'value' => '',
              'formGroupClass' => '',
            ])

            <div class="alert alert-primary" role="alert">
              Note: USE YOUR UMINDANAO ACCOUNT
            </div>
            @include('generate.input', [
              'label' => 'Password',
              'type' => 'password',
              'name' => 'password',
              'value' => '',
              'formGroupClass' => '',
            ])
            <div class="d-flex justify-content-between align-items-start mb-3">
              <a class="btn btn-link p-0" href="{{ route('password.request') }}">
              {{ __('Forgot Your Password?') }}
              </a>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
                </label>
              </div>
            </div>
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-maroon mb-5">
              {{ __('Login') }}
              </button>
            </div>
            <div class="text-center">
              <p>Don't have an account? <a href="{{ route('register', ['type' => 'student']) }}">Register</a></p>
            </div> 
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('javascript')
@endsection