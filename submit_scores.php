<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Scores</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php 
include_once 'nav.php';
?>

    <div class="container">
        <h2 class="mt-5">Submit Scores</h2>
        <form  method="post">
            <div class="form-group">
                <label for="team_id">Choose Team:</label>
                <select class="form-control" name="team_id" required>
    <?php
    include 'db.php';
    // Fetch teams from the database
    $result = $conn->query("SELECT id, name FROM participants");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . htmlspecialchars($row['name']) . "</option>";
        }
    }
    ?>
</select>

            </div>
            <div class="form-group">
                <label for="points">Points:</label>
                <input type="number" class="form-control" id="points" name="points" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit Score</button>
        </form>
    </div>
    <?php
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $team_id = $_POST['team_id'];
    $points = $_POST['points'];
    $stmt = $conn->prepare("UPDATE participants SET points = ? WHERE id = ?");
    $stmt->bind_param("ii", $points, $team_id); 
    if ($stmt->execute()) {
        echo '<h3 style= "text-align: center;" class="text-primary"> the score is saved Congratulations!</h3>';
    } else {
        echo '<div class="alert alert-danger">Error updating points: ' . $stmt->error . '</div>';
    }

    $stmt->close();
}

$conn->close();
?>


    
</body>
</html>
