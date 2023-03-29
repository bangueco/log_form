const form = document.querySelector("#log_form");
const firstNameField = document.querySelector("#firstName");
const lastNameField = document.querySelector("#lastName");
const errorMsg = document.querySelectorAll(".error");

const inCheckBox = document.querySelector("#inCheckBox");
const outCheckBox = document.querySelector("#outCheckBox");

const submitButton = document.querySelector("button");

const fieldErrorMsg = () => {
    if (firstNameField.value.length <= 0) {
        errorMsg[0].classList.remove("invi");
    } else {
        errorMsg[0].classList.add("invi")
    }

    if (lastNameField.value.length <= 0) {
        errorMsg[1].classList.remove("invi");
    } else {
        errorMsg[1].classList.add("invi");
    }
}

const checkBoxOutState = () => {
    if (inCheckBox.checked === true) outCheckBox.disabled = true;
    if (inCheckBox.checked === false) outCheckBox.disabled = false;
}

const checkBoxInState = () => {
    if (outCheckBox.checked === true) inCheckBox.disabled = true;
    if (outCheckBox.checked === false) inCheckBox.disabled = false;
}

form.addEventListener('submit', log => {

    if (firstNameField.value.length === 0 || lastNameField.value.length === 0) {
        log.preventDefault();
        fieldErrorMsg();

        firstNameField.addEventListener('keyup', () => fieldErrorMsg());
        lastNameField.addEventListener('keyup', () => fieldErrorMsg());
    }
})

inCheckBox.addEventListener('click', checkBoxOutState);
outCheckBox.addEventListener('click', checkBoxInState);