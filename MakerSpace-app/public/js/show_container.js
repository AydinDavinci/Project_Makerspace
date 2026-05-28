window.showContainer = function(id) {
    const container = document.getElementById(id);
    if (!container) {
        return;
    }

    document.querySelectorAll('.settings-content .tab-panel').forEach(panel => {
        panel.style.display = panel.id === id ? 'block' : 'none';
    });
};

window.openEditScreen = function(containerId) {
    const container = document.getElementById(containerId);
    if (!container) {
        return;
    }
    container.style.display = 'block';
};

window.closeEditScreen = function(containerId) {
    const container = document.getElementById(containerId);
    if (!container) {
        return;
    }
    container.style.display = 'none';
};