<?php
    $id = $_GET['id'];
    $mysqli = require __DIR__ . "/database.php";
    $sql = "SELECT * FROM reservation WHERE id = $id";
    $result = $mysqli->query($sql);
    $client = $result->fetch_assoc();

    $time = $client['app_time'];
    $mod_time = substr($time,0,5);
    ?>

<html>
    <head>
        <Title>Edit: <?=$client['f_name']?></Title>
    </head>
    <body>
        <form action="">
            <table border="1">
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
                    <td colspan="3">
                        <input type="text" name="adress" id="address" value="<?=$client['address']?>">
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
        </form>
    </body>
</html>