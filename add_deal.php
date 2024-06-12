<?php
    include_once('./connection.php');

    $dealName=$_POST['dealName'];
    $expireDate=$_POST['expireDate'];
    $priceDiscount=$_POST['priceDiscount'];

    $conn=connToDb();

    $query="INSERT INTO specialDeal (dealName, expireDate, priceDiscount) VALUES (?,?,?)";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("sss",$dealName,$expireDate,$priceDiscount);

    if(!$stmt->execute()) {
        throw new Exception($stmt->error);
    }


    header('Location: managerDashBoard.php');
    exit();
?>