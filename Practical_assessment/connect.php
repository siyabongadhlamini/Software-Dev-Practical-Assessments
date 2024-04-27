<?php
$Fullnames = $_POST['Fullnames'];
$Email = $_POST['Email'];
$DOB = $_POST['DOB'];
$ContactNumber = $_POST['ContactNumber'];
$FavoriteFood = $_POST['FavoriteFood'];
$WatchMovies = $_POST['WatchMovies'];
$ListentoRadio = $_POST['ListentoRadio'];
$EatOut = $_POST['EatOut'];
$WatchTv = $_POST['WatchTv'];

// Establishing database connection
$conn = new mysqli('localhost', 'root', '', 'survey');

// Checking connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Prepare and execute SQL statement
$stmt = $conn->prepare("INSERT INTO surveydata (Fullnames, Email, DOB, ContactNumber, FavoriteFood, WatchMovies, ListentoRadio, EatOut, WatchTv) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Bind parameters
$stmt->bind_param("sssisssss", $Fullnames, $Email, $DOB, $ContactNumber, $FavoriteFood, $WatchMovies, $ListentoRadio, $EatOut, $WatchTv);

// Execute statement
if ($stmt->execute()) {
    echo "Submitted successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
