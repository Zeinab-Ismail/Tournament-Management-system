<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php 
include_once 'nav.php';
?>

    <div class="container">
        <h2 class="mt-5">Leaderboard</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Team</th>
                    <th>Type</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db.php';
                $result = $conn->query("
                    SELECT * FROM participants");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>{$row['name']}</td><td>{$row['team']}</td><td>{$row['type']}</td><td>{$row['points']}</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
