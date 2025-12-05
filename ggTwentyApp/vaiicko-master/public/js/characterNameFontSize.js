function adjustCharacterNames() {
    const cards = document.querySelectorAll('.character-name');

    cards.forEach(el => {
        el.style.fontSize = '1.2rem';
        let size = parseFloat(window.getComputedStyle(el).fontSize);

        while (el.scrollWidth > el.offsetWidth && size > 8) {
            size -= 0.5;
            el.style.fontSize = size + 'px';
        }
    });
}
// Event listeners for correct sizing
document.addEventListener("DOMContentLoaded", adjustCharacterNames);
window.addEventListener("load", adjustCharacterNames);
window.addEventListener("resize", adjustCharacterNames);