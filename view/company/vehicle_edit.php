<?php require_once  "./header.php";
require_once "../../controller/company/bus_delete_controller.php";
require_once "../../controller/company/bus_edit_controller.php";
?>

<div class="col-sm-12 col-md-12 well" id="content">
    <h1>

        Edit Vehicle
    </h1>





</div>

<!-- Row start -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <i class="icon-calendar"></i>
                <h3 class="panel-title">Edit vehicle no <?= $result->VEHICLE_ID ?></h3>
            </div>

            <div class="panel-body">
                <form class="form-horizontal row-border" action="" method="post">


                    <div class="form-group">
                        <label class="col-md-1 control-label">Image</label>
                        <div class="col-md-11">

                            <img src="../../images/<?= $result->IMAGE ?>" width="250px" />
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-1 control-label">Manufacturer</label>
                        <div class="col-md-11">

                            <select name="make" class="form-control input-sm">
                                <?php foreach ($makes as $make) : ?>
                                    <option value="<?= $make->MAKE_ID ?>" <?php if ($result->MAKE_ID == $make->MAKE_ID) { ?> selected <?php  } ?>><?= $make->MAKE_NAME ?></option>
                                <?php endforeach; ?> </select>
                            <!-- <a href="../controller/admin_add_make.php" target="_blank">Add new bus manufacturer from here</a> -->
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-1 control-label">Model</label>
                        <div class="col-md-11">

                            <select name="model" class="form-control input-sm">
                                <?php foreach ($bus_models as $m) : ?>
                                    <option value="<?= $m->MODEL_ID ?>" <?php if ($result->MODEL_ID == $m->MODEL_ID) { ?> selected <?php  } ?>><?= $m->MODEL_NAME ?></option>
                                <?php endforeach; ?>
                            </select>
                            <!-- <a href="../controller/admin_add_model.php" target="_blank">Add new model from here</a> -->
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-1 control-label">Daily rate</label>
                        <div class="col-md-11">
                            <input type="number" name="rate" class="form-control" value="<?= $result->DAILY_RATE ?>" step="0.01">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-1 control-label">Maximum capacity</label>
                        <div class="col-md-11">
                            <input type="number" name="mcap" class="form-control" value="<?= $result->MAX_CAPACITY ?>">
                        </div>
                    </div>




                    <div class="form-group">
                        <div class="col-md-1">
                            <span></span>
                        </div>
                        <div class="col-md-11">


                            <input type="hidden" name="vid" value="<?= $result->VEHICLE_ID ?>">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>

                            <form action="" method="post">
                                <input type="hidden" name="v_delete_id" value="<?= $result->VEHICLE_ID ?>">
                                <button type="submit" class="btn btn-danger btn-lg btn-block">Delete vehicle</button>
                            </form>

                        </div>
                    </div>


                </form>


            </div>
        </div>
    </div>
</div>
<!-- Row end -->



<?php require_once  "footer.php"; ?>