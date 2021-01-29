function isEmail(email){
    return /\S+@\S+\.\S+/.test(email);
}

function arePasswordsSame(password, password2){
    return password === password2;
}

function markValidation(element, condition) {
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

function validateEmail(element) {
    console.log("validateEmail");
    setTimeout(function () {
            markValidation(element, isEmail(element.value));
        },
        1000
    );
}

function validatePassword(element) {
    console.log("validatePassword");
    setTimeout(function () {
            const condition = arePasswordsSame(
                element.previousElementSibling.value,
                element.value
            );
            markValidation(element, condition);
        },
        1000
    );
}