<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey</title>
    <link rel="stylesheet" type="text/css" href="style.php"/>
    
    <script>
        function calculateAge(dateString) {
            var today = new Date();
            var birthDate = new Date(dateString);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            return age;
        }

        function validateForm() {
            var fullnames = document.getElementById('Fullnames').value;
            var email = document.getElementById('Email').value;
            var dob = document.getElementById('DOB').value;
            var contactNumber = document.getElementById('ContactNumber').value;
            
            // Checking if any of the text fields are empty
            if (fullnames.trim() === "" || email.trim() === "" || dob.trim() === "" || contactNumber.trim() === "") {
                alert("Please fill out all personal details fields");
                return false;
            }
            
            // Calculating age and validate
            var age = calculateAge(dob);
            if (age < 5 || age > 120) {
                alert("Age must be between 5 and 120");
                return false;
            }
            
            // Checking if all rating questions are answered
            var watchMovies = document.querySelector('input[name="WatchMovies"]:checked');
            var listenToRadio = document.querySelector('input[name="ListentoRadio"]:checked');
            var eatOut = document.querySelector('input[name="EatOut"]:checked');
            var watchTv = document.querySelector('input[name="WatchTv"]:checked');
            
            if (!watchMovies || !listenToRadio || !eatOut || !watchTv) {
                alert("Please select a rating for all questions");
                return false;
            }
            
            return true;
        }
    </script>

</head>

<body>

    <div id="header1">
        <h1>_Surveys</h1>
    </div>
    <div id="header2" class="header-center">
        <h1 class="view-link">FILL OUT SURVEY</h1>
    </div>
    <div id="header3"class="header-center">
        <a href="survey_results.php"><h1>VIEW SURVEY RESULTS</h1></a>
    </div>

    <form action="connect.php" method="post" onsubmit="return validateForm()">
        <div class="personal">
            <p>Personal Details:</p>
        </div>
        <div class="form-section">
            <div class="form-row">
                <label for="Fullnames">Full names:</label>
                <input type="text" name="Fullnames" id="Fullnames" class="blue-border-label">
            </div>
            <div class="form-row">
                <label for="Email">Email:</label>
                <input type="email" name="Email" id="Email" class="blue-border-label">
            </div>
            <div class="form-row">
                <label for="DOB">Date of Birth:</label>
                <input type="date" name="DOB" id="DOB" class="blue-border-label">
            </div>
            <div class="form-row">
                <label for="ContactNumber">Contact Number:</label>
                <input type="number" name="ContactNumber" id="ContactNumber" class="blue-border-label">
            </div>
        </div>

        <br>
        <label for="FavoriteFood">What is your favorite food?</label>
        <input type="checkbox" name="FavoriteFood" value="Pizza"> Pizza
        <input type="checkbox" name="FavoriteFood" value="Pasta"> Pasta
        <input type="checkbox" name="FavoriteFood" value="Pap_wors"> Pap and Wors
        <input type="checkbox" name="FavoriteFood" value="Other"> Other

        <p>Please rate your level of agreement on a scale from 1 to 5, with 1 being 'strongly Agree' and 5 being 'strongly disagree.'</p>
        <table>
            <tr>
                <th></th>
                <th>Strongly Agree</th>
                <th>Agree</th>
                <th>Neutral</th>
                <th>Disagree</th>
                <th>Strongly Disagree</th>
            </tr>
            <tr>
                <td>I Like to watch movies</td>
                <td><input type="radio" name="WatchMovies" value="StronglyAgree"></td>
                <td><input type="radio" name="WatchMovies" value="Agree"></td>
                <td><input type="radio" name="WatchMovies" value="Neutral"></td>
                <td><input type="radio" name="WatchMovies" value="Disagree"></td>
                <td><input type="radio" name="WatchMovies" value="StronglyDisagree"></td>
            </tr>
            <tr>
                <td>I like to listen to radio</td>
                <td><input type="radio" name="ListentoRadio" value="StronglyAgree"></td>
                <td><input type="radio" name="ListentoRadio" value="Agree"></td>
                <td><input type="radio" name="ListentoRadio" value="Neutral"></td>
                <td><input type="radio" name="ListentoRadio" value="Disagree"></td>
                <td><input type="radio" name="ListentoRadio" value="StronglyDisagree"></td>
            </tr>
            <tr>
                <td>I like to eat out</td>
                <td><input type="radio" name="EatOut" value="StronglyAgree"></td>
                <td><input type="radio" name="EatOut" value="Agree"></td>
                <td><input type="radio" name="EatOut" value="Neutral"></td>
                <td><input type="radio" name="EatOut" value="Disagree"></td>
                <td><input type="radio" name="EatOut" value="StronglyDisagree"></td>
            </tr>
            <tr>
                <td>I like to watch TV</td>
                <td><input type="radio" name="WatchTv" value="StronglyAgree"></td>
                <td><input type="radio" name="WatchTv" value="Agree"></td>
                <td><input type="radio" name="WatchTv" value="Neutral"></td>
                <td><input type="radio" name="WatchTv" value="Disagree"></td>
                <td><input type="radio" name="WatchTv" value="StronglyDisagree"></td>
            </tr>
        </table>
        <br>
        <button type="submit" name="save_data" class="submit">Submit</button>



</body>
</html>