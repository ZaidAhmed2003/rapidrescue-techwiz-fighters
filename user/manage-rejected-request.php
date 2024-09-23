<?php
require "includes/header.php";
require "includes/sidebar.php";

$currentUserId = $_SESSION['userid'];
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
                u.userid,
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
            LEFT JOIN 
                ambulances a ON er.ambulanceid = a.ambulanceid
            WHERE 
                er.userid = ? AND er.status = 'cancelled'
                ";

            // Prepare and bind parameters to prevent SQL injection
            if ($stmt = $connection->prepare($requestQuery)) {
                $stmt->bind_param("i", $currentUserId); // Assuming user ID is an integer
                $stmt->execute();
                $requests = $stmt->get_result();
            }

            ?>

            <?php if ($requests && mysqli_num_rows($requests) > 0) : ?>
                <table class="table table-striped text-center">
                    <thead>
                        <tr data-breakpoints="xs" class="border">
                            <th class="border">Sno</th>
                            <th class="border">Hospital</th>
                            <th class="border">Address</th>
                            <th class="border">Status</th>
                            <th class="border">Type</th>
                            <th class="border">Creation Date</th>
                            <th class="border">Ambulance Assigned</th>
                            <th class="border">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $serialNo = 1;

                        while ($request = mysqli_fetch_assoc($requests)) : ?>
                            <tr class="border">
                                <td class="border"><?= $serialNo++ ?></td>
                                <td class="border"><?= htmlspecialchars($request['hospital_name']) ?></td>
                                <td class="border"><?= htmlspecialchars($request['pickup_address']) ?></td>
                                <td class="border"><?= htmlspecialchars($request['status']) ?></td>
                                <td class="border"><?= htmlspecialchars($request['type']) ?></td>
                                <td class="border"><?= htmlspecialchars($request['request_time']) ?></td>
                                <td class="border"><?= $request['vehicle_number'] ? htmlspecialchars($request['vehicle_number']) : 'Not Assigned' ?></td>
                                <td class="border">
                                    <a href="#" class="p-1 action-btns delete-emergency-request" data-id="<?= htmlspecialchars($request['requestid']) ?>">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            <?php else : ?>
                <div class="text-center py-3 alert-message alert-danger"><?= "No Requests Found" ?></div>
            <?php endif ?>

    </div>
</div>
</main>

<?php
require "includes/footer.php"
?>