<head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
            @vite(['resources/scss/app.scss', 'resources/js/app.js'])
            <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@100..900&display=swap" rel="stylesheet">
</head>

<header class="header">
    <div class="header__content">
        <div class="header__content-logo-container">
            <img class="Logo" src="{{ asset('images/Logo-large.png') }}" alt="Logo" width="130" height="40">
        </div>
         
        <div class="header__info">
            <div class="header__info__container">
                <a href="{{ route('model.custom_upload') }}" class="upload-btn"><i class="fa-solid fa-plus"></i>Create</a>     
                <span><i class="fa-regular fa-bell"></i></span>
                <img class="Logo" src="{{ asset('images/user-profilepic.png') }}" alt="profile_picture" width="40" height="40">
            </div>
        </div>
    </div>
    

</header>

<div class="sub-header">
    <div class="sub-header__container">
        <div class="sub-header__container__title">
            <h1>{{ Route::currentRouteName() }}</h1>
        </div>
        <div>   
            <ul>
                <a href=""><li>Dashboard</li></a>
                <a href="{{ route('catalog.view') }}"><li><span>Catalog</span></li></a>
                <a href=""><li>Instellingen</li></a>
                <a href=""><li>FAQ</li></a>
            </ul>
        </div>

    </div>

</div>

