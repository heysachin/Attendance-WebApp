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
    <title>Edit Attendance</title>

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
                        <a href=report.php class="nav-link active">View Report</a>
                    </li>
                    <li class="nav-item">
                        <a href=profile.php class="nav-link">Profile</a>
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
                <h3 class="display-4">Edit Attendance</h3>
                <p class="lead">Edit The Attendance Details Here</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="report.php">View Report</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Attendance</li>
                      </ol>
                    </nav>
                            <?php
                            require("php/connect.php");
                            $Tid=$_SESSION['id'];
                            $StudId=$_GET['StudId'];
                            $SIndex=$_GET['SIndex'];
                            $sql2 = mysqli_query($conn, "SELECT * From attendance WHERE StudId = '$StudId' and SIndex=$SIndex");
                            echo "<table style='width:100%' class='table'>
                                    <thead class='thead-dark'>
                                        <th>Date</th>
                                        <th>Missed</th>
                                        <th>Total</th>
                                        <th>Submit</th>
                                    </thead>";
                            while ($row2 = mysqli_fetch_array($sql2)) {
                                
                            echo "<form role='form' action='php/edit_attendance.php?StudId=$StudId&SIndex=$SIndex&Date=$row2[Date]' method='post' class='login-form'><br/>
                            
                            <tr>
                                    <td><input class='form-control' type='text' disabled name='Date' value='$row2[Date]'></td>
                                    <td>
                                        <select class='form-control' name = 'Missed'>";
                                for ($i=0; $i <=$row2['Total'] ; $i++) { 
                                    if ($i==$row2['Missed']) {
                                    echo "<option selected='selected' value='$i'>$i</option>";
                                    }
                                    else{
                                    echo "<option value='$i'>$i</option>";
                                    }
                                }

                            echo "</select>
                                    <td><input class='form-control' type='text' disabled name='Total' value='$row2[Total]'></td>
                                    <td><button type='submit' class='btn btn-danger'>Submit</button></a></td>
                                    </form>
                                </tr>";
                            }
                            echo "
                            </table>
                                </form>";
                               ?></h5>
                           

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