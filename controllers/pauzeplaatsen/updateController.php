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
        $sql = "UPDATE pauzeplaatsen SET BoekingID = ?, RestaurantID = ?, StatusID = ? WHERE ID = ?;";
        $pdo->prepare($sql)->execute([$_POST['boeking'], $_POST['restaurant'], $_POST['status'], $_GET['id']]);

        setWith('msg', $msg);
        redirect('pauzeplaatsen/index');
    } else {
        setWith('msg', $msg);
        redirect('pauzeplaatsen/edit');
    }