<?php
header('Content-type: text/css; charset:UTF- 0');
?>



.header {
    display: flex;
    justify-content: center; /* Center items horizontally */
    align-items: flex-start; /* Align items to the top */
}


.view-link {
    color: blue;
}


.header-center {
    font-size: 7px;
    display: inline-block;
    vertical-align: top;
    margin: 0 auto; /* Center horizontally */
    text-align: center;
}

#header1 {
    font-size: 7px;
    display: inline-block; /* Display elements inline */
    margin-left: 0;
}

#header2 {
    font-size: 7px;
    display: inline-block; /* Display elements inline */
    margin-left: 550px;
    margin-right: 100px; /* Adjust the margin as needed */
}

#header3 {
    font-size: 7px;
    display: inline-block; /* Display elements inline */
}

.survey-results-text{

    text-align: center;
    font-size: 20px;
    font-weight: bold;

}


.form-section {
    margin-bottom: 10px;
    margin-left: 300px;

}


.personal{

    align-text: left;
   
}

.form-row {
    margin-bottom: 10px;
   
}

.form-row label {
    display: block;

  

}

.form-row input {
    width: 20%; /* Make input field full width */
    color: gray;
}


table {

  border: 1px solid;
  border-collapse: collapse;

}

th {
    border: 1px solid;
  background-color: gray;
  color: black;
}


td{
    border: 1px solid;
    text-align: center;
    color: black;
    border: 1px solid DodgerBlue;

}



  
input[type="radio"] {
        color: DodgerBlue; 
}


.submit{

    align-item: center;
    margin-left: 300px;
    background-color: cornflowerblue;
    padding-top: 5px;
    width: 2cm;
    color: white;
}

.survey-text{

    text-align: center;
   
   
}

.result-item {
    display: flex;
    justify-content: space-between;
    font-size: 14px; /* Set base font size */
    margin-bottom: 15px; /* Add margin between result items */
    align-items: center; /* Align content vertically */
}

.result-label-left {
    flex: 1;
    text-align: left;
    margin-left: 250px;
}

.result-value-center {
    flex: 1;
    text-align: center;
    margin-right: 400px;
}

.blue-border-label {
            border: 1px solid DodgerBlue; /* Set the border color to blue */
            padding: 5px; 
            width: 20%;
            height: 100%;
           
        }
body{
    font-family: Arial, sans-serif;
    margin-left: 150px

}