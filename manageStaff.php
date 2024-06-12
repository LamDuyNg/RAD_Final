<?php
include_once('connection.php');
$data=getStaff();
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

    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-8 ml-auto">
                <form class="row">
                    <div class="col-5 p-0">
                        <input type="text" class="form-control pe-5" placeholder="Enter staff name">
                        </div>
                        <div class="col-5">
                            <button type="submit" class="btn btn-primary mb-3" >Search</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStaff">Add staff</button>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Staff ID</th>
            <th>Full name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
            foreach($data as $i){
        ?>
            <tr>
                <th><?=$i['StaffID']?></th>
                <th><?=$i['fullName']?></th>
                <th><?=$i['email']?></th>
                <th class="d-flex justify-content-around">
                    <button class="button edit-btn" style="border: 0; background-color:white;" data-bs-toggle="modal" data-bs-target="#editStaff">
                        <i class="bi bi-pencil"></i>
                    </button>
                    
                    <button class="button delete-btn" style="border: 0; background-color:white;" data-bs-toggle="modal" data-bs-target="#deleteStaff">
                        <i class="bi bi-trash"></i>
                    </button>
                </th>

            </tr>
        <?php
        }
        ?>
    </table>


    <!--AddCustomer Modal-->
    <div class="modal fade" id="addStaff" tabindex="-1" aria-labelledby="addStaffLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCustomerLabel">Add new staff</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addCustomerForm" class="px-3" action="add_staff.php" method="post">
                    <div class="mb-2">
                        <label for="fullName" class="form-label">Staff Name</label>
                        <input type="text" class="form-control" id="fullName" name="fullName" required>
                    </div>
                    <div class="mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-2">
                        <label for="password" class="form-label">password</label>
                        <input type="text" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary myInput">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--EditCustomer Modal-->
    <div class="modal fade" id="editCustomer" tabindex="-1" aria-labelledby="editCustomerLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCustomerLabel">Edit customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editCustomerForm" class="px-3" action="edit_customer.php" method="post">
                    <div class="mb-2">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullName" name="fullName" required>
                    </div>
                    <div class="mb-2">
                        <label for="DOB" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="DOB" name="DOB" required>
                    </div>
                    <div class="mb-2">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="mb-2">
                        <label for="contactNo" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="contactNo" name="contactNo" required>
                    </div>
                    <div class="mb-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary myInput">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--DeleteCustomer-Modal-->
    <div class="modal fade" id="deleteCustomer" tabindex="-1" aria-labelledby="deleteCustomerLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteCustomerLabel">Delete customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this account?
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