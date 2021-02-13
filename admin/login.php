
<?php 
      include '../config/Connect.php';
      $db = new Connect()
?>




<html>

 <head>
  <title>
   Login  Food Order System
  </title>
  <link rel="stylesheet" href="../css/admin.css">
 </head>
 <body>
  <div class="login">
   <h1 class="text-center">Login</h1><br><br>
   <form action="" method="POST" class="text-center">
    Username: <br>
    <input type="text" name="username" placeholder="Enter Username"><br><br>
    Password: <br>
    <input type="password" name="password" placeholder="Enter Password"><br><br>
    <input type="submit" name="submit" value="login" class="btn-primary">
   </form>

   <p class="text-center" >Created By blablabla</p>
  </div>
 </body>
</html>


<?php 
 if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  
  // $query = "SELECT * FROM db_admin WHERE username=$username,password='$password'";
  $query ="SELECT  id FROM db_admin WHERE username='$username' AND passowrd='$password'";
  $result = $db->fetch($query,null);
  if(count($result) == 1){
   session_start();    
   $_SESSION['id'] = $result[0]['id'];
      header('Location:../admin/');
  }

 }else{

 }
?>