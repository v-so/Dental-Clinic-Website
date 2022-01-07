<?php
include("db.php");
include("session.php");


    if(isset($_REQUEST['update'])){
                $selected_onTime = "";
                $selected_paid = "";
                $selected_time = $_REQUEST["AppointmentTime"];
                $dateTime = explode("T",$selected_time);
                $dateTimeToSend = $dateTime[0]." ".$dateTime[1];

                if (isset($_REQUEST["paid"])) {

                        $selected_paid = "T";
                }
                else{
                        $selected_paid = "F";
                }
                if (isset($_REQUEST["onTime"])) {

                         $selected_onTime = "T";
                }
                else{
                $selected_onTime = "F";
                }
                $id2 = $_REQUEST["hidden-id"];
                $queryUpdate = "update visit set date = '$dateTimeToSend',onTime = '$selected_onTime' where id='$id2'";
                $queryUpdate2 = "update bill set paid = '$selected_paid' where visitId = '$id2'";
                $db->query($queryUpdate);
                $db->query($queryUpdate2);




        }

        $id = $_GET['id'];
        $date = "";
        $paid = "";
        $onTime = "";
        $query = "select date,onTime,paid from visit join bill on bill.visitId = visit.id where visit.id='$id'";
        $result = $db->query($query);
        if ($result->num_rows > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                        $date = $row['date'];
                        $date = str_replace(' ', 'T', $date);
                        $onTime = $row['onTime'];
                        $paid = $row['paid'];
                }
        }


?>

<html>

<head>
<title>Update appointment</title>
</head>
<body>
<form action="">
<input type="hidden" id="hidden-id" name="hidden-id" value="<?php echo $id;?>">
<label>Paid?</label>
<?php
        if($paid == "T"){
                ?> <input type="checkbox" id="paid" name="paid" value="paid" checked></br></br<>
                   <input type="hidden" id="paid-hidden" name="paid-hidden" value="T">
                <?php
        }else{
                 ?> <input type="checkbox" id="paid" name="paid" value="paid"></br></br<>
                    <input type="hidden" id="paid-hidden" name="paid-hidden" value="F">

                <?php
        }

?>

<label>On time?</label>
<?php
        if($onTime == "T"){
                ?> <input type="checkbox" id="onTime" name="onTime" value="onTime" checked></br></br<>
                <input type="hidden" id="onTime-hidden" name="onTime-hidden" value="T">
                <?php
        }else{
                 ?> <input type="checkbox" id="onTime" name="onTime" value="onTime"></br></br<>
                    <input type="hidden" id="onTime-hidden" name="onTime-hidden" value="F">
                <?php
        }

?>
<label>Appointment time</label>
<input type="datetime-local" id="appointmentTime" name="AppointmentTime" value="<?php echo $date;?>" required></br></br>
<br/><br/>
<input type="submit" name="update" value="Update appointment"/ >
</form>

</body>
</html>

