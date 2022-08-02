<?php
include 'db.php';
//echo $location;
$user_id = $user_data['user_id'];


$sql = "SELECT * FROM users WHERE user_id = :user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();
        $counted = $stmt->rowCount();


while ($row = $stmt->fetch())
{
    $arrayss = $row['username'];

    
    //if($counter != 0){
    //echo $arrayss . ',';
	//} else {
	echo $arrayss;
	//}
    ////echo '"username" : ' . json_encode($arrayss) . ",";

    ////echo $row['location'] . "\n <br>";
    ////echo $row['animation'] . "\n <br>";
    ////echo $row['rotation'] . "\n <br>";
    ////echo $row['speed'] . "\n <br>";
}
    $stmt->execute();


//echo $location;

//echo 111;

?>
