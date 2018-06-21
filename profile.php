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
    <title>Profile</title>

<script>
function stud_suggestion()
{
var subject = document.getElementById("sub_select").value;
var xhr;
 if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) { // IE 8 and older
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
var data = "subject=" + subject;
     xhr.open("POST", "php/stud-suggestion.php", true); 
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
                        <a href=internals.php class="nav-link">Add Internals</a>
                    </li>
                    <li class="nav-item">
                        <a href=studentsList.php class="nav-link">View Students List</a>
                    </li>
                    <li class="nav-item">
                        <a href=report.php class="nav-link ">View Report</a>
                    </li>
                    <li class="nav-item">
                        <a href=profile.php class="nav-link active">Profile</a>
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
                <h3 class="display-4">Profile</h3>
                <p class="lead">View and Edit Your Profile Details Here</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">

                            <?php
                            $Tid=$_SESSION['id'];
                            require("php/connect.php");

                            echo "<h3>Profile
                            <a href='profilechange.php'>
                            <button class='btn btn-danger float-right' name='login-form-submit'>Edit Profile</button>
                            </a>
                            </h3><br>
                            <h5>Username : $Tid";
                            $sql= mysqli_query($conn,"SELECT * from teacher where `Tid` = '$Tid'");
                            $row = mysqli_fetch_array($sql);
                            // print_r($row);
                            echo "<br><br>Name : $row[Fname] $row[Lname]<br><br>Email: $row[Email]<br><br>Position: $row[Position]";
                            $sql= mysqli_query($conn,"SELECT * from department where `Did` = '$row[Dept]'");
                            $row = mysqli_fetch_array($sql);
                    
                            echo "<br><br>Department : $row[DName] </h5>";
                            $sql= mysqli_query($conn,"SELECT * from subjects where `Tid` = '$Tid'");
                            echo "<br><br><h3>Subjects
                            <a href='edit_subjects.php'><button class='btn btn-info float-right' name='login-form-submit'>Edit Subjects</button></a></h3><br>
                            <table style='width:100%' class='table'>
                                    <thead class='thead-dark'>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Credit</th>
                                            <th>Semester</th>
                                            <th>Department</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                            if (mysqli_num_rows($sql)>0)
                                {
                                    while ($row = mysqli_fetch_array($sql)){
                                        echo "<tr><th>$row[Sid] </th> <th>$row[Sname]</th> <th>$row[Credits]</th> <th>$row[Sem]</th>";
                                        $sql1= mysqli_query($conn,"SELECT * from department where `Did` = '$row[Dept]'");
                                        $row1 = mysqli_fetch_array($sql1);
                                        echo "<th>$row1[DName]</th>";
                                    }
                                }
                                echo "</tbody></table>";




                               ?>
                                
                           

                            </div>
                        </div>
                    </div>
                </div>
<br/>
<br/>
</body>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</html>
