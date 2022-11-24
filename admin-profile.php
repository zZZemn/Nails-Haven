<?php 

session_start();

if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM admin
            WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();

    $sql2 = "SELECT * FROM admin_information
            WHERE id = {$_SESSION["user_id"]}";
    $result2 = $mysqli->query($sql2);
    $user2 = $result2->fetch_assoc();
    }
?>


<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="admin-nav.css">
    <link rel="stylesheet" href="admin-profile.css">
</head>
<body>
    <?php if (isset($user)): ?>
        <nav>
            <img src="img/logo.png" alt="Nails Haven">
            <ul>
                <li><a href="admin-profile.php" class="name"><?= htmlspecialchars($user["name"]) ?></a></li>
                <li><a href="admin.php">Current Reservation</a></li>
                <li><a href="#">Reservation Archive</a></li>
                <li><a href="#">Inventory</a></li>
                <li><a href="#">Sales</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>
        <div class="admin-profile-content">
            <div class="first-row">
                <img src="img/Admin.png" alt="Admin">
                <div class="admin-name-container">
                    <h1><?= htmlspecialchars($user["name"]) ?></h1>  
                    <h5><?= htmlspecialchars($user2["position"]) ?></h5>
                </div>
            </div>
            <hr>
            <div class="second-row">
                <table>
                    <tr>
                        <td class="bold"><h4>Address:</h4></td>
                        <td><h5><?= htmlspecialchars($user2["address"]) ?></h5></td>
                        <td class="no-padd"><a href="#" class="edit"><img src="img/edit-icon.ico" alt="Edit"></a></td>
                    </tr>
                    <tr>
                        <td class="bold"><h4>Email:</h4></td>
                        <td colspan="2"><h5><?= htmlspecialchars($user["email"]) ?></h5></td>
                    </tr>
                    <tr>
                        <td class="bold"><h4>Contact No:</h4></td>
                        <td colspan="2"><h5><?= htmlspecialchars($user2["contact_no"]) ?><h5></td>
                    </tr>
                </table>
            </div>
        </div>

    <?php else: ?>
        <div class="noacc">
            <h1>No account selected</h1>
            <p class="ls"><a href="index.php">Log in</a> or <a href="signup.html">sign up</a></p>
        </div>
    <?php endif; ?>
    
</body>
</html>