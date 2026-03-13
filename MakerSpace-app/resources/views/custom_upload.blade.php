<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/app.scss', 'resources/js/app.js' , 'resources/js/custom_upload.js'])
    <title>Document</title>
</head>
<body>
    @include('partials.header')


    <h1 class="custom-upload-title">Custom Upload</h1>
    <p class="subtitle">Here you can upload your own 3D model to be printed!</p>
    <div class="custom-upload">

        <label tooltip="Upload a file" for="file-upload" class="upload-label">

        <div class="upload-icon">
            <svg width="40" height="40" fill="#3b3b3b" viewBox="0 0 24 24">
                <path d="M12 2L6 8h4v6h4V8h4l-6-6zM6 18v2h12v-2H6z"/>
            </svg>

        <div class="upload-instructions">
            <p>drag and drop your model file here</p>
            <p>Available formats .stl .cad .gcode .3fm</p>
        </div>
        </div>
        <form action="{{ route('order-handeling') }}" method="POST">
            @csrf
            <button type="submit" class="Upload-file-btn">Upload</button>
        </form>     
        </label>

        <p id="filename-display" class="filename"></p>
        <input style="display: none;" type="file" id="file-upload" name="model" accept=".stl,.cad, .gcode ,.3fm">

    </div>

</body>
</html>