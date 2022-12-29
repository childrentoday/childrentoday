<?php
/*
--sample1.php
--Пример 1.
--mysqli процедурный стиль
--создание таблицы в базе данных MySql
*/

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_test";
$db_table = ""; 

// создать подключение к серверу
$connect = mysqli_connect($servername, $username, $password, $dbname);
// проверка соединения
if (!$connect ) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql запрос на создание таблицы
$sql = "CREATE TABLE IF NOT EXISTS Guests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(30),
reg_date TIMESTAMP
)";

// создать подключение к серверу
if (mysqli_query($connect, $sql)) {
    echo "Table Guests created successfully";
} else {
    echo "Error creating table: " . mysqli_error($connect);
}

mysqli_close($connect);
