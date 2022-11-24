<?php 

session_start();

if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM admin
            WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="admin-nav.css">
    <link rel="stylesheet" href="current-reservation.css">
</head>
<body>
    <?php if (isset($user)): ?>
        <nav>
            <img src="img/logo.png" alt="Nails Haven">
            <ul>
                <li><a href="admin-profile.php" class="name"><?= htmlspecialchars($user["name"]) ?></a></li>
                <li><a href="admin.php" class="Current-Reservation">Current Reservation</a></li>
                <li><a href="#">Reservation Archive</a></li>
                <li><a href="#">Inventory</a></li>
                <li><a href="#">Sales</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>


    <?php else: ?>
        <div class="noacc">
            <h1>No account selected</h1>
            <p class="ls"><a href="index.php">Log in</a> or <a href="signup.html">sign up</a></p>
        </div>
    <?php endif; ?>
    
</body>
</html>