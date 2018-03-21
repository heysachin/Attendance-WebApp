<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta charset="UTF-8">
    <title>Enter New Student Details</title>
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
                    <!-- <li class="nav-item">
                        <a href=xyz.php class="nav-link">Stock Management</a>
                    </li>
                    <li class="nav-item">
                        <a href=new_student1.php class="nav-link active">Student Details</a>
                    </li>

                    <li class="nav-item">
                        <a href=consumption.php class="nav-link">New Bill</a>
                    </li>
                    <li class="nav-item">
                        <a href=sam2.php class="nav-link">Total Bill</a>
                    </li>
                    <li class="nav-item">
                        <a href=datebill.php class="nav-link">View Bill by date</a>
                    </li>
                    <li class="nav-item">
                        <a href=excel.php class="nav-link">Export Bill</a>
                    </li> -->
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
                <h1 class="display-3">Student Details</h1>
                <p class="lead">You can Add or Delete the Student Details here</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">

                <div class="card">
                    <div class="card-body">
                        <h2>
Existing Student Details
</h2>
                        <?php
error_reporting(0);
ini_set('display_errors', 0);
require("connect.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully<br>";
$itemName=$_POST["name"];
$iprice=$_POST["rollno"];
$pwd=$_POST["password"];
//$query_insert="insert into item values('$itemName','$iprice')";
//$query_select="select * from item;";
//mysqli_query($db,$query_insert) or die('Error querying database');
//mysqli_query($conn,$query_select);
if ($itemName!='' && $iprice!='') {

$sql = "insert into student values('$itemName','$iprice','$pwd')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "<font color='red'>Error: " . $sql . "</font><br>" . $conn->error;
}
}
else{
  //echo "Fields marked as <font color='red'>*</font> cannot be empty<br/>";
}
$sql1 = "SELECT * FROM student ORDER BY rollno ASC";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
    // output data of each row
  echo "<table class='table'><thead class='thead-dark'><tr><th>Room No</th><th>Admission No</th><th>Name</th></tr></thead><tbody>";
    while($row = $result->fetch_assoc()) {

        echo "<tr><td>".$row["room"]."</td><td>".$row["rollno"]."</td><td>".$row["name"]."</td></tr>";
    }
  echo "</tbody></table>";
} else {
    echo "0 Student Records";
}

$conn->close();
?>
                    </div>
                </div>
                <br/>
</body>

</html>
