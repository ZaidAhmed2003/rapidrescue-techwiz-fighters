<?php
require "includes/header.php";
require "includes/sidebar.php";
?>



<div class="container-fluid p-4">
    <div class="row ">
        <div class="col-xl-3 col-lg-4">
            <div class="card">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fa-solid fa-truck-medical"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Ambulances</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-6">
                            <h2 class="d-flex align-items-center mb-0">
                                <?php $totalAmbulanceQuery = mysqli_query($connection, "Select * from ambulances");
                                $ambulanceCount = mysqli_num_rows($totalAmbulanceQuery);
                                echo $ambulanceCount;
                                ?>
                            </h2>
                        </div>
                        <div class="col-6 text-right">
                            <a href="<?= ROOT_URL ?>manage-ambulance.php">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4">
            <div class="card ">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fa-solid fa-user-doctor"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total EMT's</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-6">
                            <h2 class="d-flex align-items-center mb-0">
                                <?php $totalemtsQuery = mysqli_query($connection, "Select * from emts");
                                $emtCount = mysqli_num_rows($totalemtsQuery);
                                echo $emtCount;
                                ?>
                            </h2>
                        </div>
                        <div class="col-6 text-right">
                            <a href="<?= ROOT_URL ?>manage-ambulance.php">View Details</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4">
            <div class="card ">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Drivers</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-6">
                            <h2 class="d-flex align-items-center mb-0">
                                <?php $totalDriversQuery = mysqli_query($connection, "Select * from  drivers");
                                $driversCount = mysqli_num_rows($totalDriversQuery);
                                echo $driversCount;
                                ?>
                            </h2>
                        </div>
                        <div class="col-6 text-right">
                            <a href="<?= ROOT_URL ?>manage-ambulance.php">View Details</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4">
            <div class="card ">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Users</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-6">
                            <h2 class="d-flex align-items-center mb-0">
                                <?php $usersQuery = mysqli_query($connection, "Select * from  users");
                                $usersCount = mysqli_num_rows($usersQuery);
                                echo $usersCount;
                                ?>
                            </h2>
                        </div>
                        <div class="col-6 text-right">
                            <a href="<?= ROOT_URL ?>manage-ambulance.php">View Details</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4">
            <div class="card ">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Drivers Assigned</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-6">
                            <h2 class="d-flex align-items-center mb-0">
                                <?php $driversAssignedQuery = mysqli_query($connection, "Select * from  ambulance_driver_assignments");
                                $driversAssignedCount = mysqli_num_rows($driversAssignedQuery);
                                echo $driversAssignedCount;
                                ?>
                            </h2>
                        </div>
                        <div class="col-6 text-right">
                            <a href="<?= ROOT_URL ?>manage-ambulance.php">View Details</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4">
            <div class="card ">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Requests</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-6">
                            <h2 class="d-flex align-items-center mb-0">
                                <?php $requeststQuery = mysqli_query($connection, "Select * from  emergency_requests");
                                $requestsCount = mysqli_num_rows($requeststQuery);
                                echo $requestsCount;
                                ?>
                            </h2>
                        </div>
                        <div class="col-6 text-right">
                            <a href="<?= ROOT_URL ?>manage-ambulance.php">View Details</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</main>

<?php
require "includes/footer.php"
?>