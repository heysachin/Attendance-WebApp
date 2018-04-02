

<?php

require("connect.php");
$sub = $_POST['subject'];
$sql = "select st.Fname FN,st.Lname LN, sb.Sid ,st.StudId from student st,subjects sb where st.Sem=sb.Sem and st.Dept=sb.Dept and sb.Sid LIKE '$sub'";
$result = $conn->query($sql);


if (mysqli_num_rows($result)!=0){
echo "
<table style='width:100%' class='table'>
    <thead class='thead-dark'>
        <tr>
            <th>Name</th>
            <th>Internals</th>
        </tr>
    </thead>
    <tbody>";
while($row=$result->fetch_assoc())
{

        echo "<tr>
                <td>" .$row["FN"]. " " . $row["LN"]. "</td>
                <td><input type = 'number' name='marks[]'></td>
            </tr>
        <br>" ;

}
  echo "</tbody></table>";
}
$conn->close();

?>
