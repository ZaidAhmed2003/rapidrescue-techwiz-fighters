<?php
require "includes/header.php";
?>

<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class=" d-flex justify-content-center align-items-center h-100">
        <div class=" d-flex flex-column align-items-center justify-content-center card rounded-3 text-black">
            <div class=" card-body p-md-5 mx-md-4 w-100">
                <div class="text-center mb-4">
                    <img src="<?= ROOT_URL ?>assets/images/resources/logo.png"
                        style="width: 185px;" alt="logo">
                </div>
                <form id="registerForm" action="<?= ROOT_URL ?>logic/register-logic.php" method="post">
                    <h6 class="text-center mb-4">Please register your account</h6>

                    <!-- Hidden field to set the role to 'user' by default -->
                    <input type="hidden" name="role" value="user">

                    <div class="row container">

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
                                placeholder="Enter your address"></input>
                        </div>
                    </div>
                    <div class="text-center pt-1 mb-2 pb-1">
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
                                <span class="txt"> Register </span>
                            </button>
                        </div>

                    </div>

                    <div class="d-flex align-items-center justify-content-center pb-4">
                        <p class="mb-0 mr-1">Already have an account?</p>
                        <a href="<?= ROOT_URL ?>login.php?role=user">Login</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

<?php
require "includes/footer-end.php"
?>