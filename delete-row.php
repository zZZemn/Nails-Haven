<?php
    include "database.php";
    $id=$_GET['id'];
    $sql = " DELETE FROM reservation WHERE id='$id'";
    mysqli_query($mysqli, $sql);
    echo $id;
    header("location:admin.php");