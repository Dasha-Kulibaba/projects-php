<?php

$connect = mysqli_connect("localhost", "root", "", "DanceLife");
if (!$connect) die("ПОМИЛКА: Неможливо підключитися. " . mysqli_connect_error());
