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
                <form id="loginForm" action="logic/login-logic.php" method="post">
                    <p class="text-center">Please login to your account</p>
                    <div class="form-outline mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="email address" />
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="enter your password" />
                    </div>

                    <div class="text-center pt-1 mb-5 pb-1">
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
                        <a class="text-muted" href="#!">Forgot password?</a>
                    </div>

                    <div class="d-flex align-items-center justify-content-center pb-4">
                        <p class="mb-0 me-2">Don't have an account?</p>
                        <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-danger">Create new</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- <div class=" d-flex align-items-center justify-content-center h-100">
    <form class="d-flex flex-column align-items-center" id="loginForm" action="logic/login-logic.php" method="post">
        <input type="hidden" name="role" value="<?= htmlspecialchars($role) ?>">

        <!-- Other login fields (username, password) -->
<h1>Login</h1>

<div class="d-flex flex-column">
    <label for="email">Email:</label>
    <input type="text" name="email" id="email" placeholder="Enter your email address..." required>
</div>
<div class="d-flex flex-column">
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" placeholder="Enter your password" required>
</div>
<!-- <div class="btns-box">
            <button class="btn-one" type="submit">
                <span class="txt">
                    Login<i class="icon-refresh arrow"></i>
                </span>
            </button>
        </div> -->
<button class="btn btn-primary" type="submit">Login</button>
</form>
</div> -->

<?php
require "includes/footer-end.php";
?>