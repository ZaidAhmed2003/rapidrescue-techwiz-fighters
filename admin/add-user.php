<?php
include 'partials/header.php';

// get back form data if there was an error
$firstName = $_SESSION['add-user-data']['firstname'] ?? null;
$lastName = $_SESSION['add-user-data']['lastname'] ?? null;
$email = $_SESSION['add-user-data']['email'] ?? null;
$phonenumber = $_SESSION['add-user-data']['phonenumber'] ?? null;
$date_of_birth = $_POST['date_of_birth'] ?? null;
$address = $_POST['address'] ?? null;
$password = $_POST['password']; ?? null

unset($_SESSION['add-user-data']);
?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Add User</h2>

        <?php
        if (isset($_SESSION['add-user'])) : ?>
            <div class="alert__message error">
                <p>
                    <?=
                    $_SESSION['add-user'];
                    unset($_SESSION['add-user']);
                    ?>
                </p>
            </div>
        <?php endif ?>

        <!-- <div class="alert__message error">
            <p>This is an error message</p>
        </div> -->
        <form action="<?= ROOT_URL ?>admin/add-user-logic.php" enctype="multipart/form-data" method="post">
            <input type="text" value="<?= $firstName ?>" name="firstname" placeholder="First Name">
            <input type="text" value="<?= $lastName ?>" name="lastname" placeholder="Last Name">
            <input type="text" value="<?= $userName ?>" name="username" placeholder="Username">
            <input type="email" value="<?= $email ?>" name="email" placeholder="Email">
            <input type="password" value="<?= $createPassword ?>" name="createpassword" placeholder="Create password">
            <input type="password" value="<?= $confirmPassword ?>" name="confirmpassword" placeholder="Confirm password">
            <select name="userrole">
                <option value="0">Author</option>
                <option value="1">Admin</option>
            </select>
            <div class="form__control">
                <label for="avatar">User Avatar</label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <button type="submit" name="submit" class="btn">Add User</button>
        </form>
    </div>
</section>

<!-- Footer -->

<?php
include '../partials/footer.php';
?>