document.querySelector('.form-form').addEventListener('submit', function(e) {
    const emailInput = document.querySelector('input[name="email"]');
    if (!emailInput.value.includes('@')) {
      alert("Veuillez entrer une adresse e-mail valide.");
      e.preventDefault();
    }
  });
"use strict";
feather.replace();