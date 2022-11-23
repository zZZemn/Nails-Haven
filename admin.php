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
</head>
<body>
    <?php if (isset($user)): ?>
        <nav>
            <a href="#" class="name"><?= htmlspecialchars($user["name"]) ?></a>
            <ul>
                <li><a href="#"></a></li>
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