<?php
    session_start();
    if($_SESSION["role"]!="admin")
    {
        header("location:php/autologin1.php");
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta charset="UTF-8">
    <title>Edit Profile</title>

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
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="profile.php">Profile</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                      </ol>
                    </nav>
                            <?php
                            $Tid=$_SESSION['id'];
                            require("php/connect.php");
                            $sql= mysqli_query($conn,"SELECT * from teacher where `Tid` = '$Tid'");
                            $row = mysqli_fetch_array($sql);
                            echo "<form role='form' action='php/edit_profile.php' method='post' class='login-form'><br/><h5>Username <font color='red'>*</font> : <input type='text' class='form-control' id='username' name = 'username' value='$row[Tid]'required>";
                            echo "<br/>First name <font color='red'>*</font> : <input type='text' id='Fname' class='form-control' name = 'Fname' value='$row[Fname]'required>";
                            echo "<br/>Last name <font color='red'>*</font> : <input type='text' id='Lname' class='form-control' name = 'Lname' value='$row[Lname]'required>";
                            echo "<br/>Email : <input type='text' id='Email' class='form-control' name = 'Email' value='$row[Email]'>";
                            echo "<br/>Position : <input type='text' id='Position' class='form-control' name = 'Position' value='$row[Position]'>";
                            echo "<br/><h5>Department <font color='red'>*</font> : 
                                            <select class='form-control' name = 'dept'>
                                                <option value = '01'>Computer Science & Engineering</option>
                                                <option value = '02'>Civil Engineering</option>
                                                <option value = '03'>Electronics & Communications</option>
                                                <option value = '04'>Electrical & Electronics</option>
                                                <option value = '05'>Instrumentation & Communication</option>
                                                <option value = '06'>Mechanical Engineering</option>
                                            </select>";
                            echo "<br/>Current Password <font color='red'>*</font> : <input type='text' id='Current_Pass' class='form-control' name = 'old_pass'required>";
                            echo "<br/>New Password : <input type='text' id='New_Pass' class='form-control' name = 'new_pass' placeholder='Leave blank if want unchanged'><br>
                            

                                        <button class='btn btn-success btn-lg btn-block' id='edit-profile-form-submit' name='edit-profile-form-submit' value='Submit'>Submit</button>
                                </form>";
                               ?></h5><br>
                                <div class="alert alert-danger" role="alert">
                                    You'll be Logged Out! Please login with your new credentials
                                </div>
                           

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
