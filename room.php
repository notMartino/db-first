<!DOCTYPE html>
<html lang="it" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Detail</title>

    <!-- Local links -->
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <header>
        
    </header>
    <main>
        <ul>
            <li class="btn">
                <a href="/index.php">Back</a>
            </li>
            <?php 
                require_once('data.php');
                $connection = startConncetion();

                $roomId = $_GET['roomId'];
                $query = 'SELECT room_number, id, stanze.floor, beds, DATE(created_at) FROM stanze WHERE id = ' . $roomId;

               

                $stmt = $connection -> prepare($query);
                $stmt -> execute();
                $stmt -> bind_result($roomNumber, $roomId, $floor, $beds, $date);

                $stmt -> fetch();
                        
                echo
                    '<li>
                        <ul>
                            <li>
                                <h3>
                                    Room: #' . $roomNumber
                                . '</h3>
                            </li>
                            <li>
                                Id: ' . $roomId
                            . '</li>
                            <li>
                                Beds: ' . $beds
                            . '</li>
                            <li>
                                Floor: ' . $floor
                            . '</li>
                            <li>
                                Created: ' . $date
                            . '</li>
                        </ul>
                    </li>'; 

                closeConn($stmt, $connection);
            ?>
       </ul>
    </main>
</body>
</html>