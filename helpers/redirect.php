<?php
    function redirect($file) {
        header("Location: http://" . $_SERVER['SERVER_NAME'] ."/index.php?redirect=".$file."");
    }
