<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/preload.php';

    if($_POST['function'] == 'create') {
        $create = true;
        $password = $_POST['password'];
        $email = $_POST['email'];
        $datetime = date('Y-m-d H:i:s');
        $msg = 'Succesvol geregistreerd.';
        $stmt = $pdo->prepare("SELECT Email FROM medewerkers WHERE Email = ?;");
        $stmt->execute([$email]);
        $users = $stmt->fetch(PDO::FETCH_ASSOC);

        if($users) {
            foreach($users as $user) {
                if($user == $email) {
                    $msg = 'Je kunt deze emial niet meer gebruiken.';
                    $create = false;
                }
            }
        }

        if($password !== $confirmPassword) {
            $msg = 'Wachtwoorden komen niet overeen.';
            $create = false;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg = 'Email is niet geldig.';
            $create = false;
        }

        if($create) {
            $sql = "INSERT INTO `medewerkers` (Email, WachtwoordHash, Gewijzigd) VALUES (?,?,?);";
            $pdo->prepare($sql)->execute([
                $email, 
                password_hash($password, PASSWORD_DEFAULT), 
                $datetime
            ]);
        }

        setWith('msg', $msg);
        redirect('auth/register');
    } else {
        redirect('auth/register');
    }