<?php

include("session.php");
include("db.php");
include("header.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{

$sql = "SELECT *
from visit
where onTime='F'";

$result = $db->query($sql);

$set = true;

echo "<html>";

if($result->num_rows > 0){
  while($row=mysqli_fetch_assoc($result)){;
    if($_POST["pID"]=="$row[patientId]"){
      echo "<p><br>"."<br>"."$row[date]"."<br>"."$row[duration]"."<br>"."$row[dentistId]</p>";
     $set=false;
}
}
}

if($set){
echo "<p>You have no missed appointments!</p>";
}
}
echo "</html>";
?>
