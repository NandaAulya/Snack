document.addEventListener('DOMContentLoaded', () => {
    const registerForm = document.getElementById('registerForm');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirm-password');
    const showPassword = document.getElementById('show-password');

    registerForm.addEventListener('submit', (event) => {
        if (password.value !== confirmPassword.value) {
            event.preventDefault();
            alert('Passwords do not match. Please try again.');
        }
    });

    showPassword.addEventListener('change', (event) => {
        const type = event.target.checked ? 'text' : 'password';
        password.type = type;
        confirmPassword.type = type;
    });
});