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
    
    <section class="product-view"name="product-view">
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
                    
                    <div class="type_of_fillament_div">
                        <label class="type_of_fillament_label" for="type_of_fillament">Select a preferred fillament type <br>
                        <select class="type_of_fillament_dropdown" name="type_of_fillament" id="type_of_fillament_dropdown">
                            <option value="pla">PLA</option>
                            <option value="abs">ABS</option>
                            <option value="petg">PETG</option>
                        </select><br>
                        </label>
                    </div>


                    <div class="color_selector_div">
                        <label class="color_selector_label" for="color-selector">Select a preferred color <br>
                            <select class="color_selector_dropdown"style="margin-left: 10px; margin-top: 20px; width: 220px; height: 45px" name="color" >
                                <option value="red">RED</option>
                                <option value="orange">ORANGE</option>
                                <option value="yellow">YELLOW</option>
                                <option value="white">WHITE</option>
                                <option value="green">GREEN</option>
                                <option value="blue">BLUE</option>
                                <option value="black">BLACK</option>
                                <option value="gray">GRAY</option>
                            </select>
                        <br>        
                        </label>
                    </div>


                    <div class="print-supports_div">
                        <label class="print_support_label" for="print_support_label">Disable print supports 
                        <input class="print_support_checkbox" type="checkbox" id="print_support_checkbox">
                        </label>
                    </div>

                    <div class="extra_settings_div">
                        <label class="extra-settings_label" for="extra-settings_input">Add extra settings
                        <input class="extra-settings_input" type="text" placeholder = "Add extra settings like print speed , temp etc">
                        </label>
                    </div>


                    <div class="print_selector_div">
                        <label class="print_selector_label" for="print_selector_dropdown">Select a preferred printer<br>
                        <select class="print_selector_dropdown" style="margin-left: 10px; margin-top: 20px; width: 220px;height: 45px" name="print selector" id="print_selector_dropdown">
                            <option value="bambu">Bambu</option>
                            <option value="creality">Creality</option>
                            <option value="anycubic">Anycubic</option>
                        </select>   
                        </label>
                    </div>

                </div>

                <button style=" margin-top: 20px; margin-left: 10px;" class="order-btn">Order now</button>
                </form>

            </div>
        </div>
    </section>

{{-- <img style="width: 250px; height: 250px;;" src="{{ asset('images/No_Image_Available.jpg') }}" alt="image-of-product"> --}}
  

<footer>
    @include('partials.footer') 
</footer>
</body>
</html>
 