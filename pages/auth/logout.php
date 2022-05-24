<?php
    include('../layouts/layout.php'); 
    $_SESSION['auth'] = false;
    redirect('auth/login');
