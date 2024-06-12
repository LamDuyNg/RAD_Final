<?php
    include_once('./connection.php');

    $vehiclesTitle=$_POST['vehiclesTitle'];
    $modelYear=$_POST['modelYear'];
    $brand=$_POST['brand'];
    $overview=$_POST['vehiclesOverview'];
    $features=$_POST['features'];
    $photo=$_POST['photoURL'];

    $conn=connToDb();

    $query="INSERT INTO vehicle (vehiclesTitle, modelYear, brandID, vehiclesOverview, features, photoURL) VALUES (?,?,?,?,?,?)";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("siisss",$vehiclesTitle, $modelYear,$brand,$overview,$features,$photo );

    if(!$stmt->execute()) {
        throw new Exception($stmt->error);
    }

    header('Location: managerDashBoard.php');
    exit();
?>