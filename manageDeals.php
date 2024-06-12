<?php
include_once('connection.php');
$data=getDeal();
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
            <div class="col-sm-8 ml-auto">
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-2  d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDeal">Add deal</button>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Deal ID</th>
            <th>Deal name</th>
            <th>Expire date</th>
            <th>Discount %</th>
            <th>Action</th>
        </tr>
        <?php
            foreach($data as $i){
        ?>
            <tr>
                <th><?=$i['DealID']?></th>
                <th><?=$i['dealName']?></th>
                <th><?=$i['expireDate']?></th>
                <th><?=$i['priceDiscount']?></th>
                <th class="d-flex justify-content-around">
                    <button class="button edit-btn" style="border: 0; background-color:white;" data-bs-toggle="modal" data-bs-target="#editDeal">
                        <i class="bi bi-pencil"></i>
                    </button>
                    
                    <button class="button delete-btn" style="border: 0; background-color:white;" data-bs-toggle="modal" data-bs-target="#deleteDeal">
                        <i class="bi bi-trash"></i>
                    </button>
                </th>

            </tr>
        <?php
        }
        ?>
    </table>


    <!--AddDeal Modal-->
    <div class="modal fade" id="addDeal" tabindex="-1" aria-labelledby="addDealLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDealLabel">Add new deal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addDealForm" class="px-3" action="add_deal.php" method="post">
                    <div class="mb-2">
                        <label for="dealName" class="form-label">Deal name</label>
                        <input type="text" class="form-control" id="dealName" name="dealName" required>
                    </div>
                    <div class="mb-2">
                        <label for="expireDate" class="form-label">Date of expire</label>
                        <input type="date" class="form-control" id="expireDate" name="expireDate" required>
                    </div>
                    <div class="mb-2">
                        <label for="priceDiscount" class="form-label">Discount %</label>
                        <input type="text" class="form-control" id="priceDiscount" name="priceDiscount" required>
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
    <div class="modal fade" id="editDeal" tabindex="-1" aria-labelledby="editDealLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDealLabel">Add new deal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addDealForm" class="px-3" action="edit_deal.php" method="post">
                    <div class="mb-2">
                        <label for="dealName" class="form-label">Deal name</label>
                        <input type="text" class="form-control" id="dealName" name="dealName" required>
                    </div>
                    <div class="mb-2">
                        <label for="expireDate" class="form-label">Date of expire</label>
                        <input type="date" class="form-control" id="expireDate" name="expireDate" required>
                    </div>
                    <div class="mb-2">
                        <label for="priceDiscount" class="form-label">Discount %</label>
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
    <div class="modal fade" id="deleteDeal" tabindex="-1" aria-labelledby="deleteDealLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Deal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this deal?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
  </div>
</div>
</body>


</html>