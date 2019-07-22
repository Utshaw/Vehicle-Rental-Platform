<?php
require_once "../../controller/admin/login_check.php"; ?>
<?php require_once  "header.php";
require_once  "../../controller/admin/promotion_controller.php";
?>


<div class="col-sm-12 col-md-12 well" id="content">
    <h1>

        Add promotion
    </h1>





</div>

<?php if (isset($_GET['alert_header']) && isset($_GET['alert_body'])) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong><?= $_GET['alert_header'] ?>: </strong><?= $_GET['alert_body'] ?>
    </div>
<?php endif; ?>



<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Promotion Id</th>
            <th scope="col">Discount amount</th>
            <th scope="col">Expiry date</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>


        <?php foreach ($results

            as $promo) :

            ?>
            <tr>
                <th scope="row"><?= $promo->PROMOTION_ID ?></th>
                <th scope="row"><?= $promo->DISCOUNT_AMOUNT ?></th>
                <th scope="row"><?= $promo->EXPIRY_DATE ?></th>
                <th scope="row"><a href="../../controller/admin/promotion_controller.php?promotion_id=<?= $promo->PROMOTION_ID ?>"><i class="fa fa-trash" style="font-size:24px"></i></a></th>

            </tr>

        <?php endforeach; ?>



        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <form class="form-horizontal row-border" action="" method="post">


                            <div class="form-group">
                                <label class="col-md-2 control-label">Category</label>
                                <div class="col-md-10">
                                <select name="model" class="form-control input-sm">
                                <?php foreach ($models as $m): ?>
                                    <option value="<?=$m->MODEL_ID?>"><?=$m->MODEL_NAME?></option>
                                <?php endforeach; ?>
                            </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-2 control-label">Discount amount (percentage)</label>
                                <div class="col-md-10">
                                    <input type="text" name="discount_amount" class="form-control">
                                </div>
                            </div>




                            <div class="form-group" style="margin-top: 50px;">
                                <label class="col-md-2 control-label">Expiry date</label>
                                <div class="col-md-10">
                                    <input type="date" name="expiry_date" class="form-control">
                                </div>
                            </div>



                            <div class="form-group" style="margin-top: 100px;">
                                <div class="col-md-10">
                                    <span></span>
                                </div>
                                <div class="col-md-2">

                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Add prmotion</button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>






        <?php require_once  "footer.php"; ?>