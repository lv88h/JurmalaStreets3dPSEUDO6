<?php
include 'db.php';
//echo $location;
$username = $user_data['username'];


$sql = "SELECT * FROM groupchatroom WHERE fromuser = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':username', $username);
    $stmt->execute();
        $counted = $stmt->rowCount();


while ($row = $stmt->fetch())
{
    $groupchatroom = $row['message'];

    echo $groupchatroom;

}
    $stmt->execute();


//echo $location;

//echo 111;

?>
