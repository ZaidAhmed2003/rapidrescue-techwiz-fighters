<?php
session_start();
require "includes/header.php";


if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
require "includes/sidebar.php";
?>

<div class="container-fluid px-5 py-4">
    <div class="panel d-flex align-items-center justify-content-center">
        <div class="panel-heading border w-100 text-center py-2">
            Manage Requests
        </div>
    </div>
    <div class="">
        <table class="w-100 text-center">
            <?php
            $requestQuery = "
                    SELECT a.*, d.*
                    FROM ambulances a 
                    RIGHT JOIN emergency_request d ON a.ambulanceid = d.ambulanceid
                ";
            $requests = mysqli_query($connection, $requestQuery);

            ?>
            <tbody>
                <?php if (mysqli_num_rows($requests) > 0) : ?>
                    <table class="table table-striped text-center">
                        <thead>
                            <tr data-breakpoints="xs" class=" border">
                                <th class="border">Sno</th>
                                <th class="border">Type of Ambulance</th>
                                <th class="border">Ambulance Reg No.</th>
                                <th class="border">Name of Driver</th>
                                <th class="border">Phone Number</th>
                                <th class="border">Phone Number</th>
                                <th class="border">Phone Number</th>
                                <th class="border">Phone Number</th>

                                <th class="border">Creation Date</th>
                                <th class="border">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $serialNo = 1;

                            while ($request = mysqli_fetch_assoc($requests)) : ?>
                                <tr class=" border">
                                    <td class="border"><?= $serialNo++ ?></td>
                                    <td class="border"><?= $request['booking_number'] ?>
                                    </td>
                                    <td class="border"><?= $request['ambulanceid'] ?></td>

                                    <td class="border"><?= $request['hospital_name'] ?></td>
                                    <td class="border"><?= $request['customer_mobile'] ?></td>
                                    <td class="border"><?= $request['pickup_address'] ?></td>
                                    <td class="border"><?= $request['request_time'] ?></td>

                                    <td class="border"><?= $request['type'] ?></td>
                                    <td class="border"><?= $request['status'] ?></td>
                                    <td class="border">
                                        <a href="<?= ROOT_URL ?>admin/edit-ambulance.php?id=<?= $request['requestid'] ?>" class="p-1 action-btns">Edit</a>
                                        <a href="#" class="p-1 action-btns delete-ambulance" data-id="<?= $request['requestid'] ?>">Delete</a>
                                    </td>

                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>


                <?php else : ?>
                    <div class=" text-center py-5    alert__message error"><?= "No Ambulances Found" ?></div>
                <?php endif ?>

    </div>
</div>
</main>

<?php
require "includes/footer.php"
?>