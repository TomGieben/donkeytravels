<?php

    function auth() {
        if(isset($_SESSION['auth'])){
            return $_SESSION['auth'];
        } else {
            return false;
        }
    }