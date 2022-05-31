<?php include('../layouts/layout.php'); ?>

<div class="container">
    <?php getWith('msg') ?>
    <form action="/controllers/status/storeController.php" method="post">

        <div class="form-outline mb-4">
        <label class="form-label" for="statuscode">Statuscode</label>
            <input type="number" id="statuscode" name="statuscode" class="form-control" />
        </div>

        <div class="form-outline mb-4">
        <label class="form-label" for="status">Status</label>
            <input type="text" id="status" name="status" class="form-control" />
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="my-4">
                    <label class="form-label" for="pin">PIN Genereren</label>
                    <input type="checkbox" id="pin" name="pin"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="my-4">
                    <label class="form-label" for="destroyable">Verwijderbaar</label>
                    <input type="checkbox" id="destroyable" name="destroyable" />
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success btn-block" style="margin-top: 1em;">
            <i class="fas fa-save"></i> Toevoegen
        </button>
    </form>
</div>