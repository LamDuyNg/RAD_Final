<?php
    include_once('connection.php');

    function insertCustomer($customerAccountData,$customerData){
        $conn=connToDb();

        $query="INSERT INTO customerAccount(password) VALUES (?)";

        $passHash=password_hash($customerAccountData['password'],PASSWORD_DEFAULT);
        $stmt=$conn->prepare($query);
        $stmt->bind_param("s",$passHash);

        if(!$stmt->execute()) {
            throw new Exception($stmt->error);
        }

        $cusAccID = $conn->insert_id;

        $query1="INSERT INTO customer(DOB, address, fullName, contactNo, CusAccID) VALUES (?,?,?,?,?)";
        
        $stmt1=$conn->prepare($query1);
        $stmt1->bind_param("sssss",$customerData['DOB'],$customerData['address'],$customerData['fullName'],$customerData['contactNo'],$cusAccID);
        
        if(!$stmt1->execute()) {
            throw new Exception($stmt1->error);
        }
    }


    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get form data
        $customerAccountData = [
            'password' => $_POST['password'],
        ];
    
        $customerData = [
            'DOB' => $_POST['DOB'],
            'address' => $_POST['address'],
            'fullName' => $_POST['fullName'],
            'contactNo' => $_POST['contactNo']
        ];
        
        insertCustomer($customerAccountData,$customerData);
    }

    header('Location: managerDashBoard.php');
    exit();
?>