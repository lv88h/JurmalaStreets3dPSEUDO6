<?php
include 'db.php';


$sql = "SELECT rotation FROM users";
    $stmt = $pdo->query($sql);
    //$stmt->bindValue(':username', $user_data['username']);
    //$stmt->execute();

    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $counted = $stmt->rowCount();
		
foreach ($user as $users)
{


    $iteration == 0;
	$iteration++;

    $rotation = $users['rotation'];

    if($iteration != $counted){
    echo $rotation . "*";
	} else {
    echo $rotation;
	}	
}
   






?>
