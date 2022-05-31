<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/preload.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $stmt = $pdo->prepare("DELETE FROM Statussen WHERE id = ? AND Verwijderbaar = true;");
        $stmt->execute([$id]);

        setWith('msg','Succesvol verwijderd');
        redirect('status/index');
    }