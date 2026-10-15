// THEME TOGGLE
const themeBtn = document.getElementById('themeToggle');

if (themeBtn) {
    themeBtn.addEventListener('click', () => {
        const isLight = document.documentElement.classList.toggle('light');
        if (isLight) {
            themeBtn.textContent = '☀️';
        } else {
            themeBtn.textContent = '🌙';
        }
        
    });
}


document.querySelectorAll(".page-collection-marque-show").forEach((bouton) => {
    bouton.addEventListener("click", () => {
        bouton.classList.toggle("active");
        bouton.previousElementSibling.classList.toggle("maxify");
    });
});

toggleConsole("nintendo");
toggleConsole("playstation");
toggleConsole("sega");
