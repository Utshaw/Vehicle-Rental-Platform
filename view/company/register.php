<?php

require_once '../../model/dbconnection.php';
require_once '../../model/dataAccess.php';
require_once "../../model/company.php";


require_once "../../controller/company/register_contoller.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" type="image/png" href="../images/favicon.png"/>


    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  

  <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">

  <link rel="stylesheet" href="../css/style.css">


  <title>MUS HIRE LTD.</title>
</head>









<body class="text-center">

<form class="form-signin" action="" method="post">

    <img class="mb-4" src="../../images/favicon.png" alt="Company Logo" width="200">
    <h1 class="h3 mb-3 font-weight-normal">MUS HIRE Ltd</h1>
    <p class="h3 mb-3 font-weight-normal">Register your account</p>

    <label for="inputName" class="sr-only">Name</label>
    <input type="text" id="inputName" class="form-control" placeholder="Full name" required autofocus name="name">


    <label for="address" class="sr-only">Home Address</label>
    <input type="text" id="address" class="form-control" placeholder="Home address" required autofocus name="address">


    <label for="phone" class="sr-only">Phone number</label>
    <input type="tel" id="phone" class="form-control" placeholder="Phone number" required autofocus name="phone">


    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="email">


    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">

    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>

    <a href="login.php" class="register">Already have account?</a>


    <p class="mt-5 mb-3 login_fail" ><?=$message?></p>



</form>




</body>




</html>
