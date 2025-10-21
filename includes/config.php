<?php
ob_start(); // Turns on output buffering
session_start();
date_default_timezone_set("Asia/Kolkata");

try {
    $con = new PDO("mysql:dbname=saviplex_db;host=localhost", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
        exit("Connection to database failed". $e->getMessage());
    }

?>