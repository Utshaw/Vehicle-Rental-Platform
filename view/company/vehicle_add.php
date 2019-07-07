<?php 

// require_once "../../controller/company/vehicle_submit.php";


require_once  "./header.php" ;

require_once "../../controller/company/vehicle_submit.php";





?>

<div class="col-sm-12 col-md-12 well" id="content">
    <h1>

        Add vehicle
    </h1>





</div>

<!-- Row start -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <i class="icon-calendar"></i>
                <h3 class="panel-title">Add vehicle</h3>
            </div>

            <div class="panel-body">
                <form class="form-horizontal row-border" action="" method="post">


                    <div class="form-group">
                        <label class="col-md-1 control-label">Manufacturer</label>
                        <div class="col-md-11">

                            <select name="make" class="form-control input-sm">
                                <?php foreach ($makes as $make): ?>
                                    <option value="<?=$make->MAKE_ID?>"><?=$make->MAKE_NAME ?></option>
                                <?php endforeach; ?>                            </select>
                        </div>
                    </div>




                    <div class="form-group">
                        <label class="col-md-1 control-label">Model</label>
                        <div class="col-md-11">

                            <select name="model" class="form-control input-sm">
                                <?php foreach ($bus_models as $m): ?>
                                    <option value="<?=$m->MODEL_ID?>"><?=$m->MODEL_NAME?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-1 control-label">Daily rate</label>
                        <div class="col-md-11">
                            <input type="number" name="rate" class="form-control" value="" step="0.01">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-1 control-label">Maximum capacity</label>
                        <div class="col-md-11">
                            <input type="number" name="mcap" class="form-control" >
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-md-1 control-label">Select Image</label>
                        <div class="col-md-11">
                            <input type="file" name="fileToUpload" id="fileToUpload">
                        </div>
                    </div>

                    

                    <div class="form-group">
                        <div class="col-md-1">
                            <span></span>
                        </div>

                    
                        <div class="col-md-11">


                    <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
<!-- Row end -->



<?php require_once  "footer.php" ; ?>



