<?php 
include_once 'nav.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .event-title {
            font-weight: bold;
            color: #007bff;
        }
        
    </style>
</head>
<body>
    <div class="container-fluid mt-5">
        <h2 class="mb-4 text-center">Sports Events</h2>
        <div class="row">
            <?php
            include 'db.php';

            // Fetch events from the database
            $result = $conn->query("SELECT id, event_name, event_type FROM events");

            // Array of image URLs
            $images = [
                "Running Race.avif",
                "Obstacle Course.avif",
                "Basketball.webp",
                "Swimming Competition.webp",
            ];

            if ($result->num_rows > 0) {
                $index = 0; // Initialize index for images
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4 mb-4">';
                    echo '    <div class="card shadow">';
                    echo '        <img src="' . $images[$index % count($images)] . '" class="card-img-top" alt="Event Image">';
                    echo '        <div class="card-body">';
                    echo '            <h5 class="event-title">' . htmlspecialchars($row['event_name']) . '</h5>';
                    echo '            <p class="event-description">' . htmlspecialchars($row['event_type']) . '</p>';
                    echo '            <a href="register.php?event_id=' . $row['id'] . '" class="btn btn-primary">Register</a>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';
                    $index++; // Increment index for the next image
                }
            } else {
                echo '<div class="col-12">';
                echo '    <div class="alert alert-warning" role="alert">No events found.</div>';
                echo '</div>';
            }
            ?>
        </div>        
    </div>

    <div class="container-fluid mt-5">
        <h2 class="mb-4 text-center">Academic Events (Individual)</h2>
        <div class="row">
            <?php
            // Fetch academic events from the database
            $result = $conn->query("SELECT id, name1, description FROM academic");

            // Array of image URLs
            $images = [
                "Quiz Bowl.webp",
                "coding.webp",
                "math.avif",
                "Swimming Competition.webp",
            ];

            if ($result->num_rows > 0) {
                $index = 0; // Initialize index for images
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4 mb-4">';
                    echo '    <div class="card shadow">';
                    echo '        <img src="' . $images[$index % count($images)] . '" class="card-img-top" alt="Event Image">';
                    echo '        <div class="card-body">';
                    echo '            <h5 class="event-title">' . htmlspecialchars($row['name1']) . '</h5>';
                    echo '            <p class="event-description">' . htmlspecialchars($row['description']) . '</p>';
                    echo '            <a href="register2.php?event_id=' . $row['id'] . '" class="btn btn-primary">Register</a>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';
                    $index++; // Increment index for the next image
                }
            } else {
                echo '<div class="col-12">';
                echo '    <div class="alert alert-warning" role="alert">No events found.</div>';
                echo '</div>';
            }
            ?>
        </div>        
    </div>
    <script src="scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
