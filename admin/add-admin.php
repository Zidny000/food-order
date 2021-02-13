

<?php

 

 include '../config/Connect.php';
 include 'partials/menu.php';

 $db = new Connect();

?>

<div class="main-content">
 <div class="wrapper">
  <h1>Add Admin</h1>

  <br><br>

  <form action="" method="POST">
   <table class="tbl-30">
    <tr>
     <td>Full Name</td>
     <td><input type="text" name="ful-name" placeholder="Enter Your Name"> </td>

    </tr>
    <tr>
     <td>Usernname:</td>
     <td>
      <input type="text" name="username" placeholder="Your Username">
     </td>
    </tr>
    <tr>
     <td>Password</td>
     <td>
      <input type="password" name="password" placeholder="Your Password">
     </td>
    </tr>
    <tr>
     <td colspan="2">
      <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
     </td>
    </tr>
   </table>
  </form>
 </div>
</div>

<?php include 'partials/footer.php'?>

<?php

 if(isset($_POST['submit'])){
 $full_name = $_POST['ful-name'];
 $username = $_POST['username'];
 $password = md5($_POST['password']);
 
 $query = "INSERT INTO db_admin(full_name,username,passowrd) Value (:full_name,:username,:passowrd)";

 $array = array(
  ':full_name' =>$full_name,
  ':username' => $username,
  ':passowrd' => $password
 );

 $db->insert($query,$array);
 header('Location:manage-admin.php');

 }else{

 }

?>