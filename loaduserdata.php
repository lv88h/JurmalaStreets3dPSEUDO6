<?php
include 'db.php';


  $dsn = 'mysql:dbname=game;host=127.0.0.1';
  $user = 'root';
  $password = 'parole123!';
  $dbh = new PDO($dsn, $user, $password);
  
  //$SEARCH = $_GET['locatedata'];
  ///$SEARCH = $_POST['locatedata'];
  
  $data = json_decode(file_get_contents("php://input"));
  
  
	    $stmt = $dbh->query("SELECT * FROM users");
while ($row = $stmt->fetch())
{
    echo $row['username'] . "\n <br>";
    echo $row['location'] . "\n <br>";
    echo $row['animation'] . "\n <br>";
    echo $row['rotation'] . "\n <br>";
    echo $row['speed'] . "\n <br>";
}
    $stmt->execute();

?>
