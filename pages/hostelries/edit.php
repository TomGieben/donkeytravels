<?php include('../layouts/layout.php'); ?>

<div class="container">
    <?php 
        getWith('msg');
        $stmt = $pdo->prepare("SELECT * FROM herbergen WHERE ID = ?;");
        $stmt->execute([$_GET['id']]);
        $hostelry = $stmt->fetch(PDO::FETCH_ASSOC)
    ?>
    <form action="/controllers/hostelries/updateController.php?id=<?php echo $_GET['id']; ?>" method="post">

        <div class="form-outline mb-4">
            <label class="form-label" for="name">Naam</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Cafe de ezel" value="<?php echo $hostelry['Naam'] ?>"/>
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="adres">Postcode</label>
            <input type="text" id="adres" name="adres" class="form-control" placeholder="1234AB" value="<?php echo $hostelry['Adres'] ?>"/>
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="hans.jansen@gmail.com" value="<?php echo $hostelry['Email'] ?>"/>
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="tel">Telefoon</label>
            <input type="tel" id="tel" name="tel" class="form-control" placeholder="06123456789" value="<?php echo $hostelry['Telefoon'] ?>"/>
        </div>

        <button type="submit" class="btn btn-success btn-block" style="margin-top: 1em;">
            <i class="fas fa-save"></i> Toevoegen
        </button>
    </form>
</div>