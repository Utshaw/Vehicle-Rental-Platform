<?php
    require_once "../../controller/admin/login_check.php";

    

    require_once  "./header.php" ;
    require_once  "../../controller/admin/company_list_controller.php" ;
?>


<div class="col-sm-12 col-md-12 well" id="content">
    <h1>

        Customers
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

                <th scope="col">Company Name</th>
                <th scope="col">Address</th>
                <th scope="col">Email Address</th>
                <th scope="col">Contact Number</th>
                
            </tr>
            </thead>
            <tbody>


<?php foreach ($results

           as $customer):

?>
            <tr id="vehicle-<?=$customer->CUSTOMER_ID?>">
                <th scope="row"><?=$customer->COMPANY_NAME?></th>
                <th scope="row"><?=$customer->ADDRESS?></th>
                <th scope="row"><?=$customer->EMAIL_ADDRESS?></th>
                <th scope="row"><?=$customer->CONTACT_NUMBER?></th>

                
                <!-- <th scope="row"><a href="../controller/admin_customer_edit.php?vehicle_id=<?=$customer->VEHICLE_ID?>"><i class="fa fa-edit" style="font-size:24px"></i></a> </th> -->


            </tr>

<?php endforeach; ?>


<?php require_once  "footer.php" ; ?>







  