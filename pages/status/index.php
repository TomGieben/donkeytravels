<?php 
    include('../layouts/layout.php'); 
    $stmt = $pdo->prepare("SELECT * FROM Statussen");
    $stmt->execute();
?>

<div class="container">
    <?php getWith('msg') ?>
    <a onclick='redirect("status/create")' class='btn btn-success' style="margin: 1em;">
        <i class='fas fa-plus'></i>
    </a>
    <table class="table">
        <thead>
            <tr class="bg-success text-white">
                <th scope="col">Code</th>
                <th scope="col">Status</th>
                <th scope="col">Pin</th>
                <th scope="col">Verwijderbaar</th>
                <th scope="col">Opties</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if($stmt) {
                    while ($status = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        echo "
                            <tr>
                                <td>".$status['Statuscode']."</td>
                                <td>".$status['Status']."</td>
                                <td>".$status['PIN']."</td> 
                            ";
                        echo "<td>";
                            if($status['Verwijderbaar']) {
                                echo "<i class='fas fa-check text-success'></i>";
                            } else {
                                echo "<i class='fas fa-times text-danger'></i>";
                            }
                        echo "</td>"; 
                        echo '
                            <td>
                                <a href="../status/edit.php?id='.$status['ID'].'" class="btn btn-warning">
                                    <i class="fas fa-pencil"></i>
                                </a>
                                <a href="../status/destroy.php?id='.$status['ID'].'" class="btn btn-danger">
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