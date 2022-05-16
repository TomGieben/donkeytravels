<?php
//start session
session_start();

//Load all helpers
foreach (glob($_SERVER['DOCUMENT_ROOT'] . "/helpers/*.php") as $filename) {
    include $filename;
}

// Connect to database
connection();

// Checks if user has logged in
if(pageName() !== 'register' && pageName() !== 'login') {
    if(!auth()) {
        redirect('auth/login');
    }
}


// Set page name
$output = ob_get_contents();
if (ob_get_length() > 0) { ob_end_clean(); }
$patterns = array("/<title>(.*?)<\/title>/");
$replacements = array("<title>Donkleytravels | ".ucfirst(pageName())."</title>");
$output = preg_replace($patterns, $replacements,$output);
echo $output;
