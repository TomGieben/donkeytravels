<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/preload.php';

    if($_POST['function'] == 'create') {
            $password = $_POST['password'];
            $confirmPassword = $_POST['password-confirm'];
            $email = $_POST['email'];
            $datetime = date('Y-m-d H:i:s');
            $msg = 'Succesvol geregistreerd.';
            $stmt = $pdo->prepare("SELECT Email FROM medewerkers WHERE Email = ?;");
            $stmt->execute([$email]);
            $users = $stmt->fetch(PDO::FETCH_ASSOC);

            foreach($users as $user) {
                if($user == $email) {
                    $msg = 'Je kunt deze emial niet meer gebruiken.';
                } else {
                    if($password !== $confirmPassword) {
                        $msg = 'Wachtwoorden komen niet overeen.';
                    }
        
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $msg = 'Email is niet geldig.';
                    }
        
                    $sql = "INSERT INTO `medewerkers` (Email, WachtwoordHash, Gewijzigd) VALUES (?,?,?);";
                    $pdo->prepare($sql)->execute([
                        $email, 
                        password_hash($password, PASSWORD_DEFAULT), 
                        $datetime
                    ]);
                }
            }

            setWith('msg', $msg);
            redirect('auth/register');
    } else {
        redirect('auth/register');
    }