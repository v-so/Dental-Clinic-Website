<?php
include("db.php");
include("session.php");
include("header.php");



$sql2 = "select *,count(visit.id) as total from visit where onTime='F' group by patientId";

$result2= $db->query($sql2);

 echo "<html>";
 echo("<head>");
 echo("<link rel='stylesheet' type='text/css' href='cssWebsite.php'/>");
  echo("</head>");

 echo "<h1>List of all missed appointments</h1>";
 echo "<table id = 'tableInfo' border=1>
                        <tr>
                                <th>Patient id</th>
                                <th>Number of missed appointments</th>
                        </tr>";



 if ($result2->num_rows > 0) {
        while($rows = mysqli_fetch_array($result2)){

                 echo "<tr><td>$rows[patientId]</td><td>$rows[total]</td></tr>";
                                                }
        }
 echo "</table>";
 echo "</html>";
?>

