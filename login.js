document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('loginForm');
    const username = document.getElementById('username');
    const password = document.getElementById('password');

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        if (validateForm()) {
            form.submit();
        }
    });

    function validateForm() {
        let valid = true;

        if (username.value.trim() === '') {
            setErrorFor(username, 'Username cannot be blank');
            valid = false;
        } else {
            setSuccessFor(username);
        }

        if (password.value.trim() === '') {
            setErrorFor(password, 'Password cannot be blank');
            valid = false;
        } else {
            setSuccessFor(password);
        }

        return valid;
    }

    function setErrorFor(input, message) {
        const formControl = input.parentElement;
        const errorMessage = formControl.querySelector('small');

        formControl.className = 'form-control error';
        errorMessage.innerText = message;
    }

    function setSuccessFor(input) {
        const formControl = input.parentElement;
        formControl.className = 'form-control success';
    }
});
