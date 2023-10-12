@extends('layouts.dashboard')
@section('styles')
    <style type="text/css">
        .form-name {
            background-color: transparent !important;
            border: 0px !important;
            margin-bottom: 0px !important;
            width: 100%;
        }

        .form-name>input {
            background-color: transparent !important;
            border: 0px !important;
        }

        .form-nane>span.input-group-text {
            background-color: transparent !important;
            border: 0px !important;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3">
            @include('shared.breadcrumb')
        </div>
        <form action="{{ route('forms.update', $data->id) }}" id="form-update" method="POST" data-ajax="true">
            <div class="card border-0 shadow">
                <div class="card-header bg-white py-3">
                    <div class="justify-content-between align-items-center d-flex">
                        <div class="form-name justify-content-start align-items-center d-flex">
                            <i class="fas fa-pencil-alt"></i>
                            <input type="text" class="form-control form-name-input" name="title" placeholder="Title"
                                value="{{ $data->title }}">
                        </div>
                        <p class="mb-0 text-success text-end d-none" id="saving">Saving...</p>
                    </div>
                </div>
                <div class="card-body p-0">
                    @include('generate.textarea', [
                        'name' => 'html',
                        'value' => $data->html,
                        'formGroupClass' => 'mb-3',
                        'id' => 'html',
                    ])
                </div>
                <div class="card-footer bg-white py-3">
                    <div class="d-flex justify-content-end align-items-center">
                        <a class="btn btn-light me-2" href="{{ redirect()->back()->getTargetUrl() }}">Cancel</a>
                        <a class="btn btn-danger me-2" id="save">
                            <i class="fas fa-save"></i>
                            Save
                        </a>
                        <a class="btn btn-dark me-2"
                            href="{{ route('forms.edit', ['id' => $data->id, 'download' => 'true']) }}">
                            <i class="fas fa-download"></i>
                            Download
                        </a>
                    </div>
                </div>
            </div>
        </form>
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
            setup: function(ed) {
                ed.on('change', function(e) {
                    console.log('the event object ', e);
                    console.log('the editor object ', ed);
                    console.log('the content ', ed.getContent());
                    $('#saving').removeClass('d-none');

                    setTimeout(function() {
                        $('#saving').addClass('d-none');
                    }, 1000);

                    $('#html').val(ed.getContent());
                    $('#form-update').submit()
                });
            }
        });

        $(document).ready(function() {
            $('.form-name-input').change(function(event) {
                event.preventDefault();

                $('#saving').removeClass('d-none');

                setTimeout(function() {
                    $('#saving').addClass('d-none');
                }, 1000);

                $('#form-update').submit();
            });


            $("#save").click(function() {
                $('#form-update').submit();
            });
        });
    </script>
@endsection
