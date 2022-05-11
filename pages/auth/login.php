<?php @include('../layouts/layout.php') ?>

<div class="container">
<form action="/controllers/auth/loginController.php" method="post">
  <div class="form-outline mb-4">
    <input type="email" id="email" class="form-control" />
    <label class="form-label" for="email">Email address</label>
  </div>

  <div class="form-outline mb-4">
    <input type="password" id="password" class="form-control" />
    <label class="form-label" for="password">Password</label>
  </div>

  <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

  <div class="text-center mt-4">
    <p>Not a member? <a href="#!">Register</a></p>
  </div>
</form>
</div>

