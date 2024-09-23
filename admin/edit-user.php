<?php
require "includes/header.php";
require "includes/sidebar.php";

// Validate and sanitize the user ID
if (!isset($_GET['id']) || !filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    echo "Invalid user ID.";
    exit();
}

$userId = intval($_GET['id']);

// Fetch user details securely
$query = "SELECT * FROM users WHERE userid = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Handle case where the user is not found
if (!$user) {
    echo "User not found.";
    exit();
}
?>

<div class="container-fluid p-4">
    <div id="responseMessage"></div>
    <form method="POST" action="" id="editUserForm">
        <input type="hidden" name="user_id" value="<?= htmlspecialchars($user['userid']) ?>" />
        <div class="row">
            <!-- First Name -->
            <div class="col-12 col-md-6 form-outline mb-3">
                <label class="form-label" for="firstname">First Name</label>
                <input type="text" name="firstname" id="firstname" class="form-control" value="<?= htmlspecialchars($user['firstname']) ?>" required />
            </div>
            <!-- Last Name -->
            <div class="col-12 col-md-6 form-outline mb-3">
                <label class="form-label" for="lastname">Last Name</label>
                <input type="text" name="lastname" id="lastname" class="form-control" value="<?= htmlspecialchars($user['lastname']) ?>" required />
            </div>
            <!-- Email -->
            <div class="col-12 col-md-6 form-outline mb-3">
                <label class="form-label" for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required />
            </div>
            <!-- Phone Number -->
            <div class="col-12 col-md-6 form-outline mb-3">
                <label class="form-label" for="phonenumber">Phone Number</label>
                <input type="text" name="phonenumber" id="phonenumber" class="form-control" value="<?= htmlspecialchars($user['phonenumber']) ?>" required />
            </div>
            <!-- Date of Birth -->
            <div class="col-12 col-md-6 form-outline mb-3">
                <label class="form-label" for="date_of_birth">Date of Birth</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="<?= htmlspecialchars($user['date_of_birth']) ?>" required />
            </div>
            <!-- Address -->
            <div class="col-12 col-md-6 form-outline mb-3">
                <label class="form-label" for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" value="<?= htmlspecialchars($user['address']) ?>" required />
            </div>
            <!-- Role -->
            <div class="col-12 col-md-6 form-outline mb-3">
                <label class="form-label" for="role">Role</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>User</option>
                    <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                    <option value="driver" <?= $user['role'] === 'driver' ? 'selected' : '' ?>>Driver</option>
                </select>
            </div>
        </div>
        <!-- Submit Button -->
        <div class="button-box">
            <button class="btn-one border-low" type="submit">
                <span class="txt">Update User</span>
            </button>
        </div>
    </form>
</div>

<?php
require "includes/footer.php";
?>