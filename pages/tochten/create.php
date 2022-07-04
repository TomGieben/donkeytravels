<?php include('../layouts/layout.php'); ?>

<div class="container">
    <?php 
        getWith('msg');
    ?>
    <form action="/controllers/tochten/storeController.php" method="post">

        <div class="form-outline mb-4">
            <label class="form-label" for="omschrijving">Omschrijving</label>
            <input type="text" id="omschrijving" name="omschrijving" class="form-control" placeholder="Omschrijf de route"/>
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="route">Route</label>
            <input type="text" id="route" name="route" class="form-control" placeholder="Route"/>
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="dagen">Aantal Dagen</label>
            <input type="text" id="dagen" name="dagen" class="form-control" placeholder="7"/>
        </div>

        <button type="submit" class="btn btn-success btn-block" style="margin-top: 1em;">
            <i class="fas fa-save"></i> Toevoegen
        </button>
    </form>
</div>