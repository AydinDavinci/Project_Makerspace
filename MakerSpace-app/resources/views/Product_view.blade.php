<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product View</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js' , 'resources/js/advanced_settings.js'])


</head>
<body>
    @include('partials.header')
    

<div class="Product">

    <h1 class="product-name">Test Print</h1>
    
    <div class="image-wrapper">
        <p style="color: #858585;" class="creator">Created by: Test Creator</p>
        <img style="width: 350px; height: 350px;" src="{{ asset('images/No_Image_Available.jpg') }}" alt="image-of-product">
        
        <div class="thumbnail-row">
            <img style="width: 50px; height: 50px;" src="{{ asset('images/No_Image_Available.jpg') }}" alt="image-of-product">
            <img style="width: 50px; height: 50px;" src="{{ asset('images/No_Image_Available.jpg') }}" alt="image-of-product">
            <img style="width: 50px; height: 50px;" src="{{ asset('images/No_Image_Available.jpg') }}" alt="image-of-product">
            <img style="width: 50px; height: 50px;" src="{{ asset('images/No_Image_Available.jpg') }}" alt="image-of-product">
            <img style="width: 50px; height: 50px;" src="{{ asset('images/No_Image_Available.jpg') }}" alt="image-of-product">        </div>
    </div>

    <form action="{{ route('order-handeling') }}" method="POST">
        @csrf
    <div class="rest">
        <p style="font-size: xx-large; margin-top: 125px; margin-left: 10px; color: white;" class="description" name="description"><span>Product</span> Description</p>
        <p style="font-size: medium; margin-left: 10px; color: white;" class="price">Estimated print time: 2 hours</p>

        <input type="checkbox"class=advanced_settings_checkbox id="advanced_settings_checkbox" name="advanced_settings_checkbox">Advanced settings<br>
        <div style="display: none;" class="advanced_settings">
        <label for="type_of_fillament" style="margin-left: 10px; margin-bottom: ; color: white;">Select a preferred fillament type <br></label>
        <select style="margin-left: 10px; margin-top: 20px; width: 220px;" name="type_of_fillament" id="type_of_fillament">
            <option value="pla">PLA</option>
            <option value="abs">ABS</option>
            <option value="petg">PETG</option>
            </select><br>
        <br>
        <label for="color-selecter" style="margin-left: 10px; margin-bottom: 10px; color: white;">Select a preferred color <br></label>
            <select class="color_select" name="color">
                <option value="red">red</option>
                <option value="orange">orange</option>
                <option value="yellow">yellow</option>
                <option value="white">white</option>
                <option value="green">green</option>
                <option value="blue">blue</option>
                <option value="black">black</option>
                <option value="gray">gray</option>
            </select>

        <input type="checkbox" class="advanced_settings_checkbox" id="advanced_settings_checkbox">
        <label for="advanced_settings_checkbox" style="color: white;">wel of geen print supports</label>
        
        <input type="text" class="extra-settings"placeholder = "Add extra settings like print speed , temp etc">
        
        <select name="print selector" id="print-selector">
            <option value="bambu">Bambu</option>
            <option value="creality">Creality</option>
            <option value="anycubic">Anycubic</option>
        </select>   
        </div>
        <button style=" margin-top: 20px; margin-left: 10px;" class="order-btn">Order now</button>
        </form>
    </div>
</div>


{{-- <img style="width: 250px; height: 250px;;" src="{{ asset('images/No_Image_Available.jpg') }}" alt="image-of-product"> --}}
  

</body>
</html>
 