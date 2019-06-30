
<?php
require_once "../controller/login_check.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Checkout Page Discoveryvip.com</title>

    <link rel="shortcut icon" type="image/png" href="../images/favicon.png"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        input[type="number"] {
            width: 50px;
        }
    </style>




</head>

<body>


<?php  require_once "header.php"?>


<div class="container">


    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <span id="home_message"></span>
    </div>


    <h1>Shopping Checkout</h1>
<!--    <form action="https://www.paypal.com/cgi-bin/webscr" method="post">-->
        <input type="hidden" name="cmd" value="_cart">
        <input type="hidden" name="upload" value="1">
        <input type="hidden" name="business" value="seller@dezignerfotos.com">
        <table class="table table-hover">
            <thead>
            <tr>



                <th scope="col">#</th>
                <th scope="col">Vehicle</th>
                <th scope="col">Model</th>
                <th scope="col">Booking date</th>
                <th scope="col">Cost</th>
                <th scope="col">Remove</th>

            </tr>
            </thead>
            <tbody id="cart_output_checklist">

            </tbody>
        </table>

    <button id="submit_checkout" class="btn btn-primary btn-block">Checkout</button>



<!--        <input type="submit" class="btn btn-primary btn-block" value="Checkout with PayPal"> <a href="products.html" class="btn btn-success">Continue Shopping</a>-->

<!--    </form>-->
</div>




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

                <div class="table-responsive">
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Continue Shopping</button><a href="checkout.php" class="btn btn-primary">Proceed to checkout</a></div>
        </div>
    </div>
</div>



<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>

<script type="text/javascript" src="../js/checkout.js"></script>

<script type="text/javascript" src="../js/script.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>

</html>
