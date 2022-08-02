<?php

include 'db.php';



if (isset($_POST['username']) && !empty($_POST['username'])){

    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    
    $sql = "SELECT user_id, username, password FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':username', $username);
    $stmt->execute();
        $counted = $stmt->rowCount();

    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($user as $users)
{
    $parole = $users['password'];
}





    if($counted < 1){
        
        
    } else{

	

	if($passwordAttempt = $parole){
		
        $validPassword = true;
	} else {
	    $validPassword = false;
	}
        
        
        
        
        if($validPassword === true){


            
            $_SESSION['user_id'] = $users['user_id'];
            $_SESSION['logged_in'] = time();
            
            if(isset($_SESSION['user_id'])){
            header('Location: game.php');
		}
            exit;
            
        } else{

            die('Incorrect username / password combination!');
        }
    }
    
}
