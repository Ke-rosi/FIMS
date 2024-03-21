function validateForm() {
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;

    // Regular expressions for validation
    let usernameRe = /^[a-zA-Z]+$/; // Only alphabetic characters
    let passwordRe = /^(?=.\d)(?=.[a-z])(?=.[A-Z])(?=.\W).{8,}$/; 


    if (!nameRe.test(username)) {
        alert("Username must contain only alphabetic characters");
        return false;
    }
 
    if (!passwordRe.test(password)) {
        alert("Password must be at least 8 characters including uppercase, lowercase, numbers, and special characters");
        return false;
    }

    let successful = "You, " + username + ", have successfully registered.";

    
    alert(successful);

    
    return true;
}