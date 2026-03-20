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
                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit<br> sed do eiusmod tempor,</span>
                <div class="home-header__buttons">
                    <button class="button-primary">Login</button><button class="button-secondary">Register</button>
                </div>
            </div>
            <div class="home-infoblock">
                <div class="home-infoblock__image">image</div>
                <div class="home-infoblock__text">
                    <div>
                        <h3>Title</h3>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                </div>
            </div>
            <div class="home-infoblock">
                <div class="home-infoblock__text text-right">
                    <h3>Title</h3>
                </div>
                <div class="home-infoblock__image">image</div>
            </div>
            <div class="home-ending">
                <h2>Student bij DaVinci College Dordrecht?</h2>
                <span>Wil je gebruik maken van de 3D printers en <br>ben je student bij DaVinci College Dordrecht?</span>
                <a href="{{ route('register') }}"><button class="button-primary">Vraag je account aan!</button></a>
            </div>
        </section>
         @include('partials.footer')
</body>
</html>