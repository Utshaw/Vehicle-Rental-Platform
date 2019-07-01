<?php
    require_once "../../controller/company/login_check.php";
    require_once  "./header.php" ;
    require_once  "../../controller/company/company_bus_list_controller.php" ;
    

?>
<div class="col-sm-12 col-md-12 well" id="content">
    <h1>

        All Vehicles From <?=$session_company_name?>
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
                <th scope="col">Vehicle Id</th>
                <th scope="col">Make</th>
                <th scope="col">Model</th>
                <th scope="col">Daily Rate</th>
                <th scope="col">Max capacity</th>
                <th scope="col">Action</th>
                <th scope="col">Edit</th>
            </tr>
            </thead>
            <tbody>


<?php foreach ($results

           as $bus):

?>
            <tr id="vehicle-<?=$bus->VEHICLE_ID?>">
                <th scope="row"><?=$bus->VEHICLE_ID?></th>
                <th scope="row"><?=$bus->MAKE_NAME?></th>
                <th scope="row"><?=$bus->MODEL_NAME?></th>
                <th scope="row"><?=$bus->DAILY_RATE?></th>
                <th scope="row"><?=$bus->MAX_CAPACITY?></th>

                <th scope="row"><a href="../controller/admin_vehicle_orders.php?vehicle_id=<?=$bus->VEHICLE_ID?>">All bookings</a></th>
                <th scope="row"><a href="../controller/admin_bus_edit.php?vehicle_id=<?=$bus->VEHICLE_ID?>"><i class="fa fa-edit" style="font-size:24px"></i></a> </th>


            </tr>

<?php endforeach; ?>


<?php require_once  "footer.php" ; ?>

