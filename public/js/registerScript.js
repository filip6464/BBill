const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="email"]');
const confirmedPasswordInput = form.querySelector('input[name="password2"]');

emailInput.addEventListener('keyup',() => {
    validateEmail(emailInput);
});
confirmedPasswordInput.addEventListener('keyup', () =>{
    validatePassword(confirmedPasswordInput);
});
