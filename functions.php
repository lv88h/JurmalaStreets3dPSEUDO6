<?php


function change_password($session_user_id, $register_data) {
	
	
	$dsn = 'mysql:dbname=game;host=127.0.0.1';
  $user = 'root';
  $password = 'parole123!';
  $dbh = new PDO($dsn, $user, $password);
    
	$results = $dbh->prepare("UPDATE `users` SET `password` = ? WHERE `user_id` = ?");
	$results->execute(array(md5($register_data['password']), $user_id));
}


function user_data($user_id){
	$data = array();
	$user_id = (int)$user_id;

	$func_num_args = func_num_args();
	$func_get_args = func_get_args();

	if ($func_num_args > 1) {
		
		
    unset($func_get_args[0]);

    $fields = '`' . implode('`, `', $func_get_args) . '`';
    $dsn = 'mysql:dbname=game;host=127.0.0.1';
		$user = 'root';
		$password = 'parole123!';
		$dbh = new PDO($dsn, $user, $password);
		
    $sql = sprintf("SELECT %s FROM users WHERE user_id = ? LIMIT 1", $fields);
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array($user_id));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    return $data;
	}
	
}

function user_data_property($user_id){
	$data = array();
	$user_id = (int)$user_id;

	$func_num_args = func_num_args();
	$func_get_args = func_get_args();

	if ($func_num_args > 1) {
		
		
    unset($func_get_args[0]);

    $fields = '`' . implode('`, `', $func_get_args) . '`';
    $dsn = 'mysql:dbname=game;host=127.0.0.1';
		$user = 'root';
		$password = 'parole123!';
		$dbh = new PDO($dsn, $user, $password);
		
    $sql = sprintf("SELECT %s FROM property WHERE user_id = ? LIMIT 1", $fields);
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array($user_id));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    return $data;
	}
	
}

function user_active($username) {
  $dsn = 'mysql:dbname=game;host=127.0.0.1';
  $user = 'root';
  $password = 'parole123!';
  $dbh = new PDO($dsn, $user, $password);
	$stmt = $dbh->prepare("SELECT * FROM `users` WHERE `username` = ? AND 'active' = 1");
	 $stmt->execute(array($username));
	 
	$countedresults = $stmt ->rowCount();
	 if($countedresults == 1){
	$results = true;
	} else $results = false;
	
	return $results;
}


function register_user($register_data){

	  $dsn = 'mysql:dbname=game;host=127.0.0.1';
  $user = 'root';
  $password = 'parole123!';
  $dbh = new PDO($dsn, $user, $password);
	 $query = "INSERT INTO `users` (
                  `password`,
                  `username`,
                  `name`,
                  `gender`,
                  `email`,
                  `location`,
                  `email_code`,
                  `active`,
                  `ipaddress`
              ) VALUES(
                  :password,
                  :username,
                  :name,
                  :gender,
                  :email,
                  :location,
                  :email_code,
                  :active,
                  :ipaddress
              )
    ";
	
	 $curtime = time();
	$ipd = $_SERVER['REMOTE_ADDR'];
	
	
	 $stmt = $dbh->prepare($query);
     $stmt->bindValue(':password', md5($register_data['password']), PDO::PARAM_STR);
    $stmt->bindValue(':username', $register_data['username'], PDO::PARAM_STR);
    $stmt->bindValue(':name', $register_data['name'], PDO::PARAM_STR);
    $stmt->bindValue(':gender', $register_data['gender'], PDO::PARAM_STR);
    $stmt->bindValue(':email', $register_data['email'], PDO::PARAM_STR);
    $stmt->bindValue(':location', "start", PDO::PARAM_STR);
    $stmt->bindValue(':email_code', $register_data['email_code'], PDO::PARAM_STR);
    $stmt->bindValue(':active', $curtime, PDO::PARAM_INT);
    $stmt->bindValue(':ipaddress', $ipd, PDO::PARAM_INT);
    $stmt->execute();
    $affected_rows = $stmt->rowCount();
}


function user_id_from_username($username) {
	 $dsn = 'mysql:dbname=game;host=127.0.0.1';
    $user = 'root';
    $password = 'parole123!';
    $dbh = new PDO($dsn, $user, $password);
    
    $results = $dbh->prepare("SELECT * FROM users WHERE username = ?");
    $results->execute(array($username));
    $results->execute();
    
    while($row = $results->fetch(PDO::FETCH_ASSOC))
	{
	$user_id = $row['user_id'];
	}
	
     $countedresults = $results ->rowCount();
     
	if($countedresults == 1){
	$userexists = $user_id;
	} else $userexists = 0;
	
    return $userexists;
}

function login($username, $password) {
	$user_id = user_id_from_username($username);
	$password = md5($password);
	
	 $dsn = 'mysql:dbname=game;host=127.0.0.1';
    $user = 'root';
    $password2 = '';
    $dbh = new PDO($dsn, $user, $password2);
    
	$results = $dbh->prepare("SELECT user_id FROM users WHERE username = ? AND password = ? ");
	$results->execute(array($username, $password));
	$results->execute();
	
	$countedresults = $results ->rowCount();
	if($countedresults == 1){
	$loginst = $user_id;
	} else $loginst = false;
	
	return $loginst;
}
function logged_in() {
	return (isset($_SESSION['user_id']));
}

function user_exists($username) {
	$dsn = 'mysql:dbname=game;host=127.0.0.1';
    $user = 'root';
    $password = 'parole123!';
    $dbh = new PDO($dsn, $user, $password);
    
	$results = $dbh->prepare("SELECT user_id FROM users WHERE username = ?");
	$results->execute(array($username));
	$results->execute();
	
	$countedresults = $results ->rowCount();
	if($countedresults == 1){
	$userexists = true;
	} else $userexists = false;
	return $userexists;
}


function email_exists($email) {
	$dsn = 'mysql:dbname=game;host=127.0.0.1';
    $user = 'root';
    $password = 'parole123!';
    $dbh = new PDO($dsn, $user, $password);
    
	$results = $dbh->prepare("SELECT `user_id` FROM `users` WHERE `email` = ?");
	$results->execute(array($email));
	$results->execute();
	
	if($countedresults == 1){
	$emailexists = true;
	} else $emailexists = false;
	return $emailexists;
}

?>
