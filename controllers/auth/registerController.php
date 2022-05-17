<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/preload.php';

    if($_POST['function'] == 'create') {
            $password = password_hash($_POST['password']);
            $confirmPassword = password_hash($_POST['password-confirm']);
            $email = $_POST['email'];
            $msg = 'Succesvol geregistreerd.';

            if($password !== $confirmPassword) {
                $msg = 'Wachtwoorden komen niet overeen.';
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $msg = 'Email is niet geldig.';
            }

            setWith('msg', $msg);
            redirect('auth/register');
    } else {
        redirect('auth/login');
    }