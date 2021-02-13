<?php
  session_start();
  if(!isset($_SESSION['id'])){
   header('location:../');
  }

 include '../config/Connect.php';
 $db = new Connect();
 if(isset($_GET['admin_id'])){
  $id = $_GET['admin_id'];
  $query = "DELETE FROM db_admin WHERE id = '$id'";
  $db->delete($query);
  header('Location:manage-admin.php');
 }
 if(isset($_GET['file_path']) || isset($_GET['category_id'])){
   
  $id = $_GET['category_id'];
  $file_path = $_GET['file_path'];
  unlink($file_path);
  $query = "DELETE FROM db_category WHERE id = '$id'";
  $db->delete($query);
  header('Location:manage-category.php');
 }
 if(isset($_GET['file_path_food']) || isset($_GET['food_id'])){
   
  $id = $_GET['food_id'];
  $file_path = $_GET['file_path_food'];
  unlink($file_path);
  $query = "DELETE FROM db_food WHERE id = '$id'";
  $db->delete($query);
  header('Location:manage-food.php');
 }

  
 

 
 

?>