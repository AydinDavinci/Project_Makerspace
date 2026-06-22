<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard | VinciLab</title>
    <!-- <link rel="stylesheet" href="../css/app.css"> -->
    <link rel="stylesheet" href="{{ asset('../css/style.css') }}">
    @vite(['resources/scss/app.scss', 'resources/js/app.js', 'resources/js/custom_upload.js'])

</head>

<body>
    @include('partials.Popup')
    @include('partials.header')
    <!-- left row -->

    <section class="main-section dashboard-main-section">
        <section class="queue">
            <h3>
                <i class="fa-solid fa-list-check"></i>
                Wachtrij
            </h3>
            <div class="queue__container">
                @foreach ($order as $o)
                    <div class="queue__container__box queue-item-state--{{ $o->status }}">
                        <div class="queue__container__box__left">
                            <span class="queue__container__box__left--name">{{ $o->product_name }}</span>
                            <span class="queue__container__box__left--date">{{ $o->created_at->format('d/m/Y') }}</span>
                        </div>
                        <div class="queue__container__box__right">
                            <span class="queue__container__box__left--state">{{ ucfirst($o->status) }}</span>
                            <span class="queue__container__box__left--id">ID: 00{{ $o->id }}</span>
                        </div>
                        @if ($o->status === 'completed')
                        @endif
                    </div>
                @endforeach


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
                                <h3>{{ $user->total_prints }}</h3>
                                @if ($user->total_prints === 0)
                                    <span>Geen prints gemaakt</span>
                                @else
                                    <span>Totaal geprinte objecten</span>
                                @endif
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
                                <h3>{{ $user->orders()->where('status', 'pending')->count() }}</h3>
                                <span>In de wachtrij</span>
                            </div>

                        </div>
                    </div>


                    <div class="center-overzicht-container-box">
                        <div class="center-overzicht-container-box__content">
                            <div>
                                <!-- aantal prints deze week -->
                                <h3>{{ $user->orders()->where('status', ['pending', 'accepted', 'denied', 'completed'])->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->limit(5)->count() }}/5
                                </h3>
                                @if ($user->orders()->where('status', ['pending', 'accepted', 'denied', 'completed'])->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->limit(5)->count() >= 5)
                                    <span style="color: red">Geen prints meer deze week</span>
                                @else
                                    <span>Prints voor deze week</span>
                                @endif
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
                                <h3>{{ $unreadCount ?? 0 }}</h3>
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
                    @forelse(($notifications ?? collect()) as $notification)
                        <div class="center-notis__container__box">
                            <div class="center-notis__container__box__left">
                                <div class="{{ $notification->read_at ? 'notification-status--read' : 'notification-status--unread' }}"></div>

                                <span>
                                    {{ $notification->data['message'] ?? 'Notification' }}
                                </span>
                            </div>

                            <div class="center-notis__container__box__right">
                                <span>{{ optional($notification->created_at)->diffForHumans() ?? '' }}</span>
                            </div>
                        </div>
                    @empty
                        <div class="center-notis__container__box">
                            <div class="center-notis__container__box__left">
                                <div class="notification-status--read"></div>
                                <span>No notifications yet.</span>
                            </div>
                            <div class="center-notis__container__box__right">
                                <span></span>
                            </div>
                        </div>
                    @endforelse
                </div>
            </section>


        </section>

        <!-- right row -->
        <section class="dashboard-main-section__ready">
            <h3><i class="fa-solid fa-cube"></i>Gereed</h3>
            <div class="ready__container">
                @foreach ($order as $o)
                    @if ($o->status === 'completed')
                        <div class="ready__container__box ready-item-state">
                            <div class="ready__container__box__left">
                                <span class="ready__container__box__left--name">{{ $o->product_name }}</span>
                                <span
                                    class="ready__container__box__left--date">{{ $o->created_at->format('d/m/Y') }}</span>
                            </div>
                            <div class="ready__container__box__right">
                                <span class="ready__container__box__left--state">ready for pickup✓</span>
                                <span class="ready__container__box__left--id">ID: 00{{ $o->id }}</span>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
    </section>
    
    @include('partials.footer')
</body>

<script src='/js/light_or_darkmode.js'></script>

</html>
