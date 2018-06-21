<?php
    session_start();
    if($_SESSION["role"]!="admin")
    {
        header("location:php/autologin.php");
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta charset="UTF-8">
    <title>Upload Student Details</title>

<script>
function stud_suggestion()
{
var sem = document.getElementById("sem_select").value;
var dept = document.getElementById("dept_select").value;
var xhr;
 if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) { // IE 8 and older
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
var data = "sem=" + sem +"&dept="+dept;
     xhr.open("POST", "php/stud-list.php", true); 
     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
     xhr.send(data);
     xhr.onreadystatechange = display_data;
    function display_data() {
     if (xhr.readyState == 4) {
      if (xhr.status == 200) {
      document.getElementById("students").innerHTML = xhr.responseText;
      } else {
        alert('There was a problem with the request.');
      }
     }
    }
}
</script>
</head>

<body>

        <link rel="stylesheet" href="css/bootstrap.min.css">

        <script src="js/jquery.js"></script>

        <script src="js/popper.js"></script>
        <script src="js/bootstrap.js"></script>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
            <!-- Brand -->
            <a class="navbar-brand" href="#"><img style="height: 75px" src="images/logo1.png"> Internals System</a>

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href=attendance.php class="nav-link ">New Attendance</a>
                    </li>
                    <li class="nav-item">
                        <a href=internals.php class="nav-link ">Add Internals</a>
                    </li>
                    <li class="nav-item">
                        <a href=studentsList.php class="nav-link active">View Students List</a>
                    </li>
                    <li class="nav-item">
                        <a href=report.php class="nav-link">View Report</a>
                    </li>
                    <li class="nav-item">
                        <a href=profile.php class="nav-link ">Profile</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="php/logout1.php">Logout</a>
                    </li>

                </ul>
            </div>
        </nav>
        <br>    
        <br>    
        <br>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h3 class="display-4">Upload Student Details</h3>
                <p class="lead">Please Upload Student Details in the format specified</p>
            </div>
        </div>
<div class="container">
        <div class="row">
            <div class="col-lg-2">

            </div>
            <div class="col-lg-8"><br><br><br>
                <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="studentsList.php">View Students List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Upload Student Details</li>
                      </ol>
                    </nav>
                <div class="jumbotron">
                    
                <h1 align="center">Please Upload Student Details</h1><br>
                <br>
                    <form action="php/upload_file.php" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label for="data">Upload file in CSV Format</label>
                            <input type="file" class="form-control " name="data" id="data" accept=".csv" required="">
                <input type="hidden" name="key">
                      </div>
                      <button type="submit" class="btn btn-success btn-lg">Upload File</button>
            <a href="php/download.php" class="btn btn-success btn-lg float-right">Download CSV Format</a>
                    </form>
                    <br><br>
                    <div class="card">
                        <div class="card-body">
                            <h4>Things to Note:</h4>
                            <br>
                            <table style="width:100%" class='table'>
                                <thead class='thead-dark'>
                                    <th>Semester</th>
                                    <th>Value To Fill</th>
                                </thead>
                                <tr><td>Semester - 1</td><td>1</td></tr>
                                <tr><td>Semester - 2</td><td>2</td></tr>
                                <tr><td>Semester - 3</td><td>3</td></tr>
                                <tr><td>Semester - 4</td><td>4</td></tr>
                                <tr><td>Semester - 5</td><td>5</td></tr>
                                <tr><td>Semester - 6</td><td>6</td></tr>
                                <tr><td>Semester - 7</td><td>7</td></tr>
                                <tr><td>Semester - 8</td><td>8</td></tr>
                                <tr></tr>
                                <thead class='thead-dark'>
                                    <th>Department</th>
                                    <th>Value to Fill</th>
                                </thead>
                                <tr><td>Computer Science & Engineering</td><td>1</td></tr>
                                <tr><td>Civil Engineering</td><td>2</td></tr>
                                <tr><td>Electronics & Communications</td><td>3</td></tr>
                                <tr><td>Electrical & Electronics</td><td>4</td></tr>
                                <tr><td>Instrumentation & Communication</td><td>5</td></tr>
                                <tr><td>Mechanical Engineering</td><td>6</td></tr>
                            </table>       
                                            
                                            
                                            
                                            
                                            
                                            
                        </div>
                    </div>


                </div>
            
            </div>
            <div class="col-lg-2">
            
            </div>
        </div>
    </div>
</body>


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</html>
