<?php
require_once  "../controller/booking_controller.php";
require_once  "../controller/vehicle_rating_controller.php";

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

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


    <style>
        .rating-header {
            margin-top: -10px;
            margin-bottom: 10px;
        }
    </style>

</head>

<body>



    <?php require_once "header.php" ?>

    <div class="jumbotron">
        <h2 style="text-align: center">My All Booking history</h2>
    </div>


    <table class="table table-hover" id="promotion_result">
        <thead>
            <tr>
                <th scope="col">ORDER_ID</th>
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
                        <button 
                                data-order_id="<?= $vehicleOrder->ORDER_ID ?>" 
                                data-make_name="<?= $vehicleOrder->MAKE_NAME ?>" 
                                data-model_name="<?= $vehicleOrder->MODEL_NAME ?>" 
                                data-booking_date="<?= $vehicleOrder->BOOKING_DATE ?>" 
                                data-max_capacity="<?= $vehicleOrder->MAX_CAPACITY ?>" 
                                data-rent_from="<?= $vehicleOrder->RENT_FROM ?>" 
                                data-rent_to="<?= $vehicleOrder->RENT_TO ?>" 
                                data-rating="<?= $vehicleOrder->RATING ?>" 
                                 
                                onclick="showDetails(this)" type="button" class="btn btn-primary" data-toggle="modal" data-target="#reviewModal">
                            Give Rating
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



    <!-- Modal vehicle details-->
    <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      
        <!-- <script>$window.location.reload();</script> -->
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img style="display: block;ORDER_ID
  margin-left: auto;
  margin-right: auto;
  width: 50%;" src="../images/<?= $vehicleOrder->VEHICLE_ID ?>.jpg" width="350px">
  
                    <p>Order Id: <span id="details-order-id"></span> </p>
                    <p>Manufacturer: <span id="details-make_name"></span> </p>
                    <p>Model Name: <span id="details-model_name"></span></p>
                    <p>Booking Date: <span id="details-booking_date"></span></p>
                    <p>Max capacity: <span id="details-max_capacity"></span></p>
                    <p>You rent this car from <span id="details-rent_from"></span> to <span id="details-rent_to"></span></p>
                    
                </div>

                <div class="form-group" id="rating-ability-wrapper">
                    <label class="control-label" for="rating">
                        <h4>How was your trip?</h4><br>

                        <span class="field-label-info"></span>
                        <input type="hidden" id="selected_rating" name="selected_rating" value="" required="required">
                    </label>
                    <h2 class="bold rating-header" style="">
                        <span class="selected-rating"><?= $vehicleOrder->RATING ?></span><small> / 5</small>
                    </h2>
                    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="1" id="rating-star-1">
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="2" id="rating-star-2">
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="3" id="rating-star-3">
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="4" id="rating-star-4">
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="5" id="rating-star-5">
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </button>
                </div>
                <div align="center">
                <form action="" method="post">
                <textarea rows="5" cols="50" name="review" placeholder="Give review here.."><?= $vehicleOrder->REVIEW ?></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                        <input type="submit" class="btn btn-primary" name="someAction" value="Save changes" />
                        <input type="hidden" id="details-submit-order_id" name="order_id" value="<?= $vehicleOrder->ORDER_ID ?>">

                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="../js/script.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



    <script>

        var order_rating;


        function showDetails(vehicle) {
            

            var orderId = vehicle.getAttribute("data-order_id");
            document.getElementById('details-submit-order_id').value = orderId;
            
            document.getElementById("details-order-id").innerHTML =  orderId;

            var make_name = vehicle.getAttribute("data-make_name");
            document.getElementById("details-make_name").innerHTML =  make_name;


            var model_name = vehicle.getAttribute("data-model_name");
            document.getElementById("details-model_name").innerHTML =  model_name;

            
            var booking_date = vehicle.getAttribute("data-booking_date");
            document.getElementById("details-booking_date").innerHTML =  booking_date;

            var max_capacity = vehicle.getAttribute("data-max_capacity");
            document.getElementById("details-max_capacity").innerHTML =  max_capacity;


            var rent_from = vehicle.getAttribute("data-rent_from");
            document.getElementById("details-rent_from").innerHTML =  rent_from;

            var rent_to = vehicle.getAttribute("data-rent_to");
            document.getElementById("details-rent_to").innerHTML =  rent_to;
            
            order_rating = vehicle.getAttribute("data-rating");

            // alert(orderId);

            foo();
        

        }

        function foo() {

              //*
              var previous_value = $("#selected_rating").val();
            var selected_value = order_rating;
            // alert(String(selected_value));
            $("#selected_rating").val(selected_value);

            $(".selected-rating").empty();
            $(".selected-rating").html(selected_value);

            for (i = 1; i <= selected_value; ++i) {
                $("#rating-star-" + i).toggleClass('btn-warning');
                $("#rating-star-" + i).toggleClass('btn-default');
            }

            for (ix = 1; ix <= previous_value; ++ix) {
                $("#rating-star-" + ix).toggleClass('btn-warning');
                $("#rating-star-" + ix).toggleClass('btn-default');
            }
            //*
            $(".btnrating").on('click', (function(e) {

                previous_value = $("#selected_rating").val();

                selected_value = $(this).attr("data-attr");
                document.cookie = "rating=" + selected_value;
                $("#selected_rating").val(selected_value);

                $(".selected-rating").empty();
                $(".selected-rating").html(selected_value);

                for (i = 1; i <= selected_value; ++i) {
                    $("#rating-star-" + i).toggleClass('btn-warning');
                    $("#rating-star-" + i).toggleClass('btn-default');
                }

                for (ix = 1; ix <= previous_value; ++ix) {
                    $("#rating-star-" + ix).toggleClass('btn-warning');
                    $("#rating-star-" + ix).toggleClass('btn-default');
                }

            }));

        }

        


        jQuery(document).ready(function($) {
            

            //*
            var previous_value = $("#selected_rating").val();
            var selected_value = order_rating;
            // alert(String(selected_value));
            $("#selected_rating").val(selected_value);

            $(".selected-rating").empty();
            $(".selected-rating").html(selected_value);

            for (i = 1; i <= selected_value; ++i) {
                $("#rating-star-" + i).toggleClass('btn-warning');
                $("#rating-star-" + i).toggleClass('btn-default');
            }

            for (ix = 1; ix <= previous_value; ++ix) {
                $("#rating-star-" + ix).toggleClass('btn-warning');
                $("#rating-star-" + ix).toggleClass('btn-default');
            }
            //*
            $(".btnrating").on('click', (function(e) {

                previous_value = $("#selected_rating").val();

                selected_value = $(this).attr("data-attr");
                document.cookie = "rating=" + selected_value;
                $("#selected_rating").val(selected_value);

                $(".selected-rating").empty();
                $(".selected-rating").html(selected_value);

                for (i = 1; i <= selected_value; ++i) {
                    $("#rating-star-" + i).toggleClass('btn-warning');
                    $("#rating-star-" + i).toggleClass('btn-default');
                }

                for (ix = 1; ix <= previous_value; ++ix) {
                    $("#rating-star-" + ix).toggleClass('btn-warning');
                    $("#rating-star-" + ix).toggleClass('btn-default');
                }

            }));


        });
    </script>






</body>

</html>