<?php
session_start();
require "includes/header.php";


if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>

<body class="dashboard-body d-flex">
    <aside class="d-flex flex-column h-100  border-bottom shadow-sm" style="width: 275px;">
        <div class="py-2 d-flex justify-content-center bg-white border-bottom shadow-sm">
            <img class="logo-image" src="<?= ROOT_URL ?>assets/images/resources/logo-short.png" alt="Logo">
        </div>
        <div class="sidebar flex-column">
            <ul class="nav flex flex-column" id="nav_accordion">
                <li class=" sidebar-item active  border-bottom ">
                    <a class="" href="<?= ROOT_URL ?>admin/">Dashboard</a>
                </li>
                <li class="sidebar-item nav-item has-submenu border-bottom ">
                    <a class="nav-link" href="#" role="button" data-bs-target="#dispatchControl" data-bs-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-book"></i> Dispatch Control
                    </a>
                    <ul class="sidebar-item submenu collapse" id="dispatchControl">
                        <li><a class="nav-link" href="<?= ROOT_URL ?>admin/add-ambulance.php">Add Ambulance</a></li>
                        <li><a class="nav-link" href="<?= ROOT_URL ?>admin/manage-ambulance.php">Manage Ambulance</a></li>
                    </ul>
                </li>
                <li class="sidebar-item nav-item  has-submenu border-bottom ">
                    <a class="dropdown-toggle nav-link" href="#" role="button" data-bs-toggle="collapse" data-bs-target="#ambulanceManagement" aria-expanded="false">
                        <i class="fa fa-book"></i> Ambulance
                    </a>
                    <ul class="sidebar-item submenu collapse" id="ambulanceManagement">
                        <li><a class="nav-link" href="<?= ROOT_URL ?>admin/add-ambulance.php">Add Ambulance</a></li>
                        <li><a class="nav-link" href="<?= ROOT_URL ?>admin/manage-ambulance.php">Manage Ambulance</a></li>
                    </ul>
                </li>
                <li class="sidebar-item nav-item  has-submenu border-bottom ">
                    <a class="dropdown-toggle nav-link" href="#" role="button" data-bs-toggle="collapse" data-bs-target="#usermanagement" aria-expanded="false">
                        <i class="fa fa-book"></i> Users
                    </a>
                    <ul class="sidebar-item submenu collapse" id="usermanagement">
                        <li><a class="nav-link" href="<?= ROOT_URL ?>admin/add-user.php">Add User</a></li>
                        <li><a class="nav-link" href="<?= ROOT_URL ?>admin/manage-users.php">Manage Users</a></li>
                    </ul>
                </li>

                <!-- <li class="sidebar-item dropdown border-bottom">
                    <a class="dropdown-toggle" href="#" id="reportsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-file"></i> Reports
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="reportsDropdown">
                        <li><a class="dropdown-item" href="daily-reports.php">Daily Reports</a></li>
                        <li><a class="dropdown-item" href="monthly-reports.php">Monthly Reports</a></li>
                    </ul>
                </li> -->
            </ul>
        </div>
    </aside>
    <main class="flex-grow w-100">
        <div class="d-flex justify-content-between align-items-center shadow-sm py-2 px-3">
            <h3>
                Welcome to Admin Dashboard
            </h3>
            <div class="main-menu style1 navbar-expand-md navbar-light">
                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent" bis_skin_checked="1">
                    <ul class="navigation  clearfix scroll-nav">
                        <li class="dropdown current">
                            <a class="remove-padding" href="#"><?= $_SESSION['firstname'] . " " . $_SESSION['lastname']  ?></a>
                            <ul class="dashboard-navigation">
                                <li><a href="<?= ROOT_URL ?>login.php?id=<?= $_SESSION['userid'] ?>">Profile</a></li>
                                <li><a href="<?= ROOT_URL ?>logout.php">logout</a></li>
                            </ul>
                            <div class="dropdown-btn" bis_skin_checked="1"><span class="fa fa-angle-right"></span></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

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
            </div>
        </div>

    </main>

    <?php
    require "includes/footer.php"
    ?>