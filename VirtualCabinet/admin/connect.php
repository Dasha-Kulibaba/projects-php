<?php

session_start();


$db = mysqli_connect('localhost', 'root', "", 'vmfk');
if (!$db) {
	die("Connection failed: " . mysqli_connect_error());
} else {
}


$sections = [
	"",
	"young",
	"sertification",
	"qualify",
	"exhibition",
	"planner"
];


$sertification_types = [
	"",
	"Положення та нормативні документи",
	"Графік засідань",
	"Шаблони документів",
	"Загальні документи",
];

$young_types = [
	"",
	"Пам'ятки",
	"Інструкції",
	"Методичні рекомендації"
];

$planner_types = [
	"",
	"ОМО",
	"ЦК"
];
$event_frequency = [
	"",
	"Один раз",
	"До кінця тижня",
	"Щотижня"
];


function CheckAdmin()
{
	if (!isset($_SESSION['admin']) || empty($_SESSION['admin'])) {
		$return = "../index.php";
		header('location:' . $return);
		exit();
	}
}

function CheckData()
{
	if ($_SERVER['REQUEST_METHOD'] !== "POST") {
		$return = "../index.php";
		header('location:' . $return);
		exit();
	}
}

function CheckEdit()
{
	if (!isset($_GET['id'])) {
		$return = "../index.php";
		header('location:' . $return);
		exit();
	}
}
