<?php

//Load all helpers
foreach (glob("/helpers/*.php") as $filename) {
    include $filename;
}

//Connect to database
connection();

//Checks if user has logged in
// if(!auth()) {
//     redirect('auth/login');
// }