<?php  
  /*$path = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
  $path .= $_SERVER["SERVER_NAME"]. dirname($_SERVER["PHP_SELF"]);     */ 

  $realpath    = str_replace('\\', '/', dirname(__FILE__));
  $baseURL = substr_replace(str_replace($_SERVER['DOCUMENT_ROOT'], '', $realpath), "", -4);
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
      <form class="d-flex">
        <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>