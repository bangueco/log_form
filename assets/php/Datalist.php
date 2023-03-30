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
    <div class="center">
        <div class="table-container">
            <form class="search-container" action="Datalist.php" method="get">
                <label for="searchTable">Search on Table</label>
                <input type="search" name="search_table" id="searchTable">
                <button title="This search only the first name">Search</button>
                <a href="../../index.php">Return</a>
            </form>
            <table cellspacing="0">
                <thead>
                    <tr>
                        <th colspan = "100%">Number Of Row/s: 
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
                    </tr>
                    <tr class="log-infos">
                        <th>Name</th>
                        <th>Transaction Type</th>
                        <th>Timestamp</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $search_result = $_GET['search_table'];

                        $database_connection = new PDO('mysql:host=localhost;dbname=e_logs', 'admin', 'admin');

                        if (empty($search_result) == true) {
                            $stmt = $database_connection->prepare('SELECT * FROM logs');
                            $stmt->execute();

                            $log_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            foreach($log_data as $logs) {
                                $full_name;
                                if (empty($logs['middle_name']) == true) {
                                    $full_name = $logs['first_name'].' '.$logs['last_name'];
                                } else {
                                    $full_name = $logs['first_name'].' '.$logs['middle_name'].' '.$logs['last_name'];
                                }
                                echo '<tr>';
                                    echo 
                                    '<td>
                                        '.$full_name.'
                                    </td>';
                                    echo '<td>'.$logs['type'].'</td>';
                                    echo '<td>'.$logs['timestamp'].'</td>';
                                    echo 
                                    '<td><a href="../php/Delete-action.php?id='.$logs['id'].'">Delete</a> </td>';
                                echo '</tr>';
                            }
                        } else {
                            $stmt = $database_connection->prepare("SELECT * FROM logs WHERE first_name = '$search_result'");
                            $stmt->execute();

                            $log_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            foreach($log_data as $logs) {
                                $full_name;
                                if (empty($logs['middle_name']) == true) {
                                    $full_name = $logs['first_name'].' '.$logs['last_name'];
                                } else {
                                    $full_name = $logs['first_name'].' '.$logs['middle_name'].' '.$logs['last_name'];
                                }
                                echo '<tr>';
                                    echo 
                                    '<td>
                                        '.$full_name.'
                                    </td>';
                                    echo '<td>'.$logs['type'].'</td>';
                                    echo '<td>'.$logs['timestamp'].'</td>';
                                    echo 
                                    '<td><a href="../php/Delete-action.php?id='.$logs['id'].'">Delete</a> </td>';
                                echo '</tr>';
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>