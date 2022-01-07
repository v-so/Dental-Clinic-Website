<?php
include('db.php');
if($_SERVER["REQUEST_METHOD"]== "POST"){

        $selected_patient = $_POST['patients'];
       //echo $selected_patient;
       $selected_clinic = $_POST['clinic'];
        //echo $selected_clinic;
        $selected_treatment = $_POST['treatment'];
        $total = 0;
        for($i = 0;$i<sizeof($selected_treatment);$i++){
        //echo $selected_treatment[$i];
        $queryTreatment = "select cost from treatment where id = $selected_treatment[$i]";
        $resultTreatment = $db->query($queryTreatment);
        if ($resultTreatment->num_rows > 0) {
                // output data of each row
                while($rowTreatment = mysqli_fetch_assoc($resultTreatment)) {
                        $total += $rowTreatment["cost"];
                }
        } else {
                echo "Oops! Nothing found.";
                }

        }

        $selected_time = $_POST['AppointmentTime'];
        $dateTime = explode("T",$selected_time);
        $dateTime[1] .=":00";
        $dateTimeToSend = $dateTime[0]." ".$dateTime[1];

        $query = "select id from employee where cId = '$selected_clinic' and role='dentist' order by rand() limit 1";
        $resultDentist = $db->query($query);

        if ($resultDentist->num_rows > 0) {
                // output data of each row
                while($rowDentist = mysqli_fetch_assoc($resultDentist)) {
                        $dentistId = $rowDentist["id"];
                        $queryInsertVisit = "insert into visit(date,duration,onTime,patientId,dentistId)values('$dateTimeToSend','120 minutes','T',$selected_patient,$dentistId)";
                        if($db->query($queryInsertVisit)=== TRUE){
                                $last_id = $db->insert_id;
                                $queryBill = "insert into bill (patientId,paid,visitId) values('$selected_patient','F',$last_id)";
                                if($db->query($queryBill) === True){
                                        $last_idBill = $db->insert_id;
                                        for($i = 0;$i<sizeof($selected_treatment);$i++){
                                                $queryBillTreatment = "insert into bill_treatment (treatmentId,billId) values($selected_treatment[$i],$last_idBill)";

                                                $db->query($queryBillTreatment);
                                                $queryVisitTreatment = "insert into treatment_visit (treatmentId,visitId) values($selected_treatment[$i],$last_id)";

                                                $db->query($queryVisitTreatment);
                                               //header('Location: homepage.php');
                                        }
                                }
                        }else{

                        }

//              echo $dentistId;
                }
        } else {
                echo "Oops! Nothing found.";
        }

}
?>



<html>
<head>
<title>Add appointment </title>
<link rel="stylesheet" type="text/css" href="cssWebsite.php"/>
</head>
<body>
<h1>Add an appointment</h1>
<div class = "form2">
<form action="" method="post">
<?php

 $sql = "SELECT * FROM patients";
$result = $db->query($sql);


$sql2 = "SELECT * FROM treatment";
$result2 = $db->query($sql2);

$sql3 = "SELECT * from clinic";
$result3 = $db->query($sql3);

?>
<label>Patient :</label>
<select id="patients" name="patients" required>
<?php
if ($result->num_rows > 0) {
  // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       ?> <option value="<?php echo $row['id']; ?>"><?php echo $row['name'];?></option> <?php
    }

}

?>
</select>
<br/><br/>
<label>Treatment : </label>
<select id="treatment" name="treatment[]" multiple required>
<?php
if ($result2->num_rows > 0) {
  // output data of each row
    while($row2 = mysqli_fetch_assoc($result2)) {
       ?> <option value="<?php echo $row2['id'];?>"><?php echo $row2['name'];?></option> <?php
    }

}
?>
</select>
<br/><br/>
<label>Clinic : </label>
<select id="clinic" name="clinic" required>
<?php
if ($result3->num_rows > 0) {
  // output data of each row
    while($row3 = mysqli_fetch_assoc($result3)) {
       ?> <option value="<?php echo $row3['id'];?>"><?php echo $row3['name'];?></option> <?php
    }

}

?>
</select><br/><br/>
<label>Appointment Time : </label>
<input type="datetime-local" id="appointmentTime" name="AppointmentTime" required>
<br/><br/>
<input type="submit" value="Create appointment"/>
</form>
</div>
</body>

</html>
