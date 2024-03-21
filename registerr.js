function validateForm() {
   
    let email = document.getElementById("email").value;
    let telephone = document.getElementById("telephone").value;
   let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confirm_password").value;

    // Regular expressions for validation
   let emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
    let telephoneRe = /^0[0-9]{9}$/; 
    let passwordRe = /^(?=.\d)(?=.[a-z])(?=.[A-Z])(?=.\W).{8,}$/; 
    let usernameRe = /^[a-zA-Z]+$/; // Only alphabetic characters


    
    if (!emailRe.test(email)) {
        alert("Please enter a valid email address");
        return false;
    }

    // Check if telephone number is valid
    if (!telephoneRe.test(telephone)) {
        alert("Please enter a valid telephone number (format: 0711111111)");
        return false;
    }
   
    if (!nameRe.test(username)) {
        alert("Username must contain only alphabetic characters");
        return false;
    }
 
    if (!passwordRe.test(password)) {
        alert("Password must be at least 8 characters including uppercase, lowercase, numbers, and special characters");
        return false;
    }

    
    if (password !== confirmPassword) {
        alert("Passwords do not match");
        return false;
    }

    
    let successful = "You, " + username + ", have successfully registered.";

    
    alert(successful);

    
    return true;
}