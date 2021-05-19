<?php
include_once("bd.php");

if (isset($_POST['submit'])){
    if(empty($_POST['login']))  {
        $_SESSION['msg'] ='<br><font-color="red"><img border="0" src="error.gif" align="middle" alt="Введите логин!"> Введите логин! </font>';
        header('Location: registration.php ');
    }
    elseif (!preg_match("/^\w{3,}$/", $_POST['login'])) {
        $_SESSION['msg'] ='<br><font-color="red"><img border="0" src="error.gif" align="middle" alt="В поле "Логин" введены недопустимые символы!"> В поле "Логин" введены недопустимые символы! Только буквы, цифры и подчеркивание!</font>';
        header('Location: registration.php ');
    }
    elseif(empty($_POST['password'])) {
        $_SESSION['msg'] ='<br><font-color="red"><img border="0" src="error.gif" align="middle" alt="Введите пароль !"> Введите пароль!</font>';
        header('Location: registration.php ');
    }
    elseif (!preg_match("/\A(\w){6,20}\Z/", $_POST['password'])) {
        $_SESSION['msg'] = '<br><font-color="red"><img border="0" src="error.gif" align="middle" alt="Пароль слишком короткий!"> Пароль слишком короткий! Пароль должен быть не менее 6 символов! </font>';
        header('Location: registration.php ');
    }
    elseif(empty($_POST['password2'])) {
        $_SESSION['msg'] = '<br><font-color="red"><img border="0" src="error.gif" align="middle" alt="Введите подтверждение пароля!"> Введите подтверждение пароля!</font>';
        header('Location: registration.php ');
    }
    elseif($_POST['password'] != $_POST['password2']) {
        $_SESSION['msg'] = '<br><font-color="red"><img border="0" src="error.gif" align="middle" alt="Введенные пароли не совпадают!"> Введенные пароли не совпадают!</font>';
        header('Location: registration.php ');
    }
    elseif(empty($_POST['email'])) {
        $_SESSION['msg'] = '<br><font-color="red"><img border="0" src="error.gif" align="middle" alt="Введите E-mail!">Введите E-mail! </font>';
        header('Location: registration.php ');
    }
    elseif (!preg_match("/^[a-zA-Z0-9_\.\-]+@([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,6}$/", $_POST['email'])) {
        $_SESSION['msg'] = '<br><font-color="red"><img border="0" src="error.gif" align="middle" alt="E-mail имеет недопустимий формат!"> E-mail имеет недопустмый формат! Например, name@gmail.com! </font>';
        header('Location: registration.php ');
    }

    else{
        $login = $_POST['login'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $email = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $sex= $_POST['sex'];
        $birthdate = $_POST['birthdate'];
        $country = $_POST['country'];
        $city= $_POST['city'];
        $mobile= $_POST['mobile'];
        $num_pass= $_POST['num_pass'];

        $sql = mysqli_query($link,"SELECT id FROM users WHERE login='$login'") or die(mysqli_error());

        if (mysqli_num_rows($sql) > 0) {
            $_SESSION['msg'] = '<font-color="red"><img border="0" src="error.gif" align="middle" alt="Пользователь с таким логином уже существует!"> Пользователь с таким логином уже существует!</font>';
            header('Location: registration.php ');
        }
        else {
            $sql = mysqli_query($link,"SELECT id FROM users WHERE email='$email'") or die(mysqli_error());
            if (mysqli_num_rows($sql) > 0){
                $_SESSION['msg'] = '<font-color="red"><img border="0" src="error.gif"  alt="Пользователь с таким e-mail уже существует!"> Пользователь с таким e-mail уже существует!</font>';
                header('Location: registration.php ');
            }
            else{
                if(@mysqli_query($link,"INSERT INTO users (login, password, email, first_name, last_name, sex, birthdate, country, city, mobile, num_pass)
                              VALUES ('$login', '$password', '$email', '$first_name', '$last_name','$sex',' $birthdate','$country','$city','$mobile','$num_pass')")or die(mysqli_error()))
                {
                    $sql = mysqli_fetch_array(@mysqli_query($link,"SELECT id FROM users WHERE login='$login'"));
                    $_SESSION['msg'] = '<font-color="green"><img border="0" src="ok.gif" align="middle" alt="Вы успешно зарегистрировались!"> Вы успешно зарегистрировались!</font><br>';
                    $_SESSION['login'] = $login;
                    $_SESSION['password'] = $password;
                    $_SESSION['id'] = $sql['id'];
                    header('Location: index.php ');
                }
            }
        }
    }
}
?>