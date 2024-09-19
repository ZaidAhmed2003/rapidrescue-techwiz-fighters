<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapid Rescue</title>
    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/css/bootstrap/css/bootstrap.min.css">

</head>

<body class="flex ">


    <aside class="flex flex-col h-screen shadow-lg  w-[255px]">

        <div class="py-2 flex justify-center shadow-md border-b">
            <img class="w-24" src="../assets/images/rapidrescue-color.svg">
        </div>
        <div class="flex flex-col font-semibold text-lg ">
            <ul class="flex flex-col">
                <li class="bg-[#ED2980] px-5 py-3 border-y"><a href="">Dashboard</a></li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Ambulance</span>
                    </a>
                    <ul class="sub">
                        <li><a href="add-ambulance.php">Add Ambulance</a></li>
                        <li><a href="manage-ambulance.php">Manage Ambulance</a></li>

                    </ul>
                </li>
            </ul>
        </div>

    </aside>
    <main></main>



    <script src="<?= ROOT_URL ?>assets/css/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>