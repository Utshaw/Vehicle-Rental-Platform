<style>
    .stars-container {
        position: relative;
        display: inline-block;
        color: transparent;
    }

    .stars-container:before {
        position: absolute;
        top: 0;
        left: 0;
        content: '★★★★★';
        color: lightgray;
    }

    .stars-container:after {
        position: absolute;
        top: 0;
        left: 0;
        content: '★★★★★';
        color: gold;
        overflow: hidden;
    }

    .stars-0:after {
        width: 0%;
    }

    .stars-1:after {
        width: 20%;
    }

    .stars-2:after {
        width: 40%;
    }

    .stars-3:after {
        width: 60%;
    }

    .stars-4:after {
        width: 80%;
    }

    .stars-5:after {
        width: 100%;
    }
</style>


<div class="content">
    <!-- content changes on each page -->
    <div class="container" id="searched_buses">




        <?php foreach ($results

            as $bus) :

            ?>



            <?php

            if ($num_buses % 4 == 0) :


                ?>
                <div class="card-group">


                <?php
                endif;
                $num_buses = $num_buses + 1; ?>






                <div class="card card text-white bg-dark mb-3">
                    
                    <img class="card-img-top" src="../images/<?= $bus->IMAGE ?>  " alt="Image of the bus" height="150">
                    
                    <div class="card-body">
                        <a target="_blank" href="http://localhost/VRP/view/bus.php?vehicle_id=<?= $bus->VEHICLE_ID ?>">
                            <h5 class="card-title"><?= $bus->MAKE_NAME ?></h5>
                        </a>

                        <!-- <p><span  class="stars-container stars-<?= ceil($bus->RATING) ?>">★★★★★</span></p> -->

                        <p>Vehicle Rating: <? if(!isset($bus->RATING)){ echo "No rating found";} else {echo $bus->RATING;}?></p>


                        <!-- <span class="stars-container stars-50">★★★★★</span> -->





                        <p class="card-text">DAILY RATE: &#2547; <?= $bus->DAILY_RATE ?></p>
                        <p>CAPACITY: <?= $bus->MAX_CAPACITY ?></p>

                        <p>COMPANY: <?= $bus->COMPANY_NAME ?></p>



                        <p><button class="cartitem btn btn-primary" data-date_from="<?= $date_from ?>" data-date_to="<?= $date_to ?>" data-booking_date="<?= $booking_date ?>" data-id="<?= $bus->VEHICLE_ID ?>" data-make="<?= $bus->MAKE_NAME ?>" data-model="<?= $bus->MODEL_NAME ?>" data-price="<?= $bus->DAILY_RATE ?>">Add to cart</button></p>
                    </div>
                    <div class="card-footer">
                        <small><?= $bus->COMPANY_NAME ?></small> <br>

                        <small style="color: bisque"><?= $bus->MODEL_NAME ?></small>
                    </div>
                    
                </div>


                <?php
                if ($num_buses % 4 == 0) {


                    ?>
                </div>

            <?php }
            if ($num_buses == $total_result) : ?>

                <?php while (($num_buses % 4) != 0) : ?>

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
                    $num_buses++;
                endwhile;
            endif;
            ?>

        <?php endforeach; ?>



    </div>
</div>


<div id="output_cart"></div>