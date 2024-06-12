<?php
    session_start();
    $user=$_SESSION['managerName'];
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
    <div class="">
        <div class="row">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark col-2 vh-100">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5">ADMIN DASHBOARD</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto d-flex justify-content-between">
                    <li>
                        <a href="#" class="nav-link text-white side-nav active " data-page="manageCustomer">
                            <i class="bi bi-people-fill m-2"></i>
                            Manage customer
                        </a>
                    </li>
                    <li class="pt-2">
                        <a href="#" class="nav-link text-white side-nav" data-page="manageDeals">
                            <i class="bi bi-percent m-2"></i>
                            Manage special deals
                        </a>
                    </li>
                    <li class="pt-2">
                        <a href="#" class="nav-link text-white side-nav" data-page="managePrice">
                        <i class="bi bi-tags m-2"></i>
                            Manage price
                        </a>
                    </li>
                    <li class="pt-2">
                        <a href="#" class="nav-link text-white side-nav" data-page="manageVehicle">
                        <i class="bi bi-car-front m-2"></i>
                            Manage Vehicle Data
                        </a>
                    </li>
                    <li class="pt-2">
                        <a href="#" class="nav-link text-white side-nav" data-page="manageStaff">
                        <i class="bi bi-person m-2"></i>
                            Manage staff
                        </a>
                    </li>
                    <li class="pt-2">
                        <a href="#" class="nav-link text-white side-nav" data-page="transactionHistory">
                        <i class="bi bi-journal-check m-2"></i>
                            Transaction history
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong><?=$user?></strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                </ul>
                </div>
            </div>

            <div class="col-10 pe-4 pt-5" id="content">
                
            </div>
            <div id="loading">Loading...</div> 
        </div>
    </div>
</body>

<script>
        document.addEventListener('DOMContentLoaded', () => {
            const links = document.querySelectorAll('.side-nav');
            const contentDiv = document.getElementById('content');
            const loadingDiv = document.getElementById('loading');
            const navLinks = document.querySelectorAll('.nav-link');

            links.forEach(link => {
                link.addEventListener('click', event => {
                    event.preventDefault();
                    const page = link.getAttribute('data-page');
                    loadPage(page);
                });
            });

            function loadPage(page) {
                loadingDiv.style.display = 'block';
                fetch(`${page}.php`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.text();
                    })
                    .then(data => {
                        loadingDiv.style.display = 'none';
                        contentDiv.innerHTML = data;
                    })
                    .catch(error => {
                        loadingDiv.style.display = 'none';
                        contentDiv.innerHTML = `<p>Error loading page: ${error.message}</p>`;
                    });
            }
            
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    navLinks.forEach(nav => nav.classList.remove('active'));
                    this.classList.add('active');
                });
            });

            loadPage('manageCustomer');
        });
    </script>
</html>