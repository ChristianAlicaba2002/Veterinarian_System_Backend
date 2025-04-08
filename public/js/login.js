const passwordInput = document.getElementById("password");
  const toggleIcon = document.getElementById("togglePassword");

  toggleIcon.style.display = "none";

  passwordInput.addEventListener("input", function () {
    toggleIcon.style.display = this.value.length > 0 ? "block" : "none";
  });

  toggleIcon.addEventListener("click", function () {
    const isPassword = passwordInput.type === "password";
    passwordInput.type = isPassword ? "text" : "password";
    toggleIcon.classList.toggle("fa-eye-slash", !isPassword);
    toggleIcon.classList.toggle("fa-eye", isPassword);
  });