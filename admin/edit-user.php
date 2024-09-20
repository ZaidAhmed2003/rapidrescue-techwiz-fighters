<?php
session_start();
require "includes/header.php";

if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

// Fetch user details based on user ID passed in the query string
$userId = $_GET['id']; // Make sure to validate this input
$query = "SELECT * FROM users WHERE userid='$userId'";
$result = $connection->query($query);
$user = $result->fetch_assoc();

if (!$user) {
    echo "User not found.";
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
            <form method="POST" action="" id="editUserForm">
                <div class="row">
                    <div class="col-12 col-md-6 form-outline mb-3">
                        <label class="form-label" for="firstname">First Name</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" value="<?= htmlspecialchars($user['firstname']) ?>" required />
                    </div>
                    <div class="col-12 col-md-6 form-outline mb-3">
                        <label class="form-label" for="lastname">Last Name</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" value="<?= htmlspecialchars($user['lastname']) ?>" required />
                    </div>
                    <div class="col-12 col-md-6 form-outline mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required />
                    </div>
                    <div class="col-12 col-md-6 form-outline mb-3">
                        <label class="form-label" for="phonenumber">Phone Number</label>
                        <input type="text" name="phonenumber" id="phonenumber" class="form-control" value="<?= htmlspecialchars($user['phonenumber']) ?>" required />
                    </div>
                    <div class="col-12 col-md-6 form-outline mb-3">
                        <label class="form-label" for="date_of_birth">Date of Birth</label>
                        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="<?= htmlspecialchars($user['date_of_birth']) ?>" />
                    </div>
                    <div class="col-12 col-md-6 form-outline mb-3">
                        <label class="form-label" for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control" value="<?= htmlspecialchars($user['address']) ?>" />
                    </div>
                    <div class="col-12 col-md-6 form-outline mb-3">
                        <label class="form-label" for="role">Role</label>
                        <select name="role" id="role" class="form-control" required>
                            <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
                            <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                            <option value="driver" <?= $user['role'] == 'driver' ? 'selected' : '' ?>>Driver</option>
                            <!-- Add other roles as needed -->
                        </select>
                    </div>
                </div>
                <div class="button-box">
                    <button class="btn-one border-low" type="submit">
                        <span class="txt">Update User</span>
                    </button>
                </div>
            </form>
        </div>
    </main>

    <?php
    require "includes/footer.php"
    ?>