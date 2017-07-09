<?php
session_start();
require_once('Sesion.php');
?>
<h1>Hello,<?=Session::get('user'); ?></h1>
<p><a href="logout.php">Logout (<?=Session::get('user'); ?>)</a></p>

