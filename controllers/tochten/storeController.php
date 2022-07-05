<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/preload.php';

    $create = true;
    $msg = 'Succesvol toegevoegd.';
    
    if(empty($_POST['dagen'])) {
        $create = false;
        $msg = 'Je hebt geen cijfer bij aantal dagen ingevuld.';
    }
    
    if(empty($_POST['route'])) {
        $create = false;
        $msg = 'Je hebt geen route ingevuld.';
    }

    if(empty($_POST['omschrijving'])) {
        $create = false;
        $msg = 'Je hebt geen omschrijving ingevuld.';
    }

    if($create) {
        $sql = "INSERT INTO tochten (Omschrijving, Route, Dagen)
        VALUES (?, ?, ?);";
        $pdo->prepare($sql)->execute([$_POST['omschrijving'], $_POST['route'], $_POST['dagen']]);

        setWith('msg', $msg);
        redirect('tochten/index');
    } else {
        setWith('msg', $msg);
        redirect('tochten/create');
    }