<?php
session_start();
ob_start();
if(isset($_GET['test'])){
  if(empty($_SESSION['linkHeader'])){
    $_SESSION['linkHeader'][]="Home";
    $_SESSION['linkHeader'][]="Features";
    $_SESSION['linkHeader'][]="Pricing";
    $_SESSION['linkHeader'][]="FAQs";
    $_SESSION['linkHeader'][]="About";
  }
?>
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom shadow" id='header_updates'>
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <img src="header/logo.png" style='width:42px' class='header_update_img' alt="">
        <span class="fs-4">Simple header</span>
      </a>

      <ul class="nav nav-pills">
        <?php
          for($i=0;$i<count($_SESSION['linkHeader']);$i++){
        ?>
        <li class="nav-item"><a href="#" class="header_update nav-link" aria-current="page" id="input_link_change<?=$i?>" ><?=$_SESSION['linkHeader'][$i]?></a></li>
        <?php
          }
        ?>
      </ul>
    </header>
<?php
$_SESSION["header"] = ob_get_clean();
echo $_SESSION["header"];
}
?>