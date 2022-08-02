<?php 
include_once 'db.php';
logged_in_redirect();
?>

<?php
if (empty($_POST) === false) {
	$required_fields = array('username','password','password_again','name','gender','email');
	foreach ($_POST as $key=>$value) {
		if (empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'Fields with asterisk must be completed!';
			break 1;
		}
	}
	
	if (empty($errors) === true) {
		if (user_exists($_POST['username']) === true) {
			$errors[] = 'Piedod, lietotajvards \'' . $_POST['username'] . '\' ir aizņemts.';
		}
		if (preg_match('/\\s/', $_POST['username']) == true) {
			$errors[] = 'Lietotajvards nevar saturēt atstarpes!';
		}
		if (strlen($_POST['password']) < 6) {
			$errors[] = 'Parole is pārāk īsa!';	
		}
		if ($_POST['password'] !== $_POST['password_again']) {
			$errors[] = 'Paroles nav vienādas!';
		}
		if (email_exists($_POST['email']) === true) {
			$errors[] = 'Piedod šāds ēpasts -   \'' . $_POST['email'] . '\' ir jau izmantots !';
		}
	}
}
?>
      
<?php
if (isset($_GET['sucess']) && empty($_GET['success'])) {
	echo 'You have been succesfully registered, please check email for activation!';
} else {	
	if (empty($_POST) === false && empty($errors) === true) {
		$register_data = array(
			'username' => $_POST['username'],
			'password' => $_POST['password'],
			'name' => $_POST['name'],
			'gender' => $_POST['gender'],
			'email' => $_POST['email'],
			'email_code' => md5($_POST['username'] . microtime())
			);
		
		register_user($register_data);
		header('Location: index.php');
		exit();
	
	} else if (empty($errors) === false) {
		echo output_errors($errors);
	}
}
?>
