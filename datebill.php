<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>
        View bill by Date
    </title>
</head>

<body>
    <?php
error_reporting(0);
ini_set('display_errors', 0);
    session_start();
    if($_SESSION["role"]!="admin")
    {
        header("location:php/autologin.php");
    }
?>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.js"></script>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
            <!-- Brand -->
            <a class="navbar-brand" href="#"><img style="height: 75px" src="images/logo.png"> Mess Calculator</a>

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href=xyz.php class="nav-link">Stock Management</a>
                    </li>
                    <li class="nav-item">
                        <a href=new_student1.php class="nav-link">Student Details</a>
                    </li>

                    <li class="nav-item">
                        <a href=consumption.php class="nav-link">New Bill</a>
                    </li>
                    <li class="nav-item">
                        <a href=sam2.php class="nav-link">Total Bill</a>
                    </li>
                    <li class="nav-item">
                        <a href=datebill.php class="nav-link active">View Bill by date</a>
                    </li>
                    <li class="nav-item">
                        <a href=excel.php class="nav-link">Export Bill</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="logout1.php">Logout</a>
                    </li>

                </ul>
            </div>
        </nav>
        <br>
        <br>

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-3">View Bill by date</h1>
                <p class="lead">The bill details of all the students according to date are shown here</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <!--?php
  echo "<pre>"; echo $_GET["month_select"];  echo "</pre>";
  ?-->
                        <form action="datebill.php" method="GET">

                            <div class="form-group">
                                <select class="form-control" id="hostel_select" name="hostel_select">

                                    <option value="01">MH 1</option>
                                    <option value="02">MH 2</option>
                                    <option value="03">MH 3</option>
                                    <option value="04">LH</option>
                                </select>
                                <br/>
                                <p>Date:
                                    <input type="text" id="datepicker" name="date" required>
                                </p>
                            </div>
                            <input type="submit" class="btn btn-primary">

                        </form>
                        <br/>
                        <table class='table'>
                            <thead class='thead-dark'>
                                <tr>
                                    <th>Room Number</th>
                                    <th>Admission Number</th>
                                    <th>Name</th>
                                    <th>Item</th>
                                    <th>Price</th>
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
$date1 = $_GET['date'];
$hostel = $_GET['hostel_select'];
$sql1 = "SELECT s.rollno,tprice,itemname,room,s.name FROM sconsumption s,student st WHERE s.rollno = st.rollno AND date = '".$date1."' AND hostel = '".$hostel."' ORDER BY itemname";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    // output data of each row

while($row1 = $result1->fetch_assoc()){
$rollno=$row1["rollno"];
$roomno=$row1["room"];
$name=$row1["name"];
$totalbill=$row1["itemname"];
$tprice=$row1["tprice"];
echo "<tr>";
echo "    <td>$roomno</td>";
echo "    <td>$rollno</td>";
echo "   <td>$name</td>";
echo "   <td>$totalbill</td>";
echo "   <td>$tprice</td>";
 echo "</tr>";}
}else{
echo "0 Student Records";
}
$conn->close();
?>

                                    <script>
                                        $(function() {
                                            var date = $('#datepicker').datepicker({
                                                dateFormat: 'dd-mm-yy'
                                            }).val();
                                            $("#datepicker").datepicker();

                                        });
                                    </script>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
        <link rel="stylesheet" href="extra/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="extra/jquery-1.12.4.js"></script>
        <script src="extra/jquery-ui.js"></script>
</body>

</html>