 
<?php
include_once 'db.php'; 
ob_start();




$textarea = $_GET['textarea'];
$lietotajs3 = $user_data['username'];

echo $textarea; //message
echo '<br>';
echo $lietotajs3; //lietotajvards
$datenow = date("Y/m/d/H/i/s");	
echo '<br>';
echo $datenow;
echo '<br>';



$pst = new DateTimeZone('America/Los_Angeles');
$pacdate2 = new DateTime('-3 hours', $pst); // first argument uses strtotime parsing
$pacdate = $pacdate2->format('YmdHis'); // 
///echo $pacdate;
echo $pacdate;
	//dati tiek sūtīti uz db pirmo reizi

	
	 $query = "INSERT INTO `groupchatroom` (
				  `fromuser`,
                  `message`,
                  `date`,
                  `pacdate`
              ) VALUES(
				 :fromuser,
                 :message,
                 :date,
                 :pacdate
              )
    "; 
    
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':fromuser', $lietotajs3, PDO::PARAM_STR);
    $stmt->bindValue(':message', $textarea, PDO::PARAM_STR);
    $stmt->bindValue(':date', $datenow, PDO::PARAM_STR);
    $stmt->bindValue(':pacdate', $pacdate, PDO::PARAM_STR);
	$stmt->execute();
	

?> 
