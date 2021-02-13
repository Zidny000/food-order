<?php

include './partials/menu.php';
include '../config/Connect.php';
$db = new Connect();

?>


<div class="main-content">
    <div class="wrapper">
     <h1>Update Order</h1>

     <br/><br/> 
     
   <form action="" method="POST">  
     <table class="tbl-30">
     <?php
      $id=$_GET['id'];
      $query = "SELECT * FROM db_order WHERE id='$id'";
      $results = $db->fetch($query,null);
      
      ?>
      <tr>
         <td>Food Name</td>
         <td><?php $results[0][1] ?></td>
      </tr> 
      <tr>
         <td>Qty</td>
         <td>
          <input type="number" name="qty" min=1 value="<?php $results[0][3] ?>">
         </td>
      </tr> 
      <tr>
         <td>Status</td>
         <td>
          <select name="status">
           <option value="Ordered">Ordered</option>
           <option value="On Delivery">On Delivery</option>
           <option value="Delivered">Delivered</option>
           <option value="Cancelled">Cancelled</option>
          </select>
         </td>
      </tr> 
      <tr>
      <td colspan="2">
       <input type="submit" name="submit" value="Update Order">
      </td>
      </tr>
    
     </table>
   </form>

    </div>
   </div>

   

<?php include './partials/footer.php'?> 

<?php 
if(isset($_POST['submit'])){
 $qty = $_POST['qty'];
 $status = $_POST['status'];
 $total = $qty * $results[0][2];

 $query = "UPDATE db_order SET qty='$qty', status='$status' , total='$total' WHERE id='$id' ";
 $db->update($query);
 header('Location:manage-order.php');
}


?>