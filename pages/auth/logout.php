<?php
    $_SESSION['auth'] = false;
    $file = 'auth/login';
    
    header("Location: http://" . $_SERVER['SERVER_NAME'] ."/index.php?redirect=".$file."");
