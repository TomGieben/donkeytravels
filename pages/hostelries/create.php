<?php include('../layouts/layout.php'); ?>

<div class="container">
    <?php getWith('msg') ?>
    <form action="/controllers/status/storeController.php" method="post">

        <div class="form-outline mb-4">
            <label class="form-label" for="name">Naam</label>
            <input type="text" id="name" name="name" class="form-control" />
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="adres">Adres</label>
            <input type="text" id="adres" name="adres" class="form-control" />
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" />
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="tel">Telefoon</label>
            <input type="tel" id="tel" name="tel" class="form-control" />
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="cords">Coordinaten</label>
            <input type="text" id="cords" name="cords" class="form-control" placeholder="51.729939,5.8800458"/>
        </div>

        <button type="submit" class="btn btn-success btn-block" style="margin-top: 1em;">
            <i class="fas fa-save"></i> Toevoegen
        </button>
    </form>
</div>