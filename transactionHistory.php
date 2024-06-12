<?php
    include_once('connection.php');
    $data=getTransactionHistory();
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

    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Vehicle Details</h2>
        <table class="table table-bordered">
        <tr>
            <th>Payment ID</th>
            <th>Status</th>
            <th>Method</th>
            <th>Amount</th>
            <th>Action</th>
        </tr>
        <?php
            foreach($data as $i){
        ?>
            <tr>
                <th><?=$i['PaymentID']?></th>
                <th><?=$i['status']?></th>
                <th><?=$i['method']?></th>
                <th><?=$i['amount']?></th>
                <th class="d-flex justify-content-around">
                    
                    <button class="button delete-btn" style="border: 0; background-color:white;" data-bs-toggle="modal" data-bs-target="#deleteVehicle">
                        <i class="bi bi-trash"></i>
                    </button>

                    <form action="" method="get">
                        <input type="hidden" name="PayementID" value="<?=$i['PaymentID']?>">
                        <button class="btn btn-white info-btn" type="submit" style="border: 0; background-color:white;">
                            <i class="bi bi-info-circle"></i>
                        </button>
                    </form>
                </th>

            </tr>
        <?php
        }
        ?>
    </table>
    </div>

</body>
</html>