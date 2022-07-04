<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/preload.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $stmt = $pdo->prepare("DELETE FROM tochten WHERE id = ?;");
        $stmt->execute([$id]);

        setWith('msg','Succesvol verwijderd');
        redirect('tochten/index');
    }