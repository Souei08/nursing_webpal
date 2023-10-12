@extends('layouts.app')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3 d-flex align-items-center justify-content-center min-vh-100">
      <div class="card bg-transparent border-0 w-100">
        <div class="card-header bg-transparent border-0">
          <h1>{{ __('Forgot Password') }}</h1>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('password.email') }}" data-ajax="true">
            @csrf
            @include('generate.input', [
              'label' => 'Email',
              'name' => 'email',
              'value' => '',
              'formGroupClass' => '',
            ])
            <button type="submit" class="btn btn-primary mb-5">
            {{ __('Send email link') }}
            </button>
            <div class="text-center">
              <p><a href="{{ route('login') }}">Login now</a></p>
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
