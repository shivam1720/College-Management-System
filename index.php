<?php

    include 'connection.php';
    session_start();
    global $loginError;


    if(isset($_POST["submit"])){
        $form_user_id = $_POST["userid"];
        $form_pass = $_POST["password"];

        $query = "SELECT * FROM users WHERE userid='$form_user_id'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0){

            while($rows = mysqli_fetch_assoc($result)){
                $userid = $rows["userid"];
                $pass = $rows["password"];
            }

            switch ($form_user_id) {
                case "accountant":
                    if($form_pass == $pass){
                        $_SESSION["userid"] = $userid;
                        header("Location:accountant.php");

                    }else{
                        $loginError = "<div class='error'>
                        <p>Wrong Password !</p>
                        </div>";
                    }
                break;

                case "it_fa_sem6":
                    if($form_pass == $pass){
                        $_SESSION["userid"] = $userid;
                        header("Location:facultyadvisor.php");

                    }else{
                        $loginError = "<div class='error'>
                        <p>Wrong Password !</p>
                        </div>";
                    }
                break;



                case "librarian":
                    if($form_pass == $pass){
                        $_SESSION["userid"] = $userid;
                        header("Location:librarian.php");

                    }else{
                        $loginError = "<div class='error'>
                        <p>Wrong Password !</p>
                        </div>";
                    }
                break;


                default:
                    if($form_pass == $pass){
                        $_SESSION["userid"] = $userid;
                        header("Location:dashboard.php");

                    }else{
                        $loginError = "<div class='error'>
                        <p>Wrong Password !</p>
                        </div>";
                    }
                break;
            }

            // if($form_pass == $pass){

            //     $_SESSION["userid"] = $userid;
            //     header("Location:dashboard.php");

            // }else{

            //     $loginError = "<div class='error'>
            //         <p>Wrong Password !</p>
            //     </div>";
            // }

        }else{
            $loginError = "<div class='error'>
                    <p>Please try again !</p>
                </div>";
        }

    }



?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>

        <style>
            body{
                background-color: #F0F3F5;
                width: 90%;
                margin:0 auto;
            }
            .container{
                position: fixed;
                top: 30%;
                left: 46%;
                width: 20em;
                height: auto;
                margin-top: -9em; /* half the size of the height*/
                margin-left: -10em; /* half the size of the width*/
                background-color: #392759;
                color: white;
                padding: 1em;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }
            .container h1{
                text-align: center;
                color: white;
                padding-top: .6em;
                margin: 0;
            }
            .content{
                margin:1em;
                padding: 1em;
                letter-spacing: 3px;
            }
            .content label{
                display: block;
                font-size: 1.2em;
                margin-bottom: .5em;
                font-weight: bold;
            }
            .content input{
                display: block;
                width: 100%;
                background-color: transparent;
                border:none;
                border-bottom: 1px solid white;
                color: white;
                font-size: 1em;
            }
            input:focus{
                outline: none;
                color: white;
                font-size: 1em;
            }
            hr{
                width: 25%;
            }
            .img{
                display: flex;
                align-content: center;
                justify-content: center;
            }
            .img img{
                margin: 0 auto;
            }
            .sb-btn{
                background-color: #62F1D3;
                color: #392759;
                width: 100%;
                height: 2.7em;
                font-size: 1em;
                border:none;
                letter-spacing: 2px;
            }
            .error{
                background-color: #FB3640;
                color: white;
                margin: 1em;
                padding: .6em;
            }

        </style>
    </head>
    <body>
        <!-- outer container -->
        <div class="container">
            <div class="img">
                <img src="src/images/SPCE_logo.png" alt="LOGO" height="150"><br>
            </div>
            <h1>SPCE BAKROL</h1>
            <hr>
            <!-- Form -->
            <form action="index.php" method="post">

                <div class="content">
                    <label for="userid">User Id</label>
                    <input type="text" name="userid">
                </div>
                <div class="content">
                    <label for="password">Password</label>
                    <input type="password" name="password">
                </div>
                <?php echo $loginError; ?>
                <div class="content">
                    <!-- <input type="submit" class="sb-btn" value="submit"> -->
                    <button class="sb-btn" name="submit">Login</button>
                </div>
            </form>
        </div>
    </body>
</html>
