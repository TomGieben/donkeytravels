<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/preload.php';

    $create = true;
    $datetime = date('Y-m-d H:i:s');
    $msg = 'Succesvol toegevoegd.';

    if(!isset($_POST['StartDatum'])) {
        $create = false;
        $msg = 'Je hebt geen Datum ingevuld.';
    }
    else
    {
        $create = true;
    }

    if(!isset($_POST['Tocht'])) {
        $create = false;
        $msg = 'Je hebt geen Tocht ingevuld.';
    }
    else
    {
        $create = true;
    }

    if($create) {

        $Startdatum = $_POST['Datum'];
        $Einddatum = $Startdatum;
        $Pincode = 0000;
        $route = $_POST['Tocht'];
        $KlantID = 1;
        $status = 1;

        $sql = "INSERT INTO boekingen (StartDatum, EindDatum, PINcode, TochtID, KlantID, StatusID)
        VALUES (?, ?, ?, ?, ?, ?);";
        $pdo->prepare($sql)->execute([$Startdatum, $Einddatum, $Pincode, $route, $KlantID, $status]);

        setWith('msg', $msg);
        redirect('boekingen/index');
    } else {
        setWith('msg', $msg);
        redirect('boekingen/create');
    }