<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/preload.php';

    $create = true;
    $datetime = date('Y-m-d H:i:s');
    $msg = 'Succesvol bewerkt.';

    if(isset($_POST['statuscode'])) {
        $stmt = $pdo->prepare("SELECT * FROM statussen WHERE Statuscode = ? AND NOT id = ?;");
        $stmt->execute([
            $_POST['statuscode'],
            $_GET['id'],
        ]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        $create = false;
        $msg = 'Je hebt niet alles ingevuld.';
    }

    if($result) {
        $create = false;
        $msg = 'Er is al een status met deze code.';
    }

    if(!isset($_POST['status'])) {
        $create = false;
        $msg = 'Je hebt geen status ingevuld.';
    }

    if(isset($_POST['pin'])) {
        $pin = randStr();
    } 

    if(isset($_POST['destroyable'])) {
        $delete = 1;
    } else {
        $delete = 0;
    }

    if($create) {
        $sql = "UPDATE `statussen` SET StatusCode = ?, Status = ?, Verwijderbaar = ?, PIN = ? WHERE ID = ?;";
        $pdo->prepare($sql)->execute([
            $_POST['statuscode'],
            $_POST['status'],
            $delete ?? null,
            $pin ?? null,
            $_GET['id'],
        ]);

        setWith('msg', $msg);
        redirect('status/index');
    } else {
        setWith('msg', $msg);
        redirect('status/create');
    }