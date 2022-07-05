<?php include('../layouts/layout.php'); 
    $stmt = $pdo->prepare("SELECT * FROM Tochten WHERE ID = ?;");
    $stmt->execute([$_GET['id']]);
    $tochten = $stmt->fetch(PDO::FETCH_ASSOC)
?>

<div class="container">
    <?php 
        getWith('msg');
    ?>
    <form action="/controllers/tochten/updateController.php?id=<?php echo $_GET['id']; ?>" method="post">

        <div class="form-outline mb-4">
            <label class="form-label" for="omschrijving">Omschrijving</label>
            <input type="text" id="omschrijving" name="omschrijving" class="form-control" value="<?php echo $tochten['Omschrijving'] ?>"/>
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="route">Route</label>
            <input type="text" id="route" name="route" class="form-control" value="<?php echo $tochten['Route'] ?>"/>
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="dagen">Aantal Dagen</label>
            <input type="text" id="dagen" name="dagen" class="form-control" value="<?php echo $tochten['Dagen'] ?>"/>
        </div>

        <button type="submit" class="btn btn-success btn-block" style="margin-top: 1em;">
            <i class="fas fa-save"></i> Opslaan
        </button>
    </form>
</div>