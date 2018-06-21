<?php
    session_start();
    if($_SESSION["role"]!="student")
    {
        header("location:php/autologin.php");
    }
?>
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

        
        <div>
            <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
                <!-- Brand -->
                <a class="navbar-brand" href="#"><img style="height: 75px" src="images/logo1.png"> Individual Report Calculator</a>

                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar links -->
                <div class="collapse navbar-collapse " id="collapsibleNavbar">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a href="display.php" class="nav-link active">Reports</a>
                        </li>
                        <li class="nav-item">
                            <a href="php/pdf.php" class="nav-link active">Export as PDF</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="php/logout.php"><strong>Logout</strong></a>
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
require("php/connect.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$SID = $_SESSION['id'];

$sql = "select sb.SIndex SubID, sb.Sid SID, sb.Sname SubName from student st,subjects sb where st.Sem=sb.Sem and st.Dept=sb.Dept and st.StudId LIKE '$SID'";
$result = $conn->query($sql);
echo "<br/><div class='alert alert-secondary' role='alert'>Name: ".$_SESSION["name"]."</div>
<br/><h2>Attendance Report</h2>

";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        $SubID = $row["SID"];
        $SubName = $row["SubName"];
        $sql1 = "Select sum(Total) TC , sum(Missed) MC from attendance where SIndex = '$SubID' and StudId = '$SID' ";
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
<h2>Internal Marks</h2>
<table style='width:100%' class='table'>
    <thead class='thead-dark'>
        <tr>
            <th>Name</th>
            <th>1st</th>
            <th>2nd</th>
            <th>3rd</th>
            <th>Retest</th>
            <th>Top 2</th>
        </tr>
    </thead>
    <tbody>
<?php


require("php/connect.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$SID = $_SESSION['id'];

$sql = "select sb.SIndex SubID, sb.Sname SubName from student st,subjects sb where st.Sem=sb.Sem and st.Dept=sb.Dept and st.StudId LIKE '$SID'";
$result = $conn->query($sql);
echo "<br/><div class='alert alert-secondary' role='alert'>Name: ".$_SESSION["name"]."</div>
<br/><h2>Internal Marks Report</h2>

";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {


        
        $SubID = $row["SubID"];
        $SubName = $row["SubName"];
        $sql1 = "SELECT * from internals where SIndex = $SubID and StudId = '$SID' ";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
            // output data of each row
            while($row1 = $result1->fetch_assoc()) {
                $sql2 = mysqli_query($conn, "SELECT * from subjects where SIndex= $SubID");
                $row2 = mysqli_fetch_array($sql2);
                $mark[0]= intval($row1["First"]);
                $mark[1]= intval($row1["Second"]);
                $mark[2]= intval($row1["Third"]);
                $mark[3]= intval($row1["Retest"]);
                echo "<tr><td>" .$row2['Sname']. "</td><td>" . $mark[0]. "</td> <td>" . $mark[1]. "</td><td>" . $mark[2]. "</td><td>" . $mark[3]. "</td>";
                sort($mark);
                $top2=$mark[2]+$mark[3];

                echo " <td>" . $top2. "</td></tr>" ;
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