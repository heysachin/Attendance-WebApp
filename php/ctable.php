<?php
session_start();
require("connect.php");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sub=$_POST["subject"];
$date=$_POST["date"];
$Tid=$_SESSION['id'];

$sql = "select st.StudId as SID from student st,subjects sb where st.Sem=sb.Sem and st.Dept=sb.Dept and sb.SIndex LIKE '$sub'";
if (isset($_POST['StudId'])) {
  $StudId=$_POST['StudId'];
}else{
$StudId=[];
}
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
  $SID=$row['SID'];

  $sql2="select * from attendance where SIndex = '$sub' and StudId = '$SID' and date = '$date' ";
  $result2 = $conn->query($sql2);
  if (mysqli_num_rows($result2)==0){

    if (in_array($SID, $StudId)){

      $sql="insert into attendance values('$sub','$SID',1,1,'$date')";
      $conn->query($sql);
      echo mysqli_error($conn);
    }else {
      $sql="insert into attendance values('$sub','$SID',1,0,'$date')";
      $conn->query($sql);
      echo mysqli_error($conn);
    }
  } else{
      if (in_array($SID, $StudId)){
        $sql3="UPDATE attendance
        SET Total = Total + 1, Missed=Missed+1
        where SIndex = '$sub' and StudId = '$SID' and date = '$date'";
        $conn->query($sql3);
        echo mysqli_error($conn);
      }else{
        $sql3="UPDATE attendance
        SET Total = Total + 1
        where SIndex = '$sub' and StudId = '$SID' and date = '$date'";
        $conn->query($sql3);
        echo mysqli_error($conn);
      }
  }
}

$conn->close();
header('Location: ../attendance.php');
?>
