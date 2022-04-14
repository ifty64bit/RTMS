<?php include("../controller/ViewDriver.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./global.css">
    <title>Details</title>
</head>
<body>
    <?php include("./components/Header.php") ?>
    <section class="mt flex-center">
        <table class="table-border blur-bg">
            <tr>
                <td>First Name:</td>
                <td><?php echo $fname ?></td>
                <td>Last Name:</td>
                <td><?php echo $lname ?></td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td><?php echo $phone ?></td>
                <td>Address:</td>
                <td><?php echo $address ?></td>
            </tr>
            <tr>
                <td>Vehicle Number:</td>
                <td><?php echo $vehicleNumber ?></td>
                <td>Licence Number:</td>
                <td><?php echo $licence ?></td>
            </tr>
            <tr>
                <td colspan="1">Status</td>
                <td colspan="2">
                    <select name="status" id="status">
                        <option value="ok" <?php echo $status=="ok"?'selected':'' ?>>OK</option>
                        <option value="suspect" <?php echo $status=="suspect"?'selected':'' ?>>Suspected</option>
                        <option value="wanted" <?php echo $status=="wanted"?'selected':'' ?>>Wanted</option>
                        <option value="mostWanted" <?php echo $status=="mostWanted"?'selected':'' ?>>Most Wanted</option>
                    </select>
                </td>
                <td>
                    <button class="btn" onclick="updateStatus(this)">Update</button>
                </td>
            </tr>
            <?php
                if(count($r)>0){
                    for($i=0; $i< count($r); $i++)
                    {
                        echo "
                            <tr>
                            <td>". $i+1 ."</td>
                            <td>".$r[$i]['offenceType']."</td>
                            <td>Offence Date:</td>
                            <td>".$r[$i]['fine']."</td>
                            </td>
                        ";
                    }
                }
                else{
                    echo "
                    <tr>
                    <td colspan='4' style='text-align: center;'>No Offence Yet</td>
                    </td>
                    ";
                }
            ?>
            <tr>
                <td colspan="">Add New Offence</td>
                <td><form action="" method="post">Reason: <input type="text" name="reason" id=""> <span><?php echo $reasonErr ?></span> </td>
                <td>Fine: <input type="text" name="fine" id=""> <span><?php echo $fineErr ?></span> </td>
                <td><input type="submit" name="add" class="btn btn-red" value="Add Offence"></form></td>
            </tr>
        </table>
    </section>
    <p id="driverID" style="display: none;"><?php echo $id ?></p>
</body>
<script>
    var select=document.getElementById("status");
    var driverID=document.getElementById("driverID").innerText;
    console.log(driverID);
    function updateStatus()
    {
        var status=select.options[select.selectedIndex].value
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(xhttp.responseText);
            }
        }
        xhttp.open("GET", `http://localhost/RTMS/controller/updateStatus.php?id=${driverID}&status=${status}`, true);
        xhttp.send();
    }
</script>
</html>