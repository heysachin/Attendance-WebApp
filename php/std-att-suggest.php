<?php
require("connect.php");
$sub = $_POST['subject'];
$sql = "select st.Fname FN,st.Lname LN, sb.Sid ,st.StudId SID from student st,subjects sb where st.Sem=sb.Sem and st.Dept=sb.Dept and sb.SIndex LIKE '$sub'";
$result = $conn->query($sql);


if (mysqli_num_rows($result)!=0){
echo "<br>
<table style='width:100%' class='table'>
    <thead class='thead-dark'>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Absent</th>
        </tr>
    </thead>
    <tbody>";
    $i=1;
while($row=$result->fetch_assoc())
{
$SID = $row['SID'];
        echo "<tr>
                <td>$i</td>
                <td>" .$row["FN"]. " " . $row["LN"]. "</td>
                <td><input value = '$SID' type = 'checkbox' name='StudId[]'></td>
            </tr>" ;
        $i+=1;

}
  echo "</tbody></table>";
}
$conn->close();

?>
