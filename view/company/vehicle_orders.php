<?php require_once  "header.php" ; 
require_once "../../controller/company/vehicle_orders.php";
?>

    <div class="col-sm-12 col-md-12 well" id="content">
        <h1>

            Booking history for Vehicle Id <?=$vehicle_id ?>
        </h1>





    </div>

<?php if(isset($_REQUEST['alert_header']) && isset($_REQUEST['alert_body'])): ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong><?=$_REQUEST['alert_header']?>: </strong><?=$_REQUEST['alert_body']?>
    </div>
<?php endif; ?>


    <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Customer name</th>
                    <th scope="col">Adress</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact number</th>
                    <th scope="col">Booking date</th>
                    <th scope="col">RENT FROM</th>
                    <th scope="col">RENT TO</th>
                </tr>
                </thead>
                <tbody>

    <?php if(count($results) == 0): ?>

    <tr><td colspan="5" style="text-align: center"><h3>No booking available for this bus</h3></td></tr>

    <?php endif;?>


<?php foreach ($results

               as $bus):

    ?>
                <tr id="vehicle-<?=$bus->VEHICLE_ID?>">
                    <th scope="row"><?=$bus->CONTACT_NAME?></th>
                    <th scope="row"><?=$bus->ADDRESS?></th>
                    <th scope="row"><?=$bus->EMAIL_ADDRESS?></th>
                    <th scope="row"><?=$bus->CONTACT_NUMBER?></th>
                    <th scope="row"><?=$bus->BOOKING_DATE?></th>
                    <th scope="row"><?=$bus->RENT_FROM?></th>
                    <th scope="row"><?=$bus->RENT_TO?></th>



                </tr>

<?php endforeach; ?>


<?php require_once  "footer.php" ; ?>