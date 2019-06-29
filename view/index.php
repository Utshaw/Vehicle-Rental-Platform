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
                <div class="card-header">MUS Rental</div>
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
                            <div class="form-group col-md-12">
                                <label for="date_from">Booking date</label>
                                <input name="date" type="date" class="form-control" id="date_from" placeholder="Date required" value="" required>
                            </div>

                        </div>



                        <input class="btn btn-primary " name="submit_search" type="submit" value="Search_for_bus" />
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!--jumbortron end-->







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




    <?php require_once "../controller/bus_search_controller.php"; ?>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



    <script type="text/javascript" src="../js/script.js"></script>

    <script type="text/javascript" src="../js/homepage_promotion_update.js"></script>

    <script type="text/javascript" src="../js/homepage_min_date.js"></script>


</body>

</html>
