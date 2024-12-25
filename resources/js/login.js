document.addEventListener('DOMContentLoaded', () => {
    const password = document.getElementById('password');
    const showPassword = document.getElementById('show-password');

    showPassword.addEventListener('change', (event) => {
        const type = event.target.checked ? 'text' : 'password';
        password.type = type;
    });
});