<?php
require('../db.php');
unset($_SESSION['admin']);
header('location:../index.php');
exit();
