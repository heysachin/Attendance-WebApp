<!DOCTYPE html>
<html lang="en-US">
<title>Billing page</title>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> Individual Billing
</head>

<body>
    <?php
error_reporting(0);
ini_set('display_errors', 0);
    session_start();
    if($_SESSION["role"]!="student")
    {
        header("location:php/autologin.php");
    }
?>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.js"></script>
        <div>
            <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
                <!-- Brand -->
                <a class="navbar-brand" href="#"><img style="height: 75px" src="images/logo.png"> Mess Calculator</a>

                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar links -->
                <div class="collapse navbar-collapse " id="collapsibleNavbar">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a href=billing.php class="nav-link active">Individual Bill</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="logout.php"><strong>Logout</strong></a>
                        </li>
                    </ul>
                </div>
            </nav>
                <div>
<br><br>
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-3">Individual Bill</h1>
                        <p class="lead">You can see the individual bill details here</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">

                        <br/>
                        <div class="card">
                            <div class="card-body">

                                <form action="billing.php" method="GET">

                                    <div class="form-group">
                                        <select class="form-control" id="month_select" name="month_select">
                                            <option selected>Month</option>
                                            <option value="01">January</option>
                                            <option value="02">February</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">August</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                        <br/>
                                        <select class="form-control" id="year_select" name="year_select">

                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                        </select>
                                    </div>
                                    <input type="submit" class="btn btn-primary">

                                </form>
                                <br/>
                                <table style="width:100%" class='table'>
                                    <thead class='thead-dark'>
                                        <tr>
                                            <th>Date</th>
                                            <th>Item</th>
                                            <th>Cost</th>
                                        </tr>
                                    </thead>
                                    <tbody>


<?php
require("connect.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully<br>";
$month = $_GET['month_select'];
$year = $_GET['year_select'];
$sql1 = "SELECT * FROM sconsumption WHERE rollno=".$_SESSION['id']." AND date like '__-".$month."-".$year."' order by date";
$sql2 = "SELECT sum(tprice) from sconsumption WHERE rollno=".$_SESSION['id']." AND date like '__-".$month."-".$year."'";
$result = $conn->query($sql1);
$result1 = $conn->query($sql2);
$result3 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();
$row2 = $result3->fetch_assoc();
echo "<br/><div class='alert alert-secondary' role='alert'>Name: ".$_SESSION["name"]."</div>";
if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" .$row["date"]. "</td> <td>" . $row["itemname"]. "</td> <td>" . $row["tprice"]. "</td></tr><br>" ;

    }
  echo "</tbody></table>";
  echo "<div class='alert alert-primary text-right' role='alert'>Total price is ". $row1["sum(tprice)"]."</div>";
} else {
    echo "Go and eat. Haven't took anything!<br> Total amount is 0";
}
$conn->close();
?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>