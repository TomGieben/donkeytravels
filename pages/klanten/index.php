<?php 
    include('../layouts/layout.php'); 
    $stmt = $pdo->prepare("SELECT * FROM Klanten");
    $stmt->execute();
?>

<div class="container">
    <h1>
        <b>Klanten</b>
    </h1>
    <?php getWith('msg') ?>
    <a onclick='redirect("klanten/create.php")' class='btn btn-success' style="margin-bottom: 1em;">
        <i class='fas fa-plus'></i>
    </a>
    <table class="table">
        <thead>
            <tr class="bg-success text-white">
                <th scope="col">Naam</th>
                <th scope="col">Email</th>
                <th scope="col">Telefoon</th>
                <th scope="col">Verwijderbaar</th>
                <th scope="col">Opties</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if($stmt) {
                    while ($klant = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        echo "
                            <tr>
                                <td>".$klant['Naam']."</td>
                                <td>".$klant['Email']."</td>
                                <td>".$klant['Telefoon']."</td> 
                            "; 
                        echo '
                            <td>
                                <a href="edit.php?id='.$klant['ID'].'" class="btn btn-warning">
                                    <i class="fas fa-pencil"></i>
                                </a>
                                <a href="destroy.php?id='.$klant['ID'].'" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        '; 
                        echo "</tr>";
                    }
                }
            ?>
        </tbody>
    </table>
</div>