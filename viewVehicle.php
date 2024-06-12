<?php
    include_once('connection.php');

    $vehicleID=$_GET['vehicleID'];


    $data=getVehicleByID($vehicleID);
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
            <tbody>
                <tr>
                    <th>Vehicle ID</th>
                    <td><?= $data[0]['VehicleID'] ?></td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td><?= $data[0]['vehiclesTitle'] ?></td>
                </tr>
                <tr>
                    <th>Model Year</th>
                    <td><?= $data[0]['modelYear'] ?></td>
                </tr>
                <tr>
                    <th>Brand Name</th>
                    <td><?= $data[0]['brandName'] ?></td>
                </tr>
                <tr>
                    <th>Availability</th>
                    <td><?= $data[0]['availability'] ?></td>
                </tr>
                <tr>
                    <th>Overview</th>
                    <td><?= $data[0]['vehiclesOverview'] ?></td>
                </tr>
                <tr>
                    <th>Features</th>
                    <td><?= $data[0]['features'] ?></td>
                </tr>
                <tr>
                    <th>Photo</th>
                    <td><?= $data[0]['photoURL'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>