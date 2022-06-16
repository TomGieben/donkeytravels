<?php 
    include('../layouts/layout.php');
    $stmt = $pdo->prepare("SELECT * FROM Boekingen");
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
                <th scope="col">Roete</th>
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
                                <td>".$status['StartDatum']."</td>
                                <td>".$status['EindDatum']."</td>  
                                    <td>
                                        <div class='btn-group'>
                                            <button class='btn btn-info' onclick='ShowCode(".$status['ID'].")'>
                                            <i class='fas fa-eye'></i> 
                                            </button>
                                            <div id='row-".$status['ID']."' style='display: none;' class='btn btn-warning'>
                                                ".$status['PINcode']."
                                            </div>
                                        </div>
                                    </td>
                                <td>".$status['TochtID']."</td>
                                <td>".$status['StatusID']."</td> 
                            ";
                        echo '
                            <td>
                                <a href="../boekingen/edit.php?id='.$status['ID'].'" class="btn btn-warning">
                                    <i class="fas fa-pencil"></i>
                                </a>
                                <a href="../boekingen/destroy.php?id='.$status['ID'].'" class="btn btn-danger">
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