<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/app.scss', 'resources/js/app.js' , 'resources/js/advanced_settings.js'])
    <title>Custom Upload Info | VinciLab</title>

    @include("partials.header")
</head>
<body>
    <div class="container">
    <form action="{{ route('model.custom_order.post') }}" method="POST">
        @csrf
        <label for="name">Product Name:</label>
        <input type="text" name="product_name" placeholder="Product Name"><br>
        
        <label for="description">Product Description:</label>
        <input type="text" name="product_description" placeholder="Product Description"><br>
        
        <label for="image">Product Image:</label>
        <div class="upload_img">
        <input type="file" accept="png , jpg" name="product_image" placeholder="Product Image"><br>
        </div>
        <input type="checkbox"class=advanced_settings_checkbox id="advanced_settings_checkbox" name="advanced_settings_checkbox">Advanced settings<br>
                <div style="display: none;" class="settings_block advanced_settings">
                    <div class="settings_block type_of_fillament_div">
                    <label class="type_of_fillament_label" for="type_of_fillament">Select a preferred fillament type <br></label>
                        <select class="type_of_fillament_dropdown" name="type_of_fillament" id="type_of_fillament_dropdown">
                            <option value="pla">PLA</option>
                            <option value="abs">ABS</option>
                            <option value="petg">PETG</option>
                        </select><br>   
                    </div>


                    <div class="settings_block color_selector_div">
                        <label class="color_selector_label" for="color-selector">Select a preferred color</label>
                            <select class="color_selector_dropdown" name="color" >
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
                        
                    </div>

                    <div class="settings_block print_selector_div">
                        <label class="print_selector_label" for="print_selector_dropdown">Select a preferred printer</label>
                        <select class="print_selector_dropdown" name="print selector" id="print_selector_dropdown">
                            <option value="bambu">BAMBU</option>
                            <option value="creality">CREALITY</option>
                            <option value="anycubic">ANYCUBIC</option>
                        </select>   
                    </div>
                    
                    

                    <input type="checkbox" class=advanced_support_settings_checkbox id="advanced_support_settings_checkbox" name="advanced_support_settings_checkbox">Advanced Support settings<br>
                        <div style="display: none;" class="settings_block advanced_support_settings" >
                            <div class="settings_block print-supports_div">
                                <label class="print_support_label" for="print_support_label">Select specific support type </label>
                                    <select class="print_support_dropdown" name="print selector" id="print_support_dropdown">
                                        <option value="bambu">TREE</option>
                                        <option value="creality">ORGANIC</option>
                                        <option value="anycubic">REGULAR</option>
                                        <option value="none">NONE</option>
                                    </select> 

                                    <p style="Color: red; width: 100%;" class="support_warning" id="support_warning"></p>
                                <input class="print_support_checkbox" type="checkbox" id="print_support_checkbox">
                            </div>
                        </div>

                    
                    <input type="checkbox" class=advanced_support_settings_checkbox id="advanced_infill_settings_checkbox" name="advanced_infill_settings_checkbox">Advanced Infill settings<br>
                        <div style="display: none;" class="settings_block advanced_infill_settings" >
                            <div class="settings_block print-supports_div">
                                <label class="print_support_label" for="print_support_label">Select infill density (base 15%) </label>
                                    <input type="range" min="1" max="30" value="0" class="slider" id="myRange">
                                    <span id="rangeValue">0%</span>
                            </div>
                        </div>
        </div>

        <button class="order-btn" type="submit">Place custom order</button>
            </form>
        </div>
    </div>

        

</body>
<script src='/js/light_or_darkmode.js'></script>
</html>