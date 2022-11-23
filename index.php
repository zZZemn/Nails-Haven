<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM admin
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: admin.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <img src="img/logo.png" alt="" class="image">
        <h1>ADMIN</h1>
        
        <?php if ($is_invalid): ?>
            <em>Wrong email or password!</em>
        <?php endif; ?>
        
        <form method="post">
            <div class="email">
                <h5>Email:</h5>
                <input type="email" name="email" id="email"
                value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
            </div>
            <div class="password">
                <h5>Password:</h5>
                <input type="password" name="password" id="password">
            </div>
            <button>Log in</button>
        </form>
        <a href="signup.html">Don't have an account? Sign Up</a>
    </div>
</body>
</html>