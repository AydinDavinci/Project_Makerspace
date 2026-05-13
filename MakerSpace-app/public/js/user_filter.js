document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('user-search');

    if (!searchInput) return;

    searchInput.addEventListener('input', function () {
        const search = this.value.toLowerCase();
        const cards = document.querySelectorAll('.user-card.admin-user-card');

        cards.forEach(card => {
            const name = card.dataset.name || '';
            const email = card.dataset.email || '';
            const role = card.dataset.role || '';

            if (
                name.includes(search) ||
                email.includes(search) ||
                role.includes(search)
            ) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
});
