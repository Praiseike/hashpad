<?php
    session_start();
    $_SESSION['msg'] = "";
    $_SESSION['error'] = "";
    $USER_DIR = "users";

    include 'db_connect.php';


    if($db->connect_error)
    {
        die("Failed to connect to database");
    }
    else{


        if(
            isset($_POST['password']) && 
            isset($_POST['confirmed_password'])
        )
        {
            $email = filter_var($_POST['email'],FILTER_SANITIZE_STRING);
            $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
            $confirmed_password = filter_var($_POST['confirmed_password'],FILTER_SANITIZE_STRING);

            
            $r = $db->query("SELECT * FROM users WHERE EMAIL = '".$email."';");
            if($r->num_rows > 0)
            {
                $_SESSION['msg'] = "<i class='error'> User already exist</i>";
            }
            else{
                if( $password == $confirmed_password)
                {
                    $noteid = uniqid().date("Ymdhhis");
                    $query = "INSERT INTO users (EMAIL, PASSWORD, NOTES_ID) VALUES ('".$email."','".md5($password)."','".$noteid."');";
                    
                    $result = $db->query($query);
                    if($result === TRUE)
                    {
                        if(!file_exists($USER_DIR))
                        {
                            mkdir($USER_DIR);
                        }
                        mkdir($USER_DIR."/".$noteid);
                        $_SESSION['ID'] = $noteid;
                        $_SESSION['user'] = substr($email,0,strpos($email,"@"));
                        header("Location: index.php");
                    }
                    else{
                        die("Failed to insert values into table: ".$db->error);
                    }
                }
                
                $_SESSION['msg'] = "<i class='error'> passwords do not match </i>";
                    
            }
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
    <link href="./css/signup.css" rel="stylesheet">
    <title>Sign Up</title>
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
        <span>Sign Up</span>
        <form method="POST" action="signup.php">
            <input type="email" required name="email" placeholder="Email" id="email">
            <input type="password" required name="password" placeholder="Password" id="password">
            <input type="password" required name="confirmed_password" placeholder="Confirm password" id="confirmed_password">
            <?php echo $_SESSION['msg'] ; ?>
            <button type="submit">submit</button>
            <p> Already Have an Account? <a href="login.php">Log In</a></p>
        </form>

    </div>
    <script src="./bootstrap-4.0.0/dist/js/bootstrap.min.js">
        
</body>
</html>