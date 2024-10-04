<?php
    include('../database.php');
    if(isset($_POST['submit1'])) {
        // Retrieve form data
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $extension = $_POST['extension'];
        $employment_number = $_POST['employment_number'];
        $activation = "activate";
        $date = date('Y-m-d'); // Current date
        $year = date('Y');

        // Concatenate full name
        $fullname = $firstname . ' ' . $middlename . ' ' . $lastname . ' ' . $extension;
        
        // Generate password
        $password = substr($firstname, 0, 3) . substr($lastname, 0, 2) . substr($employment_number, 0, 2);
        
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Set verified to "no"
        $verified = "no";
        $position = "SDO ADMIN";

        // Insert data into the database

        $query = "INSERT INTO sdo_admin (fullname, employment_number, date, password, verified, activation, year, position) VALUES ('$fullname', '$employment_number', '$date', '$hashed_password', '$verified', '$activation','$year','$position')";
        
        $result = mysqli_query($conn, $query);
    }
?>
<?php
    include('../database.php');
    if(isset($_POST['submit3'])) {
        // Retrieve form data
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $extension = $_POST['extension'];
        $employment_number = $_POST['employment_number'];
        $activation = "activate";
        $date = date('Y-m-d'); // Current date
        $year = date('Y');

        // Concatenate full name
        $fullname = $firstname . ' ' . $middlename . ' ' . $lastname . ' ' . $extension;
        
        // Generate password
        $password = substr($firstname, 0, 3) . substr($lastname, 0, 2) . substr($employment_number, 0, 2);
        
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Set verified to "no"
        $verified = "no";
        $position = "Executive Committee";

        // Insert data into the database
        $query = "INSERT INTO executive_committee (fullname, employment_number, date, password, verified, activation, year, position) VALUES ('$fullname', '$employment_number', '$date', '$hashed_password', '$verified', '$activation', '$year','$position')";
        
        $result = mysqli_query($conn, $query);
    }
?>
<?php
    include('../database.php');
    if(isset($_POST['submit2'])) {
        // Retrieve form data
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $extension = $_POST['extension'];
        $employment_number = $_POST['employment_number'];
        $school = $_POST['schoolName'];
        $activation = "activate";
        $date = date('Y-m-d');
        
        // Get the current year
        $year = date('Y');

        // Concatenate full name
        $fullname = $firstname . ' ' . $middlename . ' ' . $lastname . ' ' . $extension;
        
        // Generate password
        $password = substr($firstname, 0, 3) . substr($lastname, 0, 2) . substr($employment_number, 0, 2);
        
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Set verified to "no"
        $verified = "no";
        $position = "School Admin";

        // Insert data into the database
        $query = "INSERT INTO school_admin (fullname, employment_number, date, password, school, verified, activation, year, position) VALUES ('$fullname', '$employment_number', '$date', '$hashed_password','$school', '$verified', '$activation', '$year','$position')";
        
        $result = mysqli_query($conn, $query);
    }
?>
<?php
    include('../database.php');
    if(isset($_GET['employment_number'])) {
        $employment_number = $_GET['employment_number'];
        $sql = "SELECT fullname FROM sdo_admin WHERE employment_number = ?";
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
    include('../database.php');
    if(isset($_GET['employment_number'])) {
        $employment_number = $_GET['employment_number'];
        $sql = "SELECT fullname FROM sdo_admin WHERE employment_number = ?";
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
    include('../database.php');

    // Array to store fetched data
    $data = array();

    // Array of tables
    $tables = ['sdo_admin', 'executive_committee', 'school_admin'];

    $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;

    // Loop through each table
    foreach ($tables as $table) {
        // Prepare the SQL query with a placeholder for the school year
        $sql = "SELECT fullname, employment_number, email, date FROM $table WHERE year = ?";
        
        // Prepare and bind the statement
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $school_year);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Fetch data and add it to $data array
            while ($row = $result->fetch_assoc()) {
                // Replace underscore with space in table name and capitalize each word
                $position = ucwords(str_replace('_', ' ', $table)); 
                // Convert "sdo" to "SDO" if found
                $position = str_replace('Sdo', 'SDO', $position); 
                $row['position'] = $position; // Adding position based on modified table name
                $data[] = $row;
            }
        }
    }
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the "activate" button was clicked
    if (isset($_POST["activate"])) {
        // Get the employment number from the form submission
        $employment_number = $_POST["employment_number"];

        // Prepare and execute SELECT queries to check if employment_number exists in each table
        $tables = ['sdo_admin', 'executive_committee', 'school_admin'];
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
        $tables = ['sdo_admin', 'executive_committee', 'school_admin'];

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
    } elseif (isset($_POST["archive"])) { // Check if the "archive" button was clicked
        // Get the employment number from the form submission
        $employment_number = $_POST["employment_number"];
    
        // Prepare and execute SELECT queries to check if employment_number exists in each table
        $tables = ['sdo_admin', 'executive_committee', 'school_admin'];
    
        foreach ($tables as $table) {
            $sql_check = "SELECT * FROM $table WHERE employment_number = ?";
            $stmt_check = $conn->prepare($sql_check);
            $stmt_check->bind_param("s", $employment_number);
            $stmt_check->execute();
            $result_check = $stmt_check->get_result();
    
            if ($result_check->num_rows > 0) {
                // Fetch the row data before deleting
                $row_data = $result_check->fetch_assoc();
    
                // Assign the position based on the table where the data was found
                switch ($table) {
                    case 'sdo_admin':
                        $position = 'SDO Admin';
                        break;
                    case 'executive_committee':
                        $position = 'Executive Committee';
                        break;
                    case 'school_admin':
                        $position = 'School Admin';
                        break;
                    default:
                        $position = 'Unknown';
                }
    
                // Insert the data into the archive table, including password and verified columns
                $sql_insert_archive = "INSERT INTO archive (fullname, employment_number, email, date, year, activation, position, password, verified) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt_archive = $conn->prepare($sql_insert_archive);
                $stmt_archive->bind_param("sssssssss", 
                    $row_data['fullname'], 
                    $row_data['employment_number'], 
                    $row_data['email'], 
                    $row_data['date'], 
                    $row_data['year'], 
                    $row_data['activation'], 
                    $position,  // Use $position for the 'position' column
                    $row_data['password'],  // Added 'password' column
                    $row_data['verified']   // Added 'verified' column
                );
                $stmt_archive->execute();
    
                // Delete the row from the original table
                $sql_delete = "DELETE FROM $table WHERE employment_number = ?";
                $stmt_delete = $conn->prepare($sql_delete);
                $stmt_delete->bind_param("s", $employment_number);
                $stmt_delete->execute();
    
                // Break out of the loop once the record is found and archived
                break;
            }
        }    
    
        // Refresh the page after completing the archive process
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}    
?>

<?php
    include('../database.php');
    if(isset($_POST['add'])) {
        $start = $_POST['start'];
        $end = $_POST['end'];
        // Extracting only the first 4 characters of start and end
        $start = substr($start, 0, 4);
        $end = substr($end, 0, 4);
        if(!empty($start) && !empty($end)) {
            $sql = "INSERT INTO school_year (start, end) VALUES ('$start', '$end')";
            if ($conn->query($sql) === TRUE) {
                // Insertion successful
            }
        } 
    }
?>
<?php
    include('../database.php');
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>SDO Administrator</title>
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
            overflow-y: auto;
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
        .archive {
    margin-left: auto; /* Push the archive button to the right */
}

.archive button {
    background-color: #190572; /* Set background color */
    color: white;           /* Set text color to white */
    border: none;           /* Remove default border */
    padding: 5px 20px;     /* Reduce top/bottom padding for height adjustment */
    font-size: 16px;        /* Adjust font size */
    cursor: pointer;        /* Change cursor to pointer on hover */
    border-radius: 5px;     /* Rounded corners */
    transition: background-color 0.3s; /* Smooth transition for hover effect */
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
        }
        .hamburger-btn {
    display: inline-block;
    cursor: pointer;
    padding: 5px;
    border: none;
    background: none;
    width: 55px; /* Reduced button width */
    position: absolute; /* Change to absolute positioning */
    top: 10px; /* Adjust the vertical position as needed */
    right: 20px; /* This positions the button 20px from the right edge */
    margin-bottom: 15px; /* Add space below the button */
}

.hamburger-btn .line {
    width: 40px; /* Keep the lines smaller to fit within button width */
    height: 4px;
    background-color: #190572;
    margin: 6px 0;
}

/* Dropdown Menu Styles */
.dropdown-menu {
    display: none; /* Initially hide the dropdown */
    position: absolute; /* Position it relative to the button */
    top: 60px; /* Adjust based on your button's height */
    right: 20px; /* Add space from the right edge */
    background-color: white; /* Background color */
    border: 1px solid #190572; /* Optional border */
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); /* Optional shadow */
    z-index: 10; /* Ensure it's on top */
    width: 150px; /* Increase width of dropdown */
    padding: 5px; /* Add padding for overall larger feel */
}

/* Dropdown List Styles */
.dropdown-menu ul {
    list-style-type: none; /* Remove default list styling */
    padding: 0; /* Remove padding */
    margin: 0; /* Remove margin */
}

.dropdown-menu li {
    padding: 15px; /* Increase padding for larger items */
}

.dropdown-menu li a {
    text-decoration: none; /* Remove underline from links */
    color: #190572; /* Link color */
    font-size: 16px; /* Increase font size for better readability */
}

/* Optional: Hover effect for dropdown items */
.dropdown-menu li:hover {
    background-color: #f0f0f0; /* Change background on hover */
}


        .column button{
            padding: 5px;
            margin-top: 0;
        }

        .third-column {
            flex: 0 0 calc(30%); 
            margin-right: 0;
            position: relative; 
            margin-left: 10px;
        }

        .search-box {
            margin-left: auto;
            background-color: #F3F3F3;
            display: flex;
            align-items: center;
            border: 1px solid #190572;
            padding: 0;
            width: 300px;
            margin-left: auto;
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

        .pagination {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex; 
            justify-content: space-between;
            width: 150px;
            gap: 5px;
        }

        .pagination button {
            padding: 8px 8px;
            background-color: #0C052F;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: inline-block;
        }

        .pagination button:hover {
            background-color: #190572;
        }


                    
    </style>
</head>
<body>

    <header>
        <div class="container">
            <div class="header-content">
                <img src="../img/logo.png" class="logs">
                <h4>E.D.G.E | P.A.R. Early Detection and Guidance for Education</h4>
                <i class="vertical-line"></i>
                <div class="dropdown">
                <div class='name' onclick="toggleDropdown()"><?php echo $sdoname ?></div>
                    <div class="dropdown-content" id="dropdownContent">
                        <a href="../login/Login.php">Log Out</a>
                        <a href="sdo_change_password.php?employment_number=<?php echo isset($_GET['employment_number']) ? $_GET['employment_number'] : 'default_value'; ?>" style="border-top: 1px solid #ddd;">Change Password</a>
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
                            <option value="new-option">Add School Year</option>
                        </select>
                    </form>

                    </div>
                    <div class="third-column">
                    <div class="search-box">
                        <input type="text" class="search-input" id="searchInput" placeholder="Search ...">
                        <i class='bx bx-search search-icon'></i>
                    </div>
                   
                </div>
                    
                </div>
            <button class="hamburger-btn" aria-label="Menu" onclick="toggleDropdown()">
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
</button>

<div class="dropdown-menu" id="dropdownMenu">
    <ul>
        <li><a href="archive.php">Archives</a></li>
        <li><a href="#">Deactivated</a></li>
        <li><a href="#" onclick="downloadData()">Save Data</a></li>
    </ul>
</div>


            </div>
            
        </div>

        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <form action="" method="post">
                <h5>ADD SCHOOL YEAR</h5>
                <label for="start">START OF SCHOOL YEAR</label>
                    <input type="date" name="start" id="startDateCalendar">
                <label for="end">END OF SCHOOL YEAR</label>
                    <input type="date" name="end" id="endDateCalendar">
                <button id="submitBtn" name="add" style="width: 100%;">Submit</button>
                </form>
            </div>
        </div>

        <div class="inner-container">
    <div class="bottom-inner-container2">
        <div class="column"><h3>Name</h3></div>
        <div class="column"><h3>Employee Number</h3></div>
        <div class="column"><h3>Email Address</h3></div>
        <div class="column"><h3>Date Added</h3></div>
        <div class="column"><h3>Position</h3></div>
        <div class="column"><h3></h3></div>
    </div>
    <div class="filter-options show" id="filterOptions" onmouseleave="toggleFilterOptions()">
        <div>SDO Administrator</div>
        <div>Executive Committee</div>
        <div>School Administrator</div>
    </div>

    <table class="table">
    <?php
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
    echo "<button onclick='toggleEditContainer(this)'>Edit</button>";
    echo "<form method='post' action=''>";
    echo "<input type='hidden' name='employment_number' value='" . $row['employment_number'] . "'>";
    echo "<button type='submit' name='activate'>Activate</button>";
    echo "<input type='hidden' name='employment_number' value='" . $row['employment_number'] . "'>";
    echo "<button type='submit' name='deactivate'>Deactivate</button>";
    echo "<input type='hidden' name='employment_number' value='" . $row['employment_number'] . "'>";
    echo "<button type='submit' name='archive'>Archive</button>";
    echo "</form>";
    echo "<button>Reset Password</button>";
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
            <div onclick="createAccount('SDO Administrator')">SDO Administrator</div>
            <div onclick="createAccount('Executive Committee')">Executive Committee</div>
            <div onclick="createAccount('School Administrator')">School Administrator</div>
        </div>
    </div>

    <!--div class="pagination" >
            <button id="prevbutton" onclick="prevPageReportTable()">Previous</button>
            <button id="nextbutton" onclick="nextPageReportTable()">Next</button>
        </div-->

    <div class="overlay" id="overlay"></div>

    <!-- form -->
    <div class="login-container" style="display: none;">
    <span class="close">&times;</span>
    <div class="logo"></div>
    <h2>SDO Administrator</h2>

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
            <button type="submit" name="submit1">Create Account</button>
        </div>
    </form>
</div>

<div class="login-container executive" style="display: none;">
    <span class="close">&times;</span>
    <div class="logo"></div>
    <h2>Executive Committee</h2>

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


    <div class="login-container schooladmin" style="display: none;">
    <span class="close">&times;</span>
        <div class="logo"></div>
        <h2>School Administrator</h2>

        <form class="login-form" action=" " method="post">
        <div class="form-group">
            <label for="schoolName">School's Name</label>
            <div class="search-container">
                <input type="text" id="schoolName" name="schoolName" required oninput="filterSchools()">
                <div class="dropdown-contents" id="schoolDropdown">
                    <a>Bacayao Sur Elementary School</a>
                    <a>Bliss Elementary School</a>
                    <a>Bolosan Elementary School</a>
                    <a>Bonuan Boquig Elementary School</a>
                    <a>Calmay Elementary School</a>
                    <a>Carael Elementary School</a>
                    <a>Caranglaan Elementary School</a>
                    <a>East Central Integrated School</a>
                    <a>Federico N. Ceralde School Integrated School</a>
                    <a>Gen. Gregorio Del Pilar Elementary School</a>
                    <a>Juan L. Siapno Elementary School</a>
                    <a>Juan P. Guadiz Elementary School</a>
                    <a>Lasip Grande Elementary School</a>
                    <a>Leon-Francisco Elementary School</a>
                    <a>Lomboy Elementary School</a>
                    <a>Lucao Elementary School</a>
                    <a>Malued Sur Elementary School</a>
                    <a>Mamalingling Elementary School</a>
                    <a>Mangin-Tebeng Elementary School</a>
                    <a>North Central Elementary School</a>
                    <a>Pantal Elementary School</a>
                    <a>Pascuala G. Villamil Elementary School</a>
                    <a>Pogo-Lasip Elementary School</a>
                    <a>Pugaro Integrated School</a>
                    <a>Sabangan Elementary School</a>
                    <a>Salapingao Elementary School</a>
                    <a>Salisay Elementary School</a>
                    <a>Suit Elementary School</a>
                    <a>T. Ayson Rosario Elementary School</a>
                    <a>Tambac Elementary School</a>
                    <a>Tebeng Elementary School</a>
                    <a>Victoria Q. Zarate Elementary School</a>
                    <a>West Cental I Elementary School</a>
                    <a>West Central II Elementary School</a>
                </div>
            </div>
            </div>
        <div class="row">
                <div class="columns">
                <div class="form-group">
                        <label for="name">First Name</label>
                        <input type="text" id="fullname" name="firstname" required>
                    </div>
                    <div class="form-group">
                        <label for="idnum">Last Name</label>
                        <input type="text" id="lastname" name="lastname" required>
                    </div>
                    <div class="form-group">
                        <label for="topdown">Employee Number</label>
                        <input type="number"  name="employment_number" required>     
                    </div>
                </div>

                <div class="columns">
                    <div class="form-group">
                        <label for="date-added">Middle Name</label>
                        <input type="text" id="middle-name" name="middlename" required>
                    </div>
                    <div class="form-group">
                        <label for="topdown">Extension Name</label>
                        <input type="text"  name="extension">     
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
<script>
    function toggleDropdown() {
        const dropdown = document.getElementById("dropdownMenu");
        dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
    }

    // Optional: Close the dropdown if clicking outside of it
    window.onclick = function(event) {
        const dropdown = document.getElementById("dropdownMenu");
        const hamburger = document.querySelector('.hamburger-btn');
        
        if (!event.target.matches('.hamburger-btn') && dropdown.style.display === "block") {
            dropdown.style.display = "none";
        }
    };
</script>
<script>
function downloadData() {
    window.location.href = 'download.php';
}
</script>

</body>
</html>