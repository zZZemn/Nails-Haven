<?php
    include "database.php";
    $id=$_GET['id'];
    $sql = " DELETE FROM cancel_appointment WHERE id='$id'";
    mysqli_query($mysqli, $sql);
    echo $id;
    header("location:cancelled.php");