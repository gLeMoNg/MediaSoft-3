<?php
    session_start();
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $array = [];
    if(preg_match("/^[а-яА-Яa-zA-Z]+$/u", $firstname)) {
        $fn = 1;
    } else {
        $fn = [];
        $array[] = 'Имя не должно содержать цифр';
    }
    if(preg_match("/^[а-яА-Яa-zA-Z]+$/u", $lastname)) {
        $ln = 1;
    } else {
        $ln = [];
        $array[] = 'Фамилия не должна содержать цифр';
    }
    if(strlen($login) > 3) {
        $log = 1;
    } else {
        $log = [];
        $array[] = 'Логин должен быть больше 3 символов';
    }
    if(strlen($password) > 4) {
        $pw = 1;
    } else {
        $pw = [];
        $array[] = 'Пароль должен быть больше 4 символов';
    }
    if (empty($firstname) || empty($lastname) || empty($login) || empty($password)) {
        $array = [];
    }
    if (!empty($a) && !empty($b) && !empty($c) && !empty($d)) {
        $_SESSION['message'] = "
                        Вы успешно прошли валидацию<br> 
                        Ваше имя: $firstname<br> 
                        Ваша фамилия: $lastname<br>
                        Ваш логин: $login<br>
                        Ваш пароль: $password";
    } else {
        $_SESSION['message'] = implode('<br>', $array);
    }
    $array = [];
    $_POST = [];
