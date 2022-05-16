<?php include('../layouts/layout.php'); ?>

<div class="container">
<form action="/controllers/auth/loginController.php" method="post">
  <div class="form-outline mb-4">
    <input type="email" id="email" class="form-control" />
    <label class="form-label" for="email">Email</label>
  </div>

  <div class="form-outline mb-4">
    <input type="password" id="password" class="form-control" />
    <label class="form-label" for="password">Wachtwoord</label>
  </div>

  <button type="submit" class="btn btn-primary btn-block mb-4">Login</button>

  <div class="text-center mt-4">
    <p>Geen account? <button type="button" onclick="redirect('auth/register')" class="btn btn-link">Register</button></p>
  </div>
</form>
</div>

