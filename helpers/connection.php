<?php

    function connection() {
        $config = include('../configs/database.php');

        try {
            $servername = $config['servername'];
            $username = $config['username'];
            $password = $config['password'];
            $database = $config['database'];

            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
    }