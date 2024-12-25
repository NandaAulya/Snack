document.addEventListener('DOMContentLoaded', () => {
    const maxLength = 100;
    document.querySelectorAll('.truncate-description').forEach(el => {
        if (el.textContent.length > maxLength) {
            el.textContent = el.textContent.slice(0, maxLength) + '...';
        }
    });
});