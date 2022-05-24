<?php
session_start();
//Redirect to page from redirect() function
if(isset($_GET['redirect'])) {
    if($_SESSION['auth']) {
        header("location: pages/".$_GET['redirect'].".php");
    } else {
        if($_GET['redirect'] == 'auth/register') {
            header("location: pages/".$_GET['redirect'].".php");
        } else {
            $_GET['redirect'] = 'auth/login';
            header("location: pages/".$_GET['redirect'].".php");
        }
    }
} else {
    if($_SESSION['auth']) {
        header("location: pages/welcome.php");
    } else {
        $_GET['redirect'] = 'auth/login';
        header("location: pages/".$_GET['redirect'].".php");
    }
}