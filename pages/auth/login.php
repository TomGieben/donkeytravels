<?php include('../layouts/layout.php'); ?>

<div class="container">
<form action="/controllers/auth/loginController.php" method="post">
  <input type="hidden" name="function" value="create"/>

  <div class="form-outline mb-4">
  <label class="form-label" for="email">Email</label>
    <input type="email" id="email" name="email" class="form-control" />
  </div>

  <div class="form-outline mb-4">
  <label class="form-label" for="password">Wachtwoord</label>
    <input type="password" id="password" name="password" class="form-control" />
  </div>

  <button type="submit" class="btn btn-primary btn-block" style="margin-top: 1em;">Login</button>

  <div class="text-center mt-4">
    <p>Geen account? <button type="button" onclick="redirect('auth/register')" class="btn btn-link">Register</button></p>
  </div>
</form>
</div>

