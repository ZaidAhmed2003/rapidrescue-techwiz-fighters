<?php
require "includes/header.php";
require "includes/sidebar.php";
?>



<div class="container-fluid p-4">
    <div id="responseMessage"></div>
    <form id="addambulanceForm" method="post" action="<?= ROOT_URL ?>admin/logic/add-ambulance-logic.php">
        <div class="row">
            <div class="col-12 col-md-6 col-xl-4 form-outline mb-3">
                <label class="form-label" for="vehicle_number">Vehicle Number</label>
                <input type="text" name="vehicle_number" id="vehicle_number" class="form-control" placeholder="Vehicle Number" />
            </div>
            <div class="col-12 col-md-6 col-xl-4 form-outline mb-3">
                <label class="form-label" for="capacity">Capacity</label>
                <input type="number" name="capacity" id="capacity" class="form-control" placeholder="Capacity" />
            </div>
            <div class="col-12 col-md-6 col-xl-4 form-outline mb-3">
                <label class="form-label" for="location">Location</label>
                <input type="text" name="location" id="location" class="form-control" placeholder="Location" />
            </div>
            <div class="col-12 col-md-6 col-xl-4 form-outline mb-3">
                <label class="form-label" for="equipment_level">Equipment Level</label>
                <select name="equipment_level" id="equipment_level" class="form-control">
                    <option value="Basic Life Support (BLS)">Basic Life Support (BLS)</option>
                    <option value="Advanced Life Support (ALS)">Advanced Life Support (ALS)</option>
                    <option value="Neonatal Ambulance">Neonatal Ambulance</option>
                    <option value="Air Ambulance">Air Ambulance</option>
                    <option value="Patient Transport">Patient Transport</option>
                </select>
            </div>
            <div class="col-12 col-md-6 col-xl-4 form-outline mb-3">
                <label class="form-label" for="current_status">Current Status</label>
                <select name="current_status" id="current_status" class="form-control">
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

</div>
</main>

<?php
require "includes/footer.php"
?>