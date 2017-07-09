<?php
require_once('registerform.php');
require_once('password.php');
require_once('sqli.php');

$host = 'localhost';
$user = 'Vitalik';
$passsword = '00vitalik1897';
$db_name = 'user';

$msg = '';

$db = new DB($host, $user, $passsword, $db_name);
$form = new RegistrationForm($_POST);


if($_POST){
	if($form->validate()){
		$login=$db->escape($form->getlogin());
		$email=$db->escape($form->getemail());
		$passsword=new Password($db->escape($form->getpassword()));
		
		$rez=$db->query("SELECT * FROM user WHERE login = '{$login}' ");
		if($rez){
			$msg = 'Sorry,user alredy exist';
		}else{
		$db->query("INSERT INTO user (login, email, password) VALUES ('{$login}', '{$email}', '{$passsword}')");
		header('location: index.php?msg=You have been logged in');
		}
	}else{
		$msg = $form->pass() ? 'Empty field' : 'Not confirm password';
	}
}

?>

<b><?=$msg; ?></b>
<form method="post">
Login:           <input type="text" name="login" value="<?=$form->getlogin()?>" /><br/><br/>
Email:           <input type="email" name="email" value="<?=$form->getemail()?>" /><br/><br/>
Password:        <input type="password" name="password" /><br/><br/>
ConfirmPassword: <input type="password" name="passwordconfirm" /><br/><br/>
<input type="submit" />     <input type="reset" /><br/><br/>
</form>
