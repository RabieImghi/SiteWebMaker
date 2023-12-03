<?php
$conn = new mysqli("localhost","root","","fille_rouge");
session_start();
// $result = $conn->query("SELECT * FROM header_table WHERE user_id=1 AND type_page='index.html' AND project_id=1");
// $row_cnt = $result->fetch_assoc();
$page = $_GET['page'];
$sql2 = "UPDATE header_table SET pageContent=?";
$stmt = $conn->prepare($sql2);
$stmt->bind_param("s",$_SESSION["header"]);
$stmt->execute();

if($page == "index.html"){
$sql2 = "UPDATE hero_table SET pageContent=? WHERE type_page=?";
$stmt = $conn->prepare($sql2);
$stmt->bind_param("ss",$_SESSION["hero"],$page);
$stmt->execute();
}
if($page == "page2.html"){
    $sql2 = "UPDATE hero_table SET pageContent=? WHERE type_page=?";
    $stmt = $conn->prepare($sql2);
    $stmt->bind_param("ss",$_SESSION["about"],$page);
    $stmt->execute();
}