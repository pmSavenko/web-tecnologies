<?php
include_once("bd.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>Настройки пользователя</title>
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
            width:100px;
            height:25px;
            border-radius:19px;
            background:silver;
            color:#001b4a;
            font-size:15px;
            cursor:pointer;
            vertical-align: middle;
        }
        .vvod{
            /*background-color: lightcyan;*/
            font-family: Snell Roundhand, cursive;
            width: 60%;
            background:silver;
            color:#001b4a;
            font-size:15px;
        }
        .obzor{
            width:61.5%;
            height:25px;
            font-family: Snell Roundhand, cursive;
            background:silver;
            color:#001b4a;
            font-size:15px;
            cursor:pointer;
            vertical-align: center;
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
<div class="inputLogin" align="center"><h4>Настройки пользователя</h4>
<table width="80%" border="0" align="center">
    <tr>
        <td align="left"> Изменить аватар </td>
        <td align="left">
            <form action='save_edit.php' method='post' enctype='multipart/form-data'>
                <input type="file" name="fupload" size='8' class="obzor">
                <input type='submit' name='submit' class="supbutton" value='Изменить'>
            </form>
        </td>
    </tr>
    <tr>
        <td align="left"> Изменить имя </td>
        <td align="left">
            <form action="save_edit.php" method="post">
                <?php
                $data = mysqli_fetch_array(@mysqli_query($link,"SELECT * FROM users WHERE id='$id_user'"));
                echo '<input name="first_name" type="text" class="vvod" value="'.$data['first_name'].'">';
                ?>
                <input type="submit" name="submit" class="supbutton" value="Изменить">
            </form>
        </td>

    </tr>
    <tr>
        <td align="left"> Изменить фамилию </td>
        <td align="left">
            <form action='save_edit.php' method='post'>
                <?php
                $data = mysqli_fetch_array(@mysqli_query($link,"SELECT * FROM users WHERE id='$id_user'"));
                echo '<input name="last_name" type="text" class="vvod" value="'.$data['last_name'].'">';
                ?>
                <input type='submit' name='submit' class="supbutton" value='Изменить'>
            </form>
        </td>
    </tr>
    <tr>
        <td align="left"> Изменить страну </td>
        <td align="left">
            <form action="save_edit.php" method="post">
                <?php
                $data = mysqli_fetch_array(@mysqli_query($link,"SELECT * FROM users WHERE id='$id_user'"));
                echo '<input name="country" type="text" class="vvod" value="'.$data['country'].'">';
                ?>
                <input type="submit" name="submit" class="supbutton" value="Изменить">
            </form>
        </td>
    </tr>
    <tr>
        <td align="left"> Изменить город </td>
        <td align="left">
            <form action='save_edit.php' method='post'>
                <?php
                $data = mysqli_fetch_array(@mysqli_query($link,"SELECT * FROM users WHERE id='$id_user'"));
                echo '<input name="city" type="text" class="vvod" value="'.$data['city'].'">';
                ?>
                <input type='submit' name='submit' class="supbutton" value='Изменить'>
            </form>
        </td>
    </tr>
    <tr>
        <td align="left"> Изменить дату Рождения </td>
        <td align="left">
            <form action='save_edit.php' method='post'>
                <?php
                $data = mysqli_fetch_array(@mysqli_query($link,"SELECT * FROM users WHERE id='$id_user'"));
                echo '<input name="birthdate" type="date" class="vvod" value="'.$data['birthdate'].'">';
                ?>
                <input type='submit' name='submit' class="supbutton" class="obzor" value='Изменить'>
            </form>
        </td>
    </tr>
    <tr>
        <td align="left"> Изменить пол </td>
        <td align="left">
            <form action='save_edit.php' method='post'>
                <select  class="obzor" name="sex" size="1" id="sex">
                    <?php
                    $data = mysqli_fetch_array(@mysqli_query($link,"SELECT * FROM users WHERE id='$id_user'"));
                    if(!strcasecmp($data['sex'], "Мужской")) {
                        echo '<option selected value="Мужской">Мужской</option>';
                        echo '<option value="Женский">Женский</option>';
                    }
                    else if(!strcasecmp($data['sex'], "Женский")) {
                        echo '<option value="Мужской">Мужской</option>';
                        echo '<option selected value="Женский">Женский</option>';
                    }
                    else {
                        echo '<option value="Мужской">Мужской</option>';
                        echo '<option value="Женский">Женский</option>';
                    }
                    ?>

                </select>
                <input type='submit' name='submit' class="supbutton"value='Изменить'>
            </form>
        </td>
    </tr>
    <tr>
        <td align="left"> Изменить e-mail </td>
        <td align="left">
            <form action="save_edit.php" method="post">
                <?php
                $data = mysqli_fetch_array(@mysqli_query($link,"SELECT * FROM users WHERE id='$id_user'"));
                echo '<input name="email" type="text" class="vvod" value="'.$data['email'].'">';
                ?>
                <input type="submit" name="submit" class="supbutton" value="Изменить">
            </form>
        </td>
    </tr>
    <tr>
        <td align="left"> Изменить контактный телефон </td>
        <td align="left">
            <form action="save_edit.php" method="post">
                <?php
                $data = mysqli_fetch_array(@mysqli_query($link,"SELECT * FROM users WHERE id='$id_user'"));
                echo '<input name="mobile" type="text" class="vvod" value="'.$data['mobile'].'">';
                ?>
                <input type="submit" name="submit" class="supbutton" value="Изменить">
            </form>
        </td>
    </tr>
    <tr>
        <td align="left"> Изменить номер паспорта </td>
        <td align="left">
            <form action="save_edit.php" method="post">
                <?php
                $data = mysqli_fetch_array(@mysqli_query($link,"SELECT * FROM users WHERE id='$id_user'"));
                echo '<input name="num_pass" type="text" class="vvod" value="'.$data['num_pass'].'">';
                ?>
                <input type="submit" name="submit" class="supbutton" value="Изменить">
            </form>
        </td>
    </tr>
</table><br>
    <a href='index.php'>Вернуться на главную</a> <br><br>
</div>

</body>
</html>