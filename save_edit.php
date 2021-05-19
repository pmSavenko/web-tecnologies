<?php
include_once("bd.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>Изменение данных <?php echo $login; ?></title>
</head>
<body>
<?php

////////Изменение аватары

if (isset($_FILES['fupload']['name'])){ //отправлялась ли переменная

    if (empty($_FILES['fupload']['name']) AND $_FILES['fupload']['name'] == ''){

        $noAvatar = "noAvatar.jpg";//изображение если пользователь не загрузил свое
        $result = mysqli_query($link,"SELECT avatar FROM users WHERE id='$id_user'");//извлекаем текущий аватар
        $avatarka = mysqli_fetch_array($result);

        if ($avatarka['avatar'] != $noAvatar) {//если аватар был стандартный, то не удаляем его, ведь у на одна картинка на всех.
            unlink ('avatars/'.$avatarka['avatar']);
        }
    }
    else{
        //иначе - загружаем изображение пользователя для обновления
        $path_to_90_directory = 'avatars/';//папка, куда будет загружаться начальная картинка и ее сжатая копия

        if(preg_match('/[.](JPG)|(jpg)|(jpeg)|(JPEG)|(gif)|(GIF)|(png)|(PNG)$/',$_FILES['fupload']['name']))//проверка формата исходного изображения
        {
            $filename = $_FILES['fupload']['name'];
            $source = $_FILES['fupload']['tmp_name'];
            $target = $path_to_90_directory . $filename;
            move_uploaded_file($source, $target);//загрузка оригинала в папку $path_to_90_directory

            if(preg_match('/[.](GIF)|(gif)$/', $filename)) {
                $im = imagecreatefromgif($path_to_90_directory.$filename) ; //если оригинал был в формате gif
            }
            if(preg_match('/[.](PNG)|(png)$/', $filename)) {
                $im = imagecreatefrompng($path_to_90_directory.$filename) ;//если оригинал был в формате png
            }

            if(preg_match('/[.](JPG)|(jpg)|(jpeg)|(JPEG)$/', $filename)) {
                $im = imagecreatefromjpeg($path_to_90_directory.$filename); //если оригинал был в формате jpg
            }

            //СОЗДАНИЕ КВАДРАТНОГО ИЗОБРАЖЕНИЯ И ЕГО ПОСЛЕДУЮЩЕЕ СЖАТИЕ ВЗЯТО С САЙТА www.codenet.ru

            $w = 120;  // ширина изображения
            $quality = 100; //Качество создаваемого изображения max 100
            $w_src = imagesx($im); //вычисляем ширину
            $h_src = imagesy($im); //вычисляем высоту изображения

            //Создавать квадратное изображение $rezim = 1
            //Создать изображение пропорционально оригиналу $rezim = 2

            $rezim = 1;

            switch ($rezim)
            {
                //**************************** 1
                case "1" :

                    // создаём пустую квадратную картинку
                    // важно именно truecolor!, иначе будем иметь 8-битный результат
                    $dest = imagecreatetruecolor($w,$w);

                    // вырезаем квадратную серединку по x, если фото горизонтальное

                    if ($w_src > $h_src){
                        imagecopyresampled($dest, $im, 0, 0, round((max($w_src,$h_src)-min($w_src,$h_src))/2), 0, $w, $w, min($w_src,$h_src), min($w_src,$h_src));
                    }
                    // вырезаем квадратную верхушку по y,
                    if ($w_src < $h_src){
                        imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $w, min($w_src,$h_src), min($w_src,$h_src));
                    }
                    // квадратная картинка масштабируется без вырезок

                    if ($w_src == $h_src){
                        imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $w, $w_src, $h_src);
                    }

                    break;
                //***************************** 2
                case "2" :
                    $prop = $w_src/$h_src;
                    $h = $w/$prop;
                    $dest = imagecreatetruecolor($w,$h);
                    imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $h, $w_src, $h_src);
                    break;
            }

            $random = rand(1000000, 9999999);
            imagejpeg($dest, $path_to_90_directory.$random.".jpg", $quality);//сохраняем изображение формата jpg в нужную папку

            $avatar = $random.".jpg";//заносим в переменную путь до аватара.

            $delfull = $path_to_90_directory.$filename;
            unlink ($delfull);//удаляем оригинал загруженного изображения, он нам больше не нужен.

            $result = mysqli_query($link,"SELECT avatar FROM users WHERE id='$id_user'");//извлекаем текущий аватар пользователя
            $avatarka = mysqli_fetch_array($result);

            if ($avatarka['avatar'] != $noAvatar) {//если аватар был стандартный, то не удаляем его, ведь у на одна картинка на всех.
                unlink ('avatars/'.$avatarka['avatar']);
            }
        }
        else{
            //в случае несоответствия формата, выдаем соответствующее сообщение
            exit ("Аватар должен быть в формате <strong>JPG,GIF или PNG</strong>");
        }

    }

    $up = mysqli_query($link,"UPDATE users SET avatar='$avatar' WHERE id='$id_user'");//обновляем аватар в базе
    if ($up == true) {//если верно, то отправляем на личную страничку
        echo "<meta http-equiv='Refresh' content='0; URL=edit.php'>";
    }
}

////////Изменение имени

else if (isset($_POST['first_name'])){//Если существует имя
    $name = $_POST['first_name'];
    $name = stripslashes($name);
    $name = htmlspecialchars($name);
    $name = trim($name);//удаляем все лишнее

    if ($name == '') {
        exit("Вы не ввели имя<br><a href='edit.php'>Вернуться назад</a>");
    }
    $up = mysqli_query($link,"UPDATE users SET first_name='$name' WHERE id='$id_user'");//обновляем имя
    if ($up == true) {
        echo "<meta http-equiv='Refresh' content='0; URL=edit.php'>";
    }
}

////////Изменение фамилии

else if (isset($_POST['last_name'])){//Если существует фамилия
    $lastname = $_POST['last_name'];
    $lastname = stripslashes($lastname);
    $lastname = htmlspecialchars($lastname);
    $lastname = trim($lastname);//удаляем все лишнее

    if ($lastname == '') {
        exit("Вы не ввели фамилию<br><a href='edit.php'>Вернуться назад</a>");
    }

    $up = mysqli_query($link,"UPDATE users SET last_name='$lastname' WHERE id='$id_user'");//обновляем фамилию
    if ($up=='TRUE') {//если верно, то обновляем его в сессии
        $_SESSION['lastname'] = $lastname;
        echo "<meta http-equiv='Refresh' content='0; URL=edit.php'>";
    }
}

////////Изменение страны

else if (isset($_POST['country'])){//Если существует фамилия
    $country = $_POST['country'];
    $country = stripslashes($country);
    $country = htmlspecialchars($country);
    $country = trim($country);//удаляем все лишнее

    if ($country == '') {
        exit("Вы не ввели страну<br><a href='edit.php'>Вернуться назад</a>");
    }

    $up = mysqli_query($link,"UPDATE users SET country='$country' WHERE id='$id_user'");//обновляем страну
    if ($up == true) {
        echo "<meta http-equiv='Refresh' content='0; URL=edit.php'>";
    }
}

////////Изменение города

else if (isset($_POST['city'])){//Если существует фамилия
    $city = $_POST['city'];
    $city = stripslashes($city);
    $city = htmlspecialchars($city);
    $city = trim($city);//удаляем все лишнее

    if ($city == '') {
        exit("Вы не ввели город<br><a href='edit.php'>Вернуться назад</a>");
    }

    $up = mysqli_query($link,"UPDATE users SET city='$city' WHERE id='$id_user'");//обновляем город
    if ($up == true) {//если верно, то обновляем его в сессии
        $_SESSION['city'] = $city;
        echo "<meta http-equiv='Refresh' content='0;  URL=edit.php'>";
    }
}

////////Изменение числа, месяца и года

else if (isset($_POST['birthdate'])){//Если существует день рождения
    $birthdate = $_POST['birthdate'];
    $birthdate = stripslashes($birthdate);
    $birthdate = htmlspecialchars($birthdate);
    $birthdate = trim($birthdate);//удаляем все лишнее


    if ($birthdate == '') {
        exit("Вы не ввели год рождения<br><a href='edit.php'>Вернуться назад</a>");
    }

    //$up = mysqli_query($link,"UPDATE users SET birthdate_day='$birthdate_day',birthdate_month='$birthdate_month',birthdate_year='$birthdate_year' WHERE id='$id_user'");//обновляем день
    $up = mysqli_query($link,"UPDATE users SET birthdate='$birthdate' WHERE id='$id_user'");//обновляем день

    if ($up == true) {
        $_SESSION['birthdate'] = $birthdate;
        echo "<meta http-equiv='Refresh' content='0; URL=edit.php'>";
    }
}

////////Изменение пола

else if (isset($_POST['sex'])){//Если существует фамилия
    $sex = $_POST['sex'];
    $sex = stripslashes($sex);
    $sex = htmlspecialchars($sex);
    $sex = trim($sex);//удаляем все лишнее

    if ($sex == '') {
        exit("Вы не ввели пол<br><a href='edit.php'>Вернуться назад</a>");
    }

    $up = mysqli_query($link,"UPDATE users SET sex='$sex' WHERE id='$id_user'");//обновляем пол
    if ($up == true) {
        echo "<meta http-equiv='Refresh' content='0;  URL=edit.php'>";
    }
}

////////Изменение e-mail
else if (isset($_POST['email'])){//Если существует фамилия
    $email = $_POST['email'];
    $email = stripslashes($email);
    $email = htmlspecialchars($email);
    $email = trim($email);//удаляем все лишнее

    if ($email == '') {
        exit("Вы не ввели страну<br><a href='edit.php'>Вернуться назад</a>");
    }

    $up = mysqli_query($link,"UPDATE users SET email='$email' WHERE id='$id_user'");//обновляем страну
    if ($up == true) {
        echo "<meta http-equiv='Refresh' content='0;  URL=edit.php'>";
    }
}

////////Изменение номера паспорта
else if (isset($_POST['num_pass'])){//Если существует фамилия
    $num_pass = $_POST['num_pass'];
    $num_pass = stripslashes($num_pass);
    $num_pass = htmlspecialchars($num_pass);
    $num_pass = trim($num_pass);//удаляем все лишнее

    if ($num_pass == '') {
        exit("Вы не ввели страну<br><a href='edit.php'>Вернуться назад</a>");
    }

    $up = mysqli_query($link,"UPDATE users SET num_pass='$num_pass' WHERE id='$id_user'");//обновляем страну
    if ($up == true) {
        echo "<meta http-equiv='Refresh' content='0;  URL=edit.php'>";
    }
}

////////Изменение телефона
else if (isset($_POST['mobile'])){//Если существует фамилия
    $mobile = $_POST['mobile'];
    $mobile = stripslashes($mobile);
    $mobile = htmlspecialchars($mobile);
    $mobile = trim($mobile);//удаляем все лишнее

    if ($mobile == '') {
        exit("Вы не ввели страну<br><a href='edit.php'>Вернуться назад</a>");
    }

    $up = mysqli_query($link,"UPDATE users SET mobile='$mobile' WHERE id='$id_user'");//обновляем страну
    if ($up == true) {
        echo "<meta http-equiv='Refresh' content='0;  URL=edit.php'>";
    }
}
?>
</body>
</html>