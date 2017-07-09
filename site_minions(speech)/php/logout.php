<?php
session_start();
require_once "session.class.php";
Session::destroy();
header("location: ../index.php");
?>