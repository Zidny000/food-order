

<?php


include '../config/Connect.php';
include 'partials/menu.php';

$db = new Connect();

?>

<div class="main-content">
<div class="wrapper">
 <h1>Add Food</h1>

 <br><br>

 <form action="" method="POST" enctype="multipart/form-data">
  <table class="tbl-30">
   <tr>
    <td>Title:</td>
    <td><input type="text" name="title"  placeholder="Category Title" required > </td>
   </tr>
   <tr>
    <td>Description:</td>
    <td> <textarea name="description" id="" cols="30" rows="10" ></textarea> </td>
   </tr>
   <tr>
    <td>Price:</td>
    <td> <input type="number" name="price" > </td>
   </tr>


   <tr>
    <td>Select Image:</td>
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
    $results = $db->fetch($query,null);
    foreach($results as $result){
      
    ?>
      <option value="<?php echo $result[0]?>"><?php echo $result[0]?></option>
     
    <?php
    }
    ?>
     </select>
     
    
    </td>
   </tr>
   <tr>
   <tr>
    <td>Featured</td>
    <td>
     <input type="radio" name="featured" value="Yes"> Yes
     <input type="radio" name="featured" value="No"> No
    </td>
   </tr>
   <tr>
    <td>Active:</td>
    <td colspan="2">
     <input type="radio" name="active" value="Yes" > Yes
     <input type="radio" name="active" value="No" > No
    </td>
   </tr>
   <tr>
   <td colspan="2"> 
     <input type="submit" name="submit" value="Add Food" class="btn-secondary">
   </td>
   </tr>
  </table>
 </form>
</div>
</div>

<?php include 'partials/footer.php'?>

<?php

if(isset($_POST['submit'])){
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

if(isset($_FILES['image']['name'])){
 $image_name = $_FILES['image']['name'];
 $source_path = $_FILES['image']['tmp_name'];
 $string = explode('.',$image_name);
 $ext = end($string);
 $image_name = "Food_Category_".rand(000,999).'.'.$ext;
 $destination_path = "../images/food/".$image_name;

 $upload = move_uploaded_file($source_path,$destination_path);

}else{
 $image_name = "";
}

echo $description;

$query = "INSERT INTO db_food(title,descripton,price,image_name,ctegory_id,featured,active) Value (:title,:description,:price,:image_name,:category,:featured,:active)";

$array = array(
 ':title' =>$title,
 ':description' => $description,
 ':price' => $price,
 ':image_name' => $image_name,
 ':category' => $categoroy_id,
 ':featured' => $featured ,
 ':active' => $active
);

$db->insert($query,$array);
header('Location:manage-food.php');

 }

?>