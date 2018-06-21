<?php 

$filename="../sample/student.csv";
$contenttype="application/force-download";
header("Content-Type:".$contenttype);
header("Content-Disposition: attachment; filename=\"" .basename($filename) . "\";");
readfile($filename);
exit();  

 ?>