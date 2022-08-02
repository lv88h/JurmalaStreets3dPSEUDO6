<?php
include 'db.php';


  $dsn = 'mysql:dbname=game;host=127.0.0.1';
  $user = 'root';
  $password = 'parole123!';
  $dbh = new PDO($dsn, $user, $password);
  
  //$SEARCH = $_GET['locatedata'];
  $SEARCH = $user_data['user_id'];
  

  
  $data = json_decode(file_get_contents("php://input"));
  
      $sql = "SELECT * FROM users WHERE user_id = :user_id";
    $stmt2 = $dbh->prepare($sql);  
   $stmt2->bindValue(':user_id', $SEARCH);
    $stmt2->execute();


while ($row = $stmt2->fetch())
{

    $password = $row['password'];
    $username = $row['username'];
    $name = $row['name'];
    $gender = $row['gender'];
    $email = $row['email'];
    $email_code = $row['email_code'];
    $active = $row['active'];
        $location = $row['location'];
        $ipaddress = $row['ipaddress'];
      $today = date("Ymdhis");    
    
    
    
    
 $query = "INSERT INTO `online` (
                  `password`,
                  `username`,
                  `name`,
                  `gender`,
                  `email`,
                  `location`,
                  `email_code`,
                  `active`,
                  `ipaddress`,
                  `date`,
              ) VALUES(
                  :password,
                  :username,
                  :name,
                  :gender,
                  :email,
                  :location,
                  :email_code,
                  :active,
                  :ipaddress,
                  :date
              )
    ";
    
    
        $stmt3 = $dbh->prepare($query);  
  echo $SEARCH;


    $stmt3->bindValue(':password', $password);
    $stmt3->bindValue(':username', $username);
    $stmt3->bindValue(':name', $name);
    $stmt3->bindValue(':gender', $gender);
    $stmt3->bindValue(':email', $email);
    $stmt3->bindValue(':email_code', $email_code);
    $stmt3->bindValue(':active', $active);
    $stmt3->bindValue(':location', $location);
    $stmt3->bindValue(':ipaddress', $ipaddress);
    $stmt3->bindValue(':date', $today);
    
    $stmt3->execute();

}
    
    
    
    
	   
?>
