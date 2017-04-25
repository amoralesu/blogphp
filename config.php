<?php
/**
 * Created by PhpStorm.
 * User: SISTEMAS
 * Date: 18/04/2017
 * Time: 04:35 PM
 */
try {
    $dbHost = 'localhost';
    $dbName = 'cursophp';
    $dbUser = 'root';
    $dbPass = '';

    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    //Por default PDO no tienen habilitada las excepciones hay que habilitarlas
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);

} catch (mysqli_sql_exception $exception) {
    echo $exception->getMessage();
}