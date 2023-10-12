@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between align-items-center mb-3">
    @include('shared.breadcrumb')
  </div>
  <div class="card border-0 shadow-sm">
    <div class="card-body p-5">
      <form method="POST" action="{{ route('profile.update.password') }}" data-ajax="true">
        @csrf
        @include('generate.input', [
          'label' => 'Password',
          'type' => 'password',
          'name' => 'password',
          'value' => '',
          'formGroupClass' => 'mb-3'
        ])
        @include('generate.input', [
          'label' => 'Confirm Password',
          'type' => 'password',
          'name' => 'password_confirmation',
          'value' => '',
          'formGroupClass' => 'mb-3'
        ])
        <button type="submit" class="btn btn-primary">
        {{ __('Update Password') }}
        </button>
      </form>
    </div>
  </div>
</div>
@endsection
@section('javascript')
@endsection