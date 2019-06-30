
<?php
    require_once "../controller/login_check.php";
?>
<!--nav bar start-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="./index.php"><img alt="Company Logo" src="../images/logo%20berwynbus.png" width="75"> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#cart">My Cart</a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="promotion.php" >Promotion</a>
            </li>


            <li class="nav-item">
                <?php if(isset($session_customer_id)): ?>
                <a class="nav-link" href="booking.php" >My Bookings</a>
                <?php endif ?>
            </li>



            <li class="nav-item" >
                <?php if(isset($session_customer_id)): ?>
                    <a class="nav-link" href="./logout.php" > Sign Out (<?=$session_customer_name?>)</a>
                <?php else: ?>
                    <a class="nav-link" href="./login.php" > Sign In</a>

                    
                <?php endif ?>
            </li>

            <li class="nav-item" >
            <?php if(!isset($session_customer_id)): ?>
                <a class="nav-link" href="./company/login.php" > Company registration</a>

            <?php endif?>
            </li>

        </ul>

    </div>

</nav>
<!--nav bar end-->

