<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = trim($_POST["name"]);
    $surname = trim($_POST["surname"]);

    if (empty($name) || empty($surname)) {
        echo "Помилка: Всі поля повинні бути заповнені!<br>";
    } elseif (!ctype_alpha($name) || (!ctype_alpha($surname))) {
        echo "Помилка: Некоректний формат даних!<br>";
    } else {
        echo "Привіт, $name $surname!";
    }
}
?>