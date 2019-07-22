<?php
    require_once "../../controller/admin/login_check.php";
    require_once  "./header.php" ;
    require_once  "../../controller/admin/order_controller.php" ;
?>


<div class="col-sm-12 col-md-12 well" id="content">
    <h1>

        All vehicle order
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
                <th scope="col">Customer</th>
                <th scope="col">Make</th>
                <th scope="col">Model</th>
                <th scope="col">Booking Date</th>
                <th scope="col">Rent From</th>
                <th scope="col">Rent To</th>
                <!-- <th scope="col">Action</th>
                <th scope="col">Edit</th> -->
            </tr>
            </thead>
            <tbody>


<?php foreach ($results

           as $bus):

?>
            <tr id="vehicle-<?=$bus->VEHICLE_ID?>">
                <th scope="row"><?=$bus->CONTACT_NAME?></th>
                <th scope="row"><?=$bus->MAKE_NAME?></th>
                <th scope="row"><?=$bus->MODEL_NAME?></th>
                <th scope="row"><?=$bus->BOOKING_DATE?></th>
                <th scope="row"><?=$bus->RENT_FROM?></th>
                <th scope="row"><?=$bus->RENT_TO?></th>

                <!-- <th scope="row"><a href="../controller/admin_vehicle_orders.php?vehicle_id=<?=$bus->VEHICLE_ID?>">All bookings</a></th>
                <th scope="row"><a href="../controller/admin_bus_edit.php?vehicle_id=<?=$bus->VEHICLE_ID?>"><i class="fa fa-edit" style="font-size:24px"></i></a> </th> -->


            </tr>

<?php endforeach; ?>


<?php require_once  "footer.php" ; ?>







  