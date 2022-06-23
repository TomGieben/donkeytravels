<?php 
    include('../layouts/layout.php'); 
    $stmt = $pdo->prepare("SELECT * FROM Boekingen WHERE ID = ?;");
    $stmt->execute([$_GET['id']]);
    $status = $stmt->fetch(PDO::FETCH_ASSOC)
?>

<div class="container"> 
    <?php getWith('msg') ?>
    <form action="\controllers\boekingen\updateController.php" method="post">

<!-- later moeten we weer de controller action gebruiken -->    

        <div class="form-outline mb-4">
        <label class="form-label" for="Datum">Datum</label>
            <input type="date" id="Datum" name="Datum" class="form-control" value="<?php echo $status['StartDatum'] ?>" />
        </div>

        <div class="form-outline mb-4">
        <label class="form-label" for="status">Tocht</label>
            <select class="form-control" name="Tocht">
                <option selected disabled>Selecteer Tocht</option> 
                <?php while($Tocht = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    echo "<option value='".$Tocht['ID']."'>".$Tocht['Route']."</option>";    
                } 
                ?>
            </select>
        </div>


        <button type="submit" class="btn btn-success btn-block" style="margin-top: 1em;">
            <i class="fas fa-save"></i> Toevoegen
        </button>
    </form>
</div>