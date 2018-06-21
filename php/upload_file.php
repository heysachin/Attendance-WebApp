<?php
    session_start();
    if($_SESSION["role"]!="admin")
    {
        header("location:php/autologin1.php");
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload</title>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.3/sweetalert2.all.min.js"></script>
</head>
<body>
<?php
$csvformat = array(
    'text/csv',
    'text/plain',
    'application/csv',
    'text/comma-separated-values',
    'application/excel',
    'application/vnd.ms-excel',
    'application/vnd.msexcel',
    'text/anytext',
    'application/octet-stream',
    'application/txt',
);


 define ("filesplace","./studentdata");
 if (is_uploaded_file($_FILES['data']['tmp_name']))
 {
    if (!(in_array($_FILES['data']['type'],$csvformat)))
    {

        echo "<script>
                  swal(
                  'Error',
                  'Data must be in CSV Format',
                  'error'
                    ).then(function() {
                window.location.href ='uploaddetails.php'; 
              });
                </script>";
    } 
    else
    {
        $name = substr(md5(mt_rand()), 0, 7);
        $result = move_uploaded_file($_FILES['data']['tmp_name'], filesplace."/$name.csv");
        $file = fopen("studentdata/$name.csv","r");
        $flag=0;
        while(!feof($file))
        {
            $data=fgetcsv($file);
            if($flag!=0 && $data["0"]!="" && $data["1"]!="" && $data["2"]!="" && $data["3"]!="" && $data["4"]!="" && $data["8"]!="")
            { 
              $Fname=$data["0"];
              $Lname=$data["1"];
              $StudId=$data["2"];
              $Sem=$data["3"];
              $Dept=$data["4"];
              $Address=$data["5"];
              $Email=$data["6"];
              $Phone=$data["7"];
              $Password=$data["8"];
                require("connect.php");
                $sql="INSERT into student values('$Fname', '$Lname', '$StudId', $Sem, $Dept, '$Address', '$Email', '$Phone', '$Password')";
                $conn->query($sql);
                echo mysqli_error($conn);
            }
            $flag=$flag+1;
        }
        fclose($file);
        unlink("studentdata/".$name.".csv");
              echo "<script>
                  swal(
                  'Success',
                  'Data Uploaded',
                  'success'
                    ).then(function() {
                window.location.href ='../studentsList.php'; 
              });
                </script>";
    }
} 
else
{
    echo "Unauthorized access";
}
?>
</body>
</html>



