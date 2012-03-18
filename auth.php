<?php

require_once('config.php');
session_start();

if (empty($_POST["username"]) || empty($_POST['password']) || $_POST["username"] != USERNAME || $_POST['password'] != PASSWORD) {
  header("Location: logon.php");
}

$_SESSION['user'] = $_POST["username"];

