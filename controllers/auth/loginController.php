<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/preload.php';

    if($_POST['function'] == 'create') {
        $create = true;
        $password = $_POST['password'];
        $email = $_POST['email'];
        $datetime = date('Y-m-d H:i:s');
        $msg = 'Succesvol geregistreerd.';
        $stmt = $pdo->prepare("SELECT Email, WachtwoordHash FROM medewerkers WHERE Email = ?;");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user) {
            if(password_verify($password, $user["WachtwoordHash"])) {
                $_SESSION['auth'] = true;
                $_SESSION['user'] = $user;

                setWith('msg', $msg);
                redirect('welcome');
            } else {
                $msg = 'Gegevens komen niet overeen probeer het opnieuw.';

                setWith('msg', $msg);
                redirect('auth/login');
            }
        } else {
            $msg = 'Je bent niet geregistreerd.';

            setWith('msg', $msg);
            redirect('auth/register');
        }

    } else {
        redirect('auth/login');
    }