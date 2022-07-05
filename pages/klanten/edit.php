<?php 
    include('../layouts/layout.php'); 
    $stmt = $pdo->prepare("SELECT * FROM Statussen WHERE ID = ?;");
    $stmt->execute([$_GET['id']]);
    $status = $stmt->fetch(PDO::FETCH_ASSOC)
?>

<div class="container">
    <?php getWith('msg') ?>
    <form action="/controllers/status/updateController.php?id=<?php echo $_GET['id']; ?>" method="post">

        <div class="form-outline mb-4">
        <label class="form-label" for="naam">Naam</label>
            <input type="number" id="naam" name="naam" class="form-control" value="<?php echo $status['Naam'] ?>"/>
        </div>

        <div class="form-outline mb-4">
        <label class="form-label" for="email">Email</label>
            <input type="text" id="email" name="email" class="form-control" value="<?php echo $status['Email'] ?>"/>
        </div>

        <div class="form-outline mb-4">
        <label class="form-label" for="telefoon">Telefoon</label>
            <input type="text" id="telefoon" name="telefoon" class="form-control" value="<?php echo $status['Telefoon'] ?>"/>
        </div>

        <button type="submit" class="btn btn-success btn-block" style="margin-top: 1em;">
            <i class="fas fa-save"></i> Opslaan
        </button>
    </form>
</div>