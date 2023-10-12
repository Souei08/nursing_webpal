@extends('layouts.dashboard')
@section('content')
@include('dashboard.'.auth()->user()->role->slug)
@endsection
@section('javascript')
@endsection