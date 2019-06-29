<?php
    require_once "../../controller/company/login_check.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MUS HIRE</title>
</head>
<body>



    <h1>Company Dashboard</h1>

    <?php if(isset($session_company_id)): ?>
                <a class="nav-link" href="./logout.php" > Sign Out (<?=$session_company_email?>)</a>
    <? endif ?>

</body>
</html>