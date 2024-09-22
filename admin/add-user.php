<?php
require "includes/header.php";
require "includes/sidebar.php";
?>


<div class="container-fluid p-4">
    <div id="responseMessage">
    </div>
    <form id="add-user-form" action="" method="post">
        <div class="row">
            <div class="col-12 col-md-6 form-outline mb-3">
                <label class="form-label" for="firstname">First Name</label>
                <input type="text" name="firstname" id="firstname" class="form-control"
                    placeholder="first name" />
            </div>
            <div class="col-12 col-md-6 form-outline mb-3">
                <label class="form-label" for="lastname">Last Name</label>
                <input type="text" name="lastname" id="lastname" class="form-control"
                    placeholder="last name" />
            </div>
            <div class="col-12 col-md-6 form-outline mb-3">
                <label class="form-label" for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control"
                    placeholder="email address" />
            </div>
            <div class="col-12 col-md-6 form-outline mb-3">
                <label class="form-label" for="phonenumber">Phone Number</label>
                <input type="text" name="phonenumber" id="phonenumber" class="form-control"
                    placeholder="phone number" />
            </div>
            <div class="col-12 col-md-6 form-outline mb-4">
                <label class="form-label" for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="enter your password" />
            </div>
            <div class="col-12 col-md-6 form-outline mb-3">
                <label class="form-label" for="dateofbirth">Date of Birth</label>
                <input type="date" name="dateofbirth" id="dateofbirth" class="form-control"
                    placeholder="Date of Birth" />
            </div>
            <div class="col-12 col-md-6 form-outline mb-3">
                <label class="form-label" for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control"
                    placeholder="Enter your address..."></input>
            </div>
            <div class="col-12 col-md-6 col-xl-4 form-outline mb-3">
                <label class="form-label" for="role">Role</label>
                <select name="role" id="role" class="form-control">
                    <option value="user">User</option>
                    <option value="driver">Driver</option>
                    <option value="admin">Admin</option>
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