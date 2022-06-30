<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/preload.php';

    $create = true;
    $datetime = date('Y-m-d H:i:s');
    $msg = 'Succesvol toegevoegd.';

    if(empty($_POST['Datum'])) {
        $create = false;
        $msg = 'Je hebt geen Datum ingevuld.';
    }

    if(!isset($_POST['Tocht'])) {
        $create = false;
        $msg = 'Je hebt geen Tocht ingevuld.';
    }

    if($create) {
        $start_date = $_POST['Datum'];  
        $date = strtotime($start_date);
        $date = strtotime("+7 day", $date);
        $Einddatum = date('Y-m-d H:i:s', $date);
        $Pincode = randStr();
        $route = $_POST['Tocht'];
        $KlantID = 1;
        $status = 1;

        // var_dump($start_date, $Einddatum, $Pincode, $route, $KlantID, $status);
        // die;

        $sql = "UPDATE boekingen SET StartDatum = ?, EindDatum = ?, PINcode = ?, TochtID = ?, KlantID = ?, StatusID = ? WHERE ID = ?;";
        $pdo->prepare($sql)->execute([$_POST['Datum'], $Einddatum, $Pincode, $route, $KlantID, $status, $_GET['id']]);

        setWith('msg', $msg);
        redirect('boekingen/index');
    } else {
        setWith('msg', $msg);
        redirect('boekingen/edit');
    }