<?php
include_once("bd.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Регистрация</title>
    <style type="text/css">
        INPUT {
            background: silver; /* Цвет фона */
        }
        <!--
        body {

            background-image: url("images/kisspng-clouds-back.png");
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            background-color: #ffffff;
        }
        .inputLogin
        {
            font-family: Snell Roundhand, cursive;

            font-size: 18px;
            color: #001b4a;
            font-style: normal;
            line-height: normal;
            font-weight: normal;
            font-variant: normal;
            background: #9ec2ff;
            width: 50%;
            margin-top: 130px;
            margin-left:25%;
            border: 1px Aqua;
            text-align:center;
            border-radius: 20%;
            -moz-border-radius: 20%;
            -webkit-border-radius: 20%;
            -khtml-border-radius: 20%;
            border: 4px solid lightgray;
        }
        .inputLogin img{
            height: 200px;
            width: 150px;
            left: 100px;
            /*bottom: 10%;*/
        }
        .inputLogin form{
        }
        .header-bg {
            height: 250px; /* Высота шапки */
            text-align: center; /* Выравнивание по центру */
            background: #9ec2ff;
            border-bottom: 6px solid lightgray;
        }
        .header-bg h1{
            color: #000080;
            font-family: Monotype Corsiva, serif;
            font-style: oblique;
            font-size: 50px;
            position: relative; /* Относительное позиционирование */
            margin-left: 90px;
        }
        .header-bg h2{
            color: #000080;
            font-family: Monotype, serif;
            font-style: normal;
            font-size: 20px;
            position: relative; /* Относительное позиционирование */
            margin-left: 90px;
        }
        .header-bg img {
            position: relative; /* Относительное позиционирование */
            height: 250px;
        }
        .supbutton{
            width:250px;
            height:25px;
            border-radius:19px;
            background:silver;
            color:#001b4a;
            font-size:16px;
            cursor:pointer;
            vertical-align: middle;
        }
        .vvod{
            /*background-color: lightcyan;*/
            width: 60%;
        }
        .obzor{
            width:61.5%;
            height:25px;
            background:silver;
            color:#001b4a;
            font-size:16px;
            cursor:pointer;
            vertical-align: middle;
        }
        .yearstyle{
            width:19.6%;
            height:25px;
            background:silver;
            color:#001b4a;
            font-size:16px;
            cursor:pointer;
            vertical-align: middle;
        }
        -->
    </style>
</head>
<body>
<header>
    <table class="header-bg" width="100%">
        <tr>
            <td width="450px" height="250px" align="left" background="images/kisspng-airplane.png">
                <h1>SavAna Airlines</h1>
                <h2>Личный кабинет путешественника</h2>
            </td>
            <td></td>
            <td width="550px" align="center"><img src="images/kisspng-airplane-aircraft.png" width="300" height="250"></td>
        </tr>
    </table>
</header>
<div class="inputLogin" align="center">
    <form action="verification.php" method="POST">
    <table  width="60%" border="0" align="center">
        <tr align="center">
        </tr>
        <tr>
            <td align="left">Логин<font color="red">*</font>:</td>
            <td align="left"><input type="text" size="32" name="login" ></td>
        </tr>
        <tr>
            <td align="left">Пароль<font color="red">*</font>:</td>
            <td align="left"><input type="password" size="32" maxlength="32" name="password" ></td>
        </tr>
        <tr>
            <td align="left">Подтверждения пароля<font color="red">*</font>:</td>
            <td align="left"><input type="password" size="32" maxlength="32" name="password2"></td>
        </tr>
        <tr>
            <td align="left">E-mail<font color="red">*</font>:</td>
            <td align="left"><input type="text" size="32" name="email"></td>
        </tr>
        <tr>
            <td align="left">Имя:</td>
            <td align="left"><input type="text" size="32" name="first_name"></td>
        </tr>
        <tr>
            <td align="left">Фамилия:</td>
            <td align="left"><input type="text" size="32" name="last_name"></td>
        </tr>
        <tr>
            <td align="left">Пол:</td>
            <td align="left">
                <select name = "sex">
                    <option value="Мужской">Мужской</option>
                    <option value="Женский">Женский</option>
                </select>
            </td>
        </tr>
        <tr>
            <td align="left">День рождения:</td>
            <td align="left"><input type="date" name="birthdate"></td>
        </tr>
        <tr>
            <td align="left">Страна:</td>
            <td align="left"><input type="text" size="32" name="country"></td>
        </tr>
        <tr>
            <td align="left">Город:</td>
            <td align="left"><input type="text" size="32" name="city"></td>
        </tr>
        <tr>
            <td align="left">Контактный телефон:</td>
            <td align="left"><input type="text" size="32" name="mobile"></td>
        </tr>
        <tr>
            <td align="left">Номер паспорта:</td>
            <td align="left"><input type="text" size="32" name="num_pass"></td>
        </tr>
        <br>
    </table>
        <br>
        <input type="submit" value="Зарегистроваться!" class = "supbutton" name="submit" >
        <br>
</form>
    <?php
    echo $_SESSION['msg'];
    $_SESSION['msg'] = '';
    ?>
<br><a href='index.php'>На главную</a>
</div>
</body>
</html>