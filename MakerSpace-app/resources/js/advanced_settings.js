const hiddenSettings = document.querySelector('.advanced_settings');
const checkbox = document.getElementById('advanced_settings_checkbox');

checkbox.addEventListener('change', function() {
    if (this.checked) {
        hiddenSettings.style.display = 'block';
    } else {
        hiddenSettings.style.display = 'none';
    }
});