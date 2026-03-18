<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/app.scss', 'resources/js/app.js' , 'resources/js/advanced_settings.js'])
    <title>Document</title>

    @include("partials.header")
</head>
<body>
    <div class="container">
    <form action="{{ route('order-handeling') }}" method="POST">
        @csrf
        <label for="name">Product Name:</label>
        <input type="text" name="product_name" placeholder="Product Name"><br>
        
        <label for="description">Product Description:</label>
        <input type="text" name="product_description" placeholder="Product Description"><br>
        
        <label for="image">Product Image:</label>
        <input type="file" accept="png , jpg" name="product_image" placeholder="Product Image URL"><br>
        
        <label for="type_of_fillament" style="margin-left: 0px; margin-bottom: 10px; color: white;">Select a preferred fillament type <br></label>
        
        <select style="margin-left: 0px; margin-top: 20px; width: 220px;" name="type_of_fillament" id="type_of_fillament">
            <option value="pla">PLA</option>
            <option value="abs">ABS</option>
            <option value="petg">PETG</option>
        </select><br>
        <br>
        <label for="color-selecter" style="margin-left: 10px; margin-bottom: 10px; color: white;">Select a preferred color <br></label>
        <input class="color-selecter" type="color">
        </div>
        <button class="order-btn" type="submit">Place custom order</button>x
            </form>
        </div>
    </div>

        

</body>
</html>