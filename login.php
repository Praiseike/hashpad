<?php
    session_start();
    $_SESSION['msg'] = "";

    if(isset($_POST['email']) && isset($_POST['password']))
    {
        $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);

        include 'db_connect.php';

        if($db->connect_error)
        {
            die("Failed to connect to database. Please Contact the administrator");
        }

        $query = "SELECT EMAIL, PASSWORD, NOTES_ID FROM users WHERE EMAIL = '".$email."';";
        $result = $db->query($query);
        if($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            if(md5($password) == $row['PASSWORD'])
            {
                $_SESSION['ID'] = $row['NOTES_ID'];
                $_SESSION['user'] = substr($email,0,strpos($email,"@"));
                header("Location: index.php");
            }
            else{
                $_SESSION['msg'] = "<i class='error'> Invalid username or password</i>";
            }
        }
        else{
            $_SESSION['msg'] = "<i class='error'> User does not exist</i>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Google+Sans:400,500,700|Google+Sans+Text:400">
    <link href="./css/login.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand">
            <img src="note.png" width="30" height="30" alt="note">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id = "collapsibleNavbar">    
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a href="#" class="nav-link">STUFF</a></li>
                <li class="nav-item"><a href="#" class="nav-link">STUFF</a></li>
                <li class="nav-item"><a href="#" class="nav-link">STUFF</a></li>
            </ul>
        </div>
    </nav>

    <div class="login-container">
        <span>Log In</span>
        <form method="POST" action="login.php">
            <input type="email" required name="email" placeholder="Email" id="email">
            <input type="password" required name="password" placeholder="Password" id="password">
            <?php echo $_SESSION['msg']; ?>
            <button type="submit">submit</button>
            <p> Don't Have an Account? <a href="signup.php">Sign Up</a></p>
        </form>
    </div>
    
    <script src="./bootstrap-4.0.0/dist/js/bootstrap.min.js">

</body>
</html>