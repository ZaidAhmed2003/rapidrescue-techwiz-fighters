<?php
session_start();
require "includes/header.php";


if (($_SESSION['role'] != 'admin')) {
    header("Location:" . ROOT_URL . "login.php");
    exit();
}
require "includes/sidebar.php";
?>

<div class="container-fluid px-5 py-4">
    <div class="panel d-flex align-items-center justify-content-center">
        <div class="panel-heading border w-100 text-center py-2">
            Manage Users
        </div>
    </div>
    <div class="">
        <table class="w-100 text-center">
            <?php
            $currentAdminId = $_SESSION['userid'];
            $query = "SELECT * FROM users WHERE NOT userid='$currentAdminId'";
            $users = mysqli_query($connection, $query)
            ?>
            <tbody>
                <?php if (mysqli_num_rows($users) > 0) : ?>
                    <table class="table table-striped text-center">
                        <thead>
                            <tr data-breakpoints="xs" class=" border">
                                <th class="border">Sno</th>
                                <th class="border">Name</th>
                                <th class="border">Email</th>
                                <th class="border">Contact</th>
                                <th class="border">Date of Birth</th>
                                <th class="border">Address</th>
                                <th class="border">Role</th>
                                <th class="border">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $serialNo = 1;

                            while ($user = mysqli_fetch_assoc($users)) : ?>
                                <tr class=" border">
                                    <td class="border"><?= $serialNo++ ?></td>
                                    <td class="border"> <?= $user['firstname'] . " " . $user['lastname'] ?>
                                    <td class="border"><?= $user['email'] ?>
                                    </td>
                                    <td class="border"><?= $user['phonenumber'] ?></td>

                                    <td class="border"><?= $user['date_of_birth'] ?></td>
                                    <td class="border"><?= $user['address'] ?></td>
                                    <td class="border"><?= $user['role'] ?></td>
                                    <td class="border">
                                        <a href="<?= ROOT_URL ?>admin/edit-user.php?id=<?= $user['userid'] ?>" class="p-1 action-btns">Edit</a>
                                        <a href="#" class="p-1 action-btns delete-user" data-id="<?= $user['userid'] ?>">Delete</a>
                                    </td>

                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>


                <?php else : ?>
                    <div class=" text-center py-5    alert__message error"><?= "No Users Found" ?></div>
                <?php endif ?>

    </div>
</div>


</main>

<?php
require "includes/footer.php"
?>