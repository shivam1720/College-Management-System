<?php

    session_start();
    if(!$_SESSION["userid"]){
        header("Location:index.php");
    }


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Study Material</title>

    <!-- CSS File -->
    <link rel="stylesheet" href="src/css/dashboard.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <style>
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
        .box-content a{
            display: block;
            text-decoration: none;
            margin-bottom: 3px;
        }
        .box-content a:hover{
            color: red;
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
            <h2><?php echo $_SESSION["userid"] ?></h2>
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
                <i class="fa fa-credit-card" aria-hidden="true"></i>
                <a href="feepayment.php">Fees Payment</a>
            </div>

            <div class="feature">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <a href="timetable.php">Time Table</a>
            </div>

            <div class="feature">
                <i class="fa fa-book" aria-hidden="true" style="color: red;"></i>
                <a href="#" style="color: red;">Study Material</a>
            </div>

            <div class="feature">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <a href="message.php">Message</a>
            </div>

            <div class="feature">
                <form action="studymaterial.php" method="post">
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

            <div class="box">
                <div class="box-header">
                    <h1>Advance Java</h1>
                </div>
                <div class="box-content">
                    <a href="studymaterial/ajt/ch1.pptx">CH-1</a>
                    <a href="studymaterial/ajt/ch2.pptx">CH-2</a>
                    <a href="studymaterial/ajt/ch3.pptx">CH-3</a>
                    <a href="studymaterial/ajt/ch4.pptx">CH-4</a>
                    <a href="studymaterial/ajt/ch5.pptx">CH-5</a>
                </div>
            </div>

            <div class="box">
                <div class="box-header">
                    <h1>.NET Technology</h1>
                </div>
                <div class="box-content">
                    <a href="studymaterial/net/2160711-DOTNET-Unit-1.pptx">CH-1</a>
                    <a href="studymaterial/net/2160711-DOTNET-Unit-2.pptx">CH-2</a>
                    <a href="studymaterial/net/2160711-DOTNET-Unit-3.pptx">CH-3</a>
                    <a href="studymaterial/net/2160711-DOTNET-Unit-4.pptx">CH-4</a>
                    <a href="studymaterial/net/2160711-DOTNET-Unit-5.pptx">CH-5</a>
                    <a href="studymaterial/net/2160711-DOTNET-Unit-6.pptx">CH-6</a>
                    <a href="studymaterial/net/2160711-DOTNET-Unit-7.pptx">CH-7</a>
                    <a href="studymaterial/net/2160711-DOTNET-Unit-8.pptx">CH-8</a>
                    <a href="studymaterial/net/2160711-DOTNET-Unit-9.pptx">CH-9</a>
                    <a href="studymaterial/net/2160711-DOTNET-Unit-10.pptx">CH-10</a>
                    <a href="studymaterial/net/2160711-DOTNET-Unit-11.pptx">CH-11</a>
                    <a href="studymaterial/net/2160711-DOTNET-Unit-12.pptx">CH-12</a>
                </div>
            </div>

            <div class="box">
                <div class="box-header">
                    <h1>Software Engineering</h1>
                </div>
                <div class="box-content">
                    <a href="studymaterial/se/ch1.pptx">CH-1</a>
                    <a href="studymaterial/se/ch1.pptx">CH-2</a>
                    <a href="studymaterial/se/ch1.pptx">CH-3</a>
                    <a href="studymaterial/se/ch1.pptx">CH-4</a>

                </div>
            </div>

            <div class="box">
                <div class="box-header">
                    <h1>Web Technology</h1>
                </div>
                <div class="box-content">
                    <a href="studymaterial/webtechnology/2160708-WT-Unit-1.pptx">CH-1</a>
                    <a href="studymaterial/webtechnology/2160708-WT-Unit-2.pptx">CH-2</a>
                    <a href="studymaterial/webtechnology/2160708-WT-Unit-3.pptx">CH-3</a>
                    <a href="studymaterial/webtechnology/2160708-WT-Unit-4.pptx">CH-4</a>
                    <a href="studymaterial/webtechnology/2160708-WT-Unit-5.pptx">CH-5</a>
                </div>
            </div>




        </div> <!-- right-panel -->
    </div> <!-- content -->

</body>
</html>
