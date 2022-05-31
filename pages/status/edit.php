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
        <label class="form-label" for="statuscode">Statuscode</label>
            <input type="number" id="statuscode" name="statuscode" class="form-control" value="<?php echo $status['Statuscode'] ?>"/>
        </div>

        <div class="form-outline mb-4">
        <label class="form-label" for="status">Status</label>
            <input type="text" id="status" name="status" class="form-control" value="<?php echo $status['Status'] ?>"/>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="my-4">
                    <label class="form-label" for="pin">PIN Genereren</label>
                    <input type="checkbox" id="pin" name="pin"
                        <?php 
                            if($status['PIN']) {
                                echo "checked";
                            }
                        ?>
                    />
                </div>
            </div>
            <div class="col-md-6">
                <div class="my-4">
                    <label class="form-label" for="destroyable">Verwijderbaar</label>
                    <input type="checkbox" id="destroyable" name="destroyable" 
                        <?php 
                            if($status['Verwijderbaar']) {
                                echo "checked";
                            }
                        ?>
                    />
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success btn-block" style="margin-top: 1em;">
            <i class="fas fa-save"></i> Opslaan
        </button>
    </form>
</div>