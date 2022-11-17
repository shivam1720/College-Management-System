<?php

    include 'connection.php';
    session_start();
    if(!$_SESSION["userid"]){
        header("Location:index.php");
    }


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Faculty Advisor</title>

    <!-- CSS File -->
    <link rel="stylesheet" href="src/css/dashboard.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <style>
        body{
margin: 0 auto;
background-color: #E0E2DB;
font-family: sans-serif;
}

/* Cover-Image Section */
.cover-image{
background: #009FFF;
background: -webkit-linear-gradient(left, #ec2F4B, #009FFF);
background: -o-linear-gradient(left, #ec2F4B, #009FFF);
background: linear-gradient(to right, #ec2F4B, #009FFF);
height: 12em;

}
.pic-intro{
width: 80%;
margin-left: auto;
margin-right :auto;
}
.pic-intro h1{
float: left;
color: white;
text-align: center;
width: 50%;
text-transform: uppercase;
letter-spacing: .3em;
margin-top: 4em;
}
.profile-img{
float: left;
margin-right: 4em;
height: 10em;
margin-top: 7em;
}
.logout{
position: fixed;
top: 0;
right: 0;
background-color: transparent;
color: white;
border:none;
font-size: 1em;
border:1.5px solid white;
padding: .5em;
cursor: pointer;
z-index: 2;
}

/* Profile-Section */

.user-profile{
    background-color: white;
    height: 8em;
    margin-top: 0;
}
.col1, .col2, .col3{
    float: left;
    width: 23.1%;
    margin-top: 1em;
}
.user-profile h2 {
    margin-bottom:0;
}
.user-profile p {
    margin-top:0;
    color: #817F80;
}

/* Main-content */
.main-content{
    margin-top: 1em;
    /*margin-bottom: 1em;*/
    display: flex;
    align-items: center;
    justify-content: center;

}

.box{
    margin-left: auto;
    margin-right: auto;
}
.box-header{
    border:1px solid #777777;
    background-color: #777777;
    color: white;
    font-size: .8em;
    padding: .5em;
    text-align: center;
}
.box-header h2{
    font-weight: normal;
}
.box-content{
    padding: 10px;
    border:1px solid #777777;
    background-color:white;
    text-align: center;
}
table{
    border-collapse: collapse;
}
td,th{
    padding: 10px;
    text-align: center;
}
.box h1{
    text-align: center;
    letter-spacing: .2em;
    font-weight: normal;
}
.approve{

    background-color: green;
    color: white;
    border: none;
    padding: 4px;
    cursor: pointer;
}
.reject{
    background-color:red;
    color: white;
    border: none;
    padding:4px;
    cursor:pointer;
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

<script>
        function approved(id){
            document.getElementById(id).innerHTML = "Approved";
        }
    </script>


</head>
<body>

    <!-- Image Section -->
    <div class="cover-image">
        <div class="pic-intro">
            <img src="src/images/test.png"/ class="profile-img">
            <h1>Faculty Advisor</h1>
        </div>
    </div>

    <!-- User Profile -->
    <div class="user-profile">

        <div class="col1">
            <h2>Information Techonology</h2>
            <p>Engineering</p>
        </div>
        <div class="col2">
            <h2>152441</h2>
            <p>Staff-id</p>
        </div>
        <div class="col3">
            <form action="facultyadvisor.php" method="post">
                    <h2><i class="fas fa-sign-out-alt"></i>
                    <button name="logout" class="btn-logout">Logout</button></h2>
                </form>
                <?php

                    if(isset($_POST["logout"])){
                        session_destroy();
                        header("Location:index.php");
                    }
                ?>
        </div>
    </div>

    <!-- Content -->
    <div class="main-content">

        <div class="box">
            <div class="box-header">
                <h1>Students Fee Payment</h1>
            </div>
            <div class="box-content">
                <table border="1">
                    <tr>
                        <th>Srno</th>
                        <th>Enrollment Number</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Verify Details</th>
                        <th>Status</th>
                    </tr>
                    <?php

                        // Show Details
                        $display_data = "Select * from it_fa_messages";
                        $result_data = mysqli_query($conn, $display_data);

                        if(mysqli_num_rows($result_data) > 0){
                            // $enid_array = array();
                            while($rows = mysqli_fetch_assoc($result_data)){
                                $srno = $rows["srno"];
                                $enrno = $rows["studentid"];
                                // array_push($enid_array,$enrno);
                                $sub = $rows["subject"];
                                $msg = $rows["msg"];
                                $status = $rows["status"];
                                ?>

                                    <tr>
                                        <td><?php echo $srno; ?></td>
                                        <td><?php echo $enrno ?></td>
                                        <td><?php echo $sub ?></td>
                                        <td><?php echo $msg ?></td>
                                        <td>
                                            <form action='facultyadvisor.php' method='post'>
                                                <input type='hidden' name='id' value='<?php echo $enrno; ?>'>
                                                <button class='approve' name='approve-btn' id='<?php echo $enrno; ?>-apr'>Approve</button>
                                                <button class='reject' name='reject-btn' id='<?php echo $enrno; ?>-rjt'>Reject</button>
                                            </form>

                                        </td>
                                        <td><?php echo $status; ?></td>
                                    </tr>

                            <?php }

                                if(isset($_POST["approve-btn"])){
                                    $val = $_POST["id"];
                                    $update_query = "update it_fa_messages set status='Approved' where studentid='$val'";
                                    $result = mysqli_query($conn,$update_query);
                                    echo("<meta http-equiv='refresh' content='1'>");

                                    $verify = "select * from student_messages where studentid='$val'";
                                    $verify_result = mysqli_query($conn,$verify);
                                    if(mysqli_num_rows($verify_result) >0 ){


                                    }else{
                                        $to_id = $val;
                                        $from_id = "Faculty Advisor";
                                        $subject = "Registration Form";
                                        $message = "Registration Completed";
                                        $student = $val;
                                        $query_acc = "Insert into student_messages(to_id,from_id,studentid,subject,msg) values('$to_id','$from_id','$student','$subject','$message')";
                                        $result = mysqli_query($conn,$query_acc);
                                    }

                                }
                                if(isset($_POST["reject-btn"])){
                                    $val = $_POST["id"];
                                    $update_query = "update it_fa_messages set status='Rejected' where studentid='$val'";
                                    $result = mysqli_query($conn,$update_query);
                                    echo("<meta http-equiv='refresh' content='1'>");
                                }


                        }

                     ?>
                </table>
            </div>
        </div>




    </div> <!-- content -->


</body>
</html>
