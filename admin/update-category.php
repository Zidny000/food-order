<?php

 include '../config/Connect.php';
 include 'partials/menu.php';

 $db = new Connect();

 $category_id = $_GET['category_id'];
?>





<div class="main-content">
 <div class="wrapper">
  <h1>Update Category</h1>

  <br><br>

  <form action="" method="POST" enctype="multipart/form-data">
  <table class="tbl-30">
  <?php
  $query = "SELECT * FROM db_category WHERE id = '$category_id'";
  $results = $db->fetch($query,null);
  
  
  ?>
   <tr>
    <td>Title:</td>
    <td><input type="text" name="title" value="<?php echo $results[0][1]?>" required > </td>
   </tr>
   <tr>
    <td>Select Image</td>
    <td>
     <input type="file" name="image">
    </td>
   </tr>
   <tr>
    <td>Featured</td>
    <td>
    <?php 

      if($results[0][3] == "Yes"){
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

      if($results[0][4] == "Yes"){
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
  $image_name = "Food_Category_".rand(000,999).'.'.$ext;
  $destination_path = "../images/category/".$image_name;
 
  $upload = move_uploaded_file($source_path,$destination_path);
  if($results[0][2] !== ""){
    $img_dlt = "../images/category/".$results[0][2];
    unlink($img_dlt);
  }
 
 }else{
  $image_name = "";
 
 }
 

 $query = "UPDATE db_category SET title='$title' , image_name = '$image_name', featured='$featured' , active='$active'  WHERE id='$category_id'";

 $db->update($query);
  header('Location:manage-category.php');

 }else{

 }

?>

<?php include 'partials/footer.php'?>