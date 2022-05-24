<?php include('../layouts/layout.php'); ?>

<div class="container">
    <form action="/controllers/status/storeController.php" method="post">
        <input type="hidden" name="function" value="create"/>

        <div class="form-outline mb-4">
        <label class="form-label" for="statuscode">Statuscode</label>
            <input type="text" id="statuscode" name="statuscode" class="form-control" />
        </div>

        <div class="form-outline mb-4">
        <label class="form-label" for="status">Status</label>
            <input type="text" id="status" name="status" class="form-control" />
        </div>

        <div class="form-outline mb-4">
        <label class="form-label" for="pin">PIN</label>
            <input type="text" id="pin" name="pin" class="form-control" />
        </div>

        <div class="my-4">
        <label class="form-label" for="destroyable">Verwijderbaar</label>
            <input type="checkbox" id="destroyable" name="destroyable" />
        </div>

        <button type="submit" class="btn btn-success btn-block" style="margin-top: 1em;">
            <i class="fas fa-save"></i> Toevoegen
        </button>
    </form>
</div>