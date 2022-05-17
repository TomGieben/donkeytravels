<?php include('../layouts/layout.php') ?>

<div class="container">
<form action="/controllers/customers/registerController.php" method="post">
  <input type="hidden" name="function" value="create"/>

  <div class="form-outline mb-4">
    <input type="email" id="email" name="email" class="form-control" />
    <label class="form-label" for="email">Naam</label>
  </div>

  <div class="form-outline mb-4">
    <input type="email" id="email" name="email" class="form-control" />
    <label class="form-label" for="email">Email</label>
  </div>

  <div class="form-outline mb-4">
    <input type="password" id="password" name="password" class="form-control" />
    <label class="form-label" for="password">Wachtwoord</label>
  </div>

  <div class="form-outline mb-4">
    <input type="password" id="password-confirm" name="password-confirm" class="form-control" />
    <label class="form-label" for="password-confirm">Wachtwoord bevestigen</label>
  </div>

  <div class="form-outline mb-4">
    <input type="telephone" id="telephone" name="telephone" class="form-control" />
    <label class="form-label" for="telephone">Telefoon nummer</label>
  </div>

  <button type="submit" class="btn btn-primary btn-block mb-4">Maak account aan</button>
</form>
</div>