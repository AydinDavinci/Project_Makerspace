<head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
            @vite(['resources/scss/app.scss', 'resources/js/app.js'])
            <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@100..900&display=swap" rel="stylesheet">
</head>

@php
    $avatarUrl = auth()->check() ? auth()->user()->avatar_url : asset('images/user-profilepic.png');
    $initials = auth()->check() ? strtoupper(substr(auth()->user()->name, 0, 2)) : '';
@endphp

<header class="header">
    <div class="header__content">
        <div class="header__content-logo-container">
            <a href="{{ route('Home') }}"><img class="Logo" src="{{ asset('images/Logo-large.png') }}" alt="Logo" width="130" height="40"></a>
        </div>
         
        <div class="header__info">
            <div class="header__info__container">
                <a href="{{ route('model.custom_upload') }}" class="upload-btn"><i class="fa-solid fa-plus"></i>Create</a>     
                <span><i class="fa-regular fa-bell"></i></span>
                <div class="dropdown">
                <div class="avatar-container">
                    <img class="avatar-bg" src="{{ $avatarUrl }}" alt="avatar background">
                    @if($initials)
                        <div class="avatar-initials">{{ $initials }}</div>
                    @endif
                </div>
                    
                 <div class="dropdown-content">
                        <a class="profile" href="{{ route('profile.edit') }}">Profile</a>
                        <a class="logout" href="{{ route('logout') }}">Logout</a>
                        <a class="settings" href="{{ route('settings') }}">Settings</a>
                        {{-- <a class="settings" href="{{ route('settings') }}">settings</a> --}}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</header>
<!-- sub header -->
<div class="sub-header">
    <div class="sub-header__container">
        @php
            $pageTitles = [
                'Home'                   => 'Home',
                'catalog.view'           => 'Catalog',
                'product.view'           => 'Product',
                'model.custom_upload'    => 'Upload',
                'model.custom_upload.post' => 'Upload Details',
                'order-page'             => 'Order',
                'order-handeling' => 'Order Submitted',
                'dashboard'              => 'Dashboard',
                'profile.edit'           => 'Profile',
                'login'                  => 'Login',
            ];
            $pageTitle = $pageTitles[Route::currentRouteName()] ?? '';
        @endphp
        <div class="sub-header__container__title">
            <h1>{{ $pageTitle }}</h1>
        </div>
        <div class="sub-header__container__nav">
            <ul>
                <a href="{{ route('dashboard') }}"><li>Dashboard</li></a>
                <a href="{{ route('catalog.view') }}"><li>Catalog</li></a>
                <a href="{{ route('settings') }}"><li>Instellingen</li></a>
                <a href="{{ route('faq') }}"><li>FAQ</li></a>
            </ul>
        </div>

    </div>

</div>

