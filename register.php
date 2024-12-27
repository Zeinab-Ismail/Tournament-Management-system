<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php 
include_once 'nav.php';
?>

    <div class="container">
        <h2 class="mt-5">Register Participant</h2>
        <form  method="POST">
            <div class="form-group">
                <label for="team">Team:</label>
                <input type="text" class="form-control" name="team">
            </div>
            <div class="form-group">
                <label for="number"> Number Of Team:</label>
                <input type="number" class="form-control" name="num">
            </div>
            <div class="form-group">
                <label>Type:</label>
                <select class="form-control" name="type" required>
                    <option value="team">Team</option>
                </select>
            </div>
            <div class="form-group">
                <label for="event">Choose Event:</label>
                <select class="form-control" id="event" name="event" required>
                    <option value="">Select an event</option>
                    <option value="Running Race">Running Race</option>
                    <option value="Obstacle Course">Obstacle Course</option>
                    <option value="Basketball">Basketball</option>
                    <option value="Swimming Competition">Swimming Competition</option>
                </select>
            </div>
            <button class="btn btn-primary"> register</button>
        </form>
    </div>
<?php
include_once 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$team = $_POST['team'];
$num = $_POST['num'];
$type = $_POST['type'];
$event = $_POST['event'];
$stmt = $conn->prepare("INSERT INTO participants (id,name, team, type, event) VALUES (null,'$team', '$num', '$type', '$event')");
    if ($num < 5) {
        $stmt->execute();
        echo '<h3 style= "text-align: center;" class="text-primary"> the team is saved Congratulations!</h3>';
    } else {
        echo '<h3 style= "text-align: center;" class="text-danger"> the team number munst be 5 or less than 5 </h3>';
    }

$stmt->close();
$conn->close()
;}
?>



</body>

</html>

