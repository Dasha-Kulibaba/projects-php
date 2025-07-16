<?php
require('../connect.php');
unset($_SESSION['admin']);
session_destroy();
$return = "../../index.php";
header('location:' . $return);
exit();
