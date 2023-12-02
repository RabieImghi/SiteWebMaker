<?php
$conn = new mysqli("localhost","root","","fille_rouge");
session_start();
$result = $conn->query("SELECT * FROM header_table WHERE user_id=1 AND type_page='page2.html' AND project_id=1");
$row_cnt = $result->fetch_assoc();
if($row_cnt['type_page']!="page2.html"){
  $sql = "INSERT INTO header_table (pageContent,user_id,type_page,project_id) VALUES (?,?,?,?)";
  $stmt = $conn->prepare($sql);
  $i=$p=1;
  $tex="page2.html";
  $content="";
  $stmt->bind_param("sisi",$content,$i,$tex,$p);
  $stmt->execute();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">  
</head>
<body>
    <header class="p-3 shadow " style="z-index: 10000 !important;">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
            <img src="header/logo.png" style='width:42px' alt="">
            </a>
    
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 link-secondary">Overview</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Inventory</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Customers</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Products</a></li>
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
            <div class="text-end" style="display: none;">
                <button type="button" class="btn btn-outline-light link-dark me-2">Login</button>
                <button type="button" class="btn btn-warning">Sign-up</button>
                </div>
            </div>
        </div>
    </header> 
    <main class="row w-100" >
        <div class="col-2 d-flex flex-column flex-shrink-0 p-3 border" style="height: 90vh;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
              <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
              <span class="fs-4">Sidebar</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
             
              <li>
                <a href="index.php" class="nav-link link-dark">
                  <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                  Home
                </a>
              </li> 
              <li>
                <a href="head.php?header=ok" class="nav-link link-dark">
                  <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                  Page 1
                </a>
              </li>
              <li class="nav-item">
                <a href="hero.php?hero=ok" class="nav-link active" aria-current="page">
                  <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                  Page 2 
                </a>
              </li>
             
              <li>
                <a href="result.php" target="_blank" class="nav-link link-dark">
                  <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                  resultat
                </a>
              </li>
              
              <li>
                <button type="button" id='savePage' class="btn btn-primary me-2">save</button>
              </li>
            </ul>
            <hr>
            
        </div>  
        <div class="col border mt-4">
          <header id="header_nav">
            <?php  
            $result = $conn->query("SELECT * FROM header_table WHERE user_id=1 AND type_page='page2.html' AND project_id=1");
            $page= $result->fetch_assoc();
            if(isset($_SESSION["header"])){
                echo  $_SESSION["header"];
            }else if(isset($page['pageContent'])){
              echo $page['pageContent'];
            }
            ?>
          </header>
        </div>  
        <div class="col-3 pt-4">
          <?php
            if(isset($_GET['content'])){
          ?>
          <div class="header" onclick='test(1)'>
            <img src="header/img/header1.png" style='width:100%' alt="">
          </div>
          <div class="header" onclick='test(2)'>
            <img src="header/img/header2.png" style='width:100%' alt="">
          </div>
          <?php
            }
          ?>
        </div>  
    </main>   
    <script>
      function test(i){
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("header_nav").innerHTML = xhttp.responseText;
              console.log(xhttp.responseText);
            }
        };
        let urll= "header/header"+i+".php?test=ok";
        xhttp.open("GET",urll, true);
        xhttp.send();
      }
      document.getElementById("savePage").addEventListener("click", function (){
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            }
        };
        let urll= "seve.php";
        xhttp.open("GET",urll, true);
        xhttp.send()
      });
      
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
