<?php
/*
Пример. mysqli процедурный стиль
*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_test";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


/*
Если таблицы одинаковы (уже созданы), то нам нужно просто скопировать данные:
*/
//--1--//
//--Копирование полностью всех данных из одной таблицы mysql в другую:--//

$sql = "INSERT INTO `php_test`.`Guests1`
SELECT *
FROM `php_test`.`Guests`";



if ($result = mysqli_query($conn, $sql)) {
    echo "  Table copy successfully";
} else {
    echo "Error copy table: " . mysqli_error($conn);
}

mysqli_close($conn);
