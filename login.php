<?php
require "includes/header.php";

// Get the role from the URL query parameter
$role = isset($_GET['role']) ? htmlspecialchars($_GET['role']) : 'user';
?>

<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class=" d-flex justify-content-center align-items-center h-100">
        <div class=" d-flex flex-column align-items-center justify-content-center card rounded-3 text-black">
            <div class=" card-body p-md-5 mx-md-4 w-100">
                <div class="text-center mb-4">
                    <img src="<?= ROOT_URL ?>assets/images/resources/logo.png"
                        style="width: 185px;" alt="logo">
                </div>
                <form id="loginForm" action="<?= ROOT_URL ?>logic/login-logic.php" method="post">
                    <h6 class="text-center mb-4">Please login to your account</h6>
                    <div class="form-outline mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="email address" />
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="enter your password" />
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
                                <span class="txt"> Login </span>
                            </button>
                        </div>
                        <a href="#!">Forgot password?</a>
                    </div>

                    <!-- Conditionally show the 'Create new' button if the role is 'user' -->
                    <?php if ($role === 'user'): ?>
                        <div class="d-flex align-items-center justify-content-center pb-4">
                            <p class="mb-0 mr-1">Don't have an account?</p>
                            <a href="<?= ROOT_URL ?>register.php">Create new</a>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
require "includes/footer-end.php";
?>