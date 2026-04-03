// Theme Management
function setTheme(theme) {
    const icon = document.getElementById('theme-icon');
    if (theme === 'light') {
        document.body.classList.add('light');
        if (icon) icon.innerText = '☀️';
    } else {
        document.body.classList.remove('light');
        if (icon) icon.innerText = '🌙';
    }
    localStorage.setItem('theme', theme);
}

function toggleTheme() {
    const isLight = document.body.classList.contains('light');
    setTheme(isLight ? 'dark' : 'light');
}

// Card Interaction
function toggle(id) {
    const body = document.getElementById('body-' + id);
    const icon = document.getElementById('icon-' + id);
    if (body) body.classList.toggle('hidden');
    if (icon) icon.classList.toggle('rotate-180');
}

// Initialization on DOM Load
document.addEventListener('DOMContentLoaded', () => {
    const savedTheme = localStorage.getItem('theme') || 'dark';
    setTheme(savedTheme);
});