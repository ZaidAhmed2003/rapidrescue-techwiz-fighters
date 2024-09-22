<body class="dashboard-body d-flex">
    <aside class="d-flex flex-column h-100  border-bottom shadow-sm" style="width: 285px;">
        <div class="py-2 d-flex justify-content-center bg-white border-bottom shadow-sm">
            <img class="logo-image" src="<?= ROOT_URL ?>assets/images/resources/logo-short.png" alt="Logo">
        </div>
        <div class="sidebar flex-column">
            <ul class="nav flex flex-column" id="nav_accordion">
                <li class="sidebar-item <?= (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : '' ?>">
                    <a class="" href="<?= ROOT_URL ?>user/">Dashboard</a>
                </li>
                <li class="sidebar-item nav-item has-submenu border-bottom <?= (basename($_SERVER['PHP_SELF']) == 'manage-request.php') ? 'active' : '' ?>">
                    <a class="dropdown-toggle nav-link" href="#" role="button" data-bs-target="#dispatchControl" data-bs-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-book"></i> Emergency Requests
                    </a>
                    <ul class="sidebar-item submenu collapse" id="dispatchControl">
                        <li><a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'manage-request.php') ? 'active' : '' ?>" href="<?= ROOT_URL ?>user/manage-all-request.php">All</a></li>
                        <li><a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'manage-request.php') ? 'active' : '' ?>" href="<?= ROOT_URL ?>user/manage-approved-request.php">Approved</a></li>
                        <li><a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'manage-request.php') ? 'active' : '' ?>" href="<?= ROOT_URL ?>user/manage-pending-request.php">Pending</a></li>
                        <li><a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'manage-request.php') ? 'active' : '' ?>" href="<?= ROOT_URL ?>user/manage-rejected-request.php">Rejected</a></li>
                    </ul>
                </li>
                <li class="sidebar-item <?= (basename($_SERVER['PHP_SELF']) == 'realtime-tracking.php') ? 'active' : '' ?>">
                    <a class="" href="<?= ROOT_URL ?>user/">Realtime Tracking</a>
                </li>
                <li class="sidebar-item <?= (basename($_SERVER['PHP_SELF']) == 'feedback.php') ? 'active' : '' ?>">
                    <a class="" href="<?= ROOT_URL ?>user/">Feedback</a>
                </li>


            </ul>
        </div>
    </aside>
    <main class="flex-grow w-100">
        <div class="d-flex justify-content-between align-items-center shadow-sm py-2 px-3">
            <h3>
                Welcome to User Dashboard
            </h3>
            <div class="d-flex align-items-center">
                <div class="nav-link">
                    <ul>
                        <li>
                            <a href="<?= ROOT_URL ?>user/emergency-request.php?id=<?= $_SESSION['userid'] ?>">
                                Request an Ambulance
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="main-menu style1 navbar-expand-md navbar-light">
                    <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent" bis_skin_checked="1">
                        <ul class="navigation  clearfix scroll-nav">
                            <li class="dropdown pad current">
                                <a class="remove-padding" href="#"><?= $_SESSION['firstname'] . " " . $_SESSION['lastname']  ?></a>
                                <ul class="dashboard-navigation">
                                    <li><a href="<?= ROOT_URL ?>user/update-profile.php?id=<?= $_SESSION['userid'] ?>">Profile</a></li>
                                    <li><a href="<?= ROOT_URL ?>logout.php">logout</a></li>
                                </ul>
                                <div class="dropdown-btn" bis_skin_checked="1"><span class="fa fa-angle-right"></span></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>