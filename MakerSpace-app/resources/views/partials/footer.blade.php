<footer class="footer"> 
    <div class="footer__content">
        <div>
            <h3>Links</h3>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="{{ route('catalog.view') }}">Catalog</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Credits</a></li>
            </ul>
        </div>

        <div class="footer__content__company">
            <img class="Logo" src="{{ asset('images/Logo-large.png') }}" alt="Logo" width="240">

            <div>
                Da Vinci College Dordrecht <br>
                Romboutslaan 34 <br>
                3312KP Dordrecht
            </div>

            <div class="sub-footer">
                <span class="sub-footer__span">
                    © <?php echo date("Y"); ?> VinciLab. All rights reserved.
                </span>
            </div>
        </div>

        <div>
            <h3>Account</h3>
            <ul>
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
                <li><a href="{{ route('password.request') }}">Forgot Password?</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </div>
    </div>
</footer>