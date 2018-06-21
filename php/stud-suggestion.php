<?php
require("connect.php");
$sub = $_POST['subject'];
$sql = "select st.Fname FN,st.Lname LN, sb.SIndex ,st.StudId from student st,subjects sb where st.Sem=sb.Sem and st.Dept=sb.Dept and sb.SIndex LIKE '$sub'";
$result = $conn->query($sql);


if (mysqli_num_rows($result)!=0){
echo "<br>
<table style='width:100%' class='table'>
    <thead class='thead-dark'>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Internals</th>
        </tr>
    </thead>
    <tbody>";
    $i=1;
while($row=$result->fetch_assoc())
{

        echo "<tr>
                <td>$i</td>
                <td>" .$row["FN"]. " " . $row["LN"]. "</td>
                <td><input type = 'number' name='marks[]'></td>
            </tr>" ;
            $i+=1;

}
  echo "</tbody></table>
   <input type='submit' name='btn' value='Submit' id='submitBtn' data-toggle='modal' data-target='#confirm-submit' class='btn btn-primary btn-lg btn-block' />
   ";
}
$conn->close();

?>
