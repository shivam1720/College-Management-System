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
                <form action="dashboard.php" method="post">
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

            <h1>Semester Overview</h1>
            <hr style="width: 50%; height:1px; background-color: black;">

            <div class="box">
                <div class="box-header">
                    <h2>Books Issued</h2>
                </div>
                <div class="box-content">
                        <table border="1">
                            <tr>
                                <th>Book</th>
                                <th>Due Date</th>
                            </tr>
                            <tr>
                                <td>Java SE</td>
                                <td>20/03/2019</td>
                            </tr>
                            <tr>
                                <td>.NET</td>
                                <td>25/04/2019</td>
                            </tr>
                            <tr>
                                <td>Java SE</td>
                                <td>20/03/2019</td>
                            </tr>
                        </table>
                </div>
            </div>

            <div class="box">
                <div class="box-header">
                    <h2>Attendance / Internal Marks</h2>
                </div>
                <div class="box-content">
                    <table border="1">
                        <tr>
                            <th>Subject</th>
                            <th>Attendance %</th>
                            <th>Marks</th>
                        </tr>
                        <tr>
                            <td>Web Technology</td>
                            <td>77</td>
                            <td>22</td>
                        </tr>
                        <tr>
                            <td>.Net</td>
                            <td>67</td>
                            <td>27</td>
                        </tr>
                        <tr>
                            <td>Software Engineering</td>
                            <td>85</td>
                            <td>24</td>
                        </tr>
                        <tr>
                            <td>DCDR</td>
                            <td>82</td>
                            <td>Absent</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="box">
                <div class="box-header">
                    <h2>Semester Details</h2>
                </div>
                <div class="box-content">
                    <table border="1">
                        <tr>
                            <th>CPI</th>
                            <th>CGPA</th>
                            <th>100 Acticity Points</th>
                        </tr>
                        <tr>
                            <td>8.9</td>
                            <td>9.6</td>
                            <td>100</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- <div class="box">
                <div class="box-header">
                    <h2>Internal Exam Marks</h2>
                </div>
                <div class="box-content">
                    <table border="1">
                        <tr>
                            <th>Subject</th>
                            <th>Marks</th>
                        </tr>
                        <tr>
                            <td>Advance Java</td>
                            <td>26</td>
                        </tr>
                        <tr>
                            <td>.NET</td>
                            <td>27</td>
                        </tr>
                        <tr>
                            <td>DCDR</td>
                            <td>29</td>
                        </tr>
                        <tr>
                            <td>Software Engineering</td>
                            <td>Absent</td>
                        </tr>
                    </table>
                </div>
            </div> -->




        </div> <!-- right-panel -->
    </div> <!-- content -->

</body>
</html>
