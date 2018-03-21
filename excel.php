<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>
        Export Bill
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
                        <a href=datebill.php class="nav-link">View Bill by date</a>
                    </li>
                    <li class="nav-item">
                        <a href=datebill.php class="nav-link active">Export Bill</a>
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
                <h1 class="display-3">Export Bill</h1>
                <p class="lead">You can export the bill details of students in to excel sheet here</p>
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
                        <form action="export.php" method="GET">

                            <div class="form-group">
                                <select class="form-control" id="hostel_select" name="hostel_select" required>

                                    <option value="01">MH 1</option>
                                    <option value="02">MH 2</option>
                                    <option value="03">MH 3</option>
                                    <option value="04">LH</option>
                                </select>
                                <br/>
                                <!--label for="exampleFormControlSelect1">Select Month</label-->
                                <select class="form-control" id="month_select" name="month_select" required>
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
                                <select class="form-control" id="year_select" name="year_select" required>

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
                            <input type="submit" value="Export" class="btn btn-primary">

                        </form>
                        <br/>

</body>

</html>