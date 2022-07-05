<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/preload.php';

    $create = true;
    $msg = 'Succesvol toegevoegd.';
    
    if(empty($_POST['status'])) {
        $create = false;
        $msg = 'Je hebt geen statusID ingevuld.';
    }
    
    if(empty($_POST['restaurant'])) {
        $create = false;
        $msg = 'Je hebt geen restaurantID ingevuld.';
    }

    if(empty($_POST['boeking'])) {
        $create = false;
        $msg = 'Je hebt geen boekingID ingevuld.';
    }

    if($create) {
        $sql = "INSERT INTO pauzeplaatsen (BoekingID, RestaurantID, StatusID)
        VALUES (?, ?, ?);";
        $pdo->prepare($sql)->execute([$_POST['boeking'], $_POST['restaurant'], $_POST['status']]);

        setWith('msg', $msg);
        redirect('pauzeplaatsen/index');
    } else {
        setWith('msg', $msg);
        redirect('pauzeplaatsen/create');
    }