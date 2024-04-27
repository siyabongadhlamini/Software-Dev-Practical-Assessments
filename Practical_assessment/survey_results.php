<?php


// Establishing database connection
$conn = new mysqli('localhost', 'root', '', 'survey');

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}

// Fetching all survey data
$sql = "SELECT Fullnames, Email, DOB, ContactNumber, FavoriteFood, WatchMovies, ListentoRadio, EatOut, WatchTv FROM surveydata";
$result = $conn->query($sql);

// Initialize variables for calculations
$totalSurveys = 0;
$ages = [];
$pizzaCount = 0;
$pastaCount = 0;
$papWorsCount = 0;
$watchMoviesCount = 0;
$listenToRadioCount = 0;
$eatOutRatings = [];
$watchTvRatings = [];

// Processing each survey record
while ($row = $result->fetch_assoc()) {

    $dob = new DateTime($row['DOB']);
    $today = new DateTime();
    $age = $today->diff($dob)->y;
    $ages[] = $age;

    // Count favorite food preferences
    switch ($row['FavoriteFood']) {
        case 'Pizza':
            $pizzaCount++;
            break;
        case 'Pasta':
            $pastaCount++;
            break;
        case 'Pap_wors':
            $papWorsCount++;
            break;
    
    }

    // Count preferences for watching movies, listening to radio, eating out, and watching TV
    $watchMoviesCount += ($row['WatchMovies'] === 'StronglyAgree' || $row['WatchMovies'] === 'Agree') ? 1 : 0;
    $listenToRadioCount += ($row['ListentoRadio'] === 'StronglyAgree' || $row['ListentoRadio'] === 'Agree') ? 1 : 0;
    $eatOutRatings[] = $row['EatOut'];
    $watchTvRatings[] = $row['WatchTv'];
}

// Calculate total number of surveys
$totalSurveys = count($ages);

// Calculate average age
$averageAge = ($totalSurveys > 0) ? array_sum($ages) / $totalSurveys : 0;

// Calculate percentages
$percentagePizzaLovers = ($totalSurveys > 0) ? ($pizzaCount / $totalSurveys) * 100 : 0;
$percentagePastaLovers = ($totalSurveys > 0) ? ($pastaCount / $totalSurveys) * 100 : 0;
$percentagePapWorsLovers = ($totalSurveys > 0) ? ($papWorsCount / $totalSurveys) * 100 : 0;
$percentageWatchMovies = ($totalSurveys > 0) ? ($watchMoviesCount / $totalSurveys) * 100 : 0;
$percentageListenToRadio = ($totalSurveys > 0) ? ($listenToRadioCount / $totalSurveys) * 100 : 0;
$averageEatOutRating = ($totalSurveys > 0) ? array_sum($eatOutRatings) / $totalSurveys : 0;
$averageWatchTvRating = ($totalSurveys > 0) ? array_sum($watchTvRatings) / $totalSurveys : 0;

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.php"/>
    <title>Survey Results</title>
</head>
<body>
<div id="header1">
    <h1>_Surveys</h1>
   
    </div>
    <div id="header2"class="header-center" >
    <a href="survey.php"><h1>FILL OUT SURVEY</h1></a>
</div>

    <div id="header3" class="header-center" >
    
<h1 class="view-link">VIEW SURVEY RESULTS</h1>
    </div>
 
    <p class="survey-results-text">Survey Results</p>

    <?php if ($totalSurveys > 0): ?>
        <div class="result-item">
            <span class="result-label-left">Total Surveys Completed:</span>
            <span class="result-value-center"><?php echo $totalSurveys; ?></span>
        </div>
        <div class="result-item">
            <span class="result-label-left">Average Age of Participants:</span>
            <span class="result-value-center"><?php echo round($averageAge, 1); ?> years</span>
        </div>
        <div class="result-item">
            <span class="result-label-left">Oldest Participant Age:</span>
            <span class="result-value-center"><?php echo max($ages); ?> years</span>
        </div>
        <div class="result-item">
            <span class="result-label-left">Youngest Participant Age:</span>
            <span class="result-value-center"><?php echo min($ages); ?> years</span>
        </div>
        <br>
        <br>
    
        <div class="result-item">
            <span class="result-label-left">Percentage of People Who Like Pizza:</span>
            <span class="result-value-center"><?php echo round($percentagePizzaLovers, 1); ?>%</span>
        </div>
        <div class="result-item">
            <span class="result-label-left">Percentage of People Who Like Pasta:</span>
            <span class="result-value-center"><?php echo round($percentagePastaLovers, 1); ?>%</span>
        </div>
        <div class="result-item">
            <span class="result-label-left">Percentage of People Who Like Pap and Wors:</span>
            <span class="result-value-center"><?php echo round($percentagePapWorsLovers, 1); ?>%</span>
        </div>
        <br>
        <br>
        <div class="result-item">
            <span class="result-label-left">Percentage of People Who Like to Watch Movies:</span>
            <span class="result-value-center"><?php echo round($percentageWatchMovies, 1); ?>%</span>
        </div>
        <div class="result-item">
            <span class="result-label-left">Percentage of People Who Like to Listen to Radio:</span>
            <span class="result-value-center"><?php echo round($percentageListenToRadio, 1); ?>%</span>
        </div>
        <div class="result-item">
            <span class="result-label-left">Average Rating for "Eat Out":</span>
            <span class="result-value-center"><?php echo round($averageEatOutRating, 1); ?>/5</span>
        </div>
        <div class="result-item">
            <span class="result-label-left">Average Rating for "Watch TV":</span>
            <span class="watch-tv-rating result-value-center"><?php echo round($averageWatchTvRating, 1); ?></span><span class="result-value">/5</span>
        </div>
    <?php else: ?>
        <p>No Surveys Available.</p>
    <?php endif; ?>
</body>
</html>

