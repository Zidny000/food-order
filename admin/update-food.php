<?php

 include '../config/Connect.php';
 include 'partials/menu.php';

 $db = new Connect();

 $food_id = $_GET['food_id'];
?>





<div class="main-content">
 <div class="wrapper">
  <h1>Update Category</h1>

  <br><br>

  <form action="" method="POST" enctype="multipart/form-data">
  <table class="tbl-30">
  <?php
  $query = "SELECT * FROM db_food WHERE id = '$food_id'";
  $results = $db->fetch($query,null);
  
  // print_r($results);
  ?>
   <tr>
    <td>Title:</td>
    <td><input type="text" name="title" value="<?php echo $results[0][1]?>" required > </td>
   </tr>
   <tr>
    <td>Description:</td>
    <td> <textarea name="description" id="" cols="30" rows="10"><?php echo $results[0][2]?></textarea> </td>
   </tr>
   <tr>
   <td>Price:</td>
    <td> <input type="number" name="price" value="<?php echo $results[0][3]?>"> </td>
   </tr>
    <td>Select Image</td>
    <td>
     <input type="file" name="image">
    </td>
   </tr>
   <tr>
    <td>Category:</td>
    <td>
    
      
     <select name="category" id="">
     <?php 
    
    $query = "SELECT title FROM db_category";
    $result = $db->fetch($query,null);
    foreach($result as $resul){
      if($resul[0] == $results[0][5]){
        echo "<option selected value=".$resul[0].">".$resul[0]."</option>";
      }else{
        echo "<option  value=".$resul[0].">".$resul[0]."</option>";
      }
      
     
    ?>
      
     
    <?php
    }
    ?>
     </select>
     
    
    </td>
   </tr>
   <tr>
    <td>Featured</td>
    <td>
    <?php 

      if($results[0][6] == "Yes"){
        $checked_yes = "checked";
        $checked_no = null;
      }else{
        $checked_yes = null;
        $checked_no = "checked";
      }
         
    ?>
     <input type="radio" name="featured" value="Yes" <?php echo $checked_yes ?>> Yes
     <input type="radio" name="featured" value="No" <?php echo $checked_no ?>> No
    </td>
   </tr>
   <tr>
    <td>Active:</td>
    <td colspan="2">

    <?php 

      if($results[0][7] == "Yes"){
        $checked_ye = "checked";
        $checked_n = null;
      }else{
        $checked_ye = null;
        $checked_n = "checked";
      }
        
    ?>
     <input type="radio" name="active" value="Yes" <?php echo $checked_ye ?>> Yes
     <input type="radio" name="active" value="No" <?php echo $checked_n ?>> No
    </td>
   </tr>
   <tr>
   <td colspan="2"> 
     <input type="submit" name="update" value="Update" class="btn-secondary">
   </td>
   </tr>
  </table>
 </form>
 </div>
</div>

<?php

 if(isset($_POST['update'])){
 $title = $_POST['title'];
 $description = $_POST['description'];
 $price = $_POST['price'];
 $categoroy_id = $_POST['category'];

 if(isset($_POST['featured'])){
  $featured = $_POST['featured'];
 }else{
  $featured = "No";
 }
 if(isset($_POST['active'])){
  $active = $_POST['active'];
  }else{
  $active = "No";
 }
 if(!($_FILES['image']['name'] == null)){
  $image_name = $_FILES['image']['name'];
  $source_path = $_FILES['image']['tmp_name'];
  $string = explode('.',$image_name);
  $ext = end($string);
  $image_name = "Food".rand(000,999).'.'.$ext;
  $destination_path = "../images/food/".$image_name;
 
  $upload = move_uploaded_file($source_path,$destination_path);
  if($results[0][2] !== ""){
    $img_dlt = "../images/food/".$results[0][4];
    unlink($img_dlt);
  }
 
 }else{
  $image_name = "";
 
 }
 

 $query = "UPDATE db_food SET title='$title',descripton='$description',price='$price' , image_name = '$image_name',ctegory_id = '$categoroy_id', featured='$featured' , active='$active'  WHERE id='$food_id'";

 $db->update($query);
  header('Location:manage-food.php');

 }else{

 }

?>

<?php include 'partials/footer.php'?>