<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta charset="UTF-8">
    <title>Consumption</title>
</head>

<body>
    <?php
//error_reporting(0);
//ini_set('display_errors', 0);
    session_start();
    if($_SESSION["role"]!="admin")
    {
        header("location:php/autologin.php");
    }
?>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/multiple-select.css">
        <script src="js/jquery.js"></script>
        <script src="js/multiple-select.js"></script>

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
                        <a href=new_student1.php class="nav-link">Student Details</a>
                    </li> -->

                    <li class="nav-item">
                        <a href=consumption.php class="nav-link active">New Attendance</a>
                    </li>
                    <!-- <li class="nav-item">
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
                <h1 class="display-3">New Attendance</h1>
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
                                        <button onclick="senddata();" id="submit" class="btn btn-success success">Submit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form onsubmit=" event.preventDefault(); validate();" id="data_form" action="ctable.php" method="post">
                            <div class='form-group'>
                                <!--b>Select Hostel</b><br/>
<select name="hostel">
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
</select-->
                                <p>Date:
                                    <input type="text" id="datepicker" name="date" required>
                                </p>
                                <b>Select the Student Room Number or Admission No</b>
                                <br/>
                                <script>
                                    $("select").multipleSelect({

                                        filter: true,
                                        single: true,
                                        width: '100%'
                                    });
                                </script>
                                <select multiple="multiple" name="roll_no[]" id="roll_no" required>

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
$sql3 = mysqli_query($conn, "SELECT * From student ORDER BY room ASC");
$row = mysqli_num_rows($sql3);

while ($row = mysqli_fetch_array($sql3)){
echo "<option value='".$row['rollno']."'>\t".$row['room']." - ".$row['name']."</option>" ;
}
echo "</select>";
?>
                                        <br/>
                                        <br/>
                                        <b>Enter the quantity consumed</b>

                                        <input type="number" name="quantity" class="form-control" required>
                                        <br/>
                                        <br/>
                                        <!--input type="submit" value="Submit" class='btn btn-primary' id="getSelectsBtn" -->
                                        <input type="submit" name="btn" value="Submit" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-primary" />
                                        <!--input type="button" name="btn" value="Submit" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-default" /-->

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

    //$("#getSelectsBtn").click(function(event){
    //  event.preventDefault();
    //var searchIDs = $("#roll_no option:selected").map(function(){
    //return $(this).text();
    //}).get(); // <----
    //console.log(searchIDs);
    //alert(searchIDs);
    //var itemname = document.getElementById("item");
    //var strUser = itemname.options[itemname.selectedIndex].value;
    //return confirm('Selected item is '+strUser+'     Selected roll numbers are '+searchIDs+'. Submit the bill?');
    //});
    function validate(form) {

        // validation code here ...

        //event.preventDefault();
        var searchIDs = $("#roll_no option:selected").map(function() {
            return $(this).text();
        }).get(); // <----
        console.log(searchIDs);
        //alert(searchIDs);
        var itemname = document.getElementById("item");
        var strUser = itemname.options[itemname.selectedIndex].value;
        console.log(strUser);

        var html2 = "<br/><h5>Item name is " + strUser + "</h5><br/><table  class='table'><th>Name of students</th>";
        for (var i = 0; i < searchIDs.length; i++) {
            html2 += "<tr>";
            html2 += "<td>" + searchIDs[i] + "</td>";
            html2 += "</tr>";

        }
        html2 += "</table>";
        document.getElementById("modal_content").innerHTML = html2;
        //$('#confirm-submit').modal('show');
        $("#submitBtn").click()

        //document.getElementById("modal_content").innerHTML=
        //return false;
        //return confirm('Selected item is '+strUser+'     Selected roll numbers are '+searchIDs+'. Submit the bill?');

        //return confirm('Do you really want to submit the form?');

    }

    //send data
    function senddata() {

        //alert("hii");
        document.getElementById("data_form").submit(); // Form submission
    }
</script>

<script>
    $("select").multipleSelect({
        filter: true,
        position: 'top',
        width: '100%'
    });
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
