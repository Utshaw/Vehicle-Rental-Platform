<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>MUS Ltd</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/landing-page.css">

    <link rel="shortcut icon" type="image/png" href="../images/favicon.png" />

    <link rel="stylesheet" href="../css/modal-modification.css">


</head>

<body>



    <?php require_once "header.php" ?>

    <?php require_once "../controller/company/company_controller.php" ?>

    <div class="alert alert-success alert-dismissable" id="home_promo_div">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <span id="home_message"></span>
    </div>


    <div class="alert alert-success alert-dismissable" id="home_bus_div">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <span id="home_bus_entry"></span>
    </div>


    <!--jumbotron start-->
    <div class="jumbotron">
        <div class="container">
            <div class="card text-white text-center bg-dark mb-3">
                <div class="card-header">MUS HIRE LTD</div>
                <div class="card-body">
                    <p class="card-text">HIRE OUR VEHICLE AND TRAVEL ANYWHERE</p>
                    <h5 class="card-title">Select your criteria</h5>
                    <form action="" method="get">
                        <div class="form-row">

                            <div class="col-md-6 mb-3   ">
                                <input name="num_passengers" type="number" class="form-control" id="validationDefault01" value="" required placeholder="Number of passengers">
                            </div>


                            <div class="col-md-6 mb-3   ">

                                <select name="company" class="form-control input-sm">
                                    <option value="-1">All Companies</option>
                                    <?php foreach ($companies as $company) : ?>
                                        <option value="<?= $company->COMPANY_ID ?>"><?= $company->COMPANY_NAME ?></option>
                                    <?php endforeach; ?>

                                </select>


                            </div>




                        </div>
                        <div class="form-row">

                            <div class="col-md-6 mb-3   ">
                                <input name="min_cost" type="number" class="form-control" id="validationDefault01" value="" required placeholder="Minimum cost">
                            </div>

                            <div class="col-md-6 mb-3">
                                <input name="max_cost" type="number" class="form-control" id="validationDefault02" placeholder="Maximum cost" value="" required>
                            </div>

                        </div>



                        <div class="form-row">
                            <div class="form-group col-md-6 mb-3">
                                <label for="date_from">Rent date from</label>
                                <input name="date_from" type="date" class="form-control" id="date_from" placeholder="Date required" value="" required>
                            </div>

                            <div class="form-group col-md-6 mb-3">
                                <label for="date_from">Rent date upto</label>
                                <input name="date_to" type="date" class="form-control" id="date_to" placeholder="Date required" value="" required>
                            </div>

                        </div>





                        <input class="btn btn-primary " name="submit_search" type="submit" value="Search" />
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!--jumbortron end-->



    


    <div class="content">
    <h2>Vehicle you might hire</h1>

    <!-- content changes on each page -->
    <div class="container" >


    <?php 
        require_once "./test4.php";
    ?>


        <?php 

$rec_num_buses=0;
        foreach ($recommends

            as $bus) :

            ?>


            <?php

            if ($rec_num_buses % 4 == 0) :


                ?>
                <div class="card-group">


                <?php
                endif;
                $rec_num_buses = $rec_num_buses + 1; ?>






                <div class="card card text-white bg-dark mb-3">
                    
                    <img class="card-img-top" src="../images/<?= $bus->IMAGE ?>  " alt="Image of the bus" height="150">
                    
                    <div class="card-body">
                        <a target="_blank" href="http://localhost/VRP/view/bus.php?vehicle_id=<?= $bus->VEHICLE_ID ?>">
                            <h5 class="card-title"><?= $bus->MAKE_NAME ?></h5>
                        </a>

                        <!-- <p><span  class="stars-container stars-<?= ceil($bus->RATING) ?>">★★★★★</span></p> -->

                        <p>Vehicle Rating: <? if(!isset($bus->RATING)){ echo "No rating found";} else {echo $bus->RATING;}?></p>


                        <!-- <span class="stars-container stars-50">★★★★★</span> -->




                        <?php if($bus->DAILY_RATE != $bus->PROMOTIONAL_DAILY_RATE) { ?>

                        <p class="card-text"><s>DAILY RATE: &#2547; <?=$bus->DAILY_RATE?> </s></p>
                        <p class="card-text">PORMO DAILY RATE: &#2547; <?=$bus->PROMOTIONAL_DAILY_RATE?> </p>

                        <?php }else{  ?>
                            <p class="card-text">DAILY RATE: &#2547; <?=$bus->DAILY_RATE?></p>
                        <?php } ?>
                        <p>CAPACITY: <?= $bus->MAX_CAPACITY ?></p>

                        <p>COMPANY: <?= $bus->COMPANY_NAME ?></p>



                        <p><button class="cartitem btn btn-primary" data-date_from="<?= $date_from ?>" data-date_to="<?= $date_to ?>" data-booking_date="<?= $booking_date ?>" data-id="<?= $bus->VEHICLE_ID ?>" data-make="<?= $bus->MAKE_NAME ?>" data-model="<?= $bus->MODEL_NAME ?>" data-price="<?= $bus->PROMOTIONAL_DAILY_RATE ?>">Add to cart</button></p>
                    </div>
                    <div class="card-footer">
                        <small><?= $bus->COMPANY_NAME ?></small> <br>

                        <small style="color: bisque"><?= $bus->MODEL_NAME ?></small>
                    </div>
                    
                </div>


                <?php
                if ($rec_num_buses % 4 == 0) {


                    ?>
                </div>

            <?php } if ($rec_num_buses == $total_rec_result) : ?>

                <?php while (($rec_num_buses % 4) != 0) : ?>

                    <div class="card card text-white bg-dark mb-3" style="visibility: hidden;">
                        <img class="card-img-top" src="../images/<?= $bus->IMAGE ?>  " alt="Image of the bus" height="150">
                        <div class="card-body">
                            <h5 class="card-title"><?= $bus->MAKE ?></h5>
                            <p class="card-text">DAILY RATE:<?= $bus->DAILY_RATE ?></p>
                        </div>

                        <div class="card-footer">
                            <span style="color: red"><?= $bus->MODEL_NAME ?></span>
                        </div>
                    </div>

                    <?php
                    $rec_num_buses++;
                endwhile;
            endif;
            ?>


        <?php endforeach; ?>



    </div>
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
                                    <th>Date From</th>
                                    <th>Date To</th>
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



    <!-- PROMO Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title" id="promo_header">Modal Header</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    
                </div>
                <div class="modal-body" id="promo_body">
                    <p>Some text in the modal.</p>
                </div>
                <img id="promo_car" src="../images/sample_car.jpg">
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


    <?php require_once "../controller/bus_search_controller.php"; ?>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



    <script type="text/javascript" src="../js/script.js"></script>

    <script type="text/javascript" src="../js/homepage_promotion_update.js"></script>

    <script type="text/javascript" src="../js/homepage_min_date.js"></script>

    <script>
        $(document).ready(function() {

            
        });
    </script>

</body>

</html>
