<?php
include 'db.php';


  $dsn = 'mysql:dbname=game;host=127.0.0.1';
  $user = 'root';
  $password = 'parole123!';
  $dbh = new PDO($dsn, $user, $password);
  

      $todayplus = date("Ymdhis");    

  
  $data = json_decode(file_get_contents("php://input"));
  
      $sql = "DELETE * FROM online WHERE date < :date";
    $stmt2 = $dbh->prepare($sql);  
   $stmt2->bindValue(':date', $todayplus );
    $stmt2->execute();
    
    
	   
?>
