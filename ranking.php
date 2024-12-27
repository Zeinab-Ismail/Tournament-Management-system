<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
require_once "nav.php";
require_once "db.php";?>
<div class="container">
<table class="table mt-5">
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
            SELECT * FROM participants  ORDER BY points DESC");
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>{$row['name']}</td><td>{$row['team']}</td><td>{$row['type']}</td><td>{$row['points']}</td></tr>";
        }
        ?>
    </tbody>
</table>
</div>
