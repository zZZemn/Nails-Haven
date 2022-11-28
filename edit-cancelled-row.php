<?php
    session_start();

    if (isset($_SESSION["user_id"])){
        $id = $_GET['id'];
        $mysqli = require __DIR__ . "/database.php";
        $sql = "SELECT * FROM cancel_appointment WHERE id = $id";
        $result = $mysqli->query($sql);
        $client = $result->fetch_assoc();

        $time = $client['app_time'];
        $mod_time = substr($time,0,5);
    }
?>

<html>
    <head>
        <Title>Edit: <?=$client['f_name']?>"</Title>
        <link rel="stylesheet" href="edit-row.css">
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    </head>
        <body>
            <div class="table-container">
                <a class="back" href='view-cancelled-row.php?id=<?=$client['id']?>'><ion-icon name="close-outline"></ion-icon></a>
                <form name="frmEdit" method="POST" action="edit-cancelled-process.php">
                    <table>
                            <tr>
                                <td class="edit" colspan="4">Edit</td>
                            </tr>
                            <tr>
                            <td>
                                <h4>ID:</h4>
                            </td>
                            <td>
                                <h4><input type="text" name="id" id="id" readonly value="<?=$client['id']?>"></h4>
                            </td>
                            <td>
                                <h4>Reference Number: </h4>
                            </td>
                            <td>
                                <h4><?=$client['ref_num']?></h4>
                            </td>
                            </tr>
                            <tr>
                            <td>
                                <label for="f_name">First Name: </label>
                            </td>
                            <td>
                            <input type="text" name="f_name" id="f_name" value="<?=$client['f_name']?>">
                            </td>
                            <td>
                                <label for="l_name">Last Name: </label>
                            </td>
                            <td>
                                <input type="text" name="l_name" id="l_name" value="<?=$client['l_name']?>">
                            </td>
                            </tr>
                            <tr>
                            <td>
                                <label for="address">Address: </label>
                            </td>
                            <td class="add" colspan="3">
                                <input type="text" name="address" id="address" value="<?=$client['address']?>">
                            </td>
                            </tr>
                            <tr>
                            <td>
                                <label for="email">Email: </label>
                            </td>
                            <td>
                                <input type="email" name="email" id="email" value="<?=$client['email']?>">
                            </td>
                            <td>
                                <label for="contact">Contact #: </label>
                            </td>
                                <td>
                                <input type="text" name="contact" id="contact" value="<?=$client['contact_no']?>">
                            </td>
                            </tr>
                            <tr>
                            <td>
                                <label for="date">Appointment Date: </label>
                            </td>
                            <td>
                                <input type="date" name="date" id="date" value="<?=$client['app_date']?>">
                            </td>
                            <td>
                                <label for="time">Appointment Time: </label>
                            </td>
                            <td>
                                <input type="time" name="time" id="time" value="<?=$mod_time?>">
                            </td>
                            </tr>
                    </table>
                    <input type="submit" class="btn" name="save" value="Save">
                </form>
            </div>
        </body>
</html>
