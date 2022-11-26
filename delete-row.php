<?php
include "database.php";
$str_del="DELETE FROM reservation WHERE (id=".$_POST['id'].")";
$result = mysqli_query($mysqli,$str_del) or die (mysql_error());
header("Location: admin.php");
?>