<?php

session_start();

require "../app/core/init.php";

DEBUG ? ini_set('display_errors', 1) : ini_set('display_errors', 0); // debug kiyanaeka true nm palaweni eka run wenna false nm deweni eka run wenna

$app = new App;
$app->loadController();

