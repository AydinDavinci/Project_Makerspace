@if(session("order_success"))
    <div id="toast_container" class="toast-container success">
        <div class="toast-content">
            <h2>Success</h2>
            <p class="description">Your changes are saved successfully!</p>
        </div>
        <button id="toast_close" class="toast-close">×</button>
    </div>


    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const toast = document.getElementById('toast_container');
            if (!toast) return;

            requestAnimationFrame(() => toast.classList.add('show'));
            setTimeout(() => toast.classList.remove('show'), 3500);
            const closeBtn = document.getElementById('toast_close');
            closeBtn.addEventListener('click', () => toast.classList.remove('show'));
        });
    </script>
@endif