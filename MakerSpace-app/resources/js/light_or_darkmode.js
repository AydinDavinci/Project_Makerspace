let dropdown = document.getElementById('theme');

function applyTheme(theme) {
    if (theme === 'system') {
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        document.documentElement.setAttribute('data-theme', prefersDark ? 'dark' : 'light');
    }else{

        document.documentElement.setAttribute('data-theme', theme);
    }
}  

document.addEventListener('DOMContentLoaded', function() {
    const savedTheme = localStorage.getItem('theme') || 'system';
    console.log('Saved theme:', savedTheme);
    applyTheme(savedTheme);
    if (dropdown) {
        dropdown.value = savedTheme;
        dropdown.addEventListener('change', function() {
            const selectedTheme = this.value;
            applyTheme(selectedTheme);
            localStorage.setItem('theme', selectedTheme);
        });
    }
});

