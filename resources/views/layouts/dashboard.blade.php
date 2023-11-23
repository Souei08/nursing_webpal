<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @yield('print_script')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('shared.meta')
    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/e27bdb27e2.js" crossorigin="anonymous"></script>
    
    <script src="{{ mix('js/app.js') }}"></script>
   
    @yield('top-javascript')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">

    @yield('styles')
    <style type="text/css">
        body {
            padding-top: 80px;
            background-image: url("{{ asset('images/background2.png') }}");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }

        .drop-area {
            border: 2px dashed #ccc;
            padding: 20px;
            text-align: center;
        }

        .instructions {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .file-list {
            list-style: none;
            padding: 0;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .file-item {
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .error-message-custom {
            color: #dc3545;
            font-size: 0.875em;
            margin-top: 0.25rem;
            text-align: left;
        }

        .is-invalid-custom {
            border-color: #dc3545;
            padding-right: calc(1.6em + 0.75rem);
            background-repeat: no-repeat;
            background-position: right calc(0.4em + 0.1875rem) center;
            background-size: calc(0.8em + 0.375rem) calc(0.8em + 0.375rem);
        }
    </style>


    <script>
      document.addEventListener('DOMContentLoaded', () => {

            const dropArea = document.getElementById('drop-area');
            const fileInput = document.getElementById('file-input');
            const fileList = document.getElementById('file-list');

            // Prevent default drag behaviors
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, preventDefaults, false);
                document.body.addEventListener(eventName, preventDefaults, false);
            });

            // Highlight drop area when a file is dragged over it
            ['dragenter', 'dragover'].forEach(eventName => {
                dropArea.addEventListener(eventName, highlight, false);
            });

            // Unhighlight drop area when a file is dragged out of it
            ['dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, unhighlight, false);
            });

            // Handle dropped files
            dropArea.addEventListener('drop', handleDrop, false);

            // Handle file selection via input
            fileInput.addEventListener('change', handleFiles, false);

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            function highlight() {
                dropArea.classList.add('highlight');
            }

            function unhighlight() {
                dropArea.classList.remove('highlight');
            }

            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;

                handleFiles(files);
                fileInput.files = files; // Set the input files to the dropped files
            }

            function handleFiles(files) {
                fileList.innerHTML = ''; // Clear existing file list
                for (const file of files) {
                    displayFile(file);
                }
            }

            function displayFile(file) {
                const listItem = document.createElement('li');
                listItem.className = 'file-item';
                listItem.textContent = file.name;
                fileList.appendChild(listItem);
            }

            var form = document.querySelector('.custom-validation-form');

            form.addEventListener('submit', function (event) {
                clearErrorMessages();

                if (fileInput.files.length === 0) {
                    displayErrorMessage('file-input', 'Please select at least one file.');
                    event.preventDefault(); // Prevent form submission
                    return;
                }
            });

            function displayErrorMessage(fieldName, message) {
                var errorMessage = document.createElement('div');
                errorMessage.classList.add('error-message-custom');
                errorMessage.innerHTML = message;

                var inputField = document.getElementById(fieldName); 
                inputField.classList.add('is-invalid-custom');
                inputField.parentNode.appendChild(errorMessage);
            }

            function clearErrorMessages() {
                var errorMessages = document.querySelectorAll('.error-message-custom');
                errorMessages.forEach(function (errorMessage) {
                    errorMessage.parentNode.removeChild(errorMessage);
                });
            }
        });
    </script>
</head>

<body id="body-pd" class="body-pd">
    @include('layouts.dashboard-header')
    @include('layouts.dashboard-sidebar')
    <div class="height-100">
        <div class="pb-5">
            @yield('content')
        </div>
    </div>
    @include('shared.socket')
    @include('shared.cookie')
    @yield('javascript')
</body>

</html>
