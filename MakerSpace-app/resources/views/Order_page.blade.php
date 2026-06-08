<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

</head>
<body>
    @include('partials.header')



    <div class="Order_submit">
    <h1>Your order has been placed!</h1>
    <p>Estimated print time: 20 hours</p>
    <p>Thank you for your order!</p>
    
    <p>You'll recieve an update when the printing is complete.</p>

        <a href="{{ route('catalog.view') }}" class="HomeBtn" style="margin-top: 20px; margin-left: 10px;">Continue Shopping</a>
    </div>

</body>
</html>