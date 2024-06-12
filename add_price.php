<?php
    include_once('./connection.php');

    $vehiclesTitle=$_POST['vehiclesTitle'];
    $pricePerDay=$_POST['pricePerDay'];

    $conn=connToDb();

    $query="UPDATE vehicle SET pricePerDay=? WHERE vehiclesTitle=?";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("ss",$pricePerDay, $vehiclesTitle,);

    if(!$stmt->execute()) {
        throw new Exception($stmt->error);
    }

    header('Location: managerDashBoard.php');
    exit();
?>