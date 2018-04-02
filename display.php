<!DOCTYPE html>
<html lang="en-US">
<title>Report page</title>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> Individual Report
</head>

<body>
    <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.js"></script>
    <?php
error_reporting(0);
ini_set('display_errors', 0);
    session_start();
    if($_SESSION["role"]!="student")
    {
        header("location:php/autologin.php");
    }
?>
        
        <div>
            <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
                <!-- Brand -->
                <a class="navbar-brand" href="#"><img style="height: 75px" src="images/logo.png"> Individual Report Calculator</a>

                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar links -->
                <div class="collapse navbar-collapse " id="collapsibleNavbar">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a href=display.php class="nav-link active">Reports</a>
                        </li>
                        <li class="nav-item">
                            <a href=pdf.php class="nav-link active">Export as PDF</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="logout.php"><strong>Logout</strong></a>
                        </li>
                    </ul>
                </div>
            </nav>
                <div>
<br><br>
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-3">Individual Report</h1>
                        <!-- <p class="lead">You can see the individual Report details here</p> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">

                        <br/>
                        <div class="card">
                            <div class="card-body">
                                <table style="width:100%" class='table'>
                                    <thead class='thead-dark'>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Total</th>
                                            <th>Missed</th>
                                            <th>Percentage</th>
                                        </tr>
                                    </thead>
                                    <tbody>

<?php
require("connect.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$SID = $_SESSION['id'];

$sql = "select sb.Sid SubID, sb.Sname SubName from student st,subjects sb where st.Sem=sb.Sem and st.Dept=sb.Dept and st.StudId LIKE '$SID'";
$result = $conn->query($sql);
echo "<br/><div class='alert alert-secondary' role='alert'>Name: ".$_SESSION["name"]."</div>
<br/><h2>Attendance Report</h2>

";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        $SubID = $row["SubID"];
        $SubName = $row["SubName"];
        $sql1 = "Select sum(Total) TC , sum(Missed) MC from attendance where SubId = '$SubID' and StudId = '$SID' ";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
            // output data of each row
            while($row1 = $result1->fetch_assoc()) {
                if ($row1["TC"]==0) {
                    $row1["TC"]=0;
                    $row1["MC"]=0;
                    $percent = 100;
                }else
                {
                $percent=($row1["TC"]-$row1["MC"])/$row1["TC"]*100;

                }

        echo "<tr><td>" .$SubID." - ".$SubName. "</td> <td>" . $row1["TC"]. "</td> <td>" . $row1["MC"]. "</td> <td>" . $percent. "%</td> </tr><br>" ;
            }
        }
    }
  echo "</tbody></table>";
  // echo "<div class='alert alert-primary text-right' role='alert'>Total price is ". $row1["sum(tprice)"]."</div>";
}
$conn->close();
?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

<div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">

                        <br/>
                        <div class="card">
                            <div class="card-body">
                                <table style="width:100%" class='table'>
                                    <thead class='thead-dark'>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Internal Number</th>
                                            <th>Marks</th>
                                        </tr>
                                    </thead>
                                    <tbody>

<?php
require("connect.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$SID = $_SESSION['id'];

$sql = "select sb.Sid SubID, sb.Sname SubName from student st,subjects sb where st.Sem=sb.Sem and st.Dept=sb.Dept and st.StudId LIKE '$SID'";
$result = $conn->query($sql);
echo "<br/><div class='alert alert-secondary' role='alert'>Name: ".$_SESSION["name"]."</div>
<br/><h2>Internal Marks Report</h2>

";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        $SubID = $row["SubID"];
        $SubName = $row["SubName"];
        $sql1 = "Select InternalNo,Marks from internals where SubId = '$SubID' and StudId = '$SID' ";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
            // output data of each row
            while($row1 = $result1->fetch_assoc()) {

        echo "<tr><td>" .$SubID." - ".$SubName. "</td> <td>" . $row1["InternalNo"]. "</td> <td>" . $row1["Marks"]. "</td></tr><br>" ;
            }
        }
    }
  echo "</tbody></table>";
  // echo "<div class='alert alert-primary text-right' role='alert'>Total price is ". $row1["sum(tprice)"]."</div>";
}
$conn->close();
?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <br/>
        <br/>




    </div>
</div>

</body>

</html>