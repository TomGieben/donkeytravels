<?php 
    include('../layouts/layout.php'); 
    $stmt = $pdo->prepare("SELECT * FROM Herbergen");
    $stmt->execute();
?>