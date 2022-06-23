<?php 
    include('../layouts/layout.php');
    $stmt = $pdo->prepare("SELECT boekingen.ID as 'boekingen_id', boekingen.PINcode as 'boekingen_pincode', boekingen.StartDatum as 'boekingen_startdatum', boekingen.EindDatum as 'boekingen_einddatum', tochten.Route as 'tochten_route', statussen.Status as 'statussen_status' FROM Boekingen INNER JOIN Tochten ON Boekingen.TochtID = Tochten.ID LEFT JOIN Statussen ON Boekingen.StatusID = Statussen.ID");
    $stmt->execute();
?>

<div class="container">
    <?php getWith('msg') ?>
    <a onclick='redirect("boekingen/create")' class='btn btn-success' style="margin: 1em;">
        <i class='fas fa-plus'></i>
    </a>
    <table class="table">
        <thead>
            <tr class="bg-success text-white">
                <th scope="col">StartDatum</th>
                <th scope="col">EindDatum</th>
                <th scope="col">PIN Code</th>
                <th scope="col">Route</th>
                <th scope="col">Status</th>
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
                                <td>".date('d-m-Y', strtotime($status['boekingen_startdatum']))."</td>
                                <td>".date('d-m-Y', strtotime($status['boekingen_einddatum']))."</td>  
                                    <td>
                                        <div class='btn-group'>
                                            <button class='btn btn-info' onclick='ShowCode(".$status['boekingen_id'].")'>
                                            <i class='fas fa-eye'></i> 
                                            </button>
                                            <div id='row-".$status['boekingen_id']."' style='display: none;' class='btn btn-warning'>
                                                ".$status['boekingen_pincode']."
                                            </div>
                                        </div>
                                    </td>
                                <td>".$status['tochten_route']."</td>
                                <td>".$status['statussen_status']."</td> 
                            ";
                        echo '
                            <td>
                                <a href="../boekingen/edit.php?id='.$status['boekingen_id'].'" class="btn btn-warning">
                                    <i class="fas fa-pencil"></i>
                                </a>
                                <a href="../boekingen/destroy.php?id='.$status['boekingen_id'].'" class="btn btn-danger">
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
<script>
    function ShowCode(ID)
    {
        
        var element = document.getElementById('row-'+ID+'');

        if(element.style.display == 'none')
        {
            element.style.display = "block";
        }
        else if(element.style.display == 'block')
        {
            element.style.display = "none";
        }
    }    
</script>