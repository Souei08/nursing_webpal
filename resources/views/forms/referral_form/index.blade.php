@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3">
            @include('shared.breadcrumb')
        </div>

        <div class="card border-0 shadow mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-4">
                                <a href="{{ route('forms.list') }}" class="btn btn-dark">
                                    <i class="fas fa-arrow-left"></i> Back
                                </a>
                            </div>
                            <div class="col-sm-8">
                                <a href="{{ route('referral_form.create') }}" class="btn btn-primary pull-right">
                                    <i class="fa fa-plus"></i> Add New Form
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col-md-8 d-flex justify-content-start align-items-center">
                        <h5 class="mb-0">Referral Form Patients</h5>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" class="form-control search-data border-right-0"
                                data-url="{{ url()->full() }}" data-target="#datas" placeholder="Search ...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="datas">
                    @include('forms.referral_form.list')
                </div>
            </div>
        </div>
    </div>
@endsection
