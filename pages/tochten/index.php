<?php 
    include('../layouts/layout.php'); 
    $stmt = $pdo->prepare("SELECT * FROM Tochten");
    $stmt->execute();
?>

<div class="container">
    <h1>
        <b>Tochten</b>
    </h1>
    <?php getWith('msg') ?>
    <a onclick='redirect("tochten/create")' class='btn btn-success' style="margin-bottom: 1em;">
        <i class='fas fa-plus'></i>
    </a>   
    <table class="table"> 
        <thead>
            <tr class="bg-success text-white">
                <th scope="col">Omschrijving</th>
                <th scope="col">Route</th>
                <th scope="col">Aantal Dagen</th>
                <th scope="col">Opties</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if($stmt) {
                    while ($tocht = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        echo '
                            <tr>
                                <td>'.$tocht['Omschrijving'].'</td>
                                <td>'.$tocht['Route'].'</td>
                                <td>'.$tocht['Dagen'].'</td> 
                                <td>
                                    <a href="edit.php?id='.$tocht['ID'].'" class="btn btn-warning">
                                        <i class="fas fa-pencil"></i>
                                    </a>
                                    <a href="destroy.php?id='.$tocht['ID'].'" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        '; 
                    }
                }
            ?>
        </tbody>
    </table>
</div>