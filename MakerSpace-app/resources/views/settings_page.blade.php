<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     @vite(['resources/scss/app.scss', 'resources/js/app.js' , 'resources/js/show_container.js'])
    <title>Settings | VinciLab</title>
</head>
<body>
    @include("partials.header")

<div class="Main-settings-container">
    <div class="settings-header">
        <h2 class = "settings-title">Settings</h2>
        <nav class="settings-nav">
            
            <ul>
                <button onclick="showContainer('profile-container')">Account</button>
                <button onclick="showContainer('Order-container')">Orders</button>
                <button onclick="showContainer('other-container')">other</button>
            </ul>
        </nav>
    </div>
    <div class="settings-content">
        
        {{-- <img src="#" alt="avatar" width="100" height="100" class="rounded-circle"> --}}
        
        <div id="profile-container" class="profile_content tab-panel" style="display: none">
            <h2 class="settings-content-title">Account settings</h2>
            <p class="settings-content-description">Manage your account settings and set e-mail preferences.</p>
            <div class="user-card">
            <p><strong>Username:</strong> {{ $user->name }} <button class="edit-btn">✏️</button></p>
            <p><strong>Email:</strong> {{ $user->email }}<button class="edit-btn">✏️</button></p>
            <p><strong>Member since:</strong> {{ $user->created_at->format('F j, Y') }}</p> 
            </div>
        </div>
        
        <div id="Order-container" class="order_content tab-panel" style="display: none">        
            <h3>Order History</h3>
            <p>View your past orders and their status.</p>
            @foreach ($orders as $o )
                <div class="order-item">
                    <p>{{ $o->product_name }}</p>
                    <p>{{ $o->created_at }}</p>
                    <p>{{ $o->status }}</p>

                </div>
            @endforeach
        </div>


        <div id="other-container" class="other_content tab-panel" style="display: none">
            <h3>Other Settings</h3>
            <p>Manage your other preferences.</p>
            <select class="languages">
                <option value="english">English</option>
                <option value="dutch">Dutch</option>
            </select>

            <select class="theme">
                <option value="dark">Dark mode</option>
                <option value="light">Light mode</option>
                <option value="system">System default</option>
            </select>
            <button class="save_btn">Save Changes</button>


        </div>
    </div>

</body>
<footer>
    @include("partials.footer")
</html>