<?php 

session_start();

if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM admin
            WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    
    $reservation = "SELECT * FROM reservation ORDER by app_date";
    $reservation_result = $mysqli->query($reservation);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Reservation</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="admin-nav.css">
    <link rel="stylesheet" href="current-reservation.css">
</head>
<body>
    <?php if (isset($user)): ?>
        <nav>
            <img src="img/logo.png" alt="Nails Haven">
            <ul>
                <li><a href="admin-profile.php" class="name"><?= htmlspecialchars($user['name']) ?></a></li>
                <li><a href="admin.php" class="Current-Reservation">Current Reservation</a></li>
                <li><a href="#">Reservation Archive</a></li>
                <li><a href="#">Inventory</a></li>
                <li><a href="#">Sales</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>
        <div class="reservation">
            <h1 class="app-title">Appointment</h1>
            <table>
                <tr class="table-head">
                    <td>ID</td>
                    <td>Name</td>
                    <td>Contact</td>
                    <td>Date</td>
                    <td>Time</td>
                    <td>Reference Number</td>
                    <td colspan="2">Action</td>
                </tr>

                <?php  if ($reservation_result->num_rows > 0) {
                            while($row = $reservation_result->fetch_assoc()) {
                                $time = $row['app_time'];
                                $mod_time = substr($time,0,5);
                                    echo "<tr>
                                            <td class="."userID".">".$row['id']."</td>
                                            <td>".$row['f_name']." ".$row['l_name']."</td>
                                            <td>".$row['contact_no']."</td>
                                            <td>".$row['app_date']."</td>
                                            <td>".$mod_time."</td>
                                            <td>".$row['ref_num']."</td>
                                            <td class="."btn"." style="."border-right:none".">
                                                <a href='view-row.php?id=".$row['id'].";?>'>View</a> 
                                            </td>
                                            <td class="."btn2"." style="."border-left:none".">
                                                <a href='delete-row.php?id=".$row['id'].";?>'>Delete</a> 
                                            </td>
                                            </tr>";
                            }
                        }           
                ?>
                
            </table>
        </div>


    <?php else: ?>
        <div class="noacc">
            <h1>No account selected</h1>
            <p class="ls"><a href="index.php">Log in</a> or <a href="signup.html">sign up</a></p>
        </div>
    <?php endif; ?>
    
</body>
</html>