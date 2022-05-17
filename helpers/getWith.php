<?php
    function getWith($name) {
        if(isset($_SESSION[$name])) {
            echo "<div class='alert alert-info'>".$_SESSION[$name]."</div>";
        }
    }