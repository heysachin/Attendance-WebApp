<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta charset="UTF-8">
    <title>Price Range</title>
</head>

<body>
    <?php
error_reporting(0);
ini_set('display_errors', 0);
    session_start();
    if($_SESSION["role"]!="admin")
    {
        header("location:admin.php");
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
                        <a href=xyz.php class="nav-link active">Stock Management</a>
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
                        <a href=datebill.php class="nav-link">View Bill by date</a>
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
                <h1 class="display-3">Stock Management</h1>
                <p class="lead">You can Add or Delete the items available in the canteen here</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                Fields marked as <font color='red'>*</font> cannot be empty
                <br/>
                <div class="card">
                    <div class="card-body">
                        <h2>
Existing Item details
</h2>
                        <?php
//error_reporting(0);
//ini_set('display_errors', 0);

require("connect.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully<br>";
$itemName=$_POST["iname"];
$iprice=$_POST["price"];
//$query_insert="insert into item values('$itemName','$iprice')";
//$query_select="select * from item;";
//mysqli_query($db,$query_insert) or die('Error querying database');
//mysqli_query($conn,$query_select);
if ($itemName!="" && $iprice!="") {

$sql = "insert into item values('$itemName','$iprice')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
else
{
  //echo "Fields marked as <font color='red'>*</font> cannot be empty<br/>";
}
$sql1 = "SELECT * FROM item ORDER BY item_name ASC ";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
    // output data of each row
  echo "<table class='table'><thead class='thead-dark'><tr><th>Item Name</th><th>Price</th></tr></thead><tbody>";
    while($row = $result->fetch_assoc()) {

        echo "<tr><td>".$row["item_name"]."</td><td>".$row["price"]."</td></tr>";
    }
  echo "</table>";
} else {
    echo "0 Items in the menu";
}

$conn->close();
?>
                            <br/>
                    </div>
                </div>
                <br/>
                <div class="card">
                    <div class="card-body">
                        <h1>Add a new item</h1>
                        <form action="sample.php" method="post">
                            <div class="form-group">
                                <b>Name of the item<font color='red'>*</font></b>

                                <input type="text" name="iname" class="form-control">
                                <br/>
                                <br/>
                                <b>Price per item<font color='red'>*</font></b>
                                <input type="number" name="price" class="form-control">
                                <br/>
                                <input type="submit" class="btn btn-primary">
                        </form>
                        </div>
                        <br/>
                        <br/>

                    </div>
                </div>
                <br/>
                <div class="card">
                    <div class="card-body">
                        <h1>Delete an item</h1>
                        <?php
require("connect.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{
//echo "connected";

}
echo "<form action='delete.php' method='post'>";
echo "<div class='form-group'>";
echo "<select name='select' class='form-control'>";
$sql3 = mysqli_query($conn, "SELECT * From item");
$row = mysqli_num_rows($sql3);

while ($row = mysqli_fetch_array($sql3)){
echo "<option value='".$row['item_name']."'>".$row['item_name']."</option>" ;
}
echo "</select>";
echo "<br/><input type='submit' value='delete' class='btn btn-danger'>";
echo "</div></form>";
$conn->close();
?>
                    </div>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>

        <br/>
        <br/>
        <br/>
        <br/>
</body>

</html>