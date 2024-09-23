<?php
require "includes/header.php";
require "includes/sidebar.php";
?>



<div class="container-fluid px-5 py-4">
    <div id="responseMessage"></div>
    <div class="panel d-flex align-items-center justify-content-center">
        <div class="panel-heading border w-100 text-center py-2">
            Manage Ambulances
        </div>
    </div>
    <div class="">
        <table class="w-100 text-center">
            <?php
            $ambulanceQuery = "
                    SELECT a.*, d.firstname, d.lastname, d.phonenumber
                    FROM ambulances a 
                    LEFT JOIN drivers d ON a.ambulanceid = d.ambulanceid
                ";
            $ambulances = mysqli_query($connection, $ambulanceQuery);

            ?>
            <tbody>
                <?php if (mysqli_num_rows($ambulances) > 0) : ?>
                    <table class="table table-striped text-center">
                        <thead>
                            <tr data-breakpoints="xs" class=" border">
                                <th class="border">Sno</th>
                                <th class="border">Type of Ambulance</th>
                                <th class="border">Ambulance Reg No.</th>
                                <th class="border">Driver Assigned</th>
                                <th class="border">Capacity</th>
                                <th class="border">Location</th>
                                <th class="border">Creation Date</th>
                                <th class="border">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $serialNo = 1;

                            while ($ambulance = mysqli_fetch_assoc($ambulances)) : ?>
                                <tr class=" border">
                                    <td class="border"><?= $serialNo++ ?></td>
                                    <td class="border"><?= $ambulance['equipment_level'] ?>
                                    </td>
                                    <td class="border"><?= $ambulance['vehicle_number'] ?></td>
                                    <td class="border"> <?= $ambulance['firstname'] && $ambulance['lastname']
                                                            ? $ambulance['firstname'] . " " . $ambulance['lastname']
                                                            : 'Not Assigned' ?></td>
                                    <td class="border"><?= $ambulance['capacity'] ?></td>
                                    <td class="border"><?= $ambulance['location'] ?></td>
                                    <td class="border"><?= $ambulance['created_at'] ?></td>
                                    <td class="border">
                                        <a href="<?= ROOT_URL ?>admin/edit-ambulance.php?id=<?= $ambulance['ambulanceid'] ?>" class="p-1 action-btns">Edit</a>
                                        <a href="#" class="p-1 action-btns delete-ambulance" data-id="<?= $ambulance['ambulanceid'] ?>">Delete</a>
                                    </td>

                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>


                <?php else : ?>
                    <div class=" text-center py-5 alert__message error"><?= "No Ambulances Found" ?></div>
                <?php endif ?>

    </div>
</div>


</main>

<?php
require "includes/footer.php"
?>