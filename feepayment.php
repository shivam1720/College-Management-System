<?php

    include "connection.php";
    session_start();
    if(!$_SESSION["userid"]){
        header("Location:index.php");
    }

    $target_dir = "uploads/";
    if(isset($_POST["submit"])){
        $target_file = $target_dir . $_SESSION["userid"] . ".pdf";
        $uploadOk = 1;
        $file_type = $_FILES["up-file"]["type"];
        if($file_type == "application/pdf"){
            if(file_exists($target_file)){
                echo '<script type="text/javascript">
                        alert("Receipt Already Uploaded !");
                       </script>';
            }
            else if(move_uploaded_file($_FILES['up-file']['tmp_name'], $target_file)){

                $to_id = "accountant";
                $from_id = $_SESSION["userid"];
                $subject = "Fee Payment";
                $message = "File Uploaded Successfully";
                $query_acc = "Insert into acc_messages(to_id,from_id,studentid,subject,msg,status) values('$to_id','$from_id','$from_id','$subject','$message','Pending')";
                $result = mysqli_query($conn,$query_acc);
                if($result){
                    echo '<script type="text/javascript">
                    alert("Receipt Successfully Uploaded !");
                    </script>';
                }




            }else{
                echo '<script type="text/javascript">
                    alert("Your File was not Uploaded!");
                </script>';
            }
        }else{
            echo '<script type="text/javascript">
                alert("Please choose a PDF File");
            </script>';
        }
    }




 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fee Payment</title>

    <!-- CSS File -->
    <link rel="stylesheet" href="src/css/dashboard.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <style>
        .ins-col1{
            float:left;
            width: 30%;
            margin-right:1em;
            /*border:1px solid black;*/
        }
        .ins-col2{
            float: left;
            width: 50%;
            /*border:1px solid black;*/
            height: 5em;
        }
        .ins-col2 h2{
            font-weight: normal;
            text-decoration: underline;
            letter-spacing: 1px;
        }
        .ins-col2 li{
            padding: 2px;
        }
        label{
            margin-top: .5em;
            display: block;
            font-size: 1.2em;
            margin-bottom: .5em;
            font-weight: normal;
        }
        input{
            display: block;
            margin-bottom: .5em;
        }
        .sb-btn{
            background-color:#392759;
            color: white;
            border:none;
            padding: 8px;
            font-size: 1em;
            cursor: pointer;
        }
        .btn-logout{
            border:none;
            background-color:transparent;
            cursor: pointer;
            font-size: 20px;
            color: #392759;
        }
        .btn-logout:hover{
            font-size: 25px;
        }
    </style>

</head>
<body>

    <!-- Image Section -->
    <div class="cover-image">
        <div class="pic-intro">
            <img src="src/images/test.png"/ class="profile-img">
            <!-- <h1>Neel Patel</h1> -->
        </div>
    </div>

    <!-- User Profile -->
    <div class="user-profile">

        <div class="col1">
            <h2>Information Technology</h2>
            <p>Department</p>
        </div>
        <div class="col2">
            <h2><?php echo $_SESSION["userid"]; ?></h2>
            <p>Enrollment No</p>
        </div>
        <div class="col3">
            <h2>6<sup>th</sup></h2>
            <p>Semester</p>
        </div>
    </div>

    <!-- Content -->
    <div class="main-content">

        <div class="left-panel">

            <h1>Quick Links</h1>
            <hr style="width: 75%; height:1px; background-color: black;">

            <div class="feature">
                <i class="fa fa-credit-card" aria-hidden="true" style="color: red;"></i>
                <a href="#" style="color: red;">Fees Payment</a>
            </div>

            <div class="feature">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <a href="timetable.php">Time Table</a>
            </div>

            <div class="feature">
                <i class="fa fa-book" aria-hidden="true"></i>
                <a href="studymaterial.php">Study Material</a>
            </div>

            <div class="feature">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <a href="message.php">Message</a>
            </div>

            <div class="feature">
                <form action="feepayment.php" method="post">
                    <i class="fas fa-sign-out-alt"></i>
                    <button name="logout" class="btn-logout">Logout</button>
                </form>
                <?php

                    if(isset($_POST["logout"])){
                        session_destroy();
                        header("Location:index.php");
                    }
                ?>
            </div>
        </div>

        <div class="right-panel">

            <h1>Payment</h1>
            <hr style="width: 50%; height:1px; background-color: black;">

            <div class="instruction">
                <div class="ins-col1">
                    <img src="src/images/paytm.jpg" alt="paytm-qr-code" height="200">
                </div>
                <div class="ins-col2">
                    <h2>Instructions</h2>
                    <ul>
                        <li>Scan the QR Code</li>
                        <li>Fill in the details (Enrollment Number)</li>
                        <li>Pay your Fees (Tution Fees) </li>
                        <li>Upload the copy of your receipt</li>
                    </ul>
                    <form action="feepayment.php" method="post" enctype="multipart/form-data">
                        <label for="Receipt">Upload the copy of you Fee Receipt:</label>
                        <input type="file" name="up-file" required>
                        <input type="submit" name="submit" class="sb-btn">
                    </form>
                </div>
            </div>
        </div> <!-- right-panel -->
    </div> <!-- content -->


</body>
</html>
