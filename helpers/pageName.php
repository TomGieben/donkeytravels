<?php
    function pageName() {
        return basename($_SERVER['PHP_SELF'], '.php');
    }