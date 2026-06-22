<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard | VinciLab</title>
    <!-- <link rel="stylesheet" href="../css/app.css"> -->
    <link rel="stylesheet" href="{{ asset('../css/style.css') }}">
</head>

<body>
    @include('partials.header')

    <section class="main-section dashboard-main-section">

        <section class="queue">
            <h3>
                <i class="fa-solid fa-box-open"></i>
                Bestellingen
            </h3>

            <div class="queue__container">

                @foreach($orders as $o)
                <div class="queue__container__box ready-item-state">
                    <div class="queue__container__box__left">
                        <span class="queue__container__box__left--name">{{ $o->product_name }}</span>
                        <span class="queue__container__box__left--date">{{ $o->created_at }}</span>
                    </div>
                    <div class="queue__container__box__right">
                        <button class="card-btn">Bekijk</button>
                        <span class="queue__container__box__left--id">ID: {{ $o->id }}</span>
                    </div>
                </div>
                @endforeach
                <div class="card-placeholder"></div>
            </div>
        </section>


        <section class="dashboard-main-section-center">
            <div class="dashboard-sub-sections-container">
                <section class="dashboard-sub-section">
                    <h3>
                        <i class="fa-solid fa-inbox"></i>
                        Verzoeken
                    </h3>
                    <button>Bekijk</button>
                </section>

                <section class="dashboard-sub-section">
                    <h3>
                        <i class="fa-solid fa-clock-rotate-left"></i>
                        Geschiedenis
                    </h3>
                    <button>Bekijk</button>
                </section>
            </div>

            <section class="center-notis">
                <h3>
                    <i class="fa-regular fa-bell"></i>
                    Notificaties
                </h3>
                <div class="center-notis__container">
                    <div class="center-notis__container__box">
                        <div class="center-notis__container__box__left">
                            <div class="notification-status--unread"></div>
                            <span>Print 31 is klaar! Haal hem op bij de makerspace.</span>
                        </div>
                        <div class="center-notis__container__box__right">
                            <span>2u</span>
                        </div>
                    </div>

                    <div class="center-notis__container__box">
                        <div class="center-notis__container__box__left">
                            <div class="notification-status--unread"></div>
                            <span>Print 31 is klaar! Haal hem op bij de makerspace.</span>
                        </div>
                        <div class="center-notis__container__box__right">
                            <span>2u</span>
                        </div>
                    </div>

                    <div class="center-notis__container__box">
                        <div class="center-notis__container__box__left">
                            <div class="notification-status--unread"></div>
                            <span>Print 31 is klaar! Haal hem op bij de makerspace.</span>
                        </div>
                        <div class="center-notis__container__box__right">
                            <span>2u</span>
                        </div>
                    </div>

                    <div class="center-notis__container__box">
                        <div class="center-notis__container__box__left">
                            <div class="notification-status--unread"></div>
                            <span>Print 31 is klaar! Haal hem op bij de makerspace.</span>
                        </div>
                        <div class="center-notis__container__box__right">
                            <span>2u</span>
                        </div>
                    </div>

                    <div class="center-notis__container__box">
                        <div class="center-notis__container__box__left">
                            <div class="notification-status--read"></div>
                            <span>Print 31 is klaar! Haal hem op bij de makerspace.</span>
                        </div>
                        <div class="center-notis__container__box__right">
                            <span>2u</span>
                        </div>
                    </div>

                </div>
            </section>
        </section>

        <!-- right column -->
        <section class="dashboard-main-section__ready">
            <h3><i class="fa-solid fa-people-line"></i>Gebruikers</h3>
            <input type="text" id="dashboard-admin-usersearch" placeholder="Zoek gebruiker...">

            <div class="ready__container">

                @foreach($users as $u)
                <div class="ready__container__box">
                    <div class="ready__container__box__left">
                        <span class="ready__container__box__left--name">{{ $u->name }}</span>
                        <span class="ready__container__box__left--date">{{ $u->email }}</span>
                    </div>
                    <div class="ready__container__box__right">
                        <button class="card-btn">Beheer</button>
                        <span class="ready__container__box__left--id">ID: {{ $u->id }}</span>
                    </div>
                </div>
                @endforeach

                <!-- Placeholder card -->
                <div class="card-placeholder"></div>
            </div>
        </section>
    </section>

    @include('partials.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('dashboard-admin-usersearch');
            const container = document.querySelector('.ready__container');
            if (searchInput && container) {
                const cards = container.querySelectorAll('.ready__container__box');
                const placeholder = container.querySelector('.card-placeholder');

                searchInput.addEventListener('input', function() {
                    const query = searchInput.value.toLowerCase().trim();
                    let visibleCount = 0;

                    cards.forEach(card => {
                        const nameEl = card.querySelector('.ready__container__box__left--name');
                        const detailEl = card.querySelector('.ready__container__box__left--date');

                        const name = nameEl ? nameEl.textContent.toLowerCase() : '';
                        const detail = detailEl ? detailEl.textContent.toLowerCase() : '';

                        if (name.includes(query) || detail.includes(query)) {
                            card.style.display = 'flex';
                            visibleCount++;
                        } else {
                            card.style.display = 'none';
                        }
                    });

                    if (placeholder) {
                        if (query !== '' || visibleCount === 0) {
                            placeholder.style.display = 'none';
                        } else {
                            placeholder.style.display = 'block';
                        }
                    }
                });
            }
        });
    </script>
</body>

</html>