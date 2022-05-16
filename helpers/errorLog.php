<?php
    function errorLog($str) {
        $log  = $_SERVER['REMOTE_ADDR'].' - '.date("d-m-Y H:i:s").PHP_EOL. $str .PHP_EOL;
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/logs/donkeytravel.log', $log, FILE_APPEND);
    }