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
                <span>Welkom bij VinciLab! Eigen ontwerp of niet, <br> we hebben wat je zoekt!</span>
                <div class="home-header__buttons">
                    <button class="button-primary">Login</button><button class="button-secondary">Register</button>
                </div>
            </div>
            <div class="home-infoblock">
                <div class="home-infoblock__image">image</div>
                <div class="home-infoblock__text">
                    <div>
                        <h3>Welkom bij VinciLab!</h3>
                        Via deze website kun je eenvoudig jouw ontwerp uploaden en een printopdracht plaatsen. Kies het materiaal, formaat en de afwerking die het beste bij jouw project past. Ons team zorgt ervoor dat jouw ontwerp nauwkeurig en met zorg wordt geprint.
                    </div>
                </div>
            </div>
            <div class="home-infoblock">
                <div class="home-infoblock__text">
                    <div class="text-right">
                        <h3>Eigen ontwerp of niet!</h3>
                        Heb je geen eigen ontwerp, maar wil je toch een 3D print laten maken? Geen probleem! We hebben een uitgebreide catalogus met kant-en-klare ontwerpen waaruit je kunt kiezen. Of je nu een school project hebt of gewoon iets leuks wilt laten printen, bij VinciLab ben je aan het juiste adres!
                    </div>
                </div>
                <div class="home-infoblock__image">image</div>
            </div>
            <div class="home-ending">
                <h2>Student bij DaVinci College Dordrecht?</h2>
                <span>En wil je gebruik maken van onze 3D printers?</span>
                <a href="{{ route('register') }}"><button class="button-primary">Vraag je account aan!</button></a>
            </div>
        </section>
         @include('partials.footer')
</body>
</html>