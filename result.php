<?php
$conn = new mysqli("localhost","root","","fille_rouge");
session_start();

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
    <header>
    <?php  
        $result = $conn->query("SELECT * FROM header_table");
        $page= $result->fetch_assoc();
        if(isset($page['pageContent'])) echo $page['pageContent'];
    ?>
    </header> 
    <main>
    <?php  
    if($_GET["page"]==2){
        $result2 = $conn->query("SELECT * FROM hero_table WHERE type_page ='page2.html'");
        $page2= $result2->fetch_assoc();
        if(isset($page2['pageContent'])) echo $page2['pageContent'];
    }
    if($_GET["page"]==1){
        $result2 = $conn->query("SELECT * FROM hero_table  WHERE type_page ='index.html'");
        $page2= $result2->fetch_assoc();
        if(isset($page2['pageContent'])) echo $page2['pageContent'];
    }
    ?>
    </main>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
