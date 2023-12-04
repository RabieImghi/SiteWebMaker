<?php
session_start();
if(isset($_GET['test'])){
ob_start();
?>
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom shadow" id='header_updates'>
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <img src="header/logo.png" style='width:42px' class='header_update_img' alt="">
        <span class="fs-4">Simple header</span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="#" class="header_update nav-link active" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="#" class="header_update nav-link">Features</a></li>
        <li class="nav-item"><a href="#" class="header_update nav-link">Pricing</a></li>
        <li class="nav-item"><a href="#" class="header_update nav-link">FAQs</a></li>
        <li class="nav-item"><a href="#" class="header_update nav-link">About</a></li>
      </ul>
    </header>
<?php
$_SESSION["header"]= ob_get_clean();
echo $_SESSION["header"];
}
?>