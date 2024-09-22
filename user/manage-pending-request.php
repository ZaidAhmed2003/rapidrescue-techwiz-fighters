<?php
require "includes/header.php";
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
                                SELECT 
       er.requestid,
     u.firstname,
      a.vehicle_number,
    er.request_time,
    er.status,
    er.hospital_name,
    er.pickup_address,
    er.type
FROM 
    emergency_requests er
JOIN 
    users u ON er.userid = u.userid
JOIN 
    ambulances a ON er.ambulanceid = a.ambulanceid
       WHERE 
        er.status = 'pending';

                ";
            $requests = mysqli_query($connection, $requestQuery);

            ?>
            <tbody>
                <?php if (mysqli_num_rows($requests) > 0) : ?>
                    <table class="table table-striped text-center">
                        <thead>
                            <tr data-breakpoints="xs" class=" border">
                                <th class="border">Sno</th>
                                <th class="border">Hospital</th>
                                <th class="border">Address</th>
                                <th class="border">Status</th>
                                <th class="border">Type</th>
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
                                    <td class="border"><?= $request['hospital_name'] ?></td>
                                    <td class="border"><?= $request['pickup_address'] ?></td>
                                    <td class="border"><?= $request['request_time'] ?></td>
                                    <td class="border"><?= $request['type'] ?></td>
                                    <td class="border"><?= $request['status'] ?></td>

                                    <td class="border">
                                        <a href="#" class="p-1 action-btns delete-request" data-id="<?= $request['requestid'] ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>


                <?php else : ?>
                    <div class=" text-center py-5    alert__message error"><?= "No Request Pending" ?></div>
                <?php endif ?>

    </div>
</div>
</main>

<?php
require "includes/footer.php"
?>