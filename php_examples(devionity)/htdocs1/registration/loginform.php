<?php
session_start();

require_once('sqli.php');
require_once('logining.php');
require_once('Sesion.php');
require_once('password.php');

$host='localhost';
$user='Vitalik';
$passsword='00vitalik1897';
$db_name='user';
$msg='';

$db=new DB($host, $user, $passsword, $db_name);
$form=new Loginform($_POST);

if($_POST)
{
	if($form->validate())
	{
		$login=$db->escape($form->getlogin());
		$password=new Password($db->escape($form->getpassword()));
				
		$rez=$db->query("SELECT * FROM user WHERE login='{$login}' AND password='{$password}' ");
		if(!$rez){
			$msg='User not found';
			
		}else{
			$user=$rez[0]['login'];
			Session::set('user',$user);
			header('location: hello.php?msg=You have been logged in');
		}
	}else{
	$msg='Please fill in fields';
         }
}





?>

<b><?=$msg; ?></b>
<form method="post">
<p>Login: <input type="text" name="login" value="<?=$form->getlogin()?>" /></p>
<p>Password: <input type="password" name="password" /></p>
<input type="submit">

</form>
 