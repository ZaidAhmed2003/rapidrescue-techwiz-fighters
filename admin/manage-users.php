<?php
session_start();
require "includes/header.php";


if ($_SESSION['role'] != 'admin') {
    header("Location:" . ROOT_URL . "login.php");
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
                <li class=" sidebar-item  border-bottom ">
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
                <li class="sidebar-item nav-item active  has-submenu border-bottom ">
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
                Manage Users
            </h3>
            <div class=" main-menu style1 navbar-expand-md navbar-light">
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

        <div class="container-fluid px-5 py-4">
            <div class="panel d-flex align-items-center justify-content-center">
                <div class="panel-heading border w-100 text-center py-2">
                    Manage Users
                </div>
            </div>
            <div class="">
                <table class="w-100 text-center">
                    <?php
                    $currentAdminId = $_SESSION['userid'];
                    $query = "SELECT * FROM users WHERE NOT userid='$currentAdminId'";
                    $users = mysqli_query($connection, $query)
                    ?>
                    <tbody>
                        <?php if (mysqli_num_rows($users) > 0) : ?>
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr data-breakpoints="xs" class=" border">
                                        <th class="border">Sno</th>
                                        <th class="border">Name</th>
                                        <th class="border">Email</th>
                                        <th class="border">Contact</th>
                                        <th class="border">Date of Birth</th>
                                        <th class="border">Address</th>
                                        <th class="border">Role</th>
                                        <th class="border">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $serialNo = 1;

                                    while ($user = mysqli_fetch_assoc($users)) : ?>
                                        <tr class=" border">
                                            <td class="border"><?= $serialNo++ ?></td>
                                            <td class="border"> <?= $user['firstname'] . " " . $user['lastname'] ?>
                                            <td class="border"><?= $user['email'] ?>
                                            </td>
                                            <td class="border"><?= $user['phonenumber'] ?></td>

                                            <td class="border"><?= $user['date_of_birth'] ?></td>
                                            <td class="border"><?= $user['address'] ?></td>
                                            <td class="border"><?= $user['role'] ?></td>
                                            <td class="border">
                                                <a href="<?= ROOT_URL ?>admin/edit-user.php?id=<?= $user['userid'] ?>" class="p-1 action-btns">Edit</a>
                                                <a href="#" class="p-1 action-btns delete-user" data-id="<?= $user['userid'] ?>">Delete</a>
                                            </td>

                                        </tr>
                                    <?php endwhile ?>
                                </tbody>
                            </table>


                        <?php else : ?>
                            <div class=" text-center py-5    alert__message error"><?= "No Users Found" ?></div>
                        <?php endif ?>

            </div>
        </div>


    </main>

    <?php
    require "includes/footer.php"
    ?>