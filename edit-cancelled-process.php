<?php
session_start();

if (isset($_SESSION["user_id"]))
    {
        include_once 'database.php';
        if(isset($_POST['save']))
            {
                $fname = $_POST['f_name'];
                $lname = $_POST['l_name'];
                $email = $_POST['email'];
                $contact = $_POST['contact'];
                $address = $_POST['address'];   
                $app_date = $_POST['date'];
                $app_time = $_POST['time'];
                $id = $_POST['id'];

                //query
                $sql = "UPDATE `cancel_appointment` SET `f_name`='$fname',`l_name`='$lname',`email`='$email',
                `contact_no`='$contact',`address`='$address', `app_date`='$app_date',`app_time`='$app_time' 
                WHERE id = $id";

                //updating
                $updating = mysqli_query($mysqli, $sql);

                header("location: view-cancelled-row.php?id=$id");
            }
    }
else {
    echo "<h1>Error</h1>";
}