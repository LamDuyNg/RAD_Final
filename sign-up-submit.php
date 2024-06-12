<?php
include 'db_connection.php';

$username = $email = $password = '';
$username_err = $email_err = $password_err = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $username = trim($_POST["username"]);
    }
    
    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter an email.";
    } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format.";
    } else {
        $email = trim($_POST["email"]);
    }
    
    // Validate password
    if (empty(trim($_POST["confirm_password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["confirm_password"])) < 6) {
        $password_err = "Password must have at least 6 characters.";
    } else {
        $password = $_POST["confirm_password"];
    }
    
    // Check input errors before inserting into database
    if (empty($username_err) && empty($email_err) || empty($password_err)) {
        
        // Prepare an insert statement
        $sql = "INSERT INTO customeraccount (username, email, password) VALUES (?, ?, ?)";
        
        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sss", $param_username, $param_email, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            
            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to login page
                header("location: sign-in.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }
            
            // Close statement
            $stmt->close();
        }
    }
    
    // Close connection
    $conn->close();
} else {
    echo 'error';
}
?>