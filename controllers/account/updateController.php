<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/preload.php';

    if($_POST['function'] == 'create') {
        $create = true;
        $password = $_POST['password'];
        $confirmPassword = $_POST['password-confirm'];
        $email = $_POST['email'];
        $datetime = date('Y-m-d H:i:s');
        $msg = 'Succesvol gewijzigd.';
        $stmt = $pdo->prepare("SELECT * FROM medewerkers WHERE ID = ?;");
        $stmt->execute([$_GET['id']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($password !== $confirmPassword) {
            $msg = 'Wachtwoorden komen niet overeen.';
            $create = false;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg = 'Email is niet geldig.';
            $create = false;
        }

        if($create) {
            $sql = "UPDATE `medewerkers` SET Email = ?, WachtwoordHash = ?, Gewijzigd = ? WHERE ID = ?";
            $pdo->prepare($sql)->execute([
                $email, 
                password_hash($password, PASSWORD_ARGON2ID), 
                $datetime,
                $user['ID']
            ]);
        }

        setWith('msg', $msg);
        redirect('account/index');
    } else {
        redirect('account/index');
    }