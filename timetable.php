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
    <title>Dashboard</title>

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
                <i class="fa fa-calendar" aria-hidden="true" style="color: red;"></i>
                <a href="#" style="color: red;">Time Table</a>
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
                <form action="timetable.php" method="post">
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
                    <h1>Time Table</h1>
                </div>
                <div class="box-content">
                    <table border="1">
                        <tr>
                            <th></th>
                            <th>Monday</th>
                            <th>Tuesday</th>
                            <th>Wednesday</th>
                            <th>Thursday</th>
                            <th>Friday</th>
                            <th>Saturday</th>
                        </tr>
                        <tr>
                            <td>9:10 to 10:10</td>
                            <td>DCDR</td>
                            <td>SE</td>
                            <td>AJT</td>
                            <td>DCDR</td>
                            <td>.NET</td>
                            <td>DCDR</td>
                        </tr>
                        <tr>
                            <td>10:10 to 11:10</td>
                            <td>DCDR</td>
                            <td>SE</td>
                            <td>AJT</td>
                            <td>DCDR</td>
                            <td>.NET</td>
                            <td>DCDR</td>
                        </tr>
                        <tr>
                            <td>11:10 to 11:50</td>
                            <td colspan="6"> R E C E S S</td>
                        </tr>
                        <tr>
                            <td>11:50 to 1:50</td>
                            <td>DCDR</td>
                            <td>SE</td>
                            <td>AJT</td>
                            <td>DCDR</td>
                            <td>.NET</td>
                            <td>DCDR</td>
                        </tr>
                        <tr>
                            <td>1:50 to 2:00</td>
                            <td colspan="6"> R E C E S S</td>
                        </tr>
                        <tr>
                            <td>2:00 to 3:00</td>
                            <td>DCDR</td>
                            <td>SE</td>
                            <td>AJT</td>
                            <td>DCDR</td>
                            <td>.NET</td>
                            <td>DCDR</td>
                        </tr>
                        <tr>
                            <td>3:00 to 4:00</td>
                            <td>DCDR</td>
                            <td>SE</td>
                            <td>AJT</td>
                            <td>DCDR</td>
                            <td>.NET</td>
                            <td>DCDR</td>
                        </tr>
                    </table>
                </div>
            </div>






        </div> <!-- right-panel -->
    </div> <!-- content -->

</body>
</html>
