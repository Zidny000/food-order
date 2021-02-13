<?php

include './partials/menu.php';
include '../config/Connect.php';
$db = new Connect();
?>

<div class="main-content">
    <div class="wrapper">
     <h1>Manage Food</h1>

     <br/><br/> 
     <a href="add-food.php" class="btn-primary">Add Food</a>
     <br/><br/>
     
     <table class="tbl-full">
      <tr>
         <th>S.N</th>
         <th>Title</th>
         <th>Price</th>
         <th>Image</th>
         <th>Featured</th>
         <th>Active</th>
         <th>Actions</th>
      </tr>

      <?php 
         $query = "SELECT * FROM db_food ";
         $results = $db->fetch($query,null);
         
         foreach($results as $k=>$result){
            
         
      ?>

<tr>
       
       <td><?php echo $k + 1 ?>.</td>
       <td><?php echo $result[1]; ?></td>
       <td><?php echo $result[3]; ?></td>
       <td><?php
                if($result[4] == ""){
                   echo "<small style='color:red;'>Image Not Added</small>";
                }else{
                  $image_name =  $result[4];?>

            <img src="../images/food/<?php echo $image_name?>" width="100px">
             <?php      
                }      
             ?>
               
       </td>
       <td><?php echo $result[6]; ?></td>
       <td><?php echo $result[7]; ?></td>
       <td>
       
       
          <a href="update-food.php?food_id=<?php echo $result[0]?>" class="btn-secondary">Update</a>
          <a href="delete.php?food_id=<?php echo $result[0]?>&file_path_food=../images/category/<?php echo $result[4]?>" class="btn-danger">Delete</a>
          
       </td>
    </tr>
    <?php }?>
     </table>
     
    
   </div>
</div>

<?php include './partials/footer.php'?> 