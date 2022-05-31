<?php include('../layouts/layout.php') ?>

<div class="container">
<?php getWith('msg') ?>
<form action="/controllers/customers/registerController.php" method="post">
  <input type="hidden" name="function" value="create"/>

  <div class="form-outline mb-4">
    <label class="form-label" for="name">Naam</label>
    <input type="text" id="name" name="name" class="form-control" />
  </div>

  <div class="form-outline mb-4">
    <label class="form-label" for="email">Email</label>
    <input type="email" id="email" name="email" class="form-control" />
  </div>

  <div class="form-outline mb-4">
    <label class="form-label" for="password">Wachtwoord</label>  
    <input type="password" id="password" name="password" class="form-control" />
  </div>

  <div class="form-outline mb-4">
    <label class="form-label" for="password-confirm">Wachtwoord bevestigen</label>
    <input type="password" id="password-confirm" name="password-confirm" class="form-control" />
  </div>

  <div class="form-outline mb-4">
    <label class="form-label" for="telephone">Telefoon nummer</label>
    <input type="text" id="telephone" name="telephone" class="form-control" />
  </div>

  <button type="submit" class="btn btn-primary btn-block mb-4">Maak account aan</button>
</form>
</div>