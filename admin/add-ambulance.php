<?php
session_start();
require "includes/header.php";


if ($_SESSION['role'] != 'admin') {
    header("Location:" . ROOT_URL . "logout.php");
    exit();
}

$drivers = [];
$result = $connection->query("SELECT driverid, firstname, lastname FROM drivers WHERE status = 'On Duty' AND ambulanceid IS NULL");
while ($row = $result->fetch_assoc()) {
    $drivers[] = $row;
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
                Add Ambulances
            </h3>
            <div class="main-menu style1 navbar-expand-md navbar-light">
                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent" bis_skin_checked="1">
                    <ul class="navigation  clearfix scroll-nav">
                        <li class="dropdown pad current">
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
            <div class="#responseMessages"></div>
            <form id="ambulanceForm" method="post" action="<?= ROOT_URL ?>admin/logic/add-ambulance-logic.php">
                <div class="row">
                    <div class="col-12 col-md-6 col-xl-4 form-outline mb-3">
                        <label class="form-label" for="vehicle_number">Vehicle Number</label>
                        <input type="text" name="vehicle_number" id="vehicle_number" class="form-control" placeholder="Vehicle Number" required />
                    </div>
                    <div class="col-12 col-md-6 col-xl-4 form-outline mb-3">
                        <label class="form-label" for="capacity">Capacity</label>
                        <input type="number" name="capacity" id="capacity" class="form-control" placeholder="Capacity" required />
                    </div>
                    <div class="col-12 col-md-6 col-xl-4 form-outline mb-3">
                        <label class="form-label" for="location">Location</label>
                        <input type="text" name="location" id="location" class="form-control" placeholder="Location" required />
                    </div>
                    <div class="col-12 col-md-6 col-xl-4 form-outline mb-3">
                        <label class="form-label" for="equipment_level">Equipment Level</label>
                        <select name="equipment_level" id="equipment_level" class="form-control" required>
                            <option value="Basic Life Support (BLS)">Basic Life Support (BLS)</option>
                            <option value="Advanced Life Support (ALS)">Advanced Life Support (ALS)</option>
                            <option value="Neonatal Ambulance">Neonatal Ambulance</option>
                            <option value="Air Ambulance">Air Ambulance</option>
                            <option value="Patient Transport">Patient Transport</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4 form-outline mb-3">
                        <label class="form-label" for="current_status">Current Status</label>
                        <select name="current_status" id="current_status" class="form-control" required>
                            <option value="available">Available</option>
                            <option value="on_call">On Call</option>
                            <option value="dispatched">Dispatched</option>
                            <option value="maintenance">Maintenance</option>
                            <option value="in_service">In Service</option>
                        </select>
                    </div>
                </div>
                <div class="button-box">
                    <input
                        id="form_botcheck"
                        name="form_botcheck"
                        class="form-control"
                        type="hidden"
                        value="" />
                    <button
                        class="btn-one border-low"
                        type="submit"
                        data-loading-text="Please wait...">
                        <span class="txt"> Add Ambulance </span>
                    </button>
                </div>

            </form>
            <div id="responseMessage" class="mt-3"></div>
        </div>
    </main>

    <?php
    require "includes/footer.php"
    ?>