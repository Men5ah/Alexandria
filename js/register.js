document.getElementById('btn').addEventListener('click', function (event) {
    event.preventDefault();

    const fname = document.getElementById('fname').value.trim();
    const lname = document.getElementById('lname').value.trim();
    const email = document.getElementById('email').value.trim();
    const tel = document.getElementById('tel').value.trim();
    const psswd = document.getElementById('psswd').value.trim();
    const repsswd = document.getElementById('repsswd').value.trim();
    const pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;

    if (fname === '') {
        alert('Please enter your first name.');
        return;
    }

    if (lname === '') {
        alert('Please enter your last name.');
        return;
    }

    if (email === '') {
        alert('Please enter your email address.');
        return;
    }

    if (tel === '') {
        alert('Please enter your telephone number.');
        return;
    }

    if (!pattern.test(psswd)) {
        alert('Password must contain at least one digit, one lowercase and one uppercase letter, and be between 6 to 20 characters long.');
        return;
    }

    if (psswd === '') {
        alert('Please enter a password.');
        return;
    }

    if (repsswd === '') {
        alert('Please confirm your password.');
        return;
    }

    if (psswd !== repsswd) {
        alert('Passwords do not match.');
        return;
    }

    // If all validation passes, submit the form
    document.querySelector('form').submit();
});
