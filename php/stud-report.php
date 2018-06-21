<?php
require("connect.php");
$sub = $_POST['subject'];
$sql = "select st.Fname FN,st.Lname LN, sb.SIndex ,st.StudId from student st,subjects sb where st.Sem=sb.Sem and st.Dept=sb.Dept and sb.SIndex LIKE '$sub'";
$result = $conn->query($sql);
if (mysqli_num_rows($result)!=0){
echo "<br>
<h2>Attendance</h2>
<table style='width:100%' class='table'>
    <thead class='thead-dark'>
        <tr>
            <th>Name</th>
            <th>Total</th>
            <th>Missed</th>
            <th>Percentage</th>
        </tr>
    </thead>
    <tbody>";
while($row=$result->fetch_assoc())
{
        $SubID = $row["SIndex"];
        $StudId = $row["StudId"];
        $sql1 = "Select sum(Total) TC , sum(Missed) MC from attendance where SIndex = '$SubID' and StudId = '$StudId' ";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
            // output data of each row
            while($row1 = $result1->fetch_assoc()) {
                if ($row1["TC"]==0) {
                    $row1["TC"]=0;
                    $row1["MC"]=0;
                    $percent = 100;
                }else
                {
                $percent=($row1["TC"]-$row1["MC"])/$row1["TC"]*100;
                $percent=round($percent,2);

                }

        echo "<tr><td>" .$row["FN"]. " " . $row["LN"]. "<br><a href='edit_attendance.php?StudId=$StudId&SIndex=$sub&Total=$row1[TC]&Missed=$row1[MC]'>(Edit)</a></td><td>" . $row1["TC"]. "</td> <td>" . $row1["MC"]. "</td> <td>" . $percent. "%</td> </tr>" ;
            }
        }
}
  echo "</tbody></table>";
}

$sql = "select st.Fname FN,st.Lname LN, sb.SIndex ,st.StudId from student st,subjects sb where st.Sem=sb.Sem and st.Dept=sb.Dept and sb.SIndex LIKE '$sub'";
$result = $conn->query($sql);

if (mysqli_num_rows($result)!=0){
echo "<br>
<h2>Internal Marks</h2>
<table style='width:100%' class='table'>
    <thead class='thead-dark'>
        <tr>
            <th>Name</th>
            <th>1st</th>
            <th>2nd</th>
            <th>3rd</th>
            <th>Retest</th>
            <th>Top 2</th>
        </tr>
    </thead>
    <tbody>";
while($row=$result->fetch_assoc())
{
        $SubID = $row["SIndex"];
        $StudId = $row["StudId"];
        $sql1 = "Select * from internals where SIndex = '$SubID' and StudId = '$StudId' ";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
            // output data of each row
            while($row1 = $result1->fetch_assoc()) {

                $mark[0]= intval($row1["First"]);
                $mark[1]= intval($row1["Second"]);
                $mark[2]= intval($row1["Third"]);
                $mark[3]= intval($row1["Retest"]);
                echo "<tr><td>" .$row["FN"]. " " . $row["LN"]. "<br><a href='edit_internal.php?StudId=$StudId&SIndex=$sub'>(Edit)</a></td><td>" . $mark[0]. "</td> <td>" . $mark[1]. "</td><td>" . $mark[2]. "</td><td>" . $mark[3]. "</td>";
                sort($mark);
                $top2=$mark[2]+$mark[3];

                echo " <td>" . $top2. "</td></tr>" ;

            }
        }
}
  echo "</tbody></table>";
}
$conn->close();
?>