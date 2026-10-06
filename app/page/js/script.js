// THEME TOGGLE
const themeBtn = document.getElementById('themeToggle');


const saveTheme = localStorage.getItem('theme');
if (saveTheme === 'light') {
    document.documentElement.classList.add('light');
    if (themeBtn) themeBtn.textContent = '☀️';
}

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
document.addEventListener("keydown", (event) => {

    if (event.key === "n" || event.key === "N"){
        const isLight = document.documentElement.classList.toggle('light');
        if (isLight) {
            themeBtn.textContent = '☀️';
          } else {
            themeBtn.textContent = '🌙';
          }
        
    }
})
