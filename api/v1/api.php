<?php
    session_start();

    $USERS_DIR = "../../users/";

    if(!isset($_SESSION['ID']))
    {
        echo "Unindentified User";
    }

    else{    
        if(isset($_GET['notes']))
        {
            chdir($USERS_DIR.$_SESSION['ID']);
            $notes = glob("*");
            if(count($notes) == 0)
            {
                echo "Empty";
            }
            else
                echo json_encode($notes);
        }

        else if(isset($_POST['data']) || isset($_POST['filename']))
        {
            $filename = $_POST['filename'];
            if($filename == "")
            {
                $filename = "Untitled-1";
            }
            $data = $_POST['data'];
            $user_dir = "../../users/".$_SESSION['ID'];
            chdir($user_dir);
            $file = fopen($filename,"w") or die("Unable to create file");
            fwrite($file,$data);
            fclose($file);

            echo json_encode(array("status" => "saved","filename" => $filename));
            $_SESSION['filename'] = $filename;
        }
        else{
             echo json_encode(array("status" => "failed"));
        }
    }
?>