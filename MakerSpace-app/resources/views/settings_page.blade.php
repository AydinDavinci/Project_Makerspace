<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    

     
    <title>Settings | VinciLab</title>
</head>
<body>
    @include("partials.header")

<div class="Main-settings-container">
    <div class="settings-header">
        <h2 class = "settings-title">Settings</h2>
        <nav class="settings-nav">
            
            <ul class= nav-buttons>
                <li><button onclick="showContainer('profile-container')">Account</button></li>
                <li><button onclick="showContainer('Order-container')">Orders</button></li>
                <li><button onclick="showContainer('other-container')">Other</button></li>
                @if(auth()->user()->role === 'admin')
                <li><button onclick="showContainer('admin-container')">Admin</button></li>
                @endif
            </ul>
            
        </nav>
    </div>
    <div class="settings-content">
        
        {{-- <img src="#" alt="avatar" width="100" height="100" class="rounded-circle"> --}}
        
        <div id="profile-container" class="profile_content tab-panel" style="display: none">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <h3 class="settings-content-title">Account settings</h3>
            <p class="settings-content-description">Manage your account settings and set e-mail preferences.</p>
            <div class="user-card">
            <p><strong>Username:</strong> {{ $user->name }} <button  onclick="openEditScreen('username-edit-container')" class="edit-btn">edit</button></p>
            <form id="username-edit-container" action="{{ route('settings.updateUser') }}" method="POST" style="display: none">
                    @csrf
                    <label for="username"><strong>Username:</strong></label>
                    <input type="text" id="username" name="username" value="{{ $user->name }}" required>
                    <button type="submit" class="save_btn">Save</button>
            </form>
           
            
            <p><strong>Email:</strong> {{ $user->email }} <br><br>
            
           
            <p> <strong>Edit Password:</strong><button  onclick="openEditScreen('password-edit-container')" class="edit-btn">edit</button></p>
            <form id ='password-edit-container' action="{{ route('settings.updatePassword') }}" method= "POST" style="display: none">
                @csrf
                <strong>Current password</strong><input type="password" placeholder=" Current password" required> <br>

                <strong>New password:</strong><input type="password" placeholder=" New password" required> <br>
                <strong>Confirm new password:</strong><input type="password" placeholder=" Confirm new password" required><br>
                <button type="submit" class="save_btn">Save</button>
            </form>

            <p><strong>Member since:</strong> {{ $user->created_at->format('F j, Y') }}</p> 
            <hr>
            <p><strong>Total Prints:</strong> {{ $user->total_prints }}</p>
            <hr>
            <p><strong>Role:</strong> {{ $user->role }}</p>
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


            <p>Language:</p>
            <select class="languages">
                <option value="english">English</option>
                <option value="dutch">Dutch</option>
            </select>  

            <p>Theme:</p>
            <select id="theme" class="theme">
                <option value="dark">Dark mode</option>
                <option value="light">Light mode</option>
                <option value="system">System default</option>
            </select>
            
            <br><br>
            <label class="switch">
                <input type="checkbox" checked> Enable Notifications
                <span class="slider round"></span>
            </label>

            <p>Save your changes:</p>
            <button class="save_btn">Save Changes</button>


        </div>

        <div id="admin-container" class="profile_content tab-panel" style="display: none">
            <h3>Admin Settings</h3>
            <p>Manage administrative settings and user accounts.</p>
            <p><strong>Manage Users:</strong> <button class="edit-btn-admin" onclick="showContainer('all-users')">User Management</button></p>
            
        </div>
        
        <div id="all-users" class="profile_content tab-panel" style="display: none">
            <input type="text" id="user-search" placeholder="Search users or print operators...">
           <form method="POST" action="{{ route('settings.updateRolesBulk') }}">
                @csrf
            <h4>all regular users</h4>
                @foreach(App\Models\User::where('role', 'user')->get() as $user)
                    <div class="user-card admin-user-card"
                        data-name="{{ strtolower($user->name) }}"
                        data-email="{{ strtolower($user->email) }}"
                        data-role="{{ strtolower($user->role) }}">
                        <p><strong>Name:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Role:</strong> {{ $user->role }}</p> 
                        
                        <select name="roles[{{ $user->id }}]"class="Role dropdown" name="role">
                            <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>user</option>
                            <option value="print operator" {{ $user->role === 'print operator' ? 'selected' : '' }}>Print Operator</option>
                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>
                <br>
             @endforeach

            <br>
                <h4>all print operators</h4>
                    @foreach(App\Models\User::where('role', 'Print operator')->get() as $user)
                        <div class="user-card admin-user-card"
                            
                            data-name="{{ strtolower($user->name) }}"
                            data-email="{{ strtolower($user->email) }}"
                            data-role="{{ strtolower($user->role) }}">  
                            <p><strong>Name:</strong> {{ $user->name }}</p>
                            <p><strong>Email:</strong> {{ $user->email }}</p>
                            <p><strong>Role:</strong> {{ $user->role }}</p>

                            <select name="roles[{{ $user->id }}]" class="Role dropdown">
                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                <option value="print operator" {{ $user->role === 'print operator' ? 'selected' : '' }}>Print Operator</option>
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                    <br>
                @endforeach
                <button type="submit" class="save_btn">Save changes</button>
            </form>
        </div>
    </div>
</div>



<script src="/js/user_filter.js"></script>
<script src='/js/show_container.js'></script>
<script src='/js/light_or_darkmode.js'></script>


</body>
<footer>
    @include("partials.footer")
</html>