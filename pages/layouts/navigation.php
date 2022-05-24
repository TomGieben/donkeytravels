<nav class="navbar navbar-light">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" onclick="redirect('welcome')">
        <img src="/assets/images/icon.png" alt="Logo" class="icon">
      </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a onclick="redirect('welcome')" class="btn">Home</a></li>
        <li><a onclick="redirect('status/index')" class="btn">Statussen</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
        if(isset($_SESSION['auth'])) {
          if(!$_SESSION['auth']) {
            echo '
              <li>
                <a onclick="redirect("auth/login")" class="btn">
                  <i class="fas fa-user"></i>
                  Login
                </a>
              </li>
            ';
          } else {
            echo '
              <li>
                <a onclick="redirect("auth/logout")" class="btn">
                  <i class="fas fa-user"></i>
                  Logout
                </a>
              </li>
            ';
          } 
        } else {
          echo '
            <li>
              <a onclick="redirect("auth/login")" class="btn">
                <i class="fas fa-user"></i>
                Login
              </a>
            </li>
          ';
        }
        ?>
      </ul>
    </div>
  </div>
</nav>
