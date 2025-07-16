<?php

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

$db = mysqli_connect('localhost', 'root', "", 'urbantrip');
if (!$db) {
	die("Connection failed: " . mysqli_connect_error());
} else {
}
