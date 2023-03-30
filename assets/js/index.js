const form = document.querySelector("#log_form");
const firstNameField = document.querySelector("#firstName");
const lastNameField = document.querySelector("#lastName");
const errorMsg = document.querySelectorAll(".error");
const checkBoxErrorMsg = document.querySelector(".checkbox-error");

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

    if (inCheckBox.checked === false && outCheckBox.checked === false) {
        checkBoxErrorMsg.classList.remove("invi");
    } else {
        checkBoxErrorMsg.classList.add("invi");
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

const isChecked = () => {
    if (inCheckBox.checked === true || outCheckBox.checked === true) checkBoxErrorMsg.classList.add("invi");
}

form.addEventListener('submit', log => {

    if (firstNameField.value.length === 0 || lastNameField.value.length === 0 || inCheckBox.checked === false && outCheckBox.checked === false) {
        log.preventDefault();
        fieldErrorMsg();

        firstNameField.addEventListener('keyup', () => fieldErrorMsg());
        lastNameField.addEventListener('keyup', () => fieldErrorMsg());
        inCheckBox.addEventListener('click', isChecked);
        outCheckBox.addEventListener('click', isChecked);
    }
})

inCheckBox.addEventListener('click', checkBoxOutState);
outCheckBox.addEventListener('click', checkBoxInState);