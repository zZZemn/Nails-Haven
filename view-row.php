<?php
    include "database.php";
    $id=$_GET['id'];
    $sql = "SELECT * FROM reservation WHERE id='$id'";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();

    $time = $user['app_time'];
    $mod_time = substr($time,0,5); 
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $user['f_name']." ".$user['l_name']?></title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="view-row.css">
</head>
<body>
    <img src="img/logo.png" alt="logo" class="logo">
    <div class="table-container">
        <table>
            <tr>
                <td class="client" colspan="4">Client</td>
            </tr>
            <tr>
                <td>ID Number:</td>
                <td colspan="2" class="id"><?=$user['id'] ?></td>
                <td rowspan="5"><img class="valid-id" src="img/<?= $user['valid_ID']?>" alt="Valid-ID"></td>
            </tr>
            <tr>
                <td>Name:</td>
                <td colspan="2"><?=$user['f_name']." ".$user['l_name']?></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td colspan="2"><?=$user['address']?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td colspan="2"><?=$user['email']?></td>
            </tr>
            <tr>
                <td>Contact Number:</td>
                <td colspan="2"><?=$user['contact_no']?></td>
            </tr>
            <tr>
                <td class="appointment" colspan="4">Appointment</td>
            </tr>
            <tr>
                <td>Time:</td>
                <td colspan="2"><?=$mod_time?></td>
                <td class="receipt" rowspan="4"><img src="img/<?= $user['receipt']?>" alt="Valid-ID"></td>
            </tr>
            <tr>
                <td>Date:</td>
                <td colspan="2"><?=$user['app_date']?></td>
            </tr>
            <tr>
                <td>Reference Number:</td>
                <td colspan="2"><?=$user['ref_num']?></td>
            </tr>
            <tr class="btn">
                <td class="backtd"><a class="back" href='admin.php'>Go Back</a></td>
                <td class="edittd"><a class="edit" href='delete-row.php?id=".<?=$user['id']?>."'>Edit</a></td>
                <td class="deltd"><a class="delete" href='delete-row.php?id=".<?=$user['id']?>."'>Delete</a></td>
            </tr>
        </table>
    </div>
</body>
</html>