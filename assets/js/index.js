const firstNameField = document.querySelector("#firstName");
const lastNameField = document.querySelector("#lastName");
const errorMsg = document.querySelectorAll(".error");

const submitButton = document.querySelector("button");

const fieldEmptyCheck = () => {
    if (firstNameField.value.length === 0 || lastNameField.value.length === 0) {
        if (firstNameField.value.length === 0) errorMsg[0].classList.remove("invi");
        if (lastNameField.value.length === 0) errorMsg[1].classList.remove("invi");
        submitButton.disabled = true;
    } else if (firstNameField.value.length >= 1 || lastNameField.value.length >= 1) {
        if (firstNameField.value.length >= 1) errorMsg[0].classList.add("invi");
        if (lastNameField.value.length >= 1) errorMsg[1].classList.add("invi");
        submitButton.disabled = false;
    }
}

firstNameField.addEventListener('keyup', () => fieldEmptyCheck());
lastNameField.addEventListener('keyup', () => fieldEmptyCheck());