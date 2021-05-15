<?php
$dsn = 'mysql:host=localhost;dbname=login';
$user='root';
$password='';
$opsi = [
    PDO :: ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO :: ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];
try {
    $connect = new PDO($dsn,$user,$password,$opsi); }
    catch (PDOException $e){
var_dump($e->getMessage(), $e->getCode());
    }

function row($username, $password) {
    global $connect;
    $query = "SELECT * FROM users WHERE username=? AND password=? " ;
    $statement = $connect->prepare($query);
    $statement->execute(array($username,$password));
    $result = $statement->rowCount();
    if ($result > 0){
        return $hasil = $statement -> fetch();
    }
    else{
        return false;
    }
}


