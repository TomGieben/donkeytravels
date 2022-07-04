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
        $sql = "UPDATE tochten SET Omschrijving = ?, Route = ?, Dagen = ? WHERE ID = ?;";
        $pdo->prepare($sql)->execute([$_POST['omschrijving'], $_POST['route'], $_POST['dagen'], $_GET['id']]);

        setWith('msg', $msg);
        redirect('tochten/index');
    } else {
        setWith('msg', $msg);
        redirect('tochten/edit');
    }