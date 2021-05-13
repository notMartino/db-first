<!DOCTYPE html>
<html lang="it" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room List</title>

    <!-- Vue -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.x"></script> -->
    <!-- Axios -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/axios@0.21.1/dist/axios.min.js"></script> -->

    <!-- Local links -->
    <!-- <script src="js/script.js"></script> -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <main>
        <ul class="first">
            <?php
                require_once('data.php');
                $connection = startConncetion();

                $query = 'SELECT room_number, id FROM stanze';

                // var_dump($query); die();

                $stmt = $connection -> prepare($query);
                $stmt -> execute();
                $stmt -> bind_result($roomNumber, $roomId);

                while ($stmt -> fetch()) {
                    echo '<li>
                        <a href="room.php/?roomId=' . $roomId . '">Room: #' . $roomNumber . '
                    </li>'; 
                }

                closeConn($stmt, $connection);

            ?>
       </ul>
    </main>
</body>
</html>