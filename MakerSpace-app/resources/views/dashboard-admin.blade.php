<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard | VinciLab</title>
    <!-- <link rel="stylesheet" href="../css/app.css"> -->
    <link rel="stylesheet" href="{{ asset('../css/style.css') }}">

</head>

<body>
    @include('partials.header')

    <!-- left row -->
    <section class="main-section dashboard-main-section">
        <section class="queue">
            <h3>
                <i class="fa-solid fa-box-open"></i>
                Bestellingen
            </h3>
        </section>

        <!-- center row -->
        <section class="dashboard-main-section-center">
            <section class="dashboard-sub-section">
                <h3>
                    <i class="fa-solid fa-warehouse"></i>
                    Inventaris
                </h3>
                <button>Bekijk</button>
            </section>

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
                            <span>0s</span>
                        </div>
                    </div>
                    <div class="center-notis__container__box">
                        
                        <div class="center-notis__container__box__left">

                            <div class="notification-status--unread"></div>
                            <span>Print 31 is klaar! Haal hem op bij de makerspace.</span>

                        </div>

                        <div class="center-notis__container__box__right">
                            <span>0s</span>
                        </div>
                    </div>
                    <div class="center-notis__container__box">
                        
                        <div class="center-notis__container__box__left">

                            <div class="notification-status--read"></div>
                            <span>Print 31 is klaar! Haal hem op bij de makerspace.</span>

                        </div>

                        <div class="center-notis__container__box__right">
                            <span>0s</span>
                        </div>
                    </div>
                </div>
            </section>

        </section>
        
        <!-- right row -->
        <section class="dashboard-main-section__ready">
            <h3><i class="fa-solid fa-people-line"></i>Gebruikers</h3>
            <input type="text">
        </section>
    </section>
    
    @include('partials.footer')
</body>
</html>