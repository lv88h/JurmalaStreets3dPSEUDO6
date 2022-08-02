<?php
include 'db.php';
//echo $location;
$username = $user_data['username'];


$sql = "SELECT user_id, location FROM users";
    $stmt = $pdo->query($sql);
    //$stmt->bindValue(':username', $username);
    $stmt->execute();
        $counted = $stmt->rowCount();


while ($row = $stmt->fetch())
{
	$counter == 0;
    $arrayss = $row['location'];

    
    if($counted > 1){
    echo $arrayss . '*';
	} else {
	echo $arrayss;
	}
    //echo '"username" : ' . json_encode($arrayss) . ",";

    //echo $row['location'] . "\n <br>";
    //echo $row['animation'] . "\n <br>";
    //echo $row['rotation'] . "\n <br>";
    //echo $row['speed'] . "\n <br>";
}
    $stmt->execute();


//echo $location;

//echo 111;

?>
