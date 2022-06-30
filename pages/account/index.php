<?php 
    include('../layouts/layout.php');
    $stmt = $pdo->prepare("SELECT * FROM medewerkers WHERE Email = ?");
    $stmt->execute([$_SESSION['user']['Email']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h1>
        <b>Account Wijzigen</b>
    </h1>
  <?php getWith('msg') ?>
  <form action="/controllers/account/updateController.php?id=<?php echo $user['ID'] ?>"  method="post">
    <input type="hidden" name="function" value="create"/>

    <div class="form-outline mb-4">
      <label class="form-label" for="email">Email</label>
      <input type="email" id="email" name="email" class="form-control" value="<?php echo $user['Email'] ?>"/>
    </div>

    <div class="form-outline mb-4">
      <label class="form-label" for="password">Wachtwoord</label>
      <input type="password" id="password" name="password" class="form-control"/>
    </div>

    <div class="form-outline mb-4">
    <label class="form-label" for="password-confirm">Wachtwoord bevestigen</label>
      <input type="password" id="password-confirm" name="password-confirm" class="form-control" />
    </div>

    <button type="submit" class="btn btn-primary btn-block" style="margin-top: 1em;">Wijzigen</button>
  </form>
    <a href="../account/destroy.php?id=<?php echo $user['ID'] ?>" class="btn btn-danger" style="margin-top: 2rem;">
        <i class="fas fa-trash"></i> Verwijderen
    </a>
</div>