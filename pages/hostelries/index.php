<?php 
    include('../layouts/layout.php'); 
    $stmt = $pdo->prepare("SELECT * FROM Herbergen");
    $stmt->execute();
?>

<div class="container">
    <?php getWith('msg') ?>
    <a onclick='redirect("hostelries/create")' class='btn btn-success' style="margin: 1em;">
        <i class='fas fa-plus'></i>
    </a>
    <table class="table">
        <thead>
            <tr class="bg-success text-white">
                <th scope="col">Naam</th>
                <th scope="col">Adres</th>
                <th scope="col">Email</th>
                <th scope="col">Telefoon</th>
                <th scope="col">Coordinaten</th>
                <th scope="col">Opties</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if($stmt) {
                    while ($hostelry = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        echo '
                            <tr>
                                <td>'.$hostelry['Naam'].'</td>
                                <td>'.$hostelry['Adres'].'</td>
                                <td>
                                    <a href="mailto:'.$hostelry['Email'].'" class="btn btn-link">
                                        '.$hostelry['Email'].'
                                    </a>
                                </td> 
                                <td>'.$hostelry['Telefoon'].'</td> 
                                <td>'.$hostelry['Coordinaten'].'</td> 
                                <td>
                                    <a href="edit.php?id='.$hostelry['ID'].'" class="btn btn-warning">
                                        <i class="fas fa-pencil"></i>
                                    </a>
                                    <a href="destroy.php?id='.$hostelry['ID'].'" class="btn btn-danger">
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