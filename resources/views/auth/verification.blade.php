@extends('layouts.app')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3 d-flex align-items-center justify-content-center min-vh-100">
      <div class="card bg-transparent border-0 w-100">
        <div class="card-header bg-transparent border-0">
          <h1>{{ __('Verify Email') }}</h1>
        </div>
        <div class="card-body">
          <div class="alert alert-success" role="alert">
            Please check your email for verification code.
          </div>
          <form method="POST" action="{{ route('verification.post') }}" data-ajax="true">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            @include('generate.input', [
              'label' => 'Enter Verification Code',
              'name' => 'code',
              'value' => '',
              'formGroupClass' => '',
            ])
            <button type="submit" class="btn btn-primary mb-5">
            {{ __('Submit') }}
            </button>
          </form>
          <form method="POST" action="{{ route('verification.resend') }}" data-ajax="true">
            <p>Code Expiry: <span id="demo"></span></p>
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">
            <button type="submit" class="btn btn-link p-0 m-0" id="request-another">{{ __('click here to request another') }}</button>.
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
  // Set the date we're counting down to
  var countDownDate = new Date("{{ $verification ? $verification['expiry'] : null }}").getTime();

  // Update the count down every 1 second
  var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();
      
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
      
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
      
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = minutes + "m " + seconds + "s ";
      
    // If the count down is over, write some text 
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("demo").innerHTML = "EXPIRED";
    }
  }, 1000);
</script>
@endsection