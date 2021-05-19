<?php
include_once("bd.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>SavAna Airlines</title>
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
            left 100px;
            /*bottom: 10%;*/
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
            width:150px;
            height:40px;
            border-radius:19px;
            background:silver;
            color:#001b4a;
            font-size:22px;
            cursor:pointer;
        }
        .logpass{
            background-color: lightcyan;
            width: 160px;
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
</body>
<body>
<div class="inputLogin">
<?php
if(empty($login) and empty($password))
{
    $_SESSION['msg'] = '<font-face="Verdana" size="4">Поля со значком <font color="red">*</font> должны быть обязательно заполнены!</font>';
    echo '
    <table align="center" style="padding:40px" cellpadding="10px">
        <br>
        <br>
        <form action="login.php" method="POST">
            <tr>
                <td>Логин:</td>
                <td><input type="text" class="logpass" name="login" ></td>
            </tr>
            <tr>
                <td>Пароль:</td>
                <td><input type="password" class="logpass" name="password" ></td>
            </tr>
            <tr>
                <td colspan="2">'.$_SESSION['msg_vhod'].'</td>';
    $_SESSION['msg_vhod'] = '';
    echo '
            </tr>
            <tr>
                <td><input style="font-family:calibri; font-size: 16px" type="submit" class="supbutton" value="Войти" name="submit"></td>
        </form>
        <form action="registration.php" method="POST">
                <td><input style="font-family:calibri; font-size: 16px" type="submit" class="supbutton" value="Регистрация" name="submit"></td>
        </form>
            </tr>
    </table>

    ';
    //    <a href="registration.php">Регистрация</a>
}
else
{
    $result = mysqli_query($link,"SELECT * FROM users WHERE id='$id_user'");
    $array = mysqli_fetch_array($result);
    if($array['avatar'] == '') $avatar = "noAvatar.jpg";
    else $avatar = $array['avatar'];
    echo " <br>
        <strong> Здравствуйте,".$array['first_name']."! </strong> | <a href='exit.php'>Выход</a><br><br>
        <table align='center'>
        <tr>
            <td align='center'>
                <img src='avatars/".$avatar."' > 
            </td>
            <td width='50px'></td>
            <td align='left'> 
                Имя: ".$array['first_name']." ".$array['last_name']."<br>
                Пол: ".$array['sex']." <br> 
                День рождения: ".$array['birthdate']." <br>
                Страна: ".$array['country']." <br>
                Город: ".$array['city']." <br>
                Контактный телефон: ".$array['mobile']." <br>
                E-mail: ".$array['email']." <br>
                Номер паспорта: ".$array['num_pass']." <br>
                
            </td>
        </tr> </table> <br> <a href='edit.php'>Редактировать профиль</a> <br><br>";
}
?>
 </div>
</body>
</html>