const togglePassword = document.getElementById("togglePassword");

if (togglePassword) {
    togglePassword.addEventListener("click", function () {
        const password = document.getElementById("password");
        const eyeOpen = document.getElementById("eyeOpen");
        const eyeClose = document.getElementById("eyeClose");

        if (password.type === "password") {
            password.type = "text";
            eyeOpen.classList.add("hidden");
            eyeClose.classList.remove("hidden");
        } else {
            password.type = "password";
            eyeOpen.classList.remove("hidden");
            eyeClose.classList.add("hidden");
        }
    });
} const togglePasswordConfirmation = document.getElementById("togglePasswordConfirmation");

if (togglePasswordConfirmation) {
    togglePasswordConfirmation.addEventListener("click", function () {
        const password = document.getElementById("password_confirmation");
        const eyeOpen = document.getElementById("eyeOpenConfirm");
        const eyeClose = document.getElementById("eyeCloseConfirm");

        if (password.type === "password") {
            password.type = "text";
            eyeOpen.classList.add("hidden");
            eyeClose.classList.remove("hidden");
        } else {
            password.type = "password";
            eyeOpen.classList.remove("hidden");
            eyeClose.classList.add("hidden");
        }
    });
}
