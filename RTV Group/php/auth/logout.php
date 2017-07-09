<?php
session_start();
require_once ("../lib/session.class.php");
session_destroy();
header("location: ../../index.php");
?>