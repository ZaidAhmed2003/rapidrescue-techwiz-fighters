<?php
require "includes/header.php";

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

require "includes/sidebar.php";
?>


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
            <div class="col-12 col-md-6 col-xl-4 form-outline mb-3">
                <label class="form-label" for="driver_id">Assign Driver</label>
                <select name="driver_id" id="driver_id" class="form-control" required>
                    <option value="">Select a driver</option>
                    <?php
                    $drivers = $connection->query("SELECT driverid, firstname, lastname FROM drivers WHERE status = 'On Duty' AND ambulanceid IS NULL");
                    while ($driver = $drivers->fetch_assoc()) {
                    ?>
                        <option value="<?= $driver['driverid'] ?>" <?= $ambulance['driverid'] == $driver['driverid'] ? 'selected' : '' ?>><?= $driver['firstname'] . " " . $driver['lastname'] ?></option>
                    <?php } ?>
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