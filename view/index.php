<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vehicle Rental Platform</title>
</head>
<body>

<?php  require_once "../controller/get_all_bus.php"?>

<?php foreach ($results

as $bus):
?>

<p><?=$bus->VEHICLE_ID . ' ' . $bus->MAKE_NAME . ' ' . $bus->MODEL_NAME  ?></p>

<?php endforeach; ?>


</body>
</html>