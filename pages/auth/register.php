<?php include('../layouts/layout.php') ?>

<div class="container">
<form action="/controllers/auth/registerController.php" method="post">
  <div class="form-outline mb-4">
    <input type="email" id="email" class="form-control" />
    <label class="form-label" for="email">Email</label>
  </div>

  <div class="form-outline mb-4">
    <input type="password" id="password" class="form-control" />
    <label class="form-label" for="password">Wachtwoord</label>
  </div>

  <div class="form-outline mb-4">
    <input type="password" id="password-confirm" class="form-control" />
    <label class="form-label" for="password-confirm">Wachtwoord bevestigen</label>
  </div>

  <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>
</form>
</div>