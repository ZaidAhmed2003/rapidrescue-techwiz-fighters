<?php
session_start();
require "includes/header.php";

if ($_SESSION['role'] != 'admin') {
    header("Location:" . ROOT_URL . "logout.php");
    exit();
}

require "includes/sidebar.php";
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



<div class="container-fluid p-4">
    <div id="responseMessage">
    </div>
    <form method="POST" action="" id="editUserForm">
        <input type="hidden" hidden name="user_id" value="<?= htmlspecialchars($user['userid']) ?>">
        <div class="row">
            <div class="col-12 col-md-6 form-outline mb-3">
                <label class="form-label" for="firstname">First Name</label>
                <input type="text" name="firstname" id="firstname" class="form-control" value="<?= htmlspecialchars($user['firstname']) ?>" />
            </div>
            <div class="col-12 col-md-6 form-outline mb-3">
                <label class="form-label" for="lastname">Last Name</label>
                <input type="text" name="lastname" id="lastname" class="form-control" value="<?= htmlspecialchars($user['lastname']) ?>" />
            </div>
            <div class="col-12 col-md-6 form-outline mb-3">
                <label class="form-label" for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" />
            </div>
            <div class="col-12 col-md-6 form-outline mb-3">
                <label class="form-label" for="phonenumber">Phone Number</label>
                <input type="text" name="phonenumber" id="phonenumber" class="form-control" value="<?= htmlspecialchars($user['phonenumber']) ?>" />
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
                <select name="role" id="role" class="form-control">
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