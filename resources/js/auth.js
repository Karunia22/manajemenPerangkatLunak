// =============================================
// TOGGLE VISIBILITY PASSWORD
// =============================================
window.togglePassword = function (inputId) {
    const input = document.getElementById(inputId);
    const iconShow = document.getElementById('icon-show-' + inputId);
    const iconHide = document.getElementById('icon-hide-' + inputId);

    if (!input || !iconShow || !iconHide) return;

    if (input.type === 'password') {
        input.type = 'text';
        iconShow.classList.add('hidden');
        iconHide.classList.remove('hidden');
    } else {
        input.type = 'password';
        iconShow.classList.remove('hidden');
        iconHide.classList.add('hidden');
    }
}
