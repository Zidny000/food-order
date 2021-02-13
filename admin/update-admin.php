<?php

 include '../config/Connect.php';
 include 'partials/menu.php';

 $db = new Connect();

 $admin_id = $_GET['admin_id'];
?>



<?php

 if(isset($_POST['update'])){
 $full_name = $_POST['ful-name'];
 $username = $_POST['username'];

 $query = "UPDATE db_admin SET full_name='$full_name' , username='$username' WHERE id='$admin_id'";

 $db->update($query);
 header('Location:manage-admin.php');

 }else{

 }

?>

<div class="main-content">
 <div class="wrapper">
  <h1>Add Admin</h1>

  <br><br>

  <form action="" method="POST">
   <table class="tbl-30">
   <?php 
    
    
    $query = "SELECT  full_name , username FROM db_admin WHERE id = $admin_id";
    $results = $db->fetch($query,null);
    
   ?>
    <tr>
     <td>Full Name</td>
     <td><input type="text" name="ful-name" value="<?php echo $results[0][0]?>"> </td>

    </tr>
    <tr>
     <td>Usernname:</td>
     <td>
      <input type="text" name="username" value="<?php echo $results[0][1]?>">
     </td>
    </tr>
    
    <tr>
     <td colspan="2">
      <input type="submit" name="update" value="Update Admin" class="btn-secondary">
     </td>
    </tr>
   </table>
  </form>
 </div>
</div>

<?php include 'partials/footer.php'?>