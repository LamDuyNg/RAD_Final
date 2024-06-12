<?php
session_start();
include_once('./connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['managerName'] ?? "";
    $pass = $_POST['password'] ?? "";

    $resutl=login($user,$pass);
    if($resutl==True){
        $_SESSION['managerName']=$user;
        header('Location:managerDashBoard.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./js/">
    <link rel="stylesheet" href="./image/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <title>Manager Login</title>
</head>
<body>
    <div class="container w-25">
        <div class="row">
            <div class="col">
                <form class="border p-3 mt-5" action="" method="post">
                    <div class="text-center">LOGIN</div>
                    <hr>
                    <div class="form-group">
                        <label for="">Username</label> 
                        <div class="input-group">
                            <i class="bi bi-person-circle input-group-text d-flex align-middle"></i>
                            <input type="text" name="managerName" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <div class="input-group">
                            <i class="bi bi-person-lock input-group-text d-flex align-middle"></i>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="form-check">
                        <label for="" class="form-check-label mt-4">
                            <input type="checkbox" class="form-check-input">Remember me  
                        </label>
                    </div>

                    <div class="d-flex justify-content-evenly mt-3">
                        <button type="submit" class="btn btn-primary">Login</button>
                        <button type="button" class="btn">Forgot Password?</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
