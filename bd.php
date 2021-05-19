<?php
session_start();

$link = mysqli_connect ("localhost","root","root", "bd");
/* проверка соединения */
if (mysqli_connect_errno())
{
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
else mysqli_query($link,"SET NAMES utf8");

$login = $_SESSION['login'];
$password = $_SESSION['password'];
$id_user = $_SESSION['id'];
?>