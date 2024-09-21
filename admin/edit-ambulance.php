<?php
session_start();
require "includes/header.php";

if ($_SESSION['role'] != 'admin') {
    header("Location:" . ROOT_URL . "logout.php");
    exit();
}

// Fetch user details based on user ID passed in the query string
$ambulanceId = $_GET['id'];
$stmt = $connection->prepare("SELECT * FROM ambulances WHERE ambulanceid = ?");
$stmt->bind_param("i", $ambulanceId);
$stmt->execute();
$result = $stmt->get_result();
$ambulance = $result->fetch_assoc();

if (!$ambulance) {
    echo "Ambulance not found.";
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
                Edit Ambulance
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
            <div id="responseMessage"></div>
            <form id="editAmbulanceForm" method="post" action="<?= ROOT_URL ?>admin/logic/edit-ambulance-logic.php">
                <input type="hidden" name="id" value="<?= htmlspecialchars($ambulance['ambulanceid']) ?>">

                <div class="row">
                    <div class="col-12 col-md-6 col-xl-4 form-outline mb-3">
                        <label class="form-label" for="vehicle_number">Vehicle Number</label>
                        <input type="text" name="vehicle_number" id="vehicle_number" class="form-control" placeholder="Vehicle Number" value="<?= htmlspecialchars($ambulance['vehicle_number']) ?>" required />
                    </div>
                    <div class=" col-12 col-md-6 col-xl-4 form-outline mb-3">
                        <label class="form-label" for="capacity">Capacity</label>
                        <input type="number" name="capacity" id="capacity" class="form-control" placeholder="Capacity" value="<?= htmlspecialchars($ambulance['capacity']) ?>" required />
                    </div>
                    <div class=" col-12 col-md-6 col-xl-4 form-outline mb-3">
                        <label class="form-label" for="location">Location</label>
                        <input type="text" name="location" id="location" class="form-control" value="<?= htmlspecialchars($ambulance['location']) ?>" placeholder=" Location" required />
                    </div>
                    <div class="col-12 col-md-6 col-xl-4 form-outline mb-3">
                        <label class="form-label" for="equipment_level">Equipment Level</label>
                        <select name="equipment_level" id="equipment_level" class="form-control" required>
                            <option value="Basic Life Support (BLS)" <?= $ambulance['equipment_level'] == 'Basic Life Support (BLS)' ? 'selected' : '' ?>>Basic Life Support (BLS)</option>
                            <option value="Advanced Life Support (ALS)" <?= $ambulance['equipment_level'] == 'Advanced Life Support (ALS)' ? 'selected' : '' ?>>Advanced Life Support (ALS)</option>
                            <option value="Neonatal Ambulance" <?= $ambulance['equipment_level'] == 'Neonatal Ambulance' ? 'selected' : '' ?>>Neonatal Ambulance</option>
                            <option value="Air Ambulance" <?= $ambulance['equipment_level'] == 'Air Ambulance' ? 'selected' : '' ?>>Air Ambulance</option>
                            <option value="Patient Transport" <?= $ambulance['equipment_level'] == 'Patient Transport' ? 'selected' : '' ?>>Patient Transport</option>
                        </select>
                        </select>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4 form-outline mb-3">
                        <label class="form-label" for="current_status">Current Status</label>
                        <select name="current_status" id="current_status" class="form-control" required>
                            <option value="available" <?= $ambulance['current_status'] == 'available' ? 'selected' : '' ?>>Available</option>
                            <option value="on_call" <?= $ambulance['current_status'] == 'on_call' ? 'selected' : '' ?>>On Call</option>
                            <option value="dispatched" <?= $ambulance['current_status'] == 'dispatched' ? 'selected' : '' ?>>Dispatched</option>
                            <option value="maintenance" <?= $ambulance['current_status'] == 'maintenance' ? 'selected' : '' ?>>Maintenance</option>
                            <option value="in_service" <?= $ambulance['current_status'] == 'in_service' ? 'selected' : '' ?>>In Service</option>
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
                        <span class="txt"> Update Ambulance </span>
                    </button>
                </div>

            </form>
        </div>
    </main>

    <?php
    require "includes/footer.php"
    ?>