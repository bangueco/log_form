const firstNameField = document.querySelector("#firstName");
const lastNameField = document.querySelector("#lastName");
const errorMsg = document.querySelectorAll(".error");

const inCheckBox = document.querySelector("#inCheckBox");
const outCheckBox = document.querySelector("#outCheckBox");

const submitButton = document.querySelector("button");

const fieldEmptyCheck = () => {
    if (firstNameField.value.length === 0 || lastNameField.value.length === 0) {
        submitButton.disabled = true;
    } else if (firstNameField.value.length >= 1 && lastNameField.value.length >= 1) {
        submitButton.disabled = false;
    }
}

const fieldErrorMsg = () => {
    if (firstNameField.value.length === 0) errorMsg[0].classList.remove("invi");
    if (lastNameField.value.length === 0) errorMsg[1].classList.remove("invi");

    if (firstNameField.value.length >= 1) errorMsg[0].classList.add("invi");
    if (lastNameField.value.length >= 1) errorMsg[1].classList.add("invi");
}

firstNameField.addEventListener('keyup', () => {
    fieldEmptyCheck();
    fieldErrormsg();
});
lastNameField.addEventListener('keyup', () => {
    fieldEmptyCheck();
    fieldErrorMsg();
});