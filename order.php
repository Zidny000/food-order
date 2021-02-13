
<?php

include "./config/Connect.php";
$db = new Connect();
if(!isset($_GET['food_id'])){
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
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="categories.html">Categories</a>
                    </li>
                    <li>
                        <a href="foods.html">Foods</a>
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
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <?php
                    $food_id = $_GET['food_id'];
                    $query = "SELECT * FROM db_food WHERE id = '$food_id'";
                    $results = $db->fetch($query,null);
  

                    ?>

                    <div class="food-menu-img">
                        <img src="images/food/<?php echo $results[0][4]?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $results[0][1]?></h3>
                        <input type="hidden" name="food" value="<?php echo $results[0][1]?>">
                        <p class="food-price"><?php echo $results[0][3]?></p>
                        <input type="hidden" name="price" value="<?php echo $results[0][3]?>">
                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" min=1 required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>

        <?php 
        
        if(isset($_POST['submit'])){
            $food = $_POST['food'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];
            $total = $price * $qty;
            $order_date = date("Y-m-d h:i:sa");
            $status = "Ordered";
            $fullname = $_POST['full-name'];
            $contact = $_POST['contact'];
            $email = $_POST['email'];
            $address = $_POST['address'];
        
        
        $query = "INSERT INTO db_order(food,price,qty,total,order_date,status,customer_name,customer_contact,customer_email,customer_address) VALUE (:food,:price,:qty,:total,:order_date,:status,:customer_name,:customer_contact,:customer_email,:customer_address)";
        $array = array(
            ':food'=>$food,
            ':price'=>$price,
            ':qty'=>$qty,
            ':total'=>$total,
            ':order_date' => $order_date,
            ':status' => $status,
            ':customer_name' => $fullname,
            ':customer_contact' => $contact,
            ':customer_email' => $email,
            ':customer_address' => $address
        );
        $db->insert($query,$array);
        header('Location:index.php');
        }
        ?>





    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">Vijay Thapa</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>
</html>