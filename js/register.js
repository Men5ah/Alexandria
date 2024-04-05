// formValidation.js
window.onload = function() {
    document.getElementById("registrationForm").onsubmit = function() {
        // Validate first name
        var firstName = document.getElementById("fname").value;
        if (firstName.trim() === "") {
            alert("Please enter your first name.");
            return false; // Prevent form submission
        }

        // Validate last name
        var lastName = document.getElementById("lname").value;
        if (lastName.trim() === "") {
            alert("Please enter your last name.");
            return false; // Prevent form submission
        }

        // Validate email
        var email = document.getElementById("email").value;
        if (email.trim() === "") {
            alert("Please enter your email address.");
            return false; // Prevent form submission
        }

        // Validate telephone
        var telephone = document.getElementById("tel").value;
        if (telephone.trim() === "") {
            alert("Please enter your telephone number.");
            return false; // Prevent form submission
        }

        // Validate password
        var password1 = document.getElementById("psswd").value;
        if (password1.trim() === "") {
            alert("Please enter a password.");
            return false; // Prevent form submission
        }

        // Validate confirm password
        var password2 = document.getElementById("repsswd").value;
        if (password2.trim() === "") {
            alert("Please confirm your password.");
            return false; // Prevent form submission
        }

        // Validate passwords match
        if (password1 !== password2) {
            alert("Passwords do not match!");
            return false; // Prevent form submission
        }

        // Validate password using regex
        var passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
        if (!passwordPattern.test(password1)) {
            alert("Password must contain at least one digit, one lowercase and one uppercase letter, and be between 6 to 20 characters long.");
            return false; // Prevent form submission
        }

        // Form validation passed
        return true; // Allow form submission
    };
};
