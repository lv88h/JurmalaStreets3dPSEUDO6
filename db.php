<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);


session_start();

//$sessionid = $_SESSION['user_id'];




$host = '127.0.0.1';
$db   = 'game';
$user = 'root';
$pass = 'parole123!';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}







function logged_in2(){
	
$sessionid = $_SESSION['user_id'];
	
if(!empty($sessionid)){
	
$host = '127.0.0.1';
$db   = 'game';
$user = 'root';
$pass = 'parole123!';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}







	$stmt = $pdo->prepare('SELECT * FROM users WHERE user_id = ?');
	$stmt->execute(array($sessionid));
	$user = $stmt->fetch();
	
	

if(!empty($user)){
	return true;
} else {	
	return false;
}


} else {
	return false;

}

}





function user_data2($session_user_id){
	$host = '127.0.0.1';
$db   = 'game';
$user = 'root';
$pass = 'parole123!';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}







	$stmt = $pdo->prepare('SELECT * FROM users WHERE user_id = ?');
	$stmt->execute(array($session_user_id));
	$userdata = $stmt->fetch();

return $userdata;

}




	include_once 'general.php';


if (logged_in2() === true) {
	
	include_once 'functions.php';

    $session_user_id = $_SESSION['user_id'];
    
    $user_data = user_data2($session_user_id, 'user_id', 'username', 'password', 'gender', 'location', 'ipaddress', 'location');
        //$user_property = user_data_property($session_user_id, 'apraksts', 'user_id');

    
    
    $user_id = $user_data['user_id'];   

	$location = $user_data['location'];
}



?>
