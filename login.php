<?php
include_once("bd.php");

echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>TITLE</title>';
    if (isset($_POST['login']))
    {
        $login = $_POST['login'];
        if ($login == '') {
            unset($login);
            $_SESSION['msg_vhod'] ='<br><font-color="red" align = "center"> Введены некорректные данные авторизации! Пожалуйта повторите попытку </font>';
            echo '<meta http-equiv="refresh" content="0; URL=index.php">';
        }
    }
    if (isset($_POST['password']))
    {
        $password=$_POST['password'];
        if ($password =='') {
            unset($password);
            $_SESSION['msg_vhod'] ='<br><font-color="red" align = "center"> Введены некорректные данные авторизации! Пожалуйта повторите попытку </font>';
            echo '<meta http-equiv="refresh" content="0; URL=index.php">';
        }
    }
    if($login and $password)
    {
        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
    }

echo '</head>
<body>';

if($login and $password)
{
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $login = trim($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $password = trim($password);
    $user = mysqli_query($link,"SELECT * FROM users WHERE login='$login' AND password='$password'");
    $id_user = mysqli_fetch_array($user);
}

if (!empty($id_user['id']))
{
    $_SESSION['password']=$password;
    $_SESSION['login']=$login;
    $_SESSION['id']=$id_user['id'];
}
else
{
    unset($login);
    unset($password);
    $_SESSION['msg_vhod'] ='<br><font-color="red" align = "center"> Введены некорректные данные авторизации! Пожалуйта повторите попытку </font>';
    echo '<meta http-equiv="refresh" content="0; URL=index.php">';
}

echo '<meta http-equiv="Refresh" content="0; URL=index.php">
</body>
</html>';
?>
