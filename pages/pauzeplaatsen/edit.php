<?php include('../layouts/layout.php'); 
    $stmt = $pdo->prepare("SELECT * FROM pauzeplaatsen WHERE ID = ?;");
    $stmt->execute([$_GET['id']]);
    $pauzeplaatsen = $stmt->fetch(PDO::FETCH_ASSOC)
?>

<div class="container">
    <?php 
        getWith('msg');
    ?>
    <form action="/controllers/pauzeplaatsen/updateController.php?id=<?php echo $_GET['id']; ?>" method="post">

        <div class="form-outline mb-4">
            <label class="form-label" for="boeking">BoekingID</label>
            <input type="text" id="boeking" name="boeking" class="form-control" value="<?php echo $pauzeplaatsen['BoekingID'] ?>"/>
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="restaurant">RestaurantID</label>
            <input type="text" id="restaurant" name="restaurant" class="form-control" value="<?php echo $pauzeplaatsen['RestaurantID'] ?>"/>
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="status">StatusID</label>
            <input type="text" id="status" name="status" class="form-control" value="<?php echo $pauzeplaatsen['StatusID'] ?>"/>
        </div>

        <button type="submit" class="btn btn-success btn-block" style="margin-top: 1em;">
            <i class="fas fa-save"></i> Toevoegen
        </button>
    </form>
</div>