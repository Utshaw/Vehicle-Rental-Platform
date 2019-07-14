<?php require_once  "../controller/booking_controller.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>Berwyn Buses Hire Ltd</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/booking.css">


    <link rel="shortcut icon" type="image/png" href="../images/favicon.png" />



</head>

<body>



<<<<<<< HEAD
<?php  require_once "header.php"?>

<div class="jumbotron">
<h2 style="text-align: center">My All Booking history</h2>
</div>


<table class="table table-hover" id="promotion_result">
    <thead>
    <tr>
        <th scope="col">BOOKING_ID</th>
        <th scope="col">BUS MANUFACTURER</th>
        <th scope="col">BUS MODEL</th>
        <th scope="col">BOOKING DATE</th>
        <th scope="col">CAPACITY</th>
        <th scope="col">REVIEW</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($results

                   as $vehicleOrder):

        ?>
        <tr>
            <th scope="row"><?=$vehicleOrder->ORDER_ID?></th>
            <th scope="row"><?=$vehicleOrder->MAKE_NAME?></th>
            <th scope="row"><?=$vehicleOrder->MODEL_NAME?></th>
            <th scope="row"><?=$vehicleOrder->BOOKING_DATE?></th>
            <th scope="row"><?=$vehicleOrder->MAX_CAPACITY?></th>
            <th scope="row"></th>
        </tr>
=======
    <?php require_once "header.php" ?>
>>>>>>> 1657dab8682ebbd800272ecb49a7e89e85451831

    <div class="jumbotron">
        <h2 style="text-align: center">My All Booking history</h2>
    </div>


    <table class="table table-hover" id="promotion_result">
        <thead>
            <tr>
                <th scope="col">BOOKING_ID</th>
                <th scope="col">VEHICLE MANUFACTURER</th>
                <th scope="col">VEHICLE MODEL</th>
                <th scope="col">BOOKING DATE</th>
                <th scope="col">CAPACITY</th>
                <th scope="col">REVIEW</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($results

                as $vehicleOrder) :

                ?>
                <tr>
                    <th scope="row"><?= $vehicleOrder->ORDER_ID ?></th>
                    <th scope="row"><?= $vehicleOrder->MAKE_NAME ?></th>
                    <th scope="row"><?= $vehicleOrder->MODEL_NAME ?></th>
                    <th scope="row"><?= $vehicleOrder->BOOKING_DATE ?></th>
                    <th scope="row"><?= $vehicleOrder->MAX_CAPACITY ?></th>
                    <th scope="row">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reviewModal">
                            Launch demo modal
                        </button></th>
                </tr>


            <?php endforeach; ?>

        </tbody>
    </table>





    <!-- Modals -->
    <div class="modal fade bd-example-modal-lg" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cart</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
                        <thead class="thead-inverse">
                            <tr>
                                <th>#</th>
                                <th>Vehicle</th>
                                <th>Model</th>
                                <th>Booking date</th>
                                <th>Cost</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody id="cart_output_modal"> </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Continue Shopping</button><a href="checkout.php" class="btn btn-primary">Proceed to checkout</a></div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img style="display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;" src="https://i1.rgstatic.net/ii/profile.image/595662668304389-1519028455204_Q512/Farhan_Utshaw.jpg" width="350px">
                    <?= $vehicleOrder->ORDER_ID ?>
                    <?= $vehicleOrder->MAKE_NAME ?>
                    <?= $vehicleOrder->MODEL_NAME ?>
                    <?= $vehicleOrder->BOOKING_DATE ?>
                    <?= $vehicleOrder->MAX_CAPACITY ?>
                    <?= $vehicleOrder->RENT_FROM ?>
                    <?= $vehicleOrder->RENT_TO ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="../js/script.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>







    </script>


</body>

</html>