window.showContainer = function(id) {
    const container = document.getElementById(id);
    if (!container) {
        return;
    }

    document.querySelectorAll('.settings-content .tab-panel').forEach(panel => {
        panel.style.display = panel.id === id ? 'block' : 'none';
    });
};