<?php
if (isset($_POST['upload'])) {
    header("Location: ../manage_student/Add_Studentlist_import.php");
}
?>
<?php
    include('../../database.php');

    if(isset($_POST['submit1'])) {
        // Retrieve form data
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $extension = $_POST['extension'];
        $employment_number = $_POST['employment_number'];
        $grade = $_POST['grade'];
        $section = $_POST['section'];
        $date = date('Y-m-d'); // Current date
        $school = "Bacayao Sur Elementary School";
        $activation = "activate";
        $year = date('Y');

        // Concatenate full name
        $fullname = $firstname . ' ' . $middlename . ' ' . $lastname . ' ' . $extension;

        // Generate password
        $password = substr($firstname, 0, 3) . substr($lastname, 0, 2) . substr($employment_number, 0, 2);

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Set verified to "no"
        $verified = "no";

        // Insert data into the database
        $query = "INSERT INTO adviser (fullname, employment_number, password, grade, section, school, date, verified, activation, year) VALUES ('$fullname', '$employment_number', '$hashed_password', '$grade', '$section', '$school','$date', '$verified', '$activation', '$year')";

        $result = mysqli_query($conn, $query);

        // Create PHP file
        $filename = "../adviser_dashboard/grade_${grade}_section_${section}.php";
        $template_file = "../adviser_dashboard/template_adviser.php";

        // Read template content
        $template_content = file_get_contents($template_file);

        // Replace placeholders with actual values
        $template_content = str_replace('{FULLNAME}', $fullname, $template_content);
        $template_content = str_replace('{EMPLOYMENT_NUMBER}', $employment_number, $template_content);
        $template_content = str_replace('{GRADE}', $grade, $template_content);
        $template_content = str_replace('{SECTION}', $section, $template_content);

        // Write content to new PHP file
        file_put_contents($filename, $template_content);
    }
?>
<?php
    include('../../database.php');
    if(isset($_POST['submit2'])) {
        // Retrieve form data
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $extension = $_POST['extension'];
        $employment_number = $_POST['employment_number'];
        $school = "Bacayao Sur Elementary School";
        $date = date('Y-m-d');
        $activation = "activate";
        $year = date('Y');
        $fullname = $firstname . ' ' . $middlename . ' ' . $lastname . ' ' . $extension;
        
        // Generate password
        $password = substr($firstname, 0, 3) . substr($lastname, 0, 2) . substr($employment_number, 0, 2);
        
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Set verified to "no"
        $verified = "no";

        // Insert data into the database
        $query = "INSERT INTO principal (fullname, employment_number, date, password, school, verified, activation, year) VALUES ('$fullname', '$employment_number', '$date', '$hashed_password','$school', '$verified', '$activation', '$year')";
        
        $result = mysqli_query($conn, $query);
    }
?>
<?php
    include('../../database.php');
    if(isset($_POST['submit3'])) {
        // Retrieve form data
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $extension = $_POST['extension'];
        $employment_number = $_POST['employment_number'];
        $school = "Bacayao Sur Elementary School";
        $date = date('Y-m-d');
        $activation = "activate";
        $year = date('Y');
        

        // Concatenate full name
        $fullname = $firstname . ' ' . $middlename . ' ' . $lastname . ' ' . $extension;
        
        // Generate password
        $password = substr($firstname, 0, 3) . substr($lastname, 0, 2) . substr($employment_number, 0, 2);
        
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Set verified to "no"
        $verified = "no";

        // Insert data into the database
        $query = "INSERT INTO counselor (fullname, employment_number, date, password, school, verified, activation, year) VALUES ('$fullname', '$employment_number', '$date', '$hashed_password','$school', '$verified', '$activation', '$year')";
        
        $result = mysqli_query($conn, $query);
    }
?>
<?php
    include('../../database.php');
    if(isset($_GET['employment_number'])) {
        $employment_number = $_GET['employment_number'];
        $sql = "SELECT fullname FROM school_admin WHERE employment_number = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $employment_number);
        $stmt->execute();
        $stmt->bind_result($sdoname);
        if($stmt->fetch()) {
        }
        $stmt->close();
    } 
    $conn->close();
?>
<?php
    include('../../database.php');

    // Array to store fetched data
    $data = array();

    // Array of tables
    $tables = ['adviser', 'principal', 'counselor'];
    $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;

    // Loop through each table
    foreach ($tables as $table) {
        $sql = "SELECT fullname, employment_number, email, date FROM $table WHERE year = $school_year";
        $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch data and add it to $data array
        while ($row = $result->fetch_assoc()) {
            // Replace underscore with space in table name and capitalize each word
            $position = ucwords(str_replace('_', ' ', $table)); 
            $row['position'] = $position; // Adding position based on modified table name
            $data[] = $row;
        }
    }

    }
?>
<?php
    // Assuming you have already established a MySQLi conn

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the "activate" button was clicked
    if (isset($_POST["activate"])) {
        // Get the employment number from the form submission
        $employment_number = $_POST["employment_number"];

        // Prepare and execute SELECT queries to check if employment_number exists in each table
        $tables = ['adviser', 'principal', 'counselor'];
        $found = false;

        foreach ($tables as $table) {
            $sql = "SELECT * FROM $table WHERE employment_number = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $employment_number);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // If employment_number found in table, update activation column
                $found = true;
                $sql_update = "UPDATE $table SET activation = 'activate' WHERE employment_number = ?";
                $stmt_update = $conn->prepare($sql_update);
                $stmt_update->bind_param("s", $employment_number);
                $stmt_update->execute();
            }
        }
    } elseif (isset($_POST["deactivate"])) { // Check if the "deactivate" button was clicked
        // Get the employment number from the form submission
        $employment_number = $_POST["employment_number"];

        // Prepare and execute UPDATE queries to deactivate the user only in the table where employment_number is found
        $tables = ['adviser', 'principal', 'counselor'];

        foreach ($tables as $table) {
            $sql_check = "SELECT * FROM $table WHERE employment_number = ?";
            $stmt_check = $conn->prepare($sql_check);
            $stmt_check->bind_param("s", $employment_number);
            $stmt_check->execute();
            $result_check = $stmt_check->get_result();

            if ($result_check->num_rows > 0) {
                $sql_update = "UPDATE $table SET activation = 'deactivate' WHERE employment_number = ?";
                $stmt_update = $conn->prepare($sql_update);
                $stmt_update->bind_param("s", $employment_number);
                $stmt_update->execute();
                // Since we found the employment number in one table, we can break out of the loop
                break;
            }
        }
    }
    }
?>
<?php
    include('../../database.php');

    if(isset($_POST['reset'])) {
        // Retrieve employment number from form submission
        $employment_number = $_POST['employment_number'];
        
        // Generate a hashed password (you can use password_hash() function)
        $hashed_password = password_hash($employment_number, PASSWORD_DEFAULT);
        
        // Check if the employment number exists in any of the tables
        $tables = array('adviser', 'principal', 'counselor');
        foreach ($tables as $table) {
            $query = "SELECT * FROM $table WHERE employment_number = '$employment_number'";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result) > 0) {
                // If employment number found, update the password to the hashed value
                $updateQuery = "UPDATE $table SET password = '$hashed_password' WHERE employment_number = '$employment_number'";
                mysqli_query($conn, $updateQuery);
                // Break the loop since the employment number is found
                break;
            }
        }
        // You can add further logic here, like displaying a message to the user after resetting the password
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
    $errormsg="";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['view'])) {
            $folderPath = '../manage_student/grade_sections/';
            $files = scandir($folderPath);

            // Filter out the '.' and '..' directories
            $files = array_diff($files, array('.', '..'));

            if (!empty($files)) {
                // Get the first file in the directory
                $firstFile = reset($files);

                // Redirect or perform action with the first file
                header("Location: " . $folderPath . $firstFile);
                exit();
            } else {
                $errormsg = "No List of Students to view";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>School Administrator</title>
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
            background-color: white;
            background-size: cover;
            overflow-y: hidden;
        }
        
        .logo {
            width: 75px;
            height: 75px;
            margin: 0 auto 20px;
            background-image: url('../img/logo.png'); 
            background-size: cover;
        }
        
        h3 {
            font-family: 'Darker Grotesque', sans-serif;
            color: #fff;
        }
        
        h2 p{
            margin-top: 5px;
            font-size: 18px;
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

        .edit-container {
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

        h2 {
            color: #fff;
        }

        button {
        margin-top: 10px;
        background-color: #0C052F;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
        width: 97.5%;
        }

        button:hover {
            background-color: #ddd;
            border: 1px solid #0C052F;
            color: #190572;
        }

        .row {
        display: flex;
        }

        .columns {
        flex: 1;
        padding: 10px;
        }

        .columns:nth-child(1) {
        flex: 70;
        }

        .columns:nth-child(2) {
        flex: 50;
        }

        .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 10px;
        }

        label {
        font-size: 10px;
        color: #FFFFFF; 
        text-align: left;
        }

        textarea,
        input[type="text"],
        input[type="number"],
        input[type="password"],
        input[type="email"],
        select, #date-added {
        height: 20x;
        padding: 10px;
        border: 1px solid #0C052F; 
        border-radius: 5px;
        background-color: #DDDAE7;
        color: #0C052F; 
        }

        h3{
        color: #fff;
        }

        .main-container {
            width: 100%;
            margin-top: 70px;
            height: 85%;
            background-color: white;
            opacity: 80%;
            overflow: hidden;
            padding: 20px;
        }

        .inner-container {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        .top-inner-container{
            height: 20px;
            background-color: #190572;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            border-top-right-radius: 10px;
            border-top-left-radius: 10px;
        }


        .middle-inner-container {
            background-color: #2206A0CC;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 40px;
            color: #FFFFFF;
            border-radius: 5px;
        }
        
        .middle-inner-container h3 {
            font-family: 'Darker Grotesque', sans-serif;
            font-weight: 500;
            color: #FFFFFF;
            font-size: 1.5rem;
            letter-spacing: 2px;
        }
        
        .bottom-inner-container {
            height: 20px;
            background-color: #190572;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom-right-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        .bottom-inner-container2 {
            margin-top: 10px;
            background-color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            height: fit-content;
            color: #190572;
            border-radius: 10px;
        }

        ::-webkit-scrollbar {
            width: 10px;
        }
    
        ::-webkit-scrollbar-thumb {
            background-color: #190572;
            border-radius: 20px;
        }
    
        ::-webkit-scrollbar-track {
            background-color: #E2DFEE;
            border-radius: 20px;
        }

        .bottom-inner-container2 {
            margin-top: 20px;
            background-color: transparent;
            display: grid;
            grid-template-columns: repeat(6, 1fr); 
            gap: 5px; 
            align-items: center;
            justify-content: center;
        }


        .table {
            border-collapse: collapse;
            width: 100%;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .column {
            background-color: #190572;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 25px;
            position: relative;
            color: #fff;
        }

        .column h3 {
            font-size: 15px;
            margin: 0;
        }

        .sheshable {
            background-color: transparent;
            color: #EFDFDF;
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 10px;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
        }

        .rows {
            border-bottom: 1px solid #000000;
            color: #000;
            padding: 5px;
            font-size: 16px;
            position: relative;
        }

        .straight-line {
            height: 1px;
            width: calc(100% - 40px);
            background-color: #000; 
            margin: 0 auto;
        }
        
        .sheshable td {
            border: none;
        }

        .table tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .table td {
            padding: 10px;
        }

        .button-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .action-button {
            color: #fff;
            border: none;
            padding: 5px 10px;
            margin: 5px;
            border-radius: 5px;
            cursor: pointer;
            width: 10rem;
        }

        .action-button{
            background-color: #0C052F;
            color: white;
        }

        .action-button:hover{
            background-color: #ddd;
            border: 1px solid #0C052F;
            color: #190572;
        }
    
            .row {
            display: flex;
            }
    
            .columns {
            flex: 1;
            padding: 10px;
            }
    
            .columns:nth-child(1) {
            flex: 70;
            }
    
            .columns:nth-child(2) {
            flex: 50;
            }

            .dropdown{
                position: relative;
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
            border-radius: 5px;
        }

        .dropdown:hover .dropdown-content {
            display: block;
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

        .errormsg{
            margin-top: 20px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            color: #130550;
        }

        .filter-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            cursor: pointer;
        }

        .filter-options {
            position: absolute;
            bottom: calc(70% + 10px); 
            right: 15%;
            background-color:#130550;
            color: white;
            border: 1px solid #ddd;
            padding: 10px;
            z-index: 1;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: none;
            cursor: pointer;
        }
        .filter-options div {
            font-size: .9rem;
            display: block;
            padding: 5px 0;
            text-decoration: none;
            border-top: 1px solid #ddd;
        }

        .filter-options div:first-child{
            border-top: none;
        }

        .filter-options div:hover {
            border-radius: 3px;
            background-color: #f2f2f2;
            color: #0C052F;
        }

        .action-option {
            display: none;
            position: absolute;
            background-color: #130550;
            min-width: 100px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            right: 0; 
            top: 100%;
        }

        .action-option button {
            color: rgb(255, 253, 253);
            margin-top: 0;
            padding: 5px 10px;
            text-decoration: none;
            display: block;
            font-size: .9rem;
            border-top: 1px solid #ddd;
            border-radius: 0;
            width: 100%;
            text-align: left;
            background-color: transparent;
            cursor: pointer;
        }

        .action-option button:hover {
            background-color: #F3F3F3;
            color: #190572;
            opacity: 80%;
        }

        .dropdown:hover .action-option {
            display: block;
        }

        button[disabled] {
            opacity: 0.5;
            cursor: not-allowed;
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

        .addbutton-content {
            display: none;
            bottom: 10%;
            position: absolute;
            right: 5%;
            background-color: #130550;
            min-width: 100px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 7px;
        }

        .addbutton-content div {
            color: rgb(255, 253, 253);
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-size: .8rem;
            border-top: 1px solid #ddd;
            cursor: pointer;
        }

        .addbutton-content div:first-child{
            cursor:auto;
            font-weight: bold;
        }

        .addbutton-content div:not(:first-child):hover {
            background-color: #F3F3F3;
            color: #190572;
            opacity: 80%;
            border-radius: 5px;
        }

        .dropdowns:hover .addbutton-content {
            display: block;
        }

        .dropdown-contents {
            display: none;
            position: fixed;
            background-color: #f9f9f9;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            max-height: 200px; 
            overflow-y: auto; 
            width: 400px;
            border-radius: 7px;
        }
        .dropdown-contents a {
            color: #130550;
            padding: 12px 10px;
            text-decoration: none;
            display: block;
            text-align: left;
            font-size: .8rem;
        }
        .dropdown-contents a:hover {
            background-color:#130550;
            color: white;
            cursor: pointer;
            font-weight: bold;
        }
  
        .search-container:hover .dropdown-contents {
            display: block;
        }
        .search-container {
            position: relative;
            display: inline-block;
        }

        .search-container input[type="text"]{
            width: 89%;
        }

        .firstrow{
            padding-left: 20px;
            margin-bottom: 0;
            bottom: 0;
        }

        .firstrow .column{
            background-color: transparent;
        }

        .select-wrapper {
            position: relative;
            background: #FBFBFB;
            color: #190572;
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

        #topdown1 {
            width: 200px;
            background: #FBFBFB;
            color: #190572;
            text-align: center;
            border: none;
            font-size: .9rem;
            padding: 5px;
            margin-left: 1px;
        }

        .column button{
            padding: 5px;
            margin-top: 0;
        }

        .third-column {
            flex: 0 0 calc(30%); 
            margin-right: 0;
            position: relative; 
        }

        .search-box {
            margin-left: auto;
            background-color: #F3F3F3;
            display: flex;
            align-items: center;
            border: 1px solid #190572;
            padding: 0;
            width: 300px;
            margin-right: 200px;
        }

        .search-box input[type="text"]{
            border: none;
            background-color: transparent;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .search-input {
            border-radius: 5px;
            border: none;
            outline: none;
            width: 100%;
            background-color: #F3F3F3; 
        }

        .search-icon {
            margin-left: auto;
            cursor: pointer;
            color: #190572; 
            padding-right: 5px;
        }


            .modal {
                display: none;
                position: fixed;
                z-index: 1;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0,0,0,0.4);
            }

            .modal-content {
                border-radius: 7px;
                background-color: #130550;
                margin: 15% auto;
                padding: 20px;
                border: 1px solid #888;
                width: 30%;
            }

            h5{
                text-align: center;
                font-size: 1.2rem;
                color: #ddd;
            }

            #myModal input[type="date"]{
                height: 30px;
                width: 100%;
                border-radius: 5px;
            }

            #myModal label{
                color: white;
                font-size: 15px;
            }

            #endDateCalendar,
            #startDateCalendar{
                margin-bottom: 10px;
            }

            #myModal button{
                width: 95%;
                background-color: #ddd;
                border: 1px solid #0C052F;
                color: #190572;
            }

            #myModal button:hover{
                background-color: transparent;
                border: 1px solid #ddd;
                color: #ddd;
            }

            .close {
                color: #aaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: white;
                text-decoration: none;
                cursor: pointer;
            }
            /* Style for dropdown container */
    .dropdown-container {
        display: flex;
        justify-content: flex-end;
        margin-left: 620px;
    }

    /* Style for dropdown */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Style for dropdown button */
    .dropbtn {
        background-color: #130550;
        color: white;
        padding: 10px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        width: 200px;
        margin-left: -4rem;
    }

    /* Style for dropdown content */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        min-width: max-content;
        width: 200px;
    }

    /* Style for dropdown links */
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        width: auto;
    }

    /* Style for dropdown links on hover */
    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    /* Show dropdown content when hovering over dropdown button */
    .dropdown:hover .dropdown-content {
        display: block;
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
                <div class='name' onclick="toggleDropdown()"><?php echo $sdoname ?></div>
                    <div class="dropdown-content" id="dropdownContent">
                        <a href="../../login/Login.php">Log Out</a>
                        <a href="school_admin_change_password.php?employment_number=<?php echo isset($_GET['employment_number']) ? $_GET['employment_number'] : 'default_value'; ?>" style="border-top: 1px solid #ddd;">Change Password</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="main-container" style="position: relative;">
        <div class="firstrow">
            <div class="row">
                <div class="column">
                    <div class="select-wrapper">
                    <form id="school_year_form" method="post" action="">
                        <select id="topdown1" name="school-year" class="containers first">
                            <?php foreach ($school_years as $start_year => $school_year) : ?>
                                <?php $selected = (isset($_POST['school-year']) && $_POST['school-year'] == $start_year) || date('Y') == $start_year ? 'selected="selected"' : ''; ?>
                                <option value="<?php echo $start_year; ?>" <?php echo $selected; ?>><?php echo $school_year; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </form>
                    </div>
                    <div class="third-column">
                    <div class="search-box">
                        <input type="text" class="search-input" id="searchInput" placeholder="Search ...">
                        <i class='bx bx-search search-icon'></i>
                    </div>
                    
            </div>
            <div class="errormsg">
                        <?php echo $errormsg ?>
                    </div>
            <div class="column dropdown-container">
                <div class="dropdown">
                    <button class="dropbtn">Manage Student's List</button>
                    <div class="dropdown-content">
                        <form method="post">
                        <button name="view">View Student's List</button>
                        <button name="upload">Upload Student's List</button>
                        </form>
                    </div>
                </div>
            </div>

                    
                </div>

            </div>
        </div>

        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h5>ADD SCHOOL YEAR</h5>
                <label for="start">START OF SCHOOL YEAR</label>
                    <input type="date" name="start" id="startDateCalendar">
                <label for="end">END OF SCHOOL YEAR</label>
                    <input type="date" name="end" id="endDateCalendar">
                <button id="submitBtn" style="width: 100%;">Submit</button>
            </div>
        </div>

        <div class="inner-container">
    <div class="bottom-inner-container2">
        <div class="column"><h3>Name</h3></div>
        <div class="column"><h3>Employee Number</h3></div>
        <div class="column"><h3>Email Address</h3></div>
        <div class="column"><h3>Date Added</h3></div>
        <div class="column"><h3>Position<i class="bx bx-filter-alt filter-icon"></i></h3></div>
        <div class="column"><h3></h3></div>
    </div>
    <div class="filter-options show" id="filterOptions" onmouseleave="toggleFilterOptions()">
        <div>Principal</div>
        <div>Adviser</div>
        <div>Guidance Counselor</div>
    </div>

    <table class="table">

    <?php
    // Loop through $data to display table rows
    foreach ($data as $row) {
        echo "<tr class='sheshable'>";
        echo "<td class='rows'>" . $row['fullname'] . "</td>";
        echo "<td class='rows'>" . $row['employment_number'] . "</td>";
        echo "<td class='rows'>" . $row['email'] . "</td>";
        echo "<td class='rows'>" . $row['date'] . "</td>";
        echo "<td class='rows'>" . $row['position'] . "</td>";
        echo "<td class='rows'>";
        echo "<div class='actions-container'>";
        echo "<div class='dropdown'>";
        echo "<button class='action-button' onclick='toggleActionsDropdown()'>Actions</button>";
        echo "<div class='action-option' id='actionsDropdown'>";
        echo "<button onclick='toggleEditContainer(this)'>Edit</button>"; // Add event listener
        echo "<form method='post' action=''>"; // Opening form tag
        echo "<input type='hidden' name='employment_number' value='" . $row['employment_number'] . "'>"; // Hidden input for employment number
        echo "<button type='submit' name='activate'>Activate</button>"; // Submit button
        echo "<input type='hidden' name='employment_number' value='" . $row['employment_number'] . "'>"; // Hidden input for employment number
        echo "<button type='submit' name='deactivate'>Deactivate</button>"; // Submit button
        echo "<input type='hidden' name='employment_number' value='" . $row['employment_number'] . "'>";
        echo "<button type='submit' name='reset'>Reset Password</button>"; // Submit button
        echo "</form>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</td>";
        echo "</tr>";
    }        
    ?>
</table>

</div>

    </div>

    <div class="dropdowns">
        <div class="plus-button">
            <button id="plusButton" class="add-button" ><i class='bx bx-plus'></i></button>
        </div>
        <div class="addbutton-content show" id="createAccountDropdown" >
            <div>Create an account for:</div>
            <div onclick="createAccount('Principal')">Principal</div>
            <div onclick="createAccount('Adviser')">Adviser</div>
            <div onclick="createAccount('Guidance Counselor')">Guidance Counselor</div>
        </div>
    </div>

    <div class="overlay" id="overlay"></div>

    <!-- form -->
    <div class="login-container" style="display: none;">
    <span class="close">&times;</span>
    <div class="logo"></div>
    <h2>Principal</h2>


    <form class="login-form" action="" method="post">
        <div class="row">
            <div class="columns">
                <div class="form-group">
                    <label for="name">First Name</label>
                    <input type="text" id="firstname" name="firstname" required>
                </div>
                <div class="form-group">
                    <label for="idnum">Last Name</label>
                    <input type="text" id="lastname" name="lastname" required>
                </div>
                <div class="form-group">
                    <label for="topdown">Employee Number</label>
                    <input type="number" name="employment_number" required>
                </div>
            </div>

            <div class="columns">
                <div class="form-group">
                    <label for="date-added">Middle Name</label>
                    <input type="text" id="middle-name" name="middlename" required>
                </div>
                <div class="form-group">
                    <label for="topdown">Extension Name</label>
                    <input type="text" name="extension">
                </div>
                <div class="form-group">
                    <label for="date-added">Date Added</label>
                    <input type="text" id="date" name="date" value="<?php echo date('Y-m-d'); ?>" readonly>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" name="submit2">Create Account</button>
        </div>
    </form>
</div>

<div class="login-container guidance" style="display: none;">
    <span class="close">&times;</span>
    <div class="logo"></div>
    <h2>Guidance Counselor</h2>


    <form class="login-form" action="" method="post">
        <div class="row">
            <div class="columns">
                <div class="form-group">
                    <label for="name">First Name</label>
                    <input type="text" id="firstname" name="firstname" required>
                </div>
                <div class="form-group">
                    <label for="idnum">Last Name</label>
                    <input type="text" id="lastname" name="lastname" required>
                </div>
                <div class="form-group">
                    <label for="topdown">Employee Number</label>
                    <input type="number" name="employment_number" required>
                </div>
            </div>

            <div class="columns">
                <div class="form-group">
                    <label for="date-added">Middle Name</label>
                    <input type="text" id="middle-name" name="middlename" required>
                </div>
                <div class="form-group">
                    <label for="topdown">Extension Name</label>
                    <input type="text" name="extension">
                </div>
                <div class="form-group">
                    <label for="date-added">Date Added</label>
                    <input type="text" id="date" name="date" value="<?php echo date('Y-m-d'); ?>" readonly>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" name="submit3">Create Account</button>
        </div>
    </form>
</div>


    <div class="login-container adviser" style="display: none;">
    <span class="close">&times;</span>
        <div class="logo"></div>
        <h2>Adviser</h2>

        <form class="login-form" action="" method="post">
            <div class="row">
                <div class="columns">
                    <div class="form-group">
                        <label for="name">First Name</label>
                        <input type="text" id="firstname" name="firstname" required>
                    </div>
                    <div class="form-group">
                        <label for="idnum">Middle Name</label>
                        <input type="text" id="middlename" name="middlename" required>
                    </div>
                    <div class="form-group">
                        <label for="pass">Last Name</label>
                        <input type="text" id="pass" name="lastname" required>
                    </div>
                    <div class="form-group">
                        <label for="date-added">Extension Name </label>
                        <input type="text"  name="extension">
                    </div>
                </div>

                <div class="columns">
                <div class="form-group">
                        <label for="date-added">Date Added</label>
                        <input type="date" id="date-added" name="date" value="<?php echo date('Y-m-d'); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="topdown">Employee Number</label>
                        <input type="number"  name="employment_number" required>
                    </div>
                    <div class="form-group">
                        <label for="topdown">Grade</label>
                        <select id="topdown" name="grade" >
                            <option value="kinder">Kinder</option>
                            <option value="I">1</option>
                            <option value="II">2</option>
                            <option value="III">3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pass">Section</label>
                        <input type="text" id="section" name="section" >
                    </div>
            </div>
            </div>
            <button type="submit" name="submit1" id="add-btn">Create Account</button>
        </form>
    </div>

    <div class="edit-container">
    <span class="close">&times;</span>
        <div class="logo"></div>
        <h2>SDO Administrator</h2>

        <form class="login-form" action="" method="post">
            <div class="row">
            <div class="columns">
                <div class="form-group">
                        <label for="full-name">Full Name</label>
                        <input type="text" id="full-name" name="full-name" value="" readonly>
                </div>
                  <div class="form-group">
                        <label for="idnum">Employee Number</label>
                        <input type="text" id="idnum" name="employee-number" value="" readonly>
                  </div>
            </div>

            <div class="columns">
                <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="" required>
                </div>
                <div class="form-group">
                        <label for="date-added">Date Added</label>
                        <input type="date" id="date-added" name="date-added" value="" readonly>
                </div>
                </div>
            </div>
            <button type="submit" name="update" id="add-btn">Save Changes</button>
        </form>
    </div>

    <script src="SDO_manage_account.js"></script>
    <script>
    // Function to filter table rows based on search input
    function filterTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementsByClassName("table")[0]; // Assuming only one table in the document
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");
            for (var j = 0; j < td.length; j++) {
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break; // Break the loop if any column matches
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    }

    // Add event listener to the search input
    document.getElementById("searchInput").addEventListener("input", filterTable);
</script>
<script>
    document.getElementById('topdown1').addEventListener('change', function() {
        if (this.value !== "new-option") {
            document.getElementById('school_year_form').submit();
        }
    });

    // After form submission, re-select the previously selected option
    <?php if(isset($_POST['school-year']) && $_POST['school-year'] !== "new-option"): ?>
        document.getElementById('topdown1').value = "<?php echo $_POST['school-year']; ?>";
    <?php endif; ?>
</script>
</body>
</html>