<?php
    session_start();
    $_SESSION['new_user'] = true;
    if(!isset($_SESSION['ID']))
    {
        header("Location: login.php");
    }

    if(isset($_POST['data']) || isset($_POST['filename']))
    {
        $filename = $_POST['filename'];
        if($filename == "")
        {
            $filename = "Untitled-1";
        }
        $data = $_POST['data'];
        $user_dir = "./users/".$_SESSION['ID'];
        chdir($user_dir);
        $file = fopen($filename,"w") or die("Unable to create file");
        fwrite($file,$data);
        fclose($file);
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
    <link href="./css/editor.css" rel="stylesheet">
    <link href="./css/modals.css" rel="stylesheet">
    <title>HashPad</title>
</head>
<body>
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
            <li class="button active">
                <a href="#">
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

        <input type="checkbox" id="click" style="display:none;">
        <div class="text_entry">
            
            <div class="utils">
                <div class="status">
                    <?php //echo "Title: ".isset($_SESSION['filename'])?  $_SESSION['filename']:"New" ;?>
                    New
                </div>
                <button onclick="close()" class="btn">CLOSE</button>
                <button onclick="toggleModal()" for="click" id="modal-btn" class="btn">SAVE</button>
            </div>
            <textarea class="editor"></textarea>
        </div>
        <div class="overlay"></div>
        <div class="modal">
            <form class="modal-content">
                <h3> Save As</h3>
                <input type="text" required class="filename" placeholder="Unititled-1">
                <button class="btn" onclick="save()">Save</button>
                <button class="btn" onclick="toggleModal()">Cancel</button>
            </form>
        </div>
    </div>
    <script src="./js/sidebarbtn.js"></script>
    <script src="./js/modals.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
</body>
</html>