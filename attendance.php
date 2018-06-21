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
    <title>Add Attendance</title>


    <script>
function stud_suggestion()
{
var SIndex = document.getElementById("sub_select").value;
var xhr;
 if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) { // IE 8 and older
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
var data = "subject=" + SIndex;
     xhr.open("POST", "php/std-att-suggest.php", true); 
     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
     xhr.send(data);
     xhr.onreadystatechange = display_data;
    function display_data() {
     if (xhr.readyState == 4) {
      if (xhr.status == 200) {
       //alert(xhr.responseText);      
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
        <link rel="stylesheet" href="css/multiple-select.css">
        <script src="js/jquery.js"></script>
        <script src="js/multiple-select.js"></script>

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
                        <a href=attendance.php class="nav-link active">New Attendance</a>
                    </li>
                    <li class="nav-item">
                        <a href=internals.php class="nav-link ">Add Internals</a>
                    </li>
                    <li class="nav-item">
                        <a href=studentsList.php class="nav-link">View Students List</a>
                    </li>
                    <li class="nav-item">
                        <a href=report.php class="nav-link">View Report</a>
                    </li>
                    <li class="nav-item">
                        <a href=profile.php class="nav-link ">Profile</a>
                    </li>
                    <li class="nav-item ">
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
                <h3 class="display-4">New Attendance</h3>
                <p class="lead">You can Add the Attendance details here</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">

                        <div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        Confirm Submit
                                    </div>
                                    <div class="modal-body">
                                        Are you sure to submit the following Absentees details?
                                        <div id="modal_content">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <button onclick="senddata();" id="submit" class="btn btn-success success">Upload</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form onsubmit=" event.preventDefault(); validate();" id="data_form" action="php/ctable.php" method="post">
                            <div class='form-group'>
                              <?php
                                echo "<br/><div class='alert alert-secondary' role='alert'>Name: ".$_SESSION["name"]."</div>";
                                $date1 = date("d-m-Y", time());

                                echo "<p><b>Date<font color='red'>*</font> </b> <input type='text' id='datepicker' name='date' class='form-control' value = $date1 required></p>";
                                ?>
                                <b>Select the Subject<font color='red'>*</font></b>
                                <?php
                                require("php/connect.php");

                                // Check connection
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }
                                else
                                {
                                //echo "connected";

                                }

                                echo "<select class='form-control' name='subject' id='sub_select' onchange='stud_suggestion()' required>

                                    <option>Select a Subject</option>";
                                $SID=$_SESSION['id'];
                                $sql2 = mysqli_query($conn, "SELECT * From subjects WHERE Tid = '$SID'");
                                $row = mysqli_num_rows($sql2);

                                while ($row = mysqli_fetch_array($sql2)){
                                echo "<option value='".$row['SIndex']."'>\t".$row['Sid']." - ".$row['Sname']."</option>" ;
                                 }

                                ?>
                                </select>
                                 <div id="students"></div>
                                <br/>
                                <input type="submit" name="btn" value="Submit" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-primary btn-lg btn-block" />
                            </div>
                        </form>
</body>

<!-- validation function-->
<script>
    $('#submitBtn').click(function() {
        /* when the button in the form, display the entered values in the modal */
        $('#lname').text($('#lastname').val());
        $('#fname').text($('#firstname').val());
    });

    $('#submit').click(function() {
        /* when the submit button in the modal is clicked, submit the form */
        //alert('submitting');
        //$('#data_form').submit();
    });

    function validate(form) {

        // validation code here ...

        //event.preventDefault();
        var searchIDs = $("#StudId option:selected").map(function() {
            return $(this).text();
        }).get(); // <----
        console.log(searchIDs);
        //alert(searchIDs);
        var itemname = document.getElementById("StudId");
        var strUser = itemname.options[itemname.selectedIndex].value;
        console.log(strUser);

        var html2 = "<table  class='table'><th>Name of Absentees</th>";
        for (var i = 0; i < searchIDs.length; i++) {
            html2 += "<tr>";
            html2 += "<td>" + searchIDs[i] + "</td>";
            html2 += "</tr>";

        }
        html2 += "</table>";
        document.getElementById("modal_content").innerHTML = html2;
        $("#submitBtn").click()

    }

    //send data
    function senddata() {

        //alert("hii");
        document.getElementById("data_form").submit(); // Form submission
    }
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function() {
        var date = $('#datepicker').datepicker({
            dateFormat: 'dd-mm-yy'
        }).val();
        $("#datepicker").datepicker();

    });
</script>

</html>
