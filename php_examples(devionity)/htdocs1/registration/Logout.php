<?php
session_start();
require_once('Sesion.php');

Session::destroy();

header('Location: index.php?msg=You have been logged out');

?>