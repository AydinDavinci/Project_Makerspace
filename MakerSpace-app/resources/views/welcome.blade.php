<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js' , 'resources/js/advanced_settings.js'])

</head>
<body>

    <?php 
        @include('partials/header.php');
    echo 'hello world'
    ?>
    
</body>
</html>