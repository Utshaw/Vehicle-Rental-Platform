<?php

require_once '../../model/dbconnection.php';
require_once '../../model/dataAccess.php';
require_once "../../model/company.php";


require_once "../../controller/company/company_login_controller.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" type="image/png" href="../../images/favicon.png"/>


    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  

  <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">

  <link rel="stylesheet" href="../../css/style.css">


  <title>MUS HIRE LTD.</title>
</head>









<body class="text-center">


<form class="form-signin" action="" method="post">

    <img class="mb-4" src="../../images/favicon.png" alt="Company Logo" width="200">
    <h1 class="h3 mb-3 font-weight-normal">MUS HIRE LTD</h1>
    <h1 class="h4 mb-3 font-weight-normal">COMPANY LOGIN</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="email">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">

    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>



    <a href="./register.php" class="register">Register</a>
    <p class="mt-5 mb-3 login_fail" ><?=$message?></p>



</form>




</body>




</html>
