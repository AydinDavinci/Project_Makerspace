function showContainer(id) {
    const container = document.getElementById(id);
    addEventListener('click', function(event) {
    if (!container) {
        return;
    }
    document.querySelectorAll('.settings-content .tab-panel').forEach(panel => {
        panel.style.display = panel.id === id ? 'block' : 'none';
    })});
}

function openEditScreen(containerId) {
    const container = document.getElementById(containerId);
    addEventListener('click', function(event) {
        if (event.target.classList.contains('edit-btn')) {
            container.style.display = 'block';
        } else if (event.target.classList.contains('save_btn')) {
            container.style.display = 'none';
        }
    });
}