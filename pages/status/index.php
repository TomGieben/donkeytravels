<?php 
    include('../layouts/layout.php'); 
    $stmt = $pdo->prepare("SELECT * FROM Statussen");
    $stmt->execute();
    $statussen = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="container">
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
                if($statussen) {
                    foreach($statussen as $status) {
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
                        echo "
                            <td>
                                <a onclick='redirect('status/edit')' class='btn btn-warning'>
                                    <i class='fas fa-pencil'></i>
                                </a>
                                <a onclick='redirect('status/destroy')' class='btn btn-danger'>
                                    <i class='fas fa-trash'></i>
                                </a>
                            </td>
                        "; 
                        echo "</tr>";
                    }
                }
            ?>
        </tbody>
    </table>
</div>