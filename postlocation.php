<?php
include 'db.php';


  $dsn = 'mysql:dbname=game;host=127.0.0.1';
  $user = 'root';
  $password = 'parole123!';
  $dbh = new PDO($dsn, $user, $password);
  
  //$SEARCH = $_GET['locatedata'];
  $SEARCH = $_POST['sutit'];


  
  $data = json_decode(file_get_contents("php://input"));
  
  
	    $stmt = $dbh->prepare("UPDATE users SET location = :location WHERE username = :username");
    $stmt->bindValue(':location', json_encode($SEARCH));
    $stmt->bindValue(':username', $user_data['username']);
    $stmt->execute();

?>
