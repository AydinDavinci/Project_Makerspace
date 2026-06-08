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
                <i class="fa-solid fa-list-check"></i>
                Wachtrij
            </h3>
            <div class="queue__container">
                <div class="queue__container__box queue-item-state--accepted">
                   <div class="queue__container__box__left">
                    <span class="queue__container__box__left--name">Naam</span>
                    <span class="queue__container__box__left--date">dd/mm/yyyy</span>
                   </div>
                   <div class="queue__container__box__right">
                   
                    <span class="queue__container__box__left--state">Akkoord</span>
                    <span class="queue__container__box__left--id">ID: 001</span>
                   </div>
                    
                </div>
                <div class="queue__container__box queue-item-state--denied">
                   <div class="queue__container__box__left">
                    <span class="queue__container__box__left--name">Naam</span>
                    <span class="queue__container__box__left--date">dd/mm/yyyy</span>
                   </div>
                   <div class="queue__container__box__right">
                    <span class="queue__container__box__left--state">Geweigerd</span>
                    <span class="queue__container__box__left--id">ID: 002</span>
                   </div>
                    
                </div>
                <div class="queue__container__box queue-item-state--pending">
                   <div class="queue__container__box__left">
                    <span class="queue__container__box__left--name">Naam</span>
                    <span class="queue__container__box__left--date">dd/mm/yyyy</span>
                   </div>
                   <div class="queue__container__box__right">
                    <span class="queue__container__box__left--state">Lopend</span>
                    <span class="queue__container__box__left--id">ID: 003</span>
                   </div>
                    
                </div>

            </div>
        </section>

        <!-- center row -->
        <section class="dashboard-main-section-center">

            <section class="center-overzicht">
                <h3>
                    <i class="fa-solid fa-table-columns"></i>
                    Overzicht
                </h3>
                <div class="center-overzicht-container">
                    <div class="center-overzicht-container-box">
                        <div class="center-overzicht-container-box__content">
                            <div>
                                <!-- aantal objecten geprint -->
                                <h3>0</h3>
                                <span>Totaal geprinte objecten</span>
                            </div>
                            <span class="content-icon">
                                <i class="fa-solid fa-cube"></i>
                            </span>
                        </div>
                    </div>


                     <div class="center-overzicht-container-box">
                        <div class="center-overzicht-container-box__content">
                            <span class="content-icon">
                                <i class="fa-solid fa-list-check"></i>
                            </span>
                            <div>
                                <!-- aantal in de wachtrij -->
                                <h3>0</h3>
                                <span>In de wachtrij</span>
                            </div>

                        </div>
                    </div>


                     <div class="center-overzicht-container-box">
                        <div class="center-overzicht-container-box__content">
                            <div>
                                <!-- aantal prints deze week -->
                                <h3>0/0</h3>
                                <span>Prints voor deze week</span>
                            </div>
                            <span class="content-icon">
                                <i class="fa-regular fa-calendar-days"></i>
                            </span>
                        </div>
                    </div>


                     <div class="center-overzicht-container-box">
                        <div class="center-overzicht-container-box__content">
                            <span class="content-icon">
                                <i class="fa-regular fa-bell"></i>
                            </span>
                            <div>
                                <!-- aantal objecten geprint -->
                                <h3>0</h3>
                                <span>Notificaties</span>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <section class="center-notis">
                <h3>
                    <i class="fa-regular fa-bell"></i>
                    Notifications
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
            <h3><i class="fa-solid fa-cube"></i>Gereed</h3>
            <div class="ready__container">
                <div class="ready__container__box ready-item-state">
                   <div class="ready__container__box__left">
                    <span class="ready__container__box__left--name">Naam</span>
                    <span class="ready__container__box__left--date">dd/mm/yyyy</span>
                   </div>
                   <div class="ready__container__box__right">
                    <span class="ready__container__box__left--state">Gereed</span>
                    <span class="ready__container__box__left--id">ID: 004</span>
                   </div>
                </div>
                <div class="ready__container__box ready-item-state">
                   <div class="ready__container__box__left">
                    <span class="ready__container__box__left--name">Naam</span>
                    <span class="ready__container__box__left--date">dd/mm/yyyy</span>
                   </div>
                   <div class="ready__container__box__right">
                    <span class="ready__container__box__left--state">Gereed</span>
                    <span class="ready__container__box__left--id">ID: 005</span>
                   </div>
                </div>
                <div class="ready__container__box ready-item-state">
                   <div class="ready__container__box__left">
                    <span class="ready__container__box__left--name">Naam</span>
                    <span class="ready__container__box__left--date">dd/mm/yyyy</span>
                   </div>
                   <div class="ready__container__box__right">
                    <span class="ready__container__box__left--state">Gereed</span>
                    <span class="ready__container__box__left--id">ID: 006</span>
                   </div>
                </div>
            </div>
        </section>
    </section>
    
    @include('partials.footer')
</body>
</html>