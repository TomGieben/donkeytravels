<?php
    function connection() {
        $config = include $_SERVER['DOCUMENT_ROOT'] . '/configs/database.php';

        try {
            $servername = $config['servername'];
            $username = $config['username'];
            $password = $config['password'];
            $database = $config['database'];

            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            errorLog("Connected successfully: " . $e->getMessage());
          } catch(PDOException $e) {
            errorLog("Connection failed: " . $e->getMessage());
          }
    }