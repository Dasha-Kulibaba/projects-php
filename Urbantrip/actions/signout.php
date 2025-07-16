<?php

require('../components/connection.php');
unset($_SESSION['user']);


$returnUrl = "/index.php";

header('location:' . $returnUrl);
