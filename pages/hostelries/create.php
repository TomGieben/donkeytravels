<?php include('../layouts/layout.php'); ?>

<div class="container">
    <?php 
        getWith('msg');
    ?>
    <form action="/controllers/hostelries/storeController.php" method="post">

        <div class="form-outline mb-4">
            <label class="form-label" for="name">Naam</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Cafe de ezel"/>
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="adres">Postcode</label>
            <input type="text" id="adres" name="adres" class="form-control" placeholder="1234AB"/>
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="hans.jansen@gmail.com"/>
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="tel">Telefoon</label>
            <input type="tel" id="tel" name="tel" class="form-control" placeholder="06123456789"/>
        </div>

        <button type="submit" class="btn btn-success btn-block" style="margin-top: 1em;">
            <i class="fas fa-save"></i> Toevoegen
        </button>
    </form>
</div>