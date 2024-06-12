<!DOCTYPE html>
<html lang="en">
<?php include 'db_connection.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="icon" type="image/png" href="images/wheelzonrent-logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: url('images/hero-image-suppliers.jpg');
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: url('images/sign-in.gif');
            background-size: cover;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }

        .container img {
            width: 50%;
            height: auto;
        }

        .container h2 {
            margin-bottom: 25px;
            color: #333;
            font-weight: 500;
        }

        .container .input-group {
            position: relative;
            margin: 10px 0;
        }

        .container .input-group input {
            width: calc(100% - 40px);
            padding: 12px 12px 12px 30px;
            margin: 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .container .input-group .fa {
            position: absolute;
            left: 10px;
            top: 12px;
            font-size: 18px;
            color: #888;
        }

        .container .forgot-password {
            text-align: right;
            margin-bottom: 10px;
        }

        .container .forgot-password a {
            color: #007BFF;
            text-decoration: none;
            font-size: 14px;
        }

        .container .forgot-password a:hover {
            text-decoration: underline;
        }

        .container button {
            width: 100%;
            padding: 12px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            font-weight: 500;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-top: 10px;
        }

        .container button i {
            margin-right: 8px;
        }

        .container button:hover {
            background-color: #0056b3;
            transform: scale(1.02);
        }

        .container p {
            margin-top: 20px;
            color: #666;
        }

        .container a {
            color: #007BFF;
            text-decoration: none;
            font-weight: 500;
        }

        .container a:hover {
            text-decoration: underline;
        }

        .error {
            background-color: #f8d7da; 
            color: #721c24; 
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #f5c6cb; 
            border-radius: 5px;
        }

        .error p {
            margin: 0; 
        }
    </style>
</head>

<body>
    <div class="container">
        <img src="images/wheelzonrent-logo.png" alt="Logo">
        <h2>Sign In</h2>
        <form action="sign-in-submit.php" method="POST">
            <div class="input-group">
                <i class="fa fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <i class="fa fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>
            <div class="forgot-password">
                <a href="forgot-password.php">Forgot Password?</a>
            </div>
            <?php
                if (isset($_SESSION["password_error"])) {
                    echo '<div class="error">';
                    echo '<i class="fa fa-exclamation-circle"></i>'; // Error icon
                    echo "<p>{$_SESSION["password_error"]}</p>";
                    echo '</div>';
                    // Unset the session variable after displaying the error message
                    unset($_SESSION["password_error"]);
                    session_destroy();
                }
            ?>
            <button type="submit"><i class="fa fa-sign-in-alt"></i>Sign In</button>
        </form>
        <p>Don't have an account? <a href="sign-up.php">Sign Up</a></p>
        <p>Not now? <a href="index.php">Back to home</a></p>
    </div>
</body>

</html>