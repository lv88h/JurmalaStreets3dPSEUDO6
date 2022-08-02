<?php 
include 'db.php';

$sessionid = $_SESSION['user_id'];



//echo $user_data['username']; 


if(logged_in2() === true){
	
	
	echo '<hr><h1>Lietotāja īpašība - '.$user_property['apraksts'].'</h1>';
	

	
	echo '<hr><center>';
	
	
if(!empty($sessionid)){
	$stmt = $pdo->prepare('SELECT * FROM users WHERE user_id = ?');
	$stmt->execute(array($sessionid));
	$user = $stmt->fetch();
}
$stmt = $pdo->query('SELECT username FROM users');
while ($row = $stmt->fetch())
{
    echo $row['username'] . "\n <br>";
}
	echo '</center>';



echo '<hr><center><a href="logout.php">Logout.</a></center>';


} else {
	
	echo '<center><h1>Please <a href="index.php">log in</a> first!</h1></center>';
}


?>
