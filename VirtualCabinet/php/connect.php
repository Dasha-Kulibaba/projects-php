<?php

session_start();


$db = mysqli_connect('localhost', 'root', "", 'vmfk');
if (!$db) {
	die("Connection failed: " . mysqli_connect_error());
} else {
}


function isAdmin()
{
	if (isset($_SESSION['admin'])) {
		return true;
	} else {
		return false;
	}
}
