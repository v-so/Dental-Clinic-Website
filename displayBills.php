<?php
include("db.php");
include("session.php");
include("header.php");

$sql = "select b.id, p.name as patientname, b.paid, t.cost, t.duration, t.name as treatmentname, v.date, v.dentistId, b.paid
                from bill b, treatment t, visit v, patients p, bill_treatment bt, treatment_visit tv
                where b.patientId = p.id and b.visitId = v.id and
                                bt.treatmentId = t.id and bt.billId = b.id and
                                tv.treatmentId = t.id and tv.visitId = v.id";

 $result = $db->query($sql);
        echo "<h1>List of all Bills</h1>";

        echo "<table id = 'tableInfo' border=1>
                        <tr>
                                <th>Bill</th>
                                <th>Patient</th>
                                <th>Paid</th>
                                <th>Cost</th>
                                <th>Duration</th>
                                <th>Threatment</th>
                                <th>Date</th>
                                <th>DentistId</th>
                        </tr>";

        if ($result->num_rows > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                        $billid = $row['id'];
                        $patientname = $row['patientname'];
                        $paid = $row['paid'];
                        $cost = $row['cost'];
                        $duration = $row['duration'];
                        $treatmentname = $row['treatmentname'];
                        $date = $row['date'];
                        $dentistId = $row['dentistId'];
                                                $paid = $row['paid'];
                                                $id = $row['id'];

                                                if ($paid == 'T')
                                                {
                                                        $color = 'blue';
                                                }
                                                else
                                                {
                                                        $color = 'red';
                                                }

                                                echo (
                                                        "<tr style='color:".$color."'>".
                                                                "<td>".$billid."</td>".
                                                                "<td>".$patientname."</td>".
                                                                "<td>".$paid."</td>".
                                                                "<td>".$cost."</td>".
                                                                "<td>".$duration."</td>".
                                                                "<td>".$treatmentname."</td>".
                                                                "<td>".$date."</td>".
                                                                "<td>".$dentistId."</td>".
                                                        "</tr>");
                                                }
                }
        echo "</table>";

?>



<html>

<head>
<title> Bills </title>
<link rel="stylesheet" type="text/css" href="cssWebsite.php"/>
</head>


</html>
