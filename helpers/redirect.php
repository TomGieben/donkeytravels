<?php
    function redirect($file) {
        header("Location: ../index.php?redirect=".$file."");
    }
