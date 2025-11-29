document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector(".form-signin");
    const password = document.getElementById("password");
    const confirm = document.getElementById("confirm-password");

    if (!form) return; // keď niekde nepoužiješ tento formulár

    form.addEventListener("submit", function(e) {
        if (password.value !== confirm.value) {
            e.preventDefault();
            alert("Heslá sa nezhodujú!");
        }
    });
});