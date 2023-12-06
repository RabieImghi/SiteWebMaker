<?php
session_start();
if(isset($_GET["changeSessiionLink"])){
    $con = $_GET['changeSessiionLink'];
    $indice = $_GET['id_link'];
    $_SESSION['linkHeader'][$indice]=$con;
}
