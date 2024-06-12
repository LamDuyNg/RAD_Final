<?php
    include_once('connection.php');

    function insertStaff($customerAccountData,$customerData){
        $conn=connToDb();

        $query="INSERT INTO staffAccount(email,password) VALUES (?,?)";

        $passHash=password_hash($customerAccountData['password'],PASSWORD_DEFAULT);
        $stmt=$conn->prepare($query);
        $stmt->bind_param("ss",$customerAccountData['email'],$passHash);

        if(!$stmt->execute()) {
            throw new Exception($stmt->error);
        }

        $staffAccID = $conn->insert_id;

        $query1="INSERT INTO staff(fullName,StaffAccID) VALUES (?,?)";
        
        $stmt1=$conn->prepare($query1);
        $stmt1->bind_param("si",$customerData['fullName'],$staffAccID);
        
        if(!$stmt1->execute()) {
            throw new Exception($stmt1->error);
        }
    }


    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get form data
        $customerAccountData = [
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];
    
        $customerData = [
            'fullName' => $_POST['fullName']
        ];
        
        insertStaff($customerAccountData,$customerData);
    }

    header('Location: managerDashBoard.php');
    exit();
?>