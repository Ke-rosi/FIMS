function validateForm() {
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    
    // Regular expressions for validation
    let emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    let passwordRe = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}$/;

    if (!emailRe.test(email)) {
        alert("Please enter a valid email address");
        return false;
    }

    if (!passwordRe.test(password)) {
        alert("Password must be at least 8 characters including uppercase, lowercase, numbers, and special characters");
        return false;
    }

    
    let successful = "You, " + username + ", have successfully Logged in.";
    alert(successful);

    return true;
}
