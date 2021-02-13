<?php

    include "./config/Connect.php";
    $db = new Connect();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    
    
    <?php
     include './partials-front/menu.php' 
     ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php 
            
            $query = "SELECT * FROM db_category";
            $results = $db->fetch($query,null);
            foreach($results as $result){

            ?>

            <a href="category-foods.php?title=<?php echo $result[1]?>">
            <div class="box-3 float-container">
                <img src="images/category/<?php echo $result[2]?>" alt="<?php echo $result[1]?>" class="img-responsive img-curve">

                <h3 class="float-text text-white"><?php echo $result[1]?></h3>
            </div>
            </a>

            <?php } ?>

            
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
                

            <?php 
            
            $query = "SELECT * FROM db_food WHERE featured='Yes' AND active='YES' ";
            $results_foods = $db->fetch($query,null);
            foreach($results_foods as $result_food){

            ?>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/food/<?php echo $result_food[4] ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    
                    <h4><?php echo $result_food[1] ?></h4>
                    <p class="food-price"><?php echo $result_food[3] ?></p>
                    <p class="food-detail">
                    <?php echo $result_food[2] ?>
                    </p>
                    <br>

                    <a href="order.php?food_id=<?php echo $result_food[0]?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>
            <?php } ?>



            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="foods.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include './partials-front/footer.php' ?>

</body>
</html>