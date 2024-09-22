<?php
require "includes/header.php";
require "includes/sidebar.php";

$userId = $_SESSION['userid']
?>


<div class="container-fluid p-4">
    <div id="responseMessage">
    </div>
    <form id="add-emergency-request-form" action="" method="post">
        <div class="row">
            <input type="text" hidden name="userid" value="<?= htmlspecialchars($userId) ?>">
            <div class="col-12 col-md-6 form-outline mb-3">
                <label class="form-label" for="hospital">Hospital Name</label>
                <input type="text" name="hospital" id="firstname" class="form-control"
                    placeholder="hospital name" />
            </div>
            <div class="col-12 col-md-6 form-outline mb-3">
                <label class="form-label" for="address">Pickup Address</label>
                <input type="text" name="address" id="address" class="form-control"
                    placeholder="pickup address" />
            </div>
            <div class="col-12 col-md-6 form-outline mb-3">
                <label class="form-label" for="phonenumber">Phone Number</label>
                <input type="text" name="phonenumber" id="phonenumber" class="form-control"
                    placeholder="phone number" />
            </div>
            <div class="col-12 col-md-6 col-xl-4 form-outline mb-3">
                <label class="form-label" for="type">Emergency Type</label>
                <select name="type" id="type" class="form-control">
                    <option value="emergency">Emergency</option>
                    <option value="non-emergency">Non Emergency</option>
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
                <span class="txt"> Add User </span>
            </button>
        </div>

    </form>
</div>
</main>

<?php
require "includes/footer.php"
?>