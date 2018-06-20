<?php
require("connect.php");
$sem = $_POST['sem'];
$dept = $_POST['dept'];
$sql = "select * from student where `Sem`=$sem and `Dept`=$dept";
$result = $conn->query($sql);
      echo mysqli_error($conn);

if (mysqli_num_rows($result)!=0){
echo "
<table style='width:100%' class='table'>
    <thead class='thead-dark'>
        <tr>
            <th>Name</th>
            <th>StudId</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
        </tr>
    </thead>
    <tbody>";
while($row=$result->fetch_assoc())
{

        echo "<tr>
                <td>" .$row["Fname"]. " " . $row["Lname"]. "</td>
                <td>$row[StudId]</td>
                <td>$row[Email]</td>
                <td>$row[Phone]</td>
                <td>$row[Address]</td>
            </tr>
        <br>" ;

}
  echo "</tbody></table>";
}
$conn->close();

?>
