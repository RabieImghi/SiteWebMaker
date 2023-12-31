<?php
session_start();
if(isset($_GET['test'])){
ob_start();
if(empty($_SESSION['linkHeader'])){
  $_SESSION['linkHeader'][]="Home";
  $_SESSION['linkHeader'][]="Features";
  $_SESSION['linkHeader'][]="Pricing";
  $_SESSION['linkHeader'][]="FAQs";
  $_SESSION['linkHeader'][]="About";
}
?>
<header class="p-3 shadow"  id='header_updates'>
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
        <img src="header/logo.png" style='width:42px' alt="">
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <?php
          for($i=0;$i<count($_SESSION['linkHeader']);$i++){
        ?>
          <li><a href="#" class="header_update nav-link px-2 link-dark" id="input_link_change<?=$i?>"><?=$_SESSION['linkHeader'][$i]?></a></li>
          <?php
          }
        ?>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
<?php
$_SESSION["header"]= ob_get_clean();
echo $_SESSION["header"];
}
?>