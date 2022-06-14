<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/preload.php';

    $create = true;
    $datetime = date('Y-m-d H:i:s');
    $msg = 'Succesvol bewerkt.';

    if(isset($_POST['name'])) {
        $stmt = $pdo->prepare("SELECT * FROM herbergen WHERE Naam = ? AND NOT id = ?;");
        $stmt->execute([
            $_POST['name'],
            $_GET['id'],
        ]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        $create = false;
        $msg = 'Je hebt niet alles ingevuld.';
    }

    if($result) {
        $create = false;
        $msg = 'Er is al een herberg met deze naam.';
    }

    if(isset($_POST['adres'])) {
        if (!preg_match('/^[1-9][0-9]{3} ?(?!sa|sd|ss)[a-z]{2}$/i', $_POST['adres'])) {
            $create = false;
            $msg = 'Je adres is niet geldig.';
        } else {
            $address = 'BTM 2nd Stage, Bengaluru, Karnataka 560076'; 
            $apiKey = 'AIzaSyD0XOxlv7VQBkvosWGIiI765GgeqAgKa-I';
            $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false&key='.$apiKey);
            $geo = json_decode($geo, true); 

            if (isset($geo['status']) && ($geo['status'] == 'OK')) {
                $latitude = $geo['results'][0]['geometry']['location']['lat'];
                $longitude = $geo['results'][0]['geometry']['location']['lng'];
            }
        }
    } else {
        $create = false;
        $msg = 'Je hebt geen adres ingevuld.';
    }

    if(isset($_POST['email'])) {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $create = false;
            $msg = 'Je email is niet geldig.';
        }
    } else {
        $create = false;
        $msg = 'Je hebt geen email ingevuld.';
    }

    if(isset($_POST['tel'])) {
        if (!preg_match('/^[0-9]{10}+$/', $_POST['tel'])) {
            $create = false;
            $msg = 'Je tel-nummer is niet geldig.';
        }
    } else {
        $create = false;
        $msg = 'Je hebt geen tel-nummer ingevuld.';
    }

    if($create) {
        $sql = "UPDATE `herbergen` SET Naam = ?, Adres = ?, Email = ?, Telefoon = ?, Coordinaten = ?, Gewijzigd = ? WHERE ID = ?;";
        $pdo->prepare($sql)->execute([
            $_POST['name'],
            $_POST['adres'],
            $_POST['email'],
            $_POST['tel'],
            $latitude .' '.$longitude ?? null,
            date('Y-m-d H:i:s'),
            $_GET['id'],
        ]);

        setWith('msg', $msg);
        redirect('hostelries/index');
    } else {
        setWith('msg', $msg);
        redirect('hostelries/create');
    }