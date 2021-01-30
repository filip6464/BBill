const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="email"]');

emailInput.addEventListener('keyup',() => {
    validateEmail(emailInput);
});