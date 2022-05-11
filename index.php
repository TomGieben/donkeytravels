<?php

//Checks if user has logged in
if(!isset($_SESSION['auth'])) {
    $_GET['redirect'] = 'auth/login';
} else {
    //Redirect to page from redirect() function
    if(isset($_GET['redirect'])) {
        header("location: pages/".$_GET['redirect'].".php");
    } else {
        header("location: pages/welcome.php");
    }

}
