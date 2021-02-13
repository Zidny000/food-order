<?php

include './partials/menu.php';
include '../config/Connect.php';
$db = new Connect();
?>

<div class="main-content">
    <div class="wrapper">
     <h1>Manage Category</h1>

     <br/><br/> 
     <a href="add-category.php" class="btn-primary">Add Category</a>
     <br/><br/>
     
     <table class="tbl-full">
      <tr>
         <th>S.N</th>
         <th>Title</th>
         <th>Image</th>
         <th>Featured</th>
         <th>Active</th>
         <th>Actions</th>
      </tr>

      <?php 
         $query = "SELECT * FROM db_category";
         $results = $db->fetch($query,null);
         
         foreach($results as $k=>$result){
            
         
      ?>

<tr>
       
       <td><?php echo $k + 1 ?>.</td>
       <td><?php echo $result[1]; ?></td>
       <td><?php
                if($result[2] == ""){
                   echo "<small style='color:red;'>Image Not Added</small>";
                }else{
                  $image_name =  $result[2];?>

            <img src="../images/category/<?php echo $image_name?>" width="100px">
             <?php      
                }      
             ?>
               
       </td>
       <td><?php echo $result[3]; ?></td>
       <td><?php echo $result[4]; ?></td>
       <td>
       
       
          <a href="update-category.php?category_id=<?php echo $result[0]?>" class="btn-secondary">Update</a>
          <a href="delete.php?category_id=<?php echo $result[0]?>&file_path=../images/category/<?php echo $result[2]?>" class="btn-danger">Delete</a>
          
       </td>
    </tr>
    <?php }?>
     </table>
     
    
   </div>
</div>

<?php include './partials/footer.php'?> 