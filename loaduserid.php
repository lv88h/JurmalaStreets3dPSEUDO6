<?php
//header("Content-Type: application/json");



include 'db.php';

$username = $user_data['username'];

//echo $username . ",";
  $dsn = 'mysql:dbname=game;host=127.0.0.1';
  $user = 'root';
  $password = 'parole123!';
  $dbh = new PDO($dsn, $user, $password);
  
  //$SEARCH = $_GET['locatedata'];
  ///$SEARCH = $_POST['locatedata'];
  
  $data = json_decode(file_get_contents("php://input"));
  
  //echo "{";
  
	   $sql = "SELECT * FROM users";
	        $stmt = $dbh->query($sql);
	        // $stmt->bindValue(':username', $username);

  $stmt->execute();
        $counted = $stmt->rowCount();
//echo $counted;

for($var = 0; $var < $counted; $var++){
echo $var . ", ";
}

//while ($row = $stmt->fetch())
//{
	//$counter == 0;
    //$arrayss = $row['user_id'];

        //$x = $users['locationx'];
    //$y = $users['locationy'];
    //$z = $users['locationz'];

    
    ////if($counter != 0){
    ////echo $arrayss . ',';
	////} else {
	//echo $arrayss;
	////}
    ////echo '"username" : ' . json_encode($arrayss) . ",";

    ////echo $row['location'] . "\n <br>";
    ////echo $row['animation'] . "\n <br>";
    ////echo $row['rotation'] . "\n <br>";
    ////echo $row['speed'] . "\n <br>";
//}
    //$stmt->execute();


  
  //echo "}";
?>
