<?php

    // School
    $school = "Bacayao Sur Elementary School";

    include('../../database.php');

    // SQL query to retrieve LRN, fullname, and status
    $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
    $sql = "SELECT lrn, fullname, grade, section, status FROM behavioral WHERE school = '$school' AND quarter = $selectedQuarter";

    $behavioalresult = $conn->query($sql);

    $conn->close();
?>
<?php
    include('../../database.php');
    if(isset($_GET['employment_number'])) {
        $employment_number = $_GET['employment_number'];
        $sql = "SELECT fullname FROM counselor WHERE employment_number = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $employment_number);
        $stmt->execute();
        $stmt->bind_result($counselorname);
        if($stmt->fetch()) {
        }
        $stmt->close();
    } 
    $conn->close();
?>
<?php
    
    include("../../database.php");
    $employment_number = $_GET['employment_number'];
        $sql = "SELECT fullname FROM counselor WHERE school = 'Bacayao Sur Elementary School'";
        $result2 = $conn->query($sql);
    
?>
<?php
if (isset($_GET['employment_number'])) {
    $employment_number = $_GET['employment_number'];
    $result1 = $employment_number;
}
?>
<?php
    include('../../database.php');
    $query = "SELECT start, end FROM school_year ORDER BY start DESC";
    $result = mysqli_query($conn, $query);

    // Array to store all school year options
    $school_years = array();

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $start_year = $row['start'];
            $end_year = $row['end'];
            $school_years[$start_year] = $start_year . ' - ' . $end_year;
        }
    }

    // Close database conn
    mysqli_close($conn);
?>
<?php
    include('../../database.php');
    $tables = ['behavioral'];
    $count = 0;
    $lrnCounted = array(); // Array to keep track of LRNs already counted

    foreach ($tables as $table) {
        $sql = "SELECT lrn FROM $table WHERE school = 'Bacayao Sur Elementary School'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $lrn = $row['lrn'];
                if (!in_array($lrn, $lrnCounted)) {
                    // If LRN not already counted, add it to the count and mark as counted
                    $count++;
                    $lrnCounted[] = $lrn;
                }
            }
        }
    }
    $conn->close();
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the submit1 button was clicked
    if (isset($_POST['submit1'])) {
        // Retrieve the values from the POST data
        $lrn = isset($_POST['lrn']) ? $_POST['lrn'] : '';
        $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '';
        $grade = isset($_POST['grade']) ? $_POST['grade'] : '';
        $section = isset($_POST['section']) ? $_POST['section'] : '';
        
        // Retrieve the selected quarter, default to '1' if not set
        $quarter = isset($_POST['quarter']) && !empty($_POST['quarter']) ? $_POST['quarter'] : '1';
        
        // Retrieve the selected school year, default to '2024' if not set
        $school_year = isset($_POST['school-year']) && !empty($_POST['school-year']) ? $_POST['school-year'] : '2024';

        // Redirect to guidance_intervention.php with additional parameters
        header("Location: guidance_intervention.php?lrn=$lrn&fullname=$fullname&grade=$grade&section=$section&quarter=$quarter&school_year=$school_year");
        exit();
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the submit1 button was clicked
    if (isset($_POST['submit1'])) {
        // Retrieve the values from the POST data
        $lrn = isset($_POST['lrn']) ? $_POST['lrn'] : '';
        $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '';
        $grade = isset($_POST['grade']) ? $_POST['grade'] : '';
        $section = isset($_POST['section']) ? $_POST['section'] : '';
        
        // Retrieve the selected quarter, default to '1' if not set
        $quarter = isset($_POST['quarter']) && !empty($_POST['quarter']) ? $_POST['quarter'] : '1';
        
        // Retrieve the selected school year, default to '2024' if not set
        $school_year = isset($_POST['school-year']) && !empty($_POST['school-year']) ? $_POST['school-year'] : '2024';

        // Redirect to guidance_intervention.php with additional parameters
        header("Location: guidance_intervention.php?lrn=$lrn&fullname=$fullname&grade=$grade&section=$section&quarter=$quarter&school_year=$school_year");
        exit();
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Guidance Counselor</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: white;
            background-size: cover;
            overflow-y: hidden;
        }

        .logo {
            width: 100px;
            height: 100px;
            margin: 0 auto 20px;
            background-image: url('img/logo.png'); 
            background-size: cover;
        }
        
        h4,
        h2 {
            font-family: 'Darker Grotesque', sans-serif;
            color: #fff;
        }
        
        h2 p{
            margin-top: 5px;
            font-size: 18px;
        }
        
        a {
            color: #fff;
            text-decoration: none;
        }
    
        
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: .1rem 5%;
            background: #130550;
            display: flex;
            align-items: center;
            z-index: 100;
            height: 55px;
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: start;
            width: 94%;
        }

        .vertical-line {
            margin-right: 10px;
            height: 40px;
            width: 1px;
            background-color: #130550;
            margin-left: auto;
        }


        .name {
            margin-right: 0;
            margin-left: auto;
            color: #fff;
            font-size: .8rem;
            cursor: pointer;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
        }

        .header.sticky {
            border-bottom: .2rem solid rgba(255, 255, 255, 0.2);
        }

        h4 {
            color: #fff;
            font-family: 'Darker Grotesque', sans-serif;
            font-weight: 300;
            font-size: 1.3rem;
            margin-left: 1rem;
            letter-spacing: 2px;
            white-space: nowrap; 
        }

        .logs {
            width: 3.5rem;
            height: 3.5rem;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: flex-start; 
            justify-content: center;
            width: 100%; 
        }


        .back-icon:hover::after {
            content: "Back";
            position: absolute;
            left: 30px;
            top: 80%;
            transform: translateY(-50%);
            color: #fff;
            font-size: 14px;
        }

        h3{
        color: #fff;
        }
        
        .buttons {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 10px;
        }
        
        a .button {
        background-color: #0C052F;
        color: #fff;
        padding: 10px 20px;
        margin: 0 10px;
        border: 1px solid #fff;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        width: 90%;
        }
        
        .button:hover {
        background-color: #ddd;
        border: 1px solid #0C052F;
        color: #190572;
        }

        ::-webkit-scrollbar {
            width: 10px;
            display: none;
        }
    
        ::-webkit-scrollbar-thumb {
            background-color: #190572;
            border-radius: 20px;
        }
    
        ::-webkit-scrollbar-track {
            background-color: #E2DFEE;
            border-radius: 20px;
        }

        .top-container {
            height: 42px; 
            position: fixed;
            top: 70px; 
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1;
        }

        .back-button {
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
        }

        .back-icon {
            font-size: 2rem;
            color: #fff;
            text-decoration: none;
            margin-right: 10px;
        }

        .school {
            border-radius: 5px;
            text-decoration: none;
            color: #070000;
            margin-right: auto;
        }

        .school h3{
            color: #070000;
            margin-left: 15px;
        }

        .main-container {
            width: 100%;
            margin-top: 7%;
            height: 80%;
            background-color: white;
            opacity: 80%;
            overflow: hidden;
            padding: 20px;
            z-index: 1;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .wide-row {
    display: flex;
    flex-wrap: nowrap; /* Prevent wrapping */
    justify-content: space-between;
    align-items: center; /* Align items in the center vertically */
    gap: 10px; /* Add small space between items */
}

        .column {
            flex: 0 0 calc(16.6667%);
            margin-bottom: 5px;
        }

        .wide-columns {
            flex: 0 0 calc(26% - 7px);
            margin-bottom: 20px;
            margin-top: 10px;
        }

        .wide-column {
            flex: 0 0 calc(19% - 7px);
            margin-bottom: 20px;
            margin-top: 10px;
        }

        .wide-columns .containers, 
        .wide-column .containers{
            background-color: #190572;
            padding: .5px;
        }
        

        .column-right {
            flex: 0 0 calc(30%);
            margin-right: 0;
            margin-right: auto; 
        }

        .column-left {
            flex: 0 0 calc(15%);
            margin-left: 0;
            margin-left: auto; 
        }

        .row .column:not(:last-child),
        .wide-row .column:not(:last-child) {
            margin-right: 0;
        }

        .row:first-child .column:last-child{
            margin-left: auto;
        }

        .full-width {
            flex: 0 0 calc(30%);
            margin-right: 0;
        }

        .half-width {
            flex: 0 0 calc(15%);
            margin-right: 0;
        }

        .containers {
            background-color: #3498db;
            padding: .5px;
        }

        .first{
            border-radius: 3px;
            border: 1px solid #190572;
            background: #FBFBFB;
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset, 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
            flex-shrink: 0;
            text-align: center;
            font-size: 15px;
            padding-left: 50px;
            padding-right: 50px;
        }

        .select-wrapper {
            position: relative;
            background: #FBFBFB;
            color: #190572;
        }

        #topdown {
            padding: 1px;
            width: 437px;
            background: #FBFBFB;
            color: #190572;
            text-align: start;
            border: none;
            font-weight: bold;
            font-size: 16.5px;
        }

        #topdown2 {
            padding: 1px;
            width: 369px;
            background: #FBFBFB;
            color: #190572;
            text-align: start;
            border: none;
            font-weight: bold;
            font-size: 16.5px;
        }

        .second{
            background-color: #2206A0;
            text-align: center;
        }

        .second h3{
            color: #FFF;
            letter-spacing: 3px;
        }

        h3 {
            color: #190572;
            margin-left: 10px;
            margin: 0;
        }

        .wide-column h3, 
        .wide-columns h3{
            color: #070000;
            text-align: center;
        }

        .third-column {
            flex: 0 0 calc(30%); 
            margin-right: 0;
            position: relative; 
        }

        .search-box {
            background-color: #F3F3F3;
            border-radius: 5px;
            display: flex;
            align-items: center;
            border: 1px solid #190572;
            padding: 5px;
        }

        .search-input {
            border-radius: 5px;
            border: none;
            outline: none;
            width: 80%;
            background-color: #F3F3F3; 
        }

        .search-icon {
            margin-left: auto;
            cursor: pointer;
            color: #190572; 
        }

        table{
            width:100%; 
            border-collapse: collapse
            
        }

        tr:nth-child(odd){
            background-color: rgb(242, 242, 244);
        }

        tr:nth-child(even){
            background-color: #b7b7b7;
        }
        .containers h3{
            color: #FFF;
        }
        .act button {
        background-color:#130550;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        }

        .act button:hover {
            background-color: #0C052F;
        } 

        .sch h1 {
            color: #FFFFFF;
        }

        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            background-color: #FFEEEE;
            border: 1px solid #FFCDCD;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 14px;
        }
        
        .popup h2 {
            font-size: larger;
            color: #190572;
            font-size: 22px;
            margin-bottom: 20px;
        }
        
        .popup .row {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }
        
        .popup .containerss {
            flex-basis: 45%;
            margin-top: 10px;
            padding: 15px;
            text-align: center;
            margin-right: 5px;
            margin-left: 5px;
            margin-bottom: 15px;
            width: 300px;
            height: 200px;
            position: relative;
            border-radius: 10px;
            border: 1px solid #190572;
            background: rgba(25, 5, 114, 0.33);
        }
        
        .close-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
      
          .containerss p {
            font-size: 100px;
            text-align: center;
            justify-content: center;
            margin-top: 20px;
            color: #190572;
            text-decoration: none;
          }

          .plus-button {
            position: absolute;
            bottom: 40px; 
            right: 30px; 
        }

        .plus-button i{
            font-size: 20px;
        }

        .add-button {
            background-color: #130550;
            color: #fff;
            border: none;
            border-radius: 50%;
            padding: 15px;
            cursor: pointer;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            transition: background-color 0.3s;
        }

        .add-button:hover {
            background-color: #ddd;
            color: #190572;
        }




        .rows {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .columns input[type="text"],
        .columns-group,
        input[type="date"] {
            flex: 1;
            padding: 5px;
            border-radius: 3px;
            margin-right: 5px;
        }
        input[type="text"],
        input[type="date"],
        .columns-group input[type="text"],
        select{
            border: none;
        }

        select option[value="one"]{
            padding-left: 10px;
            padding-right: 10px;
        }

        .text-field {
            background-color: #fff;
            padding: 10px;
            border-radius: 5px;
        }

        .classification{
            padding: 5px;
        }

        .rows > :first-child,
        .rows > :nth-child(3) {
            flex: 0 0 11.5rem; 
            text-align: center;
            justify-content: center;
            background-color: #190572;
            color: #FFFFFF;
            font-weight: 900;
        }

        .rows > :nth-child(2) {
            flex: 0 0 35rem; 
            background-color: #F3F3F3;
            color: #190572;
            font-weight: 700;
            justify-content: center;
        }

        .rows > :nth-child(4) {
            flex: 0 0 10rem; 
            background-color: #F3F3F3;
            color: #190572;
            font-weight: 700;
            justify-content: center;
        }

        .rows:nth-child(3) > :nth-child(2),
        .rows:nth-child(3) > :nth-child(4) {
            flex: 0 0 15rem; 
            background-color: #F3F3F3;
            color: #190572;
            font-weight: 700;
            justify-content: center;
        }

        .rows:nth-child(2) > :nth-child(4){
            flex: 0 0 10.5rem; 
        }

        .rows:nth-child(3) > :nth-child(5){
            flex: 0 0 13.5rem;
            background-color: #F3F3F3;
            color: #190572;
            font-weight: 700;
            justify-content: center;
        }

        .text-container {
            position: relative;
            width: 73rem; 
        }

        .editable-text {
            width: calc(100% - 10px);
            height: 200px;
            padding: 10px;
            font-size: 13px;
            border: 1px solid #190572;
            border-radius: 7px;
            background: rgba(25, 5, 114, 0.19);
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset, 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
            margin-bottom: 10px;
            margin: 0 auto;
        }

        .editable-text::before {
            content: attr(placeholder);
            position: absolute;
            top: 15px;
            left: 15px;
            color: #190572;
            font-weight: bold;
            letter-spacing: 2px;
            pointer-events: none;
            z-index: 1;
            border-radius: 7px;
            background: rgba(255, 255, 255, 0.90);
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
            width: fit-content;
            padding: 5px;

        }

        .editable-text.content-entered::before {
            display: none;
        }

        .text-container div {
            margin: 0;
        }
    
        .ints{
            margin-top: 20px;
        }
    

        .add-buttons {
            width: 100%;
            background-color: #190572;
            color: #fff;
            font-weight: bold;
            border: none;
            padding: 10px 0;
            margin-top: 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .add-buttons:hover {
            background-color: #130550;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); 
            z-index: 1; 
            display: none;
        }

        .columns-group input[type="text"]{
            width: 90%;
        }

        .lrn-search{
            cursor: pointer;
            margin-left: 5px;
        }

        .lrn-search:hover{
            font-weight: bold;
            color:#2206A0;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #130550;
            min-width: 100px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            right: 0; 
            top: 100%;
            border-bottom-left-radius: 7px;
            border-bottom-right-radius: 7px;
        }

        .dropdown {
            position: relative; 
        }

        .dropdown-content a {
            color: rgb(255, 253, 253);
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-size: .8rem;
        }

        .dropdown-content a:hover {
            background-color: #F3F3F3;
            color: #190572;
            opacity: 80%;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .legend-container {
            margin-top: -2.3%;
            display: flex;
            justify-content:right;
        }

        .legend-item {
            display: flex;
            align-items: center;
            margin: 0 10px; 
        }

        .legend-item p{
            font-size: 15px;
            font-weight: bold;
        }

        .legend-color {
            width: 13px;
            height: 20px;
            border-radius: 10%;
            margin-right: 5px;
        }

        .unresolved {
            background-color: red;
        }

        .pending {
            background-color: blue;
        }

        .on-going {
            background-color: yellow;
        }

        .resolved {
            background-color: green;
        }

        .legend-containers {
            margin-top: -20px;
            display: flex;
            justify-content:right;
            margin-right: 150px;
        }

        .legend-containers .icon{
            margin-right: 5px;
            color: #130550;
            font-weight: bold;
            margin-left: 5px;
        }
        .legend-containers .legend-item{
            color: #130550;
            font-weight: bold;
        }

        .legend-containers .checkbox-container{
            margin-top: 10px;
            margin-right: 30px;
            margin-left: 30px;
        }

        .legend-containers .non{
            margin-right: auto;
        }

        .checkbox-container input[type="checkbox"] {
            margin-right: 5px;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            width: 15px;
            height: 10px;
            background-color: #fff;
            border: 2px solid #190572;
            position: relative;
        }

        .checkbox-container input[type="checkbox"]::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 15px;
            height: 10px;
            background-color: #190572;
            opacity: 0;
        }

        .checkbox-container input[type="checkbox"]:checked::before {
            opacity: 1;
        }

        .checkbox-container label {
            font-size: 15px;
            font-weight: bold;
            color: #0C052F;
        }

        .icon-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .icon-containers{
            font-size: 20px;
            color: #0C052F;
        }

        .vertical-lines {
            height: 40px;
            width: .5px;
            background-color: #0C052F;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); 
            z-index: 999; 
        }

        .login-container {
            background-color: rgba(25, 5, 114, 0.80); 
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
            text-align: center;
            z-index: 1;
            position: fixed;
            top: 50%; 
            left: 50%; 
            transform: translate(-50%, -50%); 
            z-index: 1000; 
            border-radius: 10px;
            display: none;
        }

        .closes, .close {
                color: #aaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .closes{
                background-color: #130550;
                font-size: 26px;
                padding-right: 5px;
            }

        .close:hover,
        .closes:focus, 
        .closes:hover,
        .close:focus {
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        .login-container button {
        margin-top: 10px;
        background-color: #0C052F;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
        width: 97.5%;
        }

        .login-container button:hover {
            background-color: #ddd;
            border: 1px solid #0C052F;
            color: #130550;
        }

        .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 10px;
        }

        label {
        font-size: 15px;
        color: #FFFFFF; 
        text-align: left;
        }

        select, .form-group input[type="text"] {
        height: 20x;
        padding: 10px;
        border: 1px solid #0C052F; 
        border-radius: 5px;
        background-color: #DDDAE7;
        color: #0C052F; 
        }

        .form-group input[type="text"]{
            width: 95%;
        }            

        span{
            font-style: italic;
        }

        .pagination {
            position: absolute;
            bottom: 10px;
            right: 20px;
            z-index: 999;
        }

        .pagination button {
            padding: 8px 16px;
            background-color: #0C052F;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 5px;
        }

        .pagination button:hover {
            background-color: #130550;
        }

        .save {
            text-align: center;
            position: fixed;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            font-weight: bold;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.75);   
            z-index: 999;         
        }

        .save button {            
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.75);            
            padding: 8px 16px;
            background-color: #0C052F;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        .saveButton:hover,
        .save button:hover {
            background-color: #130550;
        }

         .form-container {
            justify-content: center;
            align-items: center;
            background:white;            
            height: 95%;
            width: 97%;
            overflow:auto;
            border-radius: 7px;
            position: fixed;
            top: 50%; 
            left: 50%; 
            transform: translate(-50%, -50%);
            z-index: 1000;
        }

        .main-containers {
            height: 95%;
            background-color: #E2DFEE;
            padding: 10px;
            z-index: 999;
            position: relative;
        }

        .rows {
            display: flex;
            flex-wrap: wrap;
        }

        .wide-rows {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between; 
        }

        .columns {
            flex: 0 0 calc(16.6667%);
        }

        .column-rights {
            flex: 0 0 calc(30%);
            margin-right: 0;
            margin-right: auto; 
        }

        .column-lefts {
            flex: 0 0 calc(15%);
            margin-left: auto; 
        }

        .rows .columns:not(:last-child),
        .wide-rows .columns:not(:last-child) {
            margin-right: 0;
        }
        
        .full-widths {
            flex: 0 0 calc(30%);
            margin-right: 0;
        }

        .half-widths {
            flex: 0 0 calc(25%);
            margin-right: 0;
        }

        .containerss {
            background-color: #190572;
        }
        
        .firsts{
            background: #FBFBFB;
            text-align: center;
            justify-content: center;
            padding-top: 4px;
            font-size: 15px;
            padding-left: 51px;
            padding-right: 51px;
            white-space: nowrap;
        }

        .first h3{
            color: #190572;
        }

        .seconds{
            border-radius: 3px;
            text-align: center;
            font-family: "Darker Grotesque";
        }

        .seconds h3{
            font-size: 18px;
            color: #FFF;
            letter-spacing: 3px;
            padding-top: 1px;
            padding-bottom: 1px;
        }

        .containerss input{
            color:#130550;
            font-weight: 500;
            font-size: 15px;
            width: 400px;
            margin-left: 10px;
            border: none;
            background: none;
        }

        .firsts h3:first-child{
            color: #130550;
        }

        .containerss h3{
            color: #ddd;
            height: 25px;
        }

        .rights{
            color:#130550;
            font-weight: 500;
            font-size: 15px;
            width: 310px;
            border: none;
            background: none;
            margin-left: 10px;
        }

        .column-rights h3, 
        .half-widths h3{
            color: #190572;
        }

        .editable-containers {
            position: relative; 
            display: flex;
            align-items: center;
            height: 20px;
        }

        .editable-containers h3 {
            margin: 0;
        }

        .editable-icons {
            position: absolute; 
            right: 0; 
            margin: 0; 
            cursor: pointer;
        }
        .columns{
            width: 23rem;
        }
    .update-record {
        border-collapse: collapse;
        width: 100%;
        margin-top: 2rem;
    }
    .update-record th, 
    .update-record td {
        border: 1px solid black;
        position: relative;
        padding: 0;
        text-align: center;
        background-color: #fff;
    }
    .update-record th {
        background-color: #35A7FA; 
        color: white; 
    }
    .form-container .table_body td input {
        width: calc(100% - 10px); 
        height: 100px; 
        box-sizing: border-box;
        margin: 5px; 
        resize: none; 
        border: none;
    }
    .dates {
        position: absolute;
        bottom: 5px;
        right: 5px;
        font-size: 12px;
        color: gray;
    }
    #row1 th{
        background-color: #190572;
        padding-top: 8px;
        padding-bottom: 8px;
    }
    .saveButton {
        background-color: rgba(12, 5, 47, 1); 
        color: white;
        border: none;
        padding: 10px 20px;
        margin-top: 20px;
        cursor: pointer;
        width: 100%;
        margin-bottom: 20px;
    }

    .record_header{
        background-color: #130550;
        color: #ddd;
        padding: 3px;
        align-items: center;
        justify-content: center;
        margin-bottom: 5px;
        display: flex;
        padding-top: 4px;
        padding-bottom: 4px;
    }

        @media screen and (max-width: 800px) {
            header{
                height: 40px;
            }
            h4 {
                font-size: 0.6rem; 
            }

            .logs {
                width: 2rem;
                height: 2rem;
            }

            .vertical-line{
                height: 30px;
            }

            .logout-icon {
                font-size: 1rem;
            }

            .dropdown-content a{
                font-size: .6rem;
                padding: 10px 10px;
            }
        }

        
    </style>
</head>
<body>

    <header>
        <div class="container">
            <div class="header-content">
                <img src="../../img/logo.png" class="logs">
                <h4>E.D.G.E | P.A.R. Early Detection and Guidance for Education</h4>
                <i class="vertical-line"></i>
                <div class="dropdown">
                <div class='name' onclick="toggleDropdown()"><?php echo $counselorname ?></div>
                    <div class="dropdown-content" id="dropdownContent">
                    <a href="../../login/Login.php">Log Out</a>
                        <a href="" style="border-top: 1px solid #ddd;">Change Password</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="top-container">
        <div class="school">
            <h3>Bacayao Sur Elementary School</h3>
        </div>
    </div>   
    <div class="main-container">
        <div class="row">
                <div class="column">
                <form id="school_year_form" method="post" action="">
                        <select id="topdown1" name="school-year" class="containers first">
                            <?php foreach ($school_years as $start_year => $school_year) : ?>
                                <?php $selected = (isset($_POST['school-year']) && $_POST['school-year'] == $start_year) || date('Y') == $start_year ? 'selected="selected"' : ''; ?>
                                <option value="<?php echo $start_year; ?>" <?php echo $selected; ?>><?php echo $school_year; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </form>
        </div>
        <div class="column">
            <form method="post">
                <div class="containers second">
                    <button style="background: transparent; border: none;" name="print">
                        <h3><i class='bx bx-printer'></i>Print P.A.Rs List</h3>
                    </button>
                </div>
            </form>
        </div>
        <div class="column third-column">
            <div class="search-box">
                <input type="text" class="search-input" placeholder="Search Pupil's Name">
                <i class='bx bx-search search-icon'></i>
            </div>
        </div>
    </div>


        <div class="row">
            <div class="column" >
                <div class="containers" style="background-color: #190572">
                    <h3 style="margin-left:7px">Employee Number</h3>
                </div>
            </div>
            <?php
                echo "<div class=\"column column-right\">
                <div class=\"containers\" style=\"background-color: #F3F3F3;\">
                    <h3 style=\"color: #190572; margin-left:7px\">$employment_number</h3>
                </div>
            </div>";
            
            ?>

            <div class="column column-left">
                <div class="containers" style="background-color: #190572;">
                    <h3 style="margin-left:7px">Total Students</h3>
                </div>
            </div>
            <div class="column half-width">
                <div class="containers" style="background-color: #F3F3F3;">
                    <h3 style="color: #190572; margin-left:7px"><?php echo $count ?></h3>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="column">
                <div class="containers" style="background-color: #190572;">
                    <h3 style="margin-left:7px">Guidance Counselor</h3>
                </div>
            </div>
            <?php
            if ($result2->num_rows > 0) {
                $row = $result2->fetch_assoc();
                $fullname = $row["fullname"];
                echo "<div class=\"column column-right\">
                <div class=\"containers\" style=\"background-color: #F3F3F3;\">
                    <h3 style=\"color: #190572; margin-left:7px\">$fullname</h3>
                </div>
            </div>";
            }
            ?>

            <div class="column column-left">
               
            </div>
            <div class="column half-width">
                <div class="containers" style="background-color: #F3F3F3;">
                    <h3 style="color: #190572; margin-left:7px"><!--?php echo $count ?--></h3>
                </div>
            </div>
        </div>

        <div class="row">
    <div class="column">
        <div class="containers" style="background-color: #190572;">
            <h3 style="margin-left: 7px">Quarter</h3>
        </div>
    </div>
    <div class="column column-right">
        <div class="select-wrapper1">
            <form id="quarterForm1" method="post" action="">
                <select id="quarterSelect" name="quarter" onchange="submitForm()" style="padding: 5px; height: auto; width: 540px; border: none; background: #fff;">
                    <option value="1" <?php if(isset($_POST['quarter']) && $_POST['quarter'] == '1') echo 'selected'; ?>>Quarter 1</option>
                    <option value="2" <?php if(isset($_POST['quarter']) && $_POST['quarter'] == '2') echo 'selected'; ?>>Quarter 2</option>
                    <option value="3" <?php if(isset($_POST['quarter']) && $_POST['quarter'] == '3') echo 'selected'; ?>>Quarter 3</option>
                    <option value="4" <?php if(isset($_POST['quarter']) && $_POST['quarter'] == '4') echo 'selected'; ?>>Quarter 4</option>
                </select>
            </form>
        </div>
    </div>
</div>



            <div class="legend-container">
                    <div class="legend-item">
                        <div class="legend-color unresolved"></div>
                        <p>Unresolved</p>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color pending"></div>
                        <p>Pending</p>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color on-going"></div>
                        <p>On Going</p>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color resolved"></div>
                        <p>Resolved</p>
                    </div>
                </div>
                <div class="legend-containers">
                    <div class="legend-item">
                        <i class="par-icon bx bx-face icon"></i>
                        <p>Behavioral</p>
                    </div>                   
                </div>

        <div class="wide-row">
            <div class="wide-column">
                <div class="containers">
                    <h3 style="padding: 2px;">LRN</h3>
                </div>
            </div>
            <div class="wide-columns">
                <div class="containers">
                    <h3 style="padding: 2px;">Pupil's Name </h3>
                </div>
            </div>
            <div class="wide-column">
                <div class="containers">
                    <h3 style="padding: 2px;">Grade and Section</h3>
                </div>
            </div>

            <div class="wide-column">
                <div class="containers">
                    <h3 style="padding: 2px;">Status</h3>
                </div>
            </div>
            <div class="wide-column">
                <div class="containers">
                    <h3 style="padding: 2px;">Action</h3>
                </div>
            </div>
        </div>

        <table border="0" id="identification-behavioral">
        <?php
if ($behavioalresult->num_rows > 0) {
    // Output data of each row
    while ($row = $behavioalresult->fetch_assoc()) {
        echo "<tr class='sheshable'>";
        echo "<td style='width:18%'>" . htmlspecialchars($row["lrn"]) . "</td>";
        echo "<td style='width:27%'>" . htmlspecialchars($row["fullname"]) . "</td>";
        echo "<td style='width:19%'>" . ucfirst(htmlspecialchars($row["grade"])) . " - " . ucfirst(htmlspecialchars($row["section"])) . "</td>";
        echo "<td style='width:20%'>" . htmlspecialchars($row["status"]) . "</td>";
        echo "<td style='width:25%' class='act'>";
        
        // Start the form for each row
        echo "<form method='post' action='' style='display:inline;'>";
        // Add hidden input to store the unique identifier for the record
        echo "<input type='hidden' name='lrn' value='" . htmlspecialchars($row["lrn"]) . "'>";
        echo "<input type='hidden' name='fullname' value='" . htmlspecialchars($row["fullname"]) . "'>";
        echo "<input type='hidden' name='grade' value='" . htmlspecialchars($row["grade"]) . "'>";
        echo "<input type='hidden' name='section' value='" . htmlspecialchars($row["section"]) . "'>";
        echo "<button type='submit' name='submit1' style='background-color:#170C59; width: 260px; padding: 3px; margin: 8px;' class='updateRecordButtons'>UPDATE RECORD</button>";
        echo "</form>"; // End the form
        
        echo "</td>";
        echo "</tr>";
    }
}
?>
<?php
if ($behavioalresult->num_rows > 0) {
    // Output data of each row
    while ($row = $behavioalresult->fetch_assoc()) {
        echo "<tr class='sheshable'>";
        echo "<td style='width:18%'>" . htmlspecialchars($row["lrn"]) . "</td>";
        echo "<td style='width:27%'>" . htmlspecialchars($row["fullname"]) . "</td>";
        echo "<td style='width:19%'>" . ucfirst(htmlspecialchars($row["grade"])) . " - " . ucfirst(htmlspecialchars($row["section"])) . "</td>";
        echo "<td style='width:20%'>" . htmlspecialchars($row["status"]) . "</td>";
        echo "<td style='width:25%' class='act'>";
        
        // Start the form for each row
        echo "<form method='post' action='' style='display:inline;'>";
        // Add hidden input to store the unique identifier for the record
        echo "<input type='hidden' name='lrn' value='" . htmlspecialchars($row["lrn"]) . "'>";
        echo "<input type='hidden' name='fullname' value='" . htmlspecialchars($row["fullname"]) . "'>";
        echo "<input type='hidden' name='grade' value='" . htmlspecialchars($row["grade"]) . "'>";
        echo "<input type='hidden' name='section' value='" . htmlspecialchars($row["section"]) . "'>";
        echo "<button type='submit' name='submit1' style='background-color:#170C59; width: 260px; padding: 3px; margin: 8px;' class='updateRecordButtons'>UPDATE RECORD</button>";
        echo "</form>"; // End the form
        
        echo "</td>";
        echo "</tr>";
    }
}
?>

</table>



    </div>

         <form action="" method="POST" class="form-container" style="display: none;" id="pupilRecord">
            <div class="main-containers">
            <span class="closes" onclick="closeForm()">&times;</span>
            <h3 class="record_header">BEHAVIORAL RECORD</h3>
                <div class="rows">
                    <div class="columns">
                        <div class="containerss firsts">
                            <h3>S.Y. 2023 - 2024: Quarter 1</h3>
                        </div>
                    </div>
                    <div class="columns" style="background:none">
                        <div class="containerss seconds" >
                            <button style="background:transparent; border: none"><h3><i class='bx bx-printer' ></i>Print Records</h3></button>
                        </div>
                    </div>
                </div>


                <div class="rows">
                    <div class="columns" >
                        <div class="containerss" style="background-color: #190572">
                            <h3 style="margin-left:10px">LRN</h3>
                        </div>
                    </div>
                    <div class="columns column-rights">
                        <div class="containerss" style="background-color: #F3F3F3;">
                        <input type="text" name="lrn" id="lrn"  readonly>
                        </div>
                    </div>
                    <div class="columns column-lefts">
                        <div class="containerss" style="background-color: #190572;">
                            <h3 style="margin-left:10px">Status</h3>
                        </div>
                    </div>
                    <div class="columns half-widths">
                        <div class="select-wrapper">
                            <select id="topdown2" name="quarter" class="containers second" onchange="redirectToQuarter()" style="background-color: #F3F3F3;">
                                <option value="" disabled selected hidden>Pending</option>
                                <option value="On-Going">On-Going</option>
                                <option value="Resolved">Resolved</option>
                                <option value="Unresolved">Unresolved</option>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="rows">
                    <div class="columns">
                        <div class="containerss" style="background-color: #190572;">
                            <h3 style="margin-left:10px">Pupil's Name</h3>
                        </div>
                    </div>
                    <div class="columns column-rights">
                        <div class="containerss" style="background-color: #F3F3F3;">
                        <input type="text" name="fullname" id="fullname"  readonly>
                        </div>
                    </div>
                    <div class="columns column-lefts">
                        <div class="containerss" style="background-color: #190572;">
                            <h3 style="margin-left:10px">Grade & Section</h3>
                        </div>
                    </div>
                    <div class="columns half-widths">
                        <div class="containerss" style="background-color: #F3F3F3;">
                        <input type="text" name="classification" id="classification" class="rights" readonly>
                        </div>
                    </div>
                </div>


                <div class="rows">
                    <div class="columns">
                        <div class="containerss" style="background-color: #190572;">
                            <h3 style="margin-left:10px">Guardian Name</h3>
                        </div>
                    </div>
                    <div class="columns column-rights">
                        <div class="containerss editable-containers" style="background-color: #F3F3F3;">
                            <input type="text" name="gname" id="gname" value="" placeholder=" " required>
                        </div>
                    </div>
                    <div class="columns column-lefts">
                        <div class="containerss" style="background-color: #190572;">
                            <h3 style="margin-left:10px">Contact Number</h3>
                        </div>
                    </div>
                    <div class="columns half-widths">
                        <div class="containerss editable-containers" style="background-color: #F3F3F3;">
                            <input type="text" name="number" id="cnumber" value="" placeholder=" " required class="rights">
                        </div>
                    </div>
                </div>

                <table class="update-record">
                <tr id="row1">
                    <th>Notes</th>
                    <th>Topic/Matter</th>
                    <th>Intervention</th>
                    <th>Advice</th>
                    <th>Recommended to</th>
                </tr>
                <tr id="row2" class="table_body">
                    <td><input class="put" type="text" placeholder="Enter Notes"><span class="dates"></span></td>
                    <td><input type="text" placeholder="Enter Topic/Matter"><span class="dates"></span></td>
                    <td><input type="text" placeholder="Enter Intervention"><span class="dates"></span></td>
                    <td><input type="text" placeholder="Enter Advice"><span class="dates"></span></td>
                    <td><input type="text" placeholder="Enter Recommended to"><span class="dates"></span></td>
                </tr>
                <tr id="row3" class="table_body">
                    <td><input type="text" placeholder="Enter Notes"><span class="dates"></span></td>
                    <td><input type="text" placeholder="Enter Topic/Matter"><span class="dates"></span></td>
                    <td><input type="text" placeholder="Enter Intervention"><span class="dates"></span></td>
                    <td><input type="text" placeholder="Enter Advice"><span class="dates"></span></td>
                    <td><input type="text" placeholder="Enter Recommended to"><span class="dates"></span></td>
                </tr>
                <tr id="row4" class="table_body">
                    <td><input type="text" placeholder="Enter Notes"><span class="dates"></span></td>
                    <td><input type="text" placeholder="Enter Topic/Matter"><span class="dates"></span></td>
                    <td><input type="text" placeholder="Enter Intervention"><span class="dates"></span></td>
                    <td><input type="text" placeholder="Enter Advice"><span class="dates"></span></td>
                    <td><input type="text" placeholder="Enter Recommended to"><span class="dates"></span></td>
                </tr>
                <tr id="row5" class="table_body">
                    <td><input type="text" placeholder="Enter Notes"><span class="dates"></span></td>
                    <td><input type="text" placeholder="Enter Topic/Matter"><span class="dates"></span></td>
                    <td><input type="text" placeholder="Enter Intervention"><span class="dates"></span></td>
                    <td><input type="text" placeholder="Enter Advice"><span class="dates"></span></td>
                    <td><input type="text" placeholder="Enter Recommended to"><span class="dates"></span></td>
                </tr>
                </table>
                
                <button id="saveButton" class="saveButton">Save Changes</button>
                
                
            </div>
        </form>
        <div class="pagination">
            <button id="prevbutton" onclick="prevPageReportTable()">Previous</button>
            <button id="nextbutton" onclick="nextPageReportTable()">Next</button>
        </div>

    <div class="overlay" id="overlay"></div>


    <div class="login-container" id="login-container">
    <span class="close">&times;</span>
    <h4>Adding <span class="student-name"></span> as Pupil At Risk</h4>

    <form class="login-form" action="" method="post">
        <div class="row">
            <div class="columns-group">
                <div class="form-group">
                    <label for="topdown">Identification</label>
                    <select name="identification" class="identificationDropdown">
                        <option value="option1">Academic - Literacy in English</option>
                        <option value="option1">Academic - Literacy in Filipino</option>
                        <option value="option1">Academic - Numeracy</option>
                        <option value="option1">Behavioral</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="date-added">Date Added</label>
                    <input type="text" class="date" name="date" value="<?php echo date('Y-m-d'); ?>" readonly>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" name="submit1" class="addPupilButton">ADD PUPIL AT RISK</button>
        </div>
    </form>
</div>

<script >
    //FUNCTIONS FOR INTERVENTIONS
    function closeForm() {
    document.getElementById('formContainer').style.display = 'none'; // Hide the form container
    }       

    document.getElementById('saveButton').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent form submission
    
    var currentDate = new Date();
    var formattedDate = currentDate.toLocaleDateString() + ' ' + currentDate.toLocaleTimeString();
    
        // Update date only for the input boxes with data entered
        document.getElementById('saveButton').addEventListener('click', function() {
    var inputFields = document.querySelectorAll('input[type="text"]');
    inputFields.forEach(function(inputField) {
        if (inputField.value.trim() !== '' && !inputField.dataset.dateSaved) {
            var dateElement = inputField.nextElementSibling; // Get the date span next to the input field
            var currentTime = new Date().toLocaleTimeString(); // Get the current time
            dateElement.textContent = currentTime; // Display the current time
            inputField.disabled = true; // Disable input field for the saved row
            inputField.dataset.dateSaved = true; // Mark that date is saved for this input field
        }
    });
});
});


//show form-container
function showPupilRecord() {
        var pupilRecord = document.querySelector(".form-container");
        var overlay = document.querySelector(".overlay");
        pupilRecord.style.display = "block";
        overlay.style.display = "block";
    }

    function closeForm() {
        var pupilRecord = document.querySelector(".form-container");
        var overlay = document.querySelector(".overlay");
        pupilRecord.style.display = "none";
        overlay.style.display = "none";
    }

//show login
document.addEventListener("DOMContentLoaded", function() {
    var updateRecordButtons = document.querySelectorAll(".updateRecordButton");
    var overlays = document.querySelectorAll(".overlay");
    var loginContainers = document.querySelectorAll(".login-container");
    var closeButtons = document.querySelectorAll(".close");

    updateRecordButtons.forEach(function(button, index) {
        button.addEventListener("click", function() {
            overlays[index].style.display = "block";
            loginContainers[index].style.display = "block";
        });
    });

    overlays.forEach(function(overlay, index) {
        overlay.addEventListener("click", function() {
            overlay.style.display = "none";
            loginContainers[index].style.display = "none";
        });
    });

    closeButtons.forEach(function(closeButton, index) {
        closeButton.addEventListener("click", function() {
            overlays[index].style.display = "none";
            loginContainers[index].style.display = "none";
        });
    });
});

document.addEventListener("DOMContentLoaded", function() {
    var updateRecordButtons = document.querySelectorAll(".updateRecordButton");
    var overlays = document.querySelectorAll(".overlay");
    var loginContainers = document.querySelectorAll(".login-container");
    var closeButtons = document.querySelectorAll(".close");

    updateRecordButtons.forEach(function(button, index) {
        button.addEventListener("click", function() {
            var studentName = document.querySelector("#pupilTable tr.sheshable th:nth-child(2)").textContent;
            var studentNameSpans = document.querySelectorAll(".student-name");
            studentNameSpans.forEach(function(span) {
                span.textContent = studentName;
            });

            overlays[index].style.display = "block";
            loginContainers[index].style.display = "block";
        });
    });

    overlays.forEach(function(overlay, index) {
        overlay.addEventListener("click", function() {
            overlay.style.display = "none";
            loginContainers[index].style.display = "none";
        });
    });

    closeButtons.forEach(function(closeButton, index) {
        closeButton.addEventListener("click", function() {
            overlays[index].style.display = "none";
            loginContainers[index].style.display = "none";
        });
    });
});

//change add pupil at risk button to update record
document.addEventListener("DOMContentLoaded", function() {
    var addPupilButtons = document.querySelectorAll(".addPupilButton");
    var updateRecordButtonsss = document.querySelectorAll(".updateRecordButton");
    var updateRecordButtons = document.querySelectorAll(".updateRecordButtons");
    var overlays = document.querySelectorAll(".overlay");
    var loginContainers = document.querySelectorAll(".login-container");
    var closeButtons = document.querySelectorAll(".close");

    addPupilButtons.forEach(function(button, index) {
        button.addEventListener("click", function() {
            var studentName = document.querySelector("#pupilTable tr.sheshable th:nth-child(2)").textContent;
            var studentNameSpans = document.querySelectorAll(".student-name");
            studentNameSpans.forEach(function(span) {
                span.textContent = studentName;
            });

            overlays[index].style.display = "block";
            loginContainers[index].style.display = "block";

            updateRecordButtonsss[index].style.display = "none";
            updateRecordButtons[index].style.display = "inline-block";
        });
    });

    overlays.forEach(function(overlay, index) {
        overlay.addEventListener("click", function() {
            overlay.style.display = "none";
            loginContainers[index].style.display = "none";
        });
    });

    closeButtons.forEach(function(closeButton, index) {
        closeButton.addEventListener("click", function() {
            overlays[index].style.display = "none";
            loginContainers[index].style.display = "none";
        });
    });

    loginContainers.forEach(function(container, index) {
        container.querySelector("form").addEventListener("submit", function(event) {
            event.preventDefault();

            overlays[index].style.display = "none";
            container.style.display = "none";
        });
    });
});

//next and prev button
var currentPageDataTable = 1;
var rowsPerPageDataTable = 8;

    function showRowsDataTable() {
        var rows = document.querySelectorAll('#pupilTable tr');
        var startIndex = (currentPageDataTable - 1) * rowsPerPageDataTable;
        var endIndex = startIndex + rowsPerPageDataTable;

        rows.forEach(function(row, index) {
            if (index >= startIndex && index < endIndex) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    }

    function prevPage() {
        if (currentPageDataTable > 1) {
            currentPageDataTable--;
            showRowsDataTable();
        }
    }

    function nextPage() {
        var rows = document.querySelectorAll('#pupilTable tr');
        var totalRows = rows.length;
        var totalPages = Math.ceil(totalRows / rowsPerPageDataTable);

        if (currentPageDataTable < totalPages) {
            currentPageDataTable++;
            showRowsDataTable();
        }
    }

    showRowsDataTable();

    document.getElementById('prevbutton').addEventListener('click', prevPage);
    document.getElementById('nextbutton').addEventListener('click', nextPage);

</script>
<script>
    function submitForm() {
        document.getElementById('quarterForm1').submit();
    }
</script>
</body>
</html>
