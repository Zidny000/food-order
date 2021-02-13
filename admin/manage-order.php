<?php

include './partials/menu.php';
include '../config/Connect.php';
$db = new Connect();

?>


<div class="main-content">
    <div class="wrapper">
     <h1>Manage Order</h1>

     <br/><br/> 
     
     
     <table class="tbl-full">
      <tr>
         <th>S.N</th>
         <th>Food</th>
         <th>Price</th>
         <th>Qty.</th>
         <th>Total</th>
         <th>Order Date</th>
         <th>Status</th>
         <th>Customer</th>
         <th>Contact</th>
         <th>Email</th>
         <th>Address</th>
         <th>Action</th>
      </tr> 

      <?php
      
      $query = "SELECT * FROM db_order ORDER BY id DESC";
      $results = $db->fetch($query,null);
      
      foreach($results as $k=> $result){

      
      
      ?>


      <tr>
         <td><?php echo $k + 1 ?>.</td>
         <td><?php echo $result[1]; ?></td>
         <td><?php echo $result[2]; ?></td>
         <td><?php echo $result[3]; ?></td>
         <td><?php echo $result[4]; ?></td>
         <td><?php echo $result[5]; ?></td>
         <td><?php echo $result[6]; ?></td>
         <td><?php echo $result[7]; ?></td>
         <td><?php echo $result[8]; ?></td>
         <td><?php echo $result[9]; ?></td>
         <td><?php echo $result[10]; ?></td>
         
         <td>
            <a href="update-order.php?id=<?php echo $result[0]?>" class="btn-secondary">Update</a>
            
            
         </td>
      </tr>
     <?php } ?>
     
     </table>
     
     
    </div>
   </div>

<?php include './partials/footer.php'?> 