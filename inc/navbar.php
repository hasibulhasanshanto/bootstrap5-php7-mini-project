<?php  
  /*$path = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
  $path .= $_SERVER["SERVER_NAME"]. dirname($_SERVER["PHP_SELF"]);     */ 

  $realpath    = str_replace('\\', '/', dirname(__FILE__));
  $baseURL = substr_replace(str_replace($_SERVER['DOCUMENT_ROOT'], '', $realpath), "", -4);

  $auth = 0; 
  // session_start(); 
  if($_SESSION){
      if($_SESSION['auth']){
        $auth = $_SESSION['auth'];          
      } 
      else{
        $auth = 0;
      }
  }

?>

<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">Student Management System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= $baseURL; ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= $baseURL.'/pages/show.php'; ?>">All Students</a>
        </li> 
      </ul>
      <?php if($auth == 1): ?>
        <form class="d-flex">  
          <a href="<?= $baseURL.'/pages/auth/logout.php'; ?>" class="btn btn-danger">Logout</a>
        </form>
      <?php else: ?>
        <form class="d-flex"> 
          <a href="<?= $baseURL.'/pages/auth/register.php'; ?>" class="btn btn-warning mr-2">Register</a>
          <a href="<?= $baseURL.'/pages/auth/login.php'; ?>" class="btn btn-danger">Login</a>
        </form>
      <?php endif; ?>
      
    </div>
  </div>
</nav>