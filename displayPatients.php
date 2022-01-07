<?php
include("db.php");
include("session.php");
include("header.php");

$sql = "Select * from patients";
 $result = $db->query($sql);
        echo "<h1>List of all patients</h1>";
        echo "<table id = 'tableInfo' border = 1; style = 'width: 90%'><tr><th>Email</th><th>Name</th><th>Sex</th><th>Address</th><th>View appointments</th></tr>";
        if ($result->num_rows > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                        $email = $row['email'];
                        $name = $row['name'];
                        $sex = $row['sex'];
                        $address = $row['address'];
                        $id = $row['id'];
                          echo (

                         "<tr>".
      "<td>".$email."</td>".
        "<td>".$name."</td>".
          "<td>".$sex."</td>".
         "<td>".$address."</td>".
        "</td><td> <form method='get' action='displayAppointments.php'><input type='hidden' name='id' value='$id'><input type='submit' name='display' value='Display Appointments'></form></td>".

        "</tr>");

                }
        }
        echo "</table>";

?>

<html>
<head>
<title></title>
  <link rel="stylesheet" type="text/css" href="cssWebsite.php"/>
</head>
</html>
