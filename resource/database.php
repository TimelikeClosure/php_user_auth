<?php

    require_once('connect.php');
    try{
        $db = new PDO("{$dbConnectInfo['driver']}:host={$dbConnectInfo['host']};dbname={$dbConnectInfo['dbname']}", $dbConnectInfo['username'], $dbConnectInfo['password'], $dbConnectInfo['options']);
    } catch (PDOException $exception) {
        echo "Connection failed: ".$exception->getMessage();
    } finally {
        unset($dbConnectInfo);
    }

?>
