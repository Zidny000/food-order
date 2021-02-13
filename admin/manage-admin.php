<?php

   include './partials/menu.php';
   include '../config/Connect.php';
   $db = new Connect()
?>
   <!-- Menu section Ends -->
   
   <!-- Main content section starts -->
   <div class="main-content">
    <div class="wrapper">
     <h1>Manage Admin</h1>
     <br/><br/> 
     <a href="add-admin.php" class="btn-primary">Add Admin</a>
     <br/><br/>
     
     <table class="tbl-full">
      <tr>
         <th>S.N</th>
         <th>Full Name</th>
         <th>User Name</th>
         <th>Action</th>
      </tr>
      <?php 
         $query = "SELECT id , full_name,username FROM db_admin";
         $results = $db->fetch($query,null);
         
         foreach($results as $k=>$result){
            
         
      ?>
      <tr>
         <td><?php echo $k + 1 ?>.</td>
         <td><?php echo $result[1] ?></td>
         <td><?php echo $result[2] ?></td>
         <td>
            <!-- <a href="upda-admin.php?admin_id=" class="btn-primary">Change Password</a> -->
            <a href="update-admin.php?admin_id=<?php echo $result[0]?>" class="btn-secondary">Update Admin</a>
            <a href="delete.php?admin_id=<?php echo $result[0]?>" class="btn-danger">Delete Admin</a>
            
         </td>
      </tr>
     <?php }?>
     </table>
    </div>
   </div>
   <!-- Main content section ends -->

   <!-- Footer section starts -->
   <?php include './partials/footer.php'?>  