<html lang="en">

<head>
    <title>Catalog | VinciLab</title>
    <!-- <link rel="stylesheet" href="../css/app.css"> -->
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    {{-- <link rel="stylesheet" href="{{ asset('../css/style.css') }}"> --}}



</head>

<body>
    @include('partials.header')
    <section class="main-section">
        <div class="main-section__catalog">
            <div class="main-section__filter">
                <div class="main-section__filter-search">
                    <input type="text" placeholder="Zoek op titel, studentnummer...">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <div class="main-section__filter-options">
                    <span>Naam</span>
                    <ul>
                        <li><i class="fa-solid fa-arrow-up-a-z "></i><span>A-Z</span></li>
                        <li><i class="fa-solid fa-arrow-up-z-a"></i><span>Z-A</span></li>
                    </ul>
                    <span>Datum</span>
                    <ul>
                        <li><i class="fa-solid fa-arrow-up-a-z"></i><span>nieuw-oud</span></li>
                        <li><i class="fa-solid fa-arrow-up-z-a"></i><span>oud-nieuw</span></li>
                    </ul>
                </div>
            </div>
            <div class="main-section__overview">
                <div class="item">
                    <div class="item__info">

                        @foreach ($items as $item)
                        <div class="catalog__card">
                            <div class="item__image">
                                <img style="width: 200px; height: 150px;" src="{{ asset('images/' . $item->item_image) }}" alt="image-of-product">
                            </div>

                            <div class="item__title">{{ $item->item_name }}</div>

                            <div class="item__details">{{ $item->item_details }}</div>

                            <div class="item__details">
                                <div class="item__details-date">{{ $item->item_date }}</div>
                                <div>
                                    <a href="{{ route('product.view', ['id' => $item->id]) }}" class="item__details-button">
                                        <button>Details</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
            </div>
        </div>
    </section>
@include('partials.footer')


</body>

</html>