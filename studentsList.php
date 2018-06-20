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
    <title>Report</title>

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
                <h3 class="display-4">View The Complete Student List</h3>
                <p class="lead">Please Select The Semester and The Class</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <form id="data_form" action="studentsList.php" method="post">
                            Sem : <select class='form-control' name = 'Sem' id="sem_select" onchange="stud_suggestion()">
                                                <option value = '01'>S1</option>
                                                <option value = '02'>S2</option>
                                                <option value = '03'>S3</option>
                                                <option value = '04'>S4</option>
                                                <option value = '05'>S5</option>
                                                <option value = '06'>S6</option>
                                                <option value = '07'>S7</option>
                                                <option value = '08'>S8</option>
                                            </select><br>
                            Department : 
                                <select class='form-control' id="dept_select" name = 'Dept' onchange="stud_suggestion()">
                                                <option value = '1'>Computer Science & Engineering</option>
                                                <option value = '2'>Civil Engineering</option>
                                                <option value = '3'>Electronics & Communications</option>
                                                <option value = '4'>Electrical & Electronics</option>
                                                <option value = '5'>Instrumentation & Communication</option>
                                                <option value = '6'>Mechanical Engineering</option>
                                            </select><br>
                                
                
                <div id="students"></div>
                            </div>
                        </form>
</body>


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</html>
