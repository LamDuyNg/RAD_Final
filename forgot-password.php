<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="icon" type="image/png" href="images/wheelzonrent-logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: url('images/diego-jimenez-A-NVHPka9Rk-unsplash.jpg');
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: url('images/giphy.gif');
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
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            color: #888;
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
            margin-top: 20px;
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
    </style>
</head>

<body>

    <div class="container">
        <img src="images/wheelzonrent-logo.png" alt="Logo">
        <h2>Forgot Password</h2>
        <p>Enter your email address below and we'll send you instructions on how to reset your password.</p>
        <form action="/reset-password" method="POST">
            <div class="input-group">
                <i class="fa fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <button type="submit"><i class="fa fa-paper-plane"></i>Submit</button>
        </form>
        <p>Remember your password? <a href="sign-in.php">Sign In</a></p>
        <p>Not now? <a href="index.php">Back to home</a></p>
    </div>

</body>

</html>
