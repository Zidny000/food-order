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
    <!-- Navbar Section Starts Here -->
    <?php include './partials-front/menu.php' ?>
    <!-- Navbar Section Ends Here -->



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php 
            
            $query = "SELECT * FROM db_category";
            $results = $db->fetch($query,null);
            
            foreach($results as $result){
        
             if($result[4] == "Yes"){

            ?>

            <a href="category-foods.php?title=<?php echo $result[1]?>">
            <div class="box-3 float-container">               
                 <img src="images/category/<?php echo $result[2]?>" alt="<?php echo $result[1]?>" class="img-responsive img-curve">
                <h3 class="float-text text-white"><?php echo $result[1]?></h3>
            </div>
            </a>

            <?php }  } ?>
            
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <!-- social Section Starts Here -->
    
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <?php include './partials-front/footer.php' ?>
    <!-- footer Section Ends Here -->

</body>
</html>