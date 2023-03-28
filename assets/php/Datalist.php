<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Data List</title>

    <link rel="stylesheet" href="../css/table.css">
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>Number Of Row/s: 
                    <?php 
                        $database_connection = new PDO('mysql:host=localhost;dbname=e_logs', 'admin', 'admin');
                        $stmt = $database_connection->prepare('SELECT * FROM logs');
                        $stmt->execute();
                        $log_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        $rowcount = 0;
                        foreach($log_data as $logs) {
                            $rowcount++;
                        }
                        echo '<span>'.$rowcount.'</span>';
                    ?></th>
                <th>Name</th>
                <th>Transaction Type</th>
                <th>Timestamp</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $database_connection = new PDO('mysql:host=localhost;dbname=e_logs', 'admin', 'admin');

                $stmt = $database_connection->prepare('SELECT * FROM logs');
                $stmt->execute();

                $log_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach($log_data as $logs) {
                    echo '<tr>';
                        echo '<td>&nbsp;</td>';
                        echo '<td>'.$logs['first_name'].' '.$logs['middle_name'].' '.$logs['last_name'].'</td>';
                        echo '<td>'.$logs['type'].'</td>';
                        echo '<td>'.$logs['timestamp'].'</td>';
                        echo 
                        '<td><a href="../php/Delete-action.php?id='.$logs['id'].'">Delete</a> </td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</body>
</html>