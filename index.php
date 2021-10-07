<?php
    session_start();
    if(!isset($_SESSION['ID']))
    {
        header("Location: login.php");
    }else{
        $USER_DIR = "./users/".$_SESSION['ID'];
        chdir($USER_DIR);
        $notes = glob("*");
        $note_count = count($notes);
        if($note_count == 0)
            $_SESSION['note_count'] = 0;
        else{
            $_SESSION['note_count'] = $note_count;
            header("Location: library.php");
        }
    }9
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./fontawesome/css/all.min.css" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/sidebar.css" rel="stylesheet">
    <link href="./css/index.css" rel="stylesheet">
    <link href="./css/workspace.css" rel="stylesheet">
    <title>HashPad</title>
</head>
<body onload>
    <div class="sidebar">
        <div class="side-header">
            <i class="fas fa-user"></i>
            <?php echo $_SESSION['user']; ?>
            <a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt" ></i></a>
        </div>
        <hr>
       <ul class="container">
            <li class="button active">
            <a href="#">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>
            </li>
            <li class="button">
                <a href="editor.php">
                    <i class="fas fa-pen"></i>
                    <span>Editor</span>
                </a>
            </li>
            <li class="button ">
                <a href="library.php">
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

    <div class="workspace">
    <?php 
        if($_SESSION['note_count'] == 0)
            include 'empty.php';
        else
            include 'note_list.php';
    ?>
    </div>

    <script src="./fontawesome/js/all.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/sidebarbtn.js"></script>
</body>
</html>