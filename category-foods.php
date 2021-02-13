<?php
include "./config/Connect.php";
$db = new Connect();

if(!isset($_GET['title'])){
    header('Location:index.php');
}
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
    <!-- Navbar Section Starts Here -->
    <?php
    //  include './partials-front/menu.php'
    ?>
     <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="./">Home</a>
                    </li>
                    <li>
                        <a href="categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"Category"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
            $category_title = $_GET['title'];
            
            $query = "SELECT * FROM db_food WHERE featured='Yes' AND active='YES' AND ctegory_id='$category_title' ";
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

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
   
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <?php include './partials-front/footer.php' ?>
    <!-- footer Section Ends Here -->

</body>
</html>