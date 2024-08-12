<?php

function getConnection():PDO
{
    $host = "localhost"; //"ccit.com"
    $port = 3306;
    $db = "mainstore_prototype2";
    $user = "root";
    $pwd = "";

    return new PDO("mysql:host=$host:$port;dbname=$db",$user,$pwd);
}