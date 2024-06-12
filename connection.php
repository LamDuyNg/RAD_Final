<?php
    function connToDb(){
        $host = "localhost";
        $user = "root";
        $passwd = "";
        $db = "rad_ft";
        $con = new mysqli($host,$user,$passwd,$db);
        if ($con->connect_errno) {
            printf("connection failed: %s\n", $con->connect_error);
            exit();
        };
        return $con;
    }
    function test(){
        $query="SELECT * FROM Manager";
        $conn=connToDb();
        $stmt=$conn->prepare($query);
        if(!$stmt->execute()){
            return null;
        }else{
            $data=$stmt->get_result();
            $item=[];
            for($i=1;$i<=$data->num_rows;$i++){
                $item[]=$data->fetch_assoc();
            }
        }
        return $item;
    }

    function login($username,$password){
        $query = "SELECT * FROM Manager WHERE fullName = ?";
        $conn = connToDb();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        if(!$stmt->execute()){
            return null;
        }

        $data=$stmt->get_result();
        if($data->num_rows==0){
            return null;
        }
        
        $result=$data->fetch_assoc();
        
        $passFromDB=$result['password']; 

        $login= password_verify($password,$passFromDB);
        return $login;
    }

    function getCustomer(){
        $query="SELECT `customer`.*, `customeraccount`.`regDate`
                FROM `customer` 
	                LEFT JOIN `customeraccount` ON `customer`.`CusAccID` = `customeraccount`.`CusAccID`;";
        $conn=connToDb();
        $stmt=$conn->prepare($query);
        if(!$stmt->execute()){
            return null;
        }else{
            $data=$stmt->get_result();
            $item=[];
            for($i=1;$i<=$data->num_rows;$i++){
                $item[]=$data->fetch_assoc();
            }
        }
        return $item;
    }

    function getStaff(){
        $query="SELECT `staff`.*, `staffaccount`.*
                FROM `staff` 
                    LEFT JOIN `staffaccount` ON `staff`.`StaffAccID` = `staffaccount`.`StaffAccID`;";
        $conn=connToDb();
        $stmt=$conn->prepare($query);
        if(!$stmt->execute()){
            return null;
        }else{
            $data=$stmt->get_result();
            $item=[];
            for($i=1;$i<=$data->num_rows;$i++){
                $item[]=$data->fetch_assoc();
            }
        }
        return $item;
    }

    function getDeal(){
        $query="SELECT * FROM specialDeal";
        $conn=connToDb();
        $stmt=$conn->prepare($query);
        if(!$stmt->execute()){
            return null;
        }else{
            $data=$stmt->get_result();
            $item=[];
            for($i=1;$i<=$data->num_rows;$i++){
                $item[]=$data->fetch_assoc();
            }
        }
        return $item;
    }

    function getPrice(){
        $query="SELECT `vehicle`.`VehicleID`, `vehicle`.`vehiclesTitle`, `vehicle`.`modelYear`, `brand`.`brandName`, `vehicle`.`pricePerDay`,`vehicle`.`availability`
                FROM `vehicle` 
	                    LEFT JOIN `brand` ON `vehicle`.`BrandID` = `brand`.`BrandID`;";
        $conn=connToDb();
        $stmt=$conn->prepare($query);
        if(!$stmt->execute()){
            return null;
        }else{
            $data=$stmt->get_result();
            $item=[];
            for($i=1;$i<=$data->num_rows;$i++){
                $item[]=$data->fetch_assoc();
            }
        }
        return $item;
    }

    function getVehicleByID($vehicleID){
        $query="SELECT `vehicle`.`VehicleID`, `vehicle`.`vehiclesTitle`, `vehicle`.`modelYear`, `brand`.`brandName`, `vehicle`.`availability`, `vehicle`.`vehiclesOverview`, `vehicle`.`features`, `vehicle`.`photoURL`
                FROM `vehicle` 
	                    LEFT JOIN `brand` ON `vehicle`.`BrandID` = `brand`.`BrandID`
                WHERE `vehicle`.`VehicleID`= ?";
        $conn=connToDb();
        $stmt=$conn->prepare($query);
        $stmt->bind_param('i',$vehicleID);
        if(!$stmt->execute()){
            return null;
        }else{
            $data=$stmt->get_result();
            $item=[];
            for($i=1;$i<=$data->num_rows;$i++){
                $item[]=$data->fetch_assoc();
            }
        }
        return $item;
    }

    function getBrand(){
        $query="SELECT * FROM Brand";
        $conn=connToDb();
        $stmt=$conn->prepare($query);
        if(!$stmt->execute()){
            return null;
        }else{
            $data=$stmt->get_result();
            $item=[];
            for($i=1;$i<=$data->num_rows;$i++){
                $item[]=$data->fetch_assoc();
            }
        }
        return $item;
    }


    function getTransactionHistory(){
        $query="SELECT * FROM Payment ";
        $conn=connToDb();
        $stmt=$conn->prepare($query);
        if(!$stmt->execute()){
            return null;
        }else{
            $data=$stmt->get_result();
            $item=[];
            for($i=1;$i<=$data->num_rows;$i++){
                $item[]=$data->fetch_assoc();
            }
        }
        return $item;
    }


?>