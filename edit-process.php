<?php
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
            $sql = "UPDATE `reservation` SET `f_name`='$fname',`l_name`='$lname',`email`='$email',
            `contact_no`='$contact',`address`='$address', `app_date`='$app_date',`app_time`='$app_time' 
            WHERE id = $id";

            //updating
            $updating = mysqli_query($mysqli, $sql);

            header("location: view-row.php?id=$id");
        }