@extends('layouts.dashboard')
@section('styles')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3">
            @include('shared.breadcrumb')
        </div>
        <div class="card border-0 shadow">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col-md-8 d-flex justify-content-start align-items-center">
                        <h5 class="mb-0">Create Form</h5>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
            <form action="{{ route('forms.store') }}" method="POST" id="form-save" data-ajax="true">
                <div class="card-body p-4">
                    @include('generate.input', [
                        'label' => 'Title',
                        'name' => 'title',
                        'value' => '',
                        'formGroupClass' => 'mb-3',
                    ])
                    @include('generate.textarea', [
                        'label' => '',
                        'name' => 'html',
                        'value' => '',
                        'formGroupClass' => 'mb-3',
                        'id' => 'html',
                    ])
                </div>
                <div class="card-footer bg-white py-3">
                    <div class="d-flex justify-content-end align-items-center">
                        <a class="btn btn-light me-2" href="{{ redirect()->back()->getTargetUrl() }}">Cancel</a>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="https://cdn.tiny.cloud/1/i4aecwkc6ym3nhoqj8b0hpbl2ib8jzwwag2fl420gun6aij3/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount autoresize textcolor colorpicker',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat | forecolor backcolor',
            min_height: 500,
            max_height: 1000,
            autoresize_overflow_padding: 5,
            autoresize_bottom_margin: 25,
        });
    </script>
@endsection
