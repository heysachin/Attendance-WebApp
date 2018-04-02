<?php

require("connect.php");

$sub = $_POST['subject'];
$sql = "select st.Fname FN,st.Lname LN, sb.Sid ,st.StudId from student st,subjects sb where st.Sem=sb.Sem and st.Dept=sb.Dept and sb.Sid LIKE '$sub'";
$result = $conn->query($sql);
print_r($_POST);
$i=0;
$m=$_POST['marks'];

foreach ($_POST['marks'] as $mark){

$row=$result->fetch_assoc();
$sql1="INSERT INTO internals VALUES('$_POST[subject]','$row[StudId]','$_POST[date]','$_POST[internal_select]',$mark) ";
$i++;
mysqli_query($conn,$sql1);
echo mysqli_error($conn);
}


?>


