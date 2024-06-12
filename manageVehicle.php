<?php
include_once('connection.php');
$data=getPrice();
$brand=getBrand();
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

    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-sm-8 ml-auto d-flex justify-content-start">
                <button button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addVehicle">Add vehicle</button>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-2 ">
                
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Car ID</th>
            <th>Vehicle name</th>
            <th>Model</th>
            <th>Brand</th>
            <th>Action</th>
        </tr>
        <?php
            foreach($data as $i){
        ?>
            <tr>
                <th><?=$i['VehicleID']?></th>
                <th><?=$i['vehiclesTitle']?></th>
                <th><?=$i['modelYear']?></th>
                <th><?=$i['brandName']?></th>
                <th class="d-flex justify-content-around">
                    <button class="button edit-btn" style="border: 0; background-color:white;" data-bs-toggle="modal" data-bs-target="#editVehicle">
                        <i class="bi bi-pencil"></i>
                    </button>
                    
                    <button class="button delete-btn" style="border: 0; background-color:white;" data-bs-toggle="modal" data-bs-target="#deleteVehicle">
                        <i class="bi bi-trash"></i>
                    </button>

                    <form action="./viewVehicle.php" method="get">
                        <input type="hidden" name="vehicleID" value="<?=$i['VehicleID']?>">
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


    <!--AddVehicle Modal-->
    <div class="modal fade" id="addVehicle" tabindex="-1" aria-labelledby="addVehicleLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addVehicleLabel">Add new vehicle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addVehicleForm" class="px-3" action="add_vehicle.php" method="post">
                    <div class="mb-2">
                        <label for="vehiclesTile" class="form-label">Car title</label>
                        <input type="text" class="form-control" id="vehiclesTitle" name="vehiclesTitle" required>   
                    </div>
                    <div class="mb-2">
                        <label for="modelYear" class="form-label">Model's year</label>
                        <input type="text" class="form-control" id="modelYear" name="modelYear" required>
                    </div>
                    <div class="mb-2">
                        <label for="brand" class="form-label">Brand</label>
                        <select class="form-control" id="brand" name="brand" required>
                            <option value="" disabled selected>Select a brand</option>
                            <?php
                                foreach($brand as $i){
                            ?> 
                                <option value="<?=$i['BrandID']?>"><?=$i['brandName']?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="vehiclesOverview" class="form-label">Overview</label>
                        <input type="text" class="form-control" id="vehiclesOverview" name="vehiclesOverview" required>
                    </div>
                    <div class="mb-2">
                        <label for="features" class="form-label">features</label>
                        <input type="text" class="form-control" id="features" name="features" required>
                    </div><div class="mb-2">
                        <label for="photoURL" class="form-label">Photo</label>
                        <input type="file" accept="image" class="form-control" id="photoURL" name="photoURL" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary myInput">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--EditDeal Modal-->
    <div class="modal fade" id="editVehicle" tabindex="-1" aria-labelledby="editVehicleLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editVehicleLabel">Edit vehicle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addDealForm" class="px-3" action="edit_price.php" method="post">
                    <div class="mb-2">
                        <label for="vehiclesTile" class="form-label">Car title</label>
                        <input type="text" class="form-control" id="vehiclesTitle" name="vehiclesTitle" required>
                    </div>
                    <div class="mb-2">
                        <label for="priceDiscount" class="form-label">Vehicle/day</label>
                        <input type="text" class="form-control" id="priceDiscount" name="priceDiscount" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary myInput">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--DeleteDeal-Modal-->
    <div class="modal fade" id="deleteVehicle" tabindex="-1" aria-labelledby="deleteVehicleLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteVehicleLabel">Delete price</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this price?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</body>


</html>