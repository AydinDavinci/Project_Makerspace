<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home | VinciLab</title>
    <!-- <link rel="stylesheet" href="../css/app.css"> -->
    <link rel="stylesheet" href="{{ asset('../css/style.css') }}">

</head>

<body>
    @include('partials.header')
        <section class="main-section" id="home-section">
            <div class="home-header">
                <img class="Logo" src="{{ asset('images/Logo-large.png') }}" alt="Logo" width="564" height="164">
                <span>Welcome to VinciLab! Own design or not, <br> we have what you're looking for!</span>
                <div class="home-header__buttons">
                    <button class="button-primary">Login</button><button class="button-secondary">Register</button>
                </div>
            </div>
            <div class="home-infoblock">
                <div class="home-infoblock__image"><img src="{{ asset('images/homepage/IMG_0833.jpg') }}" alt="home_image1"></div>
                <div class="home-infoblock__text">
                    <div>
                        <h3>Welcome to VinciLab!</h3>
                        Via deze website kun je eenvoudig jouw ontwerp uploaden en een printopdracht plaatsen. Kies het materiaal, formaat en de afwerking die het beste bij jouw project past. Ons team zorgt ervoor dat jouw ontwerp nauwkeurig en met zorg wordt geprint.
                    </div>
                </div>
            </div>
            <div class="home-infoblock">
                <div class="home-infoblock__text">
                    <div class="text-right">
                        <h3>Own design or not!</h3>
                        Do you have your own design, but still want a 3D print made? No problem! We have an extensive catalog with ready-to-use designs from which you can choose. Whether you have a school project or just want to print something fun, at VinciLab you are at the right address!
                    </div>
                </div>
                <div class="home-infoblock__image"><img src="{{ asset('images/homepage/IMG_0815.jpg') }}" alt="home_image2"></div>
            </div>
            <div class="home-ending">
                <div class="home-infoblock__image"><img src="{{ asset('images/homepage/IMG_0834.jpg') }}" alt="home_image1"></div>
                <h2>Student at DaVinci College Dordrecht?</h2>
                <span>And do you want to use our 3D printers?</span>
                <a href="{{ route('register') }}"><button class="button-primary">Request your account!</button></a>
            </div>
        </section>
         @include('partials.footer')
</body>
</html>