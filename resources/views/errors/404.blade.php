@extends('layouts.app-no-nav')
@section('styles')
  <style type="text/css">
    .content {
      padding: 100px; 
    }
  </style>
@endsection
@section('content')
  <div class="container vh-100 content">
    <div class="row">
      <div class="col-md-6">
        <div class="clearfix">
          <h1 class="float-left display-3 mr-4">404</h1>
          <h4 class="pt-3">Oops!...</h4>
          <p class="text-muted">The page you are looking for was not found.</p>
          @guest
            <a href="{{ route('index') }}" class="btn btn-danger me-2">
              Go Home
            </a>
          @else
            <a href="{{ route('dashboard.index') }}" class="btn btn-danger me-2">
              Go to Dashboard
            </a>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
@section('javascript')
@endsection