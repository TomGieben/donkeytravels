<?php include('../layouts/layout.php'); ?>

<div class="container">
    <?php getWith('msg') ?>
    <form action="/controllers/klanten/storeController.php" method="post">

        <div class="form-outline mb-4" style="margin-bottom: 15px;">
        <label class="form-label" for="naam">Naam</label>
            <input type="text" id="naam" name="naam" class="form-control" />
        </div>

        <div class="form-outline mb-4" style="margin-bottom: 15px;">
        <label class="form-label" for="email">Email</label>
            <input type="text" id="email" name="email" class="form-control" />
        </div>

        <div class="form-outline mb-4" style="margin-bottom: 15px;">
        <label class="form-label" for="telefoon">Telefoon</label>
            <input type="text" id="telefoon" name="telefoon" class="form-control" />
        </div>

        <button type="submit" class="btn btn-success btn-block" style="margin-top: 1em;">
            <i class="fas fa-save"></i> Toevoegen
        </button>
    </form>
</div>