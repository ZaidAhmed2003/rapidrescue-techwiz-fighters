<?php
require "includes/header.php";
?>
<div class=" d-flex align-items-center justify-content-center h-100">
    <form id="loginForm" action="logic/login-logic.php" method="post">
        <input type="hidden" name="role" value="<?= htmlspecialchars($role) ?>">

        <!-- Other login fields (username, password) -->
        <div>


            <label for="email">Email:</label>
            <input type="text" name="email" id="email" placeholder="Enter your email address..." required>

        </div>
        <div>

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
        <button type="submit">Login</button>
    </form>
</div>
<?php
require "includes/footer-end.php";
?>