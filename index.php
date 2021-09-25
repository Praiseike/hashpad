<?php
    session_start();
    $_SESSION['new_user'] = true;
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
    <link href="./fontawesome/css/all.min.css" rel="stylesheet">
    <link href="./css/sidebars.css" rel="stylesheet">
    <link href="./css/index.css" rel="stylesheet">
    <link href="./css/workspace.css" rel="stylesheet">
    <title>HashPad</title>
</head>
<body>
    <div class="sidebar">
        <div class="side-header">
            <i class="fas fa-user"></i>
            <?php echo $_SESSION['user']; ?>
            <a href="logout.php" class="logout-btn"><i class="fas fa-log" ></i></a>
        </div>
        <hr>
       <ul class="container">
            <li class="button active">
            <a href="index.php">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>
            </li>
            <li class="button active">
                <a href="new.php">
                    <i class="fas fa-plus"></i>
                    <span>New</span>
                </a>
            </li>
            <li class="button ">
                <a href="#">
                    <i class="fas fa-sandwich-menu"></i>
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

    <div class="workspace">
    <?php 
        if(isset($_SESSION['new_user']))
        {
            include 'new_user.php';
        }
        else{
            include 'note_list.php';
        }
    ?>
    </div>

    <script src="fontawesome\js\all.js"></script>
</body>
</html>