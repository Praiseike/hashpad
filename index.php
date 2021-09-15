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
    <link href="bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link hfre="fontawesome-free-5.15.4-web/css/fontawesome.min.css" rel="stylesheet">
    <title>HashPad
    </title>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand">
            <img src="note.png" width="30" height="30" alt="note">
        </a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active"><a href="#" class="nav-link">STUFF</a></li>
            <li class="nav-item"><a href="#" class="nav-link">STUFF</a></li>
            <li class="nav-item"><a href="#" class="nav-link">STUFF</a></li>
        </ul>
    </nav>

    <h1>Welcome to the dashboard: <?php echo $_SESSION['user']; ?></h1>

    <script src="./bootstrap-4.0.0/dist/css/bootstrap.min.js">
</body>
</html>