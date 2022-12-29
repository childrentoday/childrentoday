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
$conn = mysqli_connect($servername, $username, $password, $dbname);
// проверка соединения
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// sql создание таблицы
/*
$sql = "CREATE TABLE IF NOT EXISTS MyGuests1 (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(30),
reg_date TIMESTAMP
)";
*/

/*
Если таблицы одинаковы (уже созданы), то нам нужно просто скопировать данные:
*/
//--1--//
//--Копирование полностью всех данных из одной таблицы mysql в другую:--//
/*
$sql = "INSERT INTO `php_test`.`MyGuests1`
SELECT *
FROM `php_test`.`MyGuests`";
*/
//--2--//
//-- Если необходимо скопировать только некоторые столбцы, то применяем следующую конструкцию: --//
//-- Данная конструкция при изменении в таблице донора будет добавлять в таблицу реципиент новые данные каждый раз при запуске скрипта.
//---при этом id_n будут соответствовать id исходной (донора) таблицы
/*
$sql = "INSERT INTO `php_test`.`MyGuests1` (`id_n`, `firstname`, `lastname`, `email`, `reg_date`)
SELECT `id`, `firstname`, `lastname`, `email`, `reg_date`
FROM `php_test`.`MyGuests`";
*/

if ($result = mysqli_query($conn, $sql)) {
    echo "  Table MyGuests created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
