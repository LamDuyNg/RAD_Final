<?php
// Include database connection file
include 'db_connection.php';

// Initialize variables to store user input
$email = $enter_password = '';
$email_err = $password_err = '';

// Check if form is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username/email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $enter_password = $_POST["password"];
    }

    // Check for input errors before querying the database
    if (empty($email_err) && empty($password_err)) {
        // Prepare a SELECT statement
        $sql = "SELECT CusAccID, username, email, password FROM customeraccount WHERE email = ?";

        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_email);

            // Set parameters
            $param_email = $email;
            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();

                // Check if username/email exists, if yes then verify password
                if ($stmt->num_rows == 1) {
                    // Bind result variables
                    $stmt->bind_result($CusAccID, $username, $email, $hashedpassword);
                    if ($stmt->fetch()) {
                        if (password_verify($enter_password, $hashedpassword)) {
                            // Password is correct, start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["email"] = $email;

                            // Redirect user to welcome page
                            header("location: index.php");
                        } else {
                            // Display an error message if password is not valid
                            // session_start();
                            // $password_err = "The password you entered is not valid.";
                            // $_SESSION["password_error"] = $password_err;
                            // header("location: sign-in.php");
                        }
                    }
                } else {
                    // Display an error message if username/email doesn't exist
                    $email_err = "No account found with that username/email.";
                    $_SESSION["email_error"] = $email_err;
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $conn->close();
}
?>