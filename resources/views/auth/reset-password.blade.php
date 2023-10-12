@extends('layouts.app')
@section('content')
<div class="container py-5 h-100">
  <div class="row h-100">
    <div class="col-md-6 offset-md-3 h-100 d-flex align-items-center justify-content-center py-3">
      <div class="card bg-transparent border-0 w-100">
        <div class="card-header bg-transparent border-0">
          <h1>{{ __('Reset Password') }}</h1>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('password.update') }}" data-ajax="true">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            @include('generate.input', [
              'label' => 'Email',
              'name' => 'email',
              'value' => '',
              'formGroupClass' => '',
            ])
            @include('generate.input', [
              'label' => 'Password',
              'type' => 'password',
              'name' => 'password',
              'value' => '',
              'formGroupClass' => '',
            ])
            @include('generate.input', [
              'label' => 'Confirm Password',
              'type' => 'password',
              'name' => 'password_confirmation',
              'value' => '',
              'formGroupClass' => '',
            ])
            <button type="submit" class="btn btn-primary mb-5">
            {{ __('Reset Password') }}
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
