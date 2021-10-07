<?php
    session_start();
    if(!isset($_SESSION['ID']))
    {
        header("Location: login.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="./css/sidebar.css" rel="stylesheet">
    <link href="./css/index.css" rel="stylesheet">
    <link href="./css/workspace.css" rel="stylesheet">
    <title>Notes</title>
</head>
<script src="./js/populate.js"></script>
<body onload="populate()">
    <div class="sidebar">
        <div class="side-header">
            <i class="fas fa-user"></i>
            <?php echo $_SESSION['user']; ?>
            <a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt" ></i></a>
        </div>
        <hr>
       <ul class="container">
            <li class="button ">
            <a href="index.php">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>
            </li>
            <li class="button">
                <a href="editor.php">
                    <i class="fas fa-plus"></i>
                    <span>Editor</span>
                </a>
            </li>
            <li class="button active ">
                <a href="#">
                    <i class="fas fa-archive"></i>
                    <span>Notes</span>
                </a>
            </li>
            <li class="button ">
                <a href="#">
                    <i class="fas fa-users"></i>
                    <span>Share Notes</span>
                </a>
            </li>
        </ul> 
    </div>

    <div class="workspace" >
    <?php
        if(isset($_SESSION['note_count']) && $_SESSION['note_count'] == 0){
            include 'empty.php';
        }else{
            include 'note_list.php';
        }
    ?>
    </div>
    <script src="./js/sidebarbtn.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    <script src="fontawesome\js\all.js"></script>
</body>
</html>