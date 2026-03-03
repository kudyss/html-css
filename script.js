const form = document.getElementById("booking-form");
const error = document.getElementById("error");
const popup = document.getElementById("popup");
const closePopup = document.getElementById("closePopup");

form.addEventListener("submit", function(e) {
  e.preventDefault();

  const name = document.getElementById("name").value.trim();
  const email = document.getElementById("email").value.trim();

  const nameRegex = /^[A-Za-zÁ-ž\s]{2,}$/;
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  error.textContent = "";

  // Validace
  if (!nameRegex.test(name)) {
    error.textContent = "Zadejte platné jméno.";
    return;
  }

  if (!emailRegex.test(email)) {
    error.textContent = "Zadejte platný e-mail.";
    return;
  }

  // Otevři popup
  popup.style.display = "flex";

  form.reset();
});

// Zavření popup
closePopup.addEventListener("click", function() {
  popup.style.display = "none";
});
