<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instellingen | VinciLab</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
    @include('partials.header')

    <section class="settings-main-section">

        {{-- ── Left sidebar ─────────────────────────── --}}
        <aside class="settings-sidebar">
            <nav class="settings-sidebar__nav">
                <button class="settings-sidebar__nav-item active" onclick="showTab('account')">Account</button>
                <button class="settings-sidebar__nav-item" onclick="showTab('bestellingen')">Bestellingen</button>
                <button class="settings-sidebar__nav-item" onclick="showTab('overig')">Overig</button>
                @if(auth()->user()->role === 'admin')
                    <button class="settings-sidebar__nav-item" onclick="showTab('admin')">Admin</button>
                @endif
            </nav>

            <form method="POST" action="{{ route('logout') }}" class="settings-sidebar__logout-form">
                @csrf
                <button type="submit" class="settings-sidebar__logout-btn">Uitloggen</button>
            </form>
        </aside>

        {{-- ── Right content panel ──────────────────── --}}
        <div class="settings-panel">

            {{-- Account tab --}}
            <div id="tab-account" class="settings-tab active">
                @if(session('success'))
                    <div class="settings-alert">{{ session('success') }}</div>
                @endif

                <h2 class="settings-panel__title">Account instellingen</h2>
                <p class="settings-panel__subtitle">Verander hier je account instellingen en e-mail voorkeuren.</p>

                <div class="settings-panel__fields">

                    {{-- Full name row --}}
                    <div class="settings-field-group">
                        <label class="settings-label">Volledige naam</label>
                        <div class="settings-field-group__row">
                            <form action="{{ route('settings.updateUser') }}" method="POST" class="settings-inline-form">
                                @csrf
                                <input type="text" name="first_name" class="settings-input settings-input--half"
                                    placeholder="{{ explode(' ', $user->name)[0] ?? 'Voornaam' }}" value="{{ explode(' ', $user->name)[0] ?? '' }}">
                                <input type="text" name="last_name" class="settings-input settings-input--half"
                                    placeholder="{{ implode(' ', array_slice(explode(' ', $user->name), 1)) ?: 'Achternaam' }}"
                                    value="{{ implode(' ', array_slice(explode(' ', $user->name), 1)) }}">
                            </form>

                            {{-- Email --}}
                            <div class="settings-field-block">
                                <label class="settings-label">Email</label>
                                <input type="email" class="settings-input" value="{{ $user->email }}" readonly>
                            </div>
                        </div>
                    </div>

                    {{-- Username & Password row --}}
                    <div class="settings-field-group__row">
                        <div class="settings-field-block">
                            <label class="settings-label">Gebruikersnaam</label>
                            <form action="{{ route('settings.updateUser') }}" method="POST">
                                @csrf
                                <input type="text" name="username" class="settings-input" value="{{ $user->name }}">
                            </form>
                        </div>

                        <div class="settings-field-block">
                            <label class="settings-label">Wachtwoord</label>
                            <button class="settings-btn-outline" onclick="showTab('change-password')">Wijzig wachtwoord</button>
                        </div>
                    </div>

                    {{-- Student number --}}
                    <div class="settings-field-block">
                        <label class="settings-label">Studentennummer</label>
                        <input type="text" class="settings-input settings-input--medium"
                            value="{{ $user->student_number ?? '' }}" placeholder="00XXXXXXXX" readonly>
                    </div>

                </div>

                {{-- Footer meta --}}
                <div class="settings-panel__meta">
                    <span>Totale prints: {{ $user->total_prints }}</span>
                    <span>Rol: {{ ucfirst($user->role) }}</span>
                    <span>Lid sinds: {{ $user->created_at->format('d-n-Y') }}</span>
                </div>
            </div>

            {{-- Change Password (hidden sub-panel) --}}
            <div id="tab-change-password" class="settings-tab">
                <h2 class="settings-panel__title">Wachtwoord wijzigen</h2>
                <p class="settings-panel__subtitle">Voer je huidige en nieuwe wachtwoord in.</p>

                <form action="{{ route('settings.updatePassword') }}" method="POST" class="settings-panel__fields">
                    @csrf
                    <div class="settings-field-block">
                        <label class="settings-label">Huidig wachtwoord</label>
                        <input type="password" name="current_password" class="settings-input settings-input--medium" placeholder="Huidig wachtwoord" required>
                    </div>
                    <div class="settings-field-block">
                        <label class="settings-label">Nieuw wachtwoord</label>
                        <input type="password" name="password" class="settings-input settings-input--medium" placeholder="Nieuw wachtwoord" required>
                    </div>
                    <div class="settings-field-block">
                        <label class="settings-label">Bevestig nieuw wachtwoord</label>
                        <input type="password" name="password_confirmation" class="settings-input settings-input--medium" placeholder="Bevestig nieuw wachtwoord" required>
                    </div>
                    <div class="settings-panel__actions">
                        <button type="button" class="settings-btn-outline" onclick="showTab('account')">Annuleren</button>
                        <button type="submit" class="settings-btn-primary">Opslaan</button>
                    </div>
                </form>
            </div>

            {{-- Bestellingen tab --}}
            <div id="tab-bestellingen" class="settings-tab">
                <h2 class="settings-panel__title">Bestellingen</h2>
                <p class="settings-panel__subtitle">Bekijk je eerdere bestellingen en hun status.</p>

                <div class="settings-orders">
                    @forelse ($orders as $o)
                        <div class="settings-order-item">
                            <div class="settings-order-item__left">
                                <span class="settings-order-item__name">{{ $o->product_name }}</span>
                                <span class="settings-order-item__date">{{ $o->created_at->format('d/m/Y') }}</span>
                            </div>
                            <span class="settings-order-item__status settings-order-item__status--{{ $o->status }}">
                                {{ ucfirst($o->status) }}
                            </span>
                        </div>
                    @empty
                        <p class="settings-empty">Geen bestellingen gevonden.</p>
                    @endforelse
                </div>
            </div>

            {{-- Overig tab --}}
            <div id="tab-overig" class="settings-tab">
                <h2 class="settings-panel__title">Overige instellingen</h2>
                <p class="settings-panel__subtitle">Beheer thema en notificatie-voorkeuren.</p>

                <div class="settings-panel__fields">
                    <div class="settings-field-block">
                        <label class="settings-label">Thema</label>
                        <select id="theme" class="settings-input settings-input--medium">
                            <option value="dark">Dark mode</option>
                            <option value="light">Light mode</option>
                            <option value="system">Systeemstandaard</option>
                        </select>
                    </div>

                    <div class="settings-field-block">
                        <label class="settings-label">Taal</label>
                        <select class="settings-input settings-input--medium">
                            <option value="nl">Nederlands</option>
                            <option value="en">English</option>
                        </select>
                    </div>

                    <div class="settings-panel__actions">
                        <button class="settings-btn-primary">Opslaan</button>
                    </div>
                </div>
            </div>

            {{-- Admin tab --}}
            @if(auth()->user()->role === 'admin')
            <div id="tab-admin" class="settings-tab">
                <h2 class="settings-panel__title">Beheer gebruikers</h2>
                <p class="settings-panel__subtitle">Beheer accounts en rollen.</p>

                <input type="text" id="user-search" class="settings-input settings-input--search" placeholder="Zoek gebruikers of print operators...">

                <form method="POST" action="{{ route('settings.updateRolesBulk') }}">
                    @csrf

                    <h4 class="settings-admin__section-title">Gebruikers</h4>
                    @foreach(App\Models\User::where('role', 'user')->get() as $u)
                        <div class="settings-admin-card"
                            data-name="{{ strtolower($u->name) }}"
                            data-email="{{ strtolower($u->email) }}"
                            data-role="{{ strtolower($u->role) }}">
                            <div class="settings-admin-card__info">
                                <span class="settings-admin-card__name">{{ $u->name }}</span>
                                <span class="settings-admin-card__email">{{ $u->email }}</span>
                            </div>
                            <select name="roles[{{ $u->id }}]" class="settings-input settings-input--role">
                                <option value="user" {{ $u->role === 'user' ? 'selected' : '' }}>User</option>
                                <option value="print operator" {{ $u->role === 'print operator' ? 'selected' : '' }}>Print Operator</option>
                                <option value="admin" {{ $u->role === 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                    @endforeach

                    <h4 class="settings-admin__section-title">Print Operators</h4>
                    @foreach(App\Models\User::where('role', 'print operator')->get() as $u)
                        <div class="settings-admin-card"
                            data-name="{{ strtolower($u->name) }}"
                            data-email="{{ strtolower($u->email) }}"
                            data-role="{{ strtolower($u->role) }}">
                            <div class="settings-admin-card__info">
                                <span class="settings-admin-card__name">{{ $u->name }}</span>
                                <span class="settings-admin-card__email">{{ $u->email }}</span>
                            </div>
                            <select name="roles[{{ $u->id }}]" class="settings-input settings-input--role">
                                <option value="user" {{ $u->role === 'user' ? 'selected' : '' }}>User</option>
                                <option value="print operator" {{ $u->role === 'print operator' ? 'selected' : '' }}>Print Operator</option>
                                <option value="admin" {{ $u->role === 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                    @endforeach

                    <div class="settings-panel__actions">
                        <button type="submit" class="settings-btn-primary">Wijzigingen opslaan</button>
                    </div>
                </form>
            </div>
            @endif

        </div>{{-- /settings-panel --}}
    </section>

    @include('partials.footer')

    <script>
        function showTab(tabId) {
            document.querySelectorAll('.settings-tab').forEach(t => t.classList.remove('active'));
            document.querySelectorAll('.settings-sidebar__nav-item').forEach(b => b.classList.remove('active'));

            const panel = document.getElementById('tab-' + tabId);
            if (panel) panel.classList.add('active');

            const btn = document.querySelector(`[onclick="showTab('${tabId}')"]`);
            if (btn) btn.classList.add('active');
        }


        document.addEventListener('DOMContentLoaded', () => showTab('account'));
    </script>
    <script src='/js/light_or_darkmode.js'></script>
    <script src="/js/user_filter.js"></script>
</body>
</html>