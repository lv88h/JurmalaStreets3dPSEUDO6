



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>3D ONLINE GAME 2</title>
    <link rel="stylesheet" href="/css/examples.css?ver=1.0.0" />
    <script src="/js/examples.js?ver=1.1.1"></script>
    <script src="/lib/phaser.min.js?ver=3.52.0"></script>
    <script src="/lib/enable3d/enable3d.phaserExtension.0.25.0.min.js"></script>
    
    

  </head>

  <body>

<?php 
include 'db.php';

$sessionid = $_SESSION['user_id'];

//echo $user_data['username'];

if(!empty($sessionid)){
            header('Location: game.php');

//echo $sessionid;

}

?>


<Br><br><Br><br><Br><br><Br><br><Br><br>
<center>
<form method="post" action="login.php" >



    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>
<Br><br>
    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
<Br><br>
    <input type="submit" value="Login">


</form>
</center>

<Br><br>
<center>
<a href="register.php">Register</a>
</center>


</body>

</html>

