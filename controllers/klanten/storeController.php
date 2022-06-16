<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/preload.php';

    $create = true;
    $datetime = date('Y-m-d H:i:s');
    $msg = 'Succesvol toegevoegd.';

    if(isset($_POST['Email'])) {
        $stmt = $pdo->prepare("SELECT * FROM klanten WHERE Naam = ?;");
        $stmt->execute([$_POST['naam']]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        $create = false;
        $msg = 'Je hebt niet alles ingevuld.';
    }

    if($result) {
        $create = false;
        $msg = 'Er is al een status met deze code.';
    }

    if(!isset($_POST['naam'])) {
        $create = false;
        $msg = 'Je hebt geen naam ingevuld.';
    }

    if($create) {
        $sql = "INSERT INTO `klanten` (Naam, Email, Telefoon) VALUES (?,?,?);";
        $pdo->prepare($sql)->execute([
            $_POST['naam'],
            $_POST['email'],
            $_POST['telefoon'],
        ]);

        setWith('msg', $msg);
        redirect('klanten/index');
    } else {
        setWith('msg', $msg);
        redirect('klanten/create');
    }