<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard | VinciLab</title>
    <!-- <link rel="stylesheet" href="../css/app.css"> -->
    <link rel="stylesheet" href="{{ asset('../css/style.css') }}">
</head>

<body>
    @include('partials.header')

    <!-- List for the orders in queue -->
    <section class="main-section dashboard-main-section">

        <section class="queue">
            <h3>
                <i class="fa-solid fa-box-open"></i>
                Orders
            </h3>

            <!-- List of orders -->
            <div class="queue__container">

                <!-- Order card  -->
                <div class="queue__container__box ready-item-state">
                    <div class="queue__container__box__left">
                        <span class="queue__container__box__left--name">Test print</span>
                        <span class="queue__container__box__left--date">dd-mm-yyyy</span>
                    </div>
                    <div class="queue__container__box__right">
                        <button class="card-btn">View</button>
                        <span class="queue__container__box__left--id">ID: ???</span>
                    </div>
                </div>










          
            </div>
        </section>


        <!-- Container for the misc options -->
        <section class="dashboard-main-section-center">
            <div class="dashboard-sub-sections-container">
                <section class="dashboard-sub-section">
                    <h3>
                        <i class="fa-solid fa-inbox"></i>
                        Requests
                    </h3>
                    <button>View</button>
                </section>

                <section class="dashboard-sub-section">
                    <h3>
                        <i class="fa-solid fa-clock-rotate-left"></i>
                        History
                    </h3>
                    <button>View</button>
                </section>
            </div>


            <!-- Container for the notifications -->
            <section class="center-notis">
                <h3>
                    <i class="fa-regular fa-bell"></i>
                    Notifications
                </h3>
                <!-- List of notifications -->
                <div class="center-notis__container">
                    <!-- Notification card -->




 

 

                </div>
            </section>
        </section>

        <!-- COntainer for the users -->
        <section class="dashboard-main-section__ready">
            <h3><i class="fa-solid fa-people-line"></i>Users</h3>
            <!-- User search bar -->
            <input type="text" id="dashboard-admin-usersearch" placeholder="Search user...">

            <!-- List of users -->
            <div class="ready__container">


                <!-- User card -->
                <div class="ready__container__box">
                    <div class="ready__container__box__left">
                        <span class="ready__container__box__left--name">Test user</span>
                        <span class="ready__container__box__left--date">00XXXXXX</span>
                    </div>
                    <div class="ready__container__box__right">
                        <button class="card-btn">Manage</button>
                        <span class="ready__container__box__left--id">ID: ???</span>
                    </div>
                </div>









                <!-- Placeholder card -->
                <div class="card-placeholder"></div>
            </div>
        </section>
    </section>

    @include('partials.footer')

    <!-- script for the user search bar -->
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