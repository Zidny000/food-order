<?php

if(!isset($_SESSION['id'])){
 session_start();
 session_unset();
 session_destroy();
 header('Location:./');
}else{
 header('Location:../');
}
 



?>