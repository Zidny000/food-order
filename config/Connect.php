 <?php


class Connect{
 public $conn;

 

 public function __construct(){
  $this->conn = new PDO("mysql:host=localhost;dbname=food-order","root","");
  $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }

 public function insert($query,$array){ 
  $statement = $this->conn->prepare($query);
  $statement->execute($array);
  
 }

 public function fetch($query,$array){
  $statement = $this->conn->prepare($query);
  $statement->execute();
  $data = $statement->fetchAll();
  return $data;
 }

 public function update($query){
  $statement = $this->conn->prepare($query);
  $statement->execute();
 }

 public function delete($query){
  $this->conn->query($query);
  
 }


}






?> 