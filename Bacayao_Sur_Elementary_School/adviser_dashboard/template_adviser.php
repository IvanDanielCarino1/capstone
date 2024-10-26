<?php
// Get the selected quarter and school year from the POST request, default values if not set
$selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
$selectedSchoolYear = isset($_POST['school-year']) ? $_POST['school-year'] : date('Y');
?>

<?php
    $currentFileName = basename($_SERVER["SCRIPT_FILENAME"], '.php');
    
    include("../../database.php");
    $filenameWithoutExtension = pathinfo($currentFileName, PATHINFO_FILENAME);
    $words = explode('_', $filenameWithoutExtension);

    if (count($words) >= 4) {
        $secondWord = $words[1];
        $fourthWord = $words[3];
        $sql = "SELECT employment_number, fullname FROM adviser WHERE grade = '$secondWord' AND section = '$fourthWord' AND school = 'Bacayao Sur Elementary School'";
        $result1 = $conn->query($sql);
        $result2 = $conn->query($sql);
    } 
?>
<?php
    include('../../database.php');
    $filename = basename(__FILE__, '.php');
    $words = explode('_', $filename);
    $secondWord = $words[1];
    $fourthWord = $words[3];
    $tables = ['academic_english', 'academic_filipino', 'academic_numeracy', 'behavioral'];
    $count = 0;
    $lrnCounted = array(); // Array to keep track of LRNs already counted

    foreach ($tables as $table) {
        $sql = "SELECT lrn FROM $table WHERE grade = '$secondWord' AND section = '$fourthWord' AND school = 'Bacayao Sur Elementary School'";
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
if (isset($_POST['print'])) {
    // Get the filename of the current script
    $filename = basename($_SERVER['PHP_SELF'], ".php");

    // Split the filename into words
    $words = explode(" ", str_replace(["_", "-"], " ", $filename));

    // Check if the second and fourth words exist, and then print them
    $secondWord = isset($words[1]) ? $words[1] : "No second word";
    $fourthWord = isset($words[3]) ? $words[3] : "No fourth word";

    $employment_number = $_GET['employment_number'] ?? 'default_value';
            
            $redirect_url = "adviser_dashboard_print.php?grade=$secondWord&section=$fourthWord&employment_number=$employment_number&filename=$filename&quarter=1";
            
            header("Location: $redirect_url");
            exit();
}
?>
<?php
    include('../../database.php');
    $filename = basename($_SERVER['PHP_SELF']);

    // Split the filename by underscores
    $filename_parts = explode('_', $filename);

    // Get the 2nd and 4th word (assuming zero-based index)
    $second_word = isset($filename_parts[1]) ? $filename_parts[1] : '';
    $fourth_word = isset($filename_parts[3]) ? $filename_parts[3] : '';

    // Get the tablename from the filename
    $tablename = strtolower(str_replace('.php', '', $filename));

    // Prepare and bind the parameters for the SQL query
    $stmt = $conn->prepare("SELECT lrn, fullname, school, grade, section FROM $tablename WHERE school = 'Bacayao Sur Elementary School' AND grade = ? AND section = ?");
    $stmt->bind_param("ss", $second_word, $fourth_word);

    // Execute the statement
    $stmt->execute();
    $lrnresult = $stmt->get_result();

    // Close the statement
    $stmt->close();
    $conn->close();
?>
<?php
    include('../../database.php');

    $sql_combined = "
        SELECT lrn, fullname, status, 
            CASE 
                WHEN lrn IN (SELECT lrn FROM academic_english) THEN 'E'
                ELSE '' 
            END AS english,
            CASE 
                WHEN lrn IN (SELECT lrn FROM academic_filipino) THEN 'F'
                ELSE '' 
            END AS filipino,
            CASE 
                WHEN lrn IN (SELECT lrn FROM academic_numeracy) THEN 'N'
                ELSE '' 
            END AS numeracy,
            CASE 
                WHEN lrn IN (SELECT lrn FROM behavioral) THEN 'B'
                ELSE '' 
            END AS behavioral
        FROM (
            SELECT lrn, fullname, status FROM academic_english
            UNION
            SELECT lrn, fullname, status FROM academic_filipino
            UNION
            SELECT lrn, fullname, status FROM academic_numeracy
            UNION
            SELECT lrn, fullname, status FROM behavioral
        ) AS combined_data
    ";

    $result_combined = $conn->query($sql_combined);

    $conn->close();
?>
<?php

    $filename = basename(__FILE__, '.php');
    $parts = explode('_', $filename);
    $grade = $parts[1]; // Second word
    $section = $parts[3]; // Fourth word

    // School
    $school = "Bacayao Sur Elementary School";

    include('../../database.php');

    // SQL query to retrieve LRN, fullname, and status
    $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
    $sql = "SELECT lrn, fullname, status FROM academic_english WHERE grade = '$grade' AND section = '$section' AND school = '$school' AND quarter = $selectedQuarter";

    $englishresult = $conn->query($sql);

    $conn->close();
?>
<?php

    $filename = basename(__FILE__, '.php');
    $parts = explode('_', $filename);
    $grade = $parts[1]; // Second word
    $section = $parts[3]; // Fourth word

    // School
    $school = "Bacayao Sur Elementary School";

    include('../../database.php');

    // SQL query to retrieve LRN, fullname, and status
    $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
    $sql = "SELECT lrn, fullname, status FROM academic_filipino WHERE grade = '$grade' AND section = '$section' AND school = '$school' AND quarter = $selectedQuarter";

    $filipinoresult = $conn->query($sql);

    $conn->close();
?>
<?php

    $filename = basename(__FILE__, '.php');
    $parts = explode('_', $filename);
    $grade = $parts[1]; // Second word
    $section = $parts[3]; // Fourth word

    // School
    $school = "Bacayao Sur Elementary School";

    include('../../database.php');

    // SQL query to retrieve LRN, fullname, and status
    $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
    $sql = "SELECT lrn, fullname, status FROM academic_numeracy WHERE grade = '$grade' AND section = '$section' AND school = '$school' AND quarter = $selectedQuarter";

    $numeracyresult = $conn->query($sql);

    $conn->close();
?>
<?php

    $filename = basename(__FILE__, '.php');
    $parts = explode('_', $filename);
    $grade = $parts[1]; // Second word
    $section = $parts[3]; // Fourth word

    // School
    $school = "Bacayao Sur Elementary School";

    include('../../database.php');

    // SQL query to retrieve LRN, fullname, and status
    $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
    $sql = "SELECT lrn, fullname, status FROM behavioral WHERE grade = '$grade' AND section = '$section' AND school = '$school' AND quarter = $selectedQuarter";

    $behavioalresult = $conn->query($sql);

    $conn->close();
?>
<?php
    $filename = basename($_SERVER['PHP_SELF']);
    $employment_number = isset($_GET['employment_number']) ? $_GET['employment_number'] : 'default_value';
?>
<?php
    include('../../database.php');
    if(isset($_GET['employment_number'])) {
        $employment_number = $_GET['employment_number'];
        $sql = "SELECT fullname FROM adviser WHERE employment_number = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $employment_number);
        $stmt->execute();
        $stmt->bind_result($advisername);
        if($stmt->fetch()) {
        }
        $stmt->close();
    } 
    $conn->close();
?>
<?php 
    if(isset($_POST['quarter'])) {
        $quarter = $_POST['quarter'];
    } else {
        $quarter = '1';
    }
?>
<?php
    include('../../database.php');
    $tables = array(
        'academic_english',
        'academic_filipino',
        'academic_numeracy',
        'behavioral'
    );
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["remove"])) {
        $lrn = $_POST['lrn'];
        if(isset($_POST['quarter'])) {
            $quarter = $_POST['quarter'];
        } else {
            $quarter = '1';
        }

        foreach ($tables as $table) {
            $sql = "DELETE FROM $table WHERE lrn = '$lrn' AND quarter = '$quarter'";
            mysqli_query($conn, $sql);
        }
        header("Location: " . $_SERVER['PHP_SELF']);
        exit; 
    }
?>
<?php
    include('../../database.php');
    $filename = basename(__FILE__, '.php');
    $words = explode('_', $filename);
    $secondWord = $words[1];
    $fourthWord = $words[3];
    $tables = ['academic_english', 'academic_filipino', 'academic_numeracy', 'behavioral'];
    $count = 0;
    $lrnCounted = array(); // Array to keep track of LRNs already counted

    foreach ($tables as $table) {
        $sql = "SELECT lrn FROM $table WHERE grade = '$secondWord' AND section = '$fourthWord' AND school = 'Bacayao Sur Elementary School'";
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
    include('../../database.php');

    // Get the filename and tablename
    $filename = basename($_SERVER['PHP_SELF'], '.php');
    $tablename = strtolower($filename);

    // Split the filename into words
    $words = explode('_', $filename);

    // Ensure we have enough words to avoid undefined index errors
    if (count($words) >= 4) {
        // Sanitize the inputs
        $secondWord = $conn->real_escape_string($words[1]);
        $fourthWord = $conn->real_escape_string($words[3]);

        // Prepare the SQL query
        $sql = "SELECT lrn, fullname, school, grade, section 
                FROM $tablename 
                WHERE school = 'Bacayao Sur Elementary School' 
                AND grade = '$secondWord' 
                AND section = '$fourthWord'";

        // Execute the query
        $lrnresult = $conn->query($sql);

        // Check for errors
        if ($conn->error) {
            echo "Error: " . $conn->error;
        } else {
        }

        // Close the connection
        $conn->close();
    } else {
        echo "Filename does not contain enough parts to extract grade and section.";
    }
?>
<?php
    include('../../database.php');

    $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
    $filename = basename(__FILE__, '.php');
    $words = explode('_', $filename);
    $secondWord = $conn->real_escape_string($words[1]);
    $fourthWord = $conn->real_escape_string($words[3]);

    $sql_combined = "
        SELECT lrn, fullname, 
            CASE 
                WHEN lrn IN (SELECT lrn FROM academic_english WHERE quarter = $selectedQuarter AND grade = '$secondWord' AND section = '$fourthWord') THEN 'E'
                ELSE '' 
            END AS english,
            CASE 
                WHEN lrn IN (SELECT lrn FROM academic_filipino WHERE quarter = $selectedQuarter AND grade = '$secondWord' AND section = '$fourthWord') THEN 'F'
                ELSE '' 
            END AS filipino,
            CASE 
                WHEN lrn IN (SELECT lrn FROM academic_numeracy WHERE quarter = $selectedQuarter AND grade = '$secondWord' AND section = '$fourthWord') THEN 'N'
                ELSE '' 
            END AS numeracy,
            CASE 
                WHEN lrn IN (SELECT lrn FROM behavioral WHERE quarter = $selectedQuarter AND grade = '$secondWord' AND section = '$fourthWord') THEN 'B'
                ELSE '' 
            END AS behavioral,
            (SELECT status FROM academic_english WHERE lrn = combined_data.lrn AND quarter = $selectedQuarter AND grade = '$secondWord' AND section = '$fourthWord' LIMIT 1) AS english_status,
            (SELECT status FROM academic_filipino WHERE lrn = combined_data.lrn AND quarter = $selectedQuarter AND grade = '$secondWord' AND section = '$fourthWord' LIMIT 1) AS filipino_status,
            (SELECT status FROM academic_numeracy WHERE lrn = combined_data.lrn AND quarter = $selectedQuarter AND grade = '$secondWord' AND section = '$fourthWord' LIMIT 1) AS numeracy_status,
            (SELECT status FROM behavioral WHERE lrn = combined_data.lrn AND quarter = $selectedQuarter AND grade = '$secondWord' AND section = '$fourthWord' LIMIT 1) AS behavioral_status
        FROM (
            SELECT lrn, fullname FROM academic_english WHERE quarter = $selectedQuarter AND grade = '$secondWord' AND section = '$fourthWord'
            UNION
            SELECT lrn, fullname FROM academic_filipino WHERE quarter = $selectedQuarter AND grade = '$secondWord' AND section = '$fourthWord'
            UNION
            SELECT lrn, fullname FROM academic_numeracy WHERE quarter = $selectedQuarter AND grade = '$secondWord' AND section = '$fourthWord'
            UNION
            SELECT lrn, fullname FROM behavioral WHERE quarter = $selectedQuarter AND grade = '$secondWord' AND section = '$fourthWord'
        ) AS combined_data
    ";

    $result_combined = $conn->query($sql_combined);

    $conn->close();
?>
<?php

    $filename = basename(__FILE__, '.php');
    $parts = explode('_', $filename);
    $grade = $parts[1]; // Second word
    $section = $parts[3]; // Fourth word

    // School
    $school = "Bacayao Sur Elementary School";

    include('../../database.php');

    // SQL query to retrieve LRN, fullname, and status
    $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
    $sql = "SELECT lrn, fullname, status FROM academic_english WHERE grade = '$grade' AND section = '$section' AND school = '$school' AND quarter = $selectedQuarter";

    $englishresult = $conn->query($sql);

    $conn->close();
?>
<?php

    $filename = basename(__FILE__, '.php');
    $parts = explode('_', $filename);
    $grade = $parts[1]; // Second word
    $section = $parts[3]; // Fourth word

    // School
    $school = "Bacayao Sur Elementary School";

    include('../../database.php');

    // SQL query to retrieve LRN, fullname, and status
    $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
    $sql = "SELECT lrn, fullname, status FROM academic_filipino WHERE grade = '$grade' AND section = '$section' AND school = '$school' AND quarter = $selectedQuarter";

    $filipinoresult = $conn->query($sql);

    $conn->close();
?>
<?php

    $filename = basename(__FILE__, '.php');
    $parts = explode('_', $filename);
    $grade = $parts[1]; // Second word
    $section = $parts[3]; // Fourth word

    // School
    $school = "Bacayao Sur Elementary School";

    include('../../database.php');

    // SQL query to retrieve LRN, fullname, and status
    $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
    $sql = "SELECT lrn, fullname, status FROM academic_numeracy WHERE grade = '$grade' AND section = '$section' AND school = '$school' AND quarter = $selectedQuarter";

    $numeracyresult = $conn->query($sql);

    $conn->close();
?>
<?php

    $filename = basename(__FILE__, '.php');
    $parts = explode('_', $filename);
    $grade = $parts[1]; // Second word
    $section = $parts[3]; // Fourth word

    // School
    $school = "Bacayao Sur Elementary School";

    include('../../database.php');

    // SQL query to retrieve LRN, fullname, and status
    $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
    $sql = "SELECT lrn, fullname, status FROM behavioral WHERE grade = '$grade' AND section = '$section' AND school = '$school' AND quarter = $selectedQuarter";

    $behavioalresult = $conn->query($sql);

    $conn->close();
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
    $filename = basename($_SERVER['PHP_SELF']);
    $employment_number = isset($_GET['employment_number']) ? $_GET['employment_number'] : 'default_value';
?>
<?php
    include('../../database.php');
    if(isset($_GET['employment_number'])) {
        $employment_number = $_GET['employment_number'];
        $sql = "SELECT fullname FROM adviser WHERE employment_number = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $employment_number);
        $stmt->execute();
        $stmt->bind_result($advisername);
        if($stmt->fetch()) {
        }
        $stmt->close();
    } 
    $conn->close();
?>
<?php 
    if(isset($_POST['quarter'])) {
        $quarter = $_POST['quarter'];
    } else {
        $quarter = '1';
    }
?>
<?php
    include('../../database.php');
    $tables = array(
        'academic_english',
        'academic_filipino',
        'academic_numeracy',
        'behavioral'
    );
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["remove"])) {
        $lrn = $_POST['lrn'];
        if(isset($_POST['quarter'])) {
            $quarter = $_POST['quarter'];
        } else {
            $quarter = '1';
        }

        foreach ($tables as $table) {
            $sql = "DELETE FROM $table WHERE lrn = '$lrn' AND quarter = '$quarter'";
            mysqli_query($conn, $sql);
        }
        header("Location: " . $_SERVER['PHP_SELF']);
        exit; 
    }
?>
<?php
    // Check if the delete button was clicked
    if (isset($_POST['delete1'])) {
        $lrn = $_POST['lrn'];
        $english = $_POST['english'];
        $filipino = $_POST['filipino'];
        $numeracy = $_POST['numeracy'];
        $behavioral = $_POST['behavioral'];

        include('../../database.php');

        // Delete records from the relevant tables based on the conditions
        if ($english === 'E') {
            $sql_english = "DELETE FROM academic_english WHERE lrn = '$lrn'";
            $conn->query($sql_english);
        }
        if ($filipino === 'F') {
            $sql_filipino = "DELETE FROM academic_filipino WHERE lrn = '$lrn'";
            $conn->query($sql_filipino);
        }
        if ($numeracy === 'N') {
            $sql_numeracy = "DELETE FROM academic_numeracy WHERE lrn = '$lrn'";
            $conn->query($sql_numeracy);
        }
        if ($behavioral === 'B') {
            $sql_behavioral = "DELETE FROM behavioral WHERE lrn = '$lrn'";
            $conn->query($sql_behavioral);
        }

        // Close the connection
        $conn->close();

        // Redirect to avoid resubmission on page refresh
        $employment_number = isset($_GET['employment_number']) ? $_GET['employment_number'] : 'default_value';
        header("Location: " . $_SERVER['PHP_SELF'] . "?employment_number=" . $employment_number);
        exit();
    }
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete2'])) {
        // Get the LRN from the form submission
        $lrn = $_POST['lrn'];

        include('../../database.php');
        // Prepare the DELETE statement
        $stmt = $conn->prepare("DELETE FROM academic_english WHERE lrn = ?");
        $stmt->bind_param("s", $lrn);

        // Execute the statement
        if ($stmt->execute()) {
        } else {
        }

        // Close the statement and connection
        $stmt->close();
        $employment_number = isset($_GET['employment_number']) ? $_GET['employment_number'] : 'default_value';
        header("Location: " . $_SERVER['PHP_SELF'] . "?employment_number=" . $employment_number);
        exit();
    }
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete3'])) {
        // Get the LRN from the form submission
        $lrn = $_POST['lrn'];

        include('../../database.php');
        // Prepare the DELETE statement
        $stmt = $conn->prepare("DELETE FROM academic_filipino WHERE lrn = ?");
        $stmt->bind_param("s", $lrn);

        // Execute the statement
        if ($stmt->execute()) {
        } else {
        }

        // Close the statement and connection
        $stmt->close();
        $employment_number = isset($_GET['employment_number']) ? $_GET['employment_number'] : 'default_value';
        header("Location: " . $_SERVER['PHP_SELF'] . "?employment_number=" . $employment_number);
        exit();
    }
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete4'])) {
        // Get the LRN from the form submission
        $lrn = $_POST['lrn'];

        include('../../database.php');
        // Prepare the DELETE statement
        $stmt = $conn->prepare("DELETE FROM academic_numeracy WHERE lrn = ?");
        $stmt->bind_param("s", $lrn);

        // Execute the statement
        if ($stmt->execute()) {
        } else {
        }

        // Close the statement and connection
        $stmt->close();
        $employment_number = isset($_GET['employment_number']) ? $_GET['employment_number'] : 'default_value';
        header("Location: " . $_SERVER['PHP_SELF'] . "?employment_number=" . $employment_number);
        exit();
    }
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete5'])) {
        // Get the LRN from the form submission
        $lrn = $_POST['lrn'];

        include('../../database.php');
        // Prepare the DELETE statement
        $stmt = $conn->prepare("DELETE FROM behavioral WHERE lrn = ?");
        $stmt->bind_param("s", $lrn);

        // Execute the statement
        if ($stmt->execute()) {
        } else {
        }

        // Close the statement and connection
        $stmt->close();
        $employment_number = isset($_GET['employment_number']) ? $_GET['employment_number'] : 'default_value';
        header("Location: " . $_SERVER['PHP_SELF'] . "?employment_number=" . $employment_number);
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script>
        function preventBack(){window.history.forward()};
        setTimeout("preventBack()",0);
        window.onunload=function(){null;}
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Adviser</title>
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
            flex-wrap: wrap;
            justify-content: space-between; 
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

        .wide-columnsss {
            flex: 0 0 calc(32% - 7px);
            margin-bottom: 20px;
            margin-top: 10px;
        }

        .wide-columnss {
            flex: 0 0 calc(23% - 7px);
            margin-bottom: 20px;
            margin-top: 10px;
        }

        .wide-columnss .containers,
        .wide-columnsss .containers,
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

        #quarterSelect,
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

        .wide-columnss h3,
        .wide-columnsss h3,        
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
            margin-top: 20px;
            width:100%; 
            border-collapse: collapse
            
        }

        thead th{
            color: #070000;
            text-align: center;
            background-color: #190572;
            padding: .5px;
            color: white;
            font-size: 19px;
            border-left: 2px solid white;
        }

        tr:nth-child(odd){
            text-align: center;
            justify-content: center;
            background-color: rgb(242, 242, 244);
            font-weight: 600;
        }

        tr:nth-child(even){
            text-align: center;
            justify-content: center;
            background-color: #b7b7b7;
            font-weight: 600;
        }
        .containers h3{
            color: #FFF;
        }
        .act button {
        background-color:#130550;
        color: #fff;
        width: 20rem;
        padding: 5px 24px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        }

        .act button:hover {
            background-color: #0C052F;
        } 

        .acts button {
        margin-top: 5px;
        margin-bottom: 5px;
        background-color:#130550;
        color: #fff;
        width: 20rem;
        padding: 5px 24px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        }

        .acts button:hover {
            background-color: #0C052F;
        } 

        .sch h1 {
            color: #FFFFFF;
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

        .container {
            display: flex;
            justify-content: space-between;
        }

        .legend-container {
            flex: 1; 
        }

        .left-container{
            display: flex;
            justify-content: left;
            left: 0;
        }
        .legend-item {
            display: flex;
            align-items: center;
            margin: 0 10px; 
            margin-top: 15px;
        }

        .legend-containers:first-child{
            margin-top: -50px;
        }

        .legend-containers {
            margin-top: -20px;
            display: flex;
            justify-content:right;
        }

        .legend-containers .icon{
            margin-right: 5px;
            color: #130550;
            font-weight: bold;
            margin-left: 5px;
            font-style: normal;
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
            font-weight: bold;
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
            height: 80%;
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
            height: 25px;
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

        .firsts h3{
            color: #190572;
        }

        .seconds{
            border-radius: 3px;
            text-align: center;
        }

        .seconds h3{
            font-size: 18px;
            color: #FFF;
            letter-spacing: 3px;
            padding-top: 1px;
        }

        .containerss input{
            color:#130550;
            font-weight: 500;
            font-size: 15px;
            width: 427px;
            margin-left: 10px;
            border: none;
            background: none;
        }

        .firsts h3:first-child{
            color: #130550;
        }

        .containerss h3{
            color: #ddd;
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

    form .form-container{
        background-color: white;
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

    .checkbox-group{
        text-align: left;
        margin-left: 5px;
    }

    .checkbox-group input[type="checkbox"],
    .checkbox-group input[type="radio"] {
        display: none;
    }

    .checkbox-group label {
        position: relative;
        padding-left: 30px;
        cursor: pointer;
    }

    .checkbox-group label:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 20px;
        height: 15px;
        border: 2px solid #130550; 
        background-color: white; 
        border-radius: 4px;
    }

    .checkbox-group input[type="checkbox"]:checked + label:before,
    .checkbox-group input[type="radio"]:checked + label:before {
        content: '\2713';
        font-size: 16px;
        color: white; 
        background-color: #130550; 
        text-align: center;
        line-height: 20px;
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

        .color-indicator {
        width: 20px;
        height: 10px;
        display: inline-block;
        margin-right: 10px;
        border-radius: 5%;
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
                <div class='name' onclick="toggleDropdown()"><?php echo $advisername ?></div>
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
            if ($result1->num_rows > 0) {
                // Get the data of the first row
                $row = $result1->fetch_assoc();
                $employment_number = $row["employment_number"];
                echo "<div class=\"column column-right\">
                <div class=\"containers\" style=\"background-color: #F3F3F3;\">
                    <h3 style=\"color: #190572; margin-left:7px\">$employment_number</h3>
                </div>
            </div>";
            }
            ?>

            <div class="column column-left">
                <div class="containers" style="background-color: #190572;">
                    <h3 style="margin-left:7px">Grade & Section</h3>
                </div>
            </div>
            <div class="column half-width">
                <div class="containers" style="background-color: #F3F3F3;">
                <?php 
                        $capitalizedSecondWord = ucfirst($secondWord);
                        echo '<h3 style="color: #190572; margin-left:7px">' . $capitalizedSecondWord . '&nbsp;-&nbsp;' . ucfirst($fourthWord) . '</h3>';
                    ?>    
            </div>
            </div>

        </div>


        <div class="row">
            <div class="column">
                <div class="containers" style="background-color: #190572;">
                    <h3 style="margin-left:7px">Adviser</h3>
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
                    <h3 style="margin-left: 7px">Quarter</h3>
                </div>
            </div>
            <div class="column column-right">
                <div class="select-wrapper1">
                <form id="quarterForm1" method="post" action="">
                    <select id="quarterSelect" name="quarter" onchange="submitForm()">
                        <option value="1" <?php if(isset($_POST['quarter']) && $_POST['quarter'] == '1') echo 'selected'; ?>>Quarter 1</option>
                        <option value="2" <?php if(isset($_POST['quarter']) && $_POST['quarter'] == '2') echo 'selected'; ?>>Quarter 2</option>
                        <option value="3" <?php if(isset($_POST['quarter']) && $_POST['quarter'] == '3') echo 'selected'; ?>>Quarter 3</option>
                        <option value="4" <?php if(isset($_POST['quarter']) && $_POST['quarter'] == '4') echo 'selected'; ?>>Quarter 4</option>
                    </select>
                </form>
                </div>
            </div>
        </div>
                <div class="checkbox-container">
                    <div class="legend-container left-container">
                        <div class="legend-item">
                            <div class="checkbox-container checkbox-group">
                                <input type="radio" id="legend-checkbox-all" name="student" class="checkbox">
                                <label for="legend-checkbox-all">All Students</label>
                            </div>
                        </div>
                        <div class="legend-item">
                            <div class="checkbox-container non checkbox-group">
                                <input type="radio" id="legend-checkbox-at-risk" name="student" class="checkbox">
                                <label for="legend-checkbox-at-risk">Pupil At Risk</label>
                            </div>
                        </div>
                    </div>
                    <form id="checkbox-form" class="legend-container" method="post" action="">
                <div class="legend-containers">
                    <div class="legend-item">
                        <div class="checkbox-container checkbox-group">
                            <input type="radio" id="legend-checkbox-numeracy" name="academic_numeracy" class="checkbox">
                            <label for="legend-checkbox-numeracy">
                                <i class="icon">N</i>
                                Academic - Numeracy
                            </label>
                        </div>
                    </div>
                    <div class="legend-item">
                        <div class="checkbox-container checkbox-group">
                            <input type="radio" id="legend-checkbox-english-literacy" name="academic_english" class="checkbox">
                            <label for="legend-checkbox-english-literacy">
                                <i class='icon'>E</i>
                                Academic - Literacy in English
                            </label>
                        </div>
                    </div>
                </div>
                <div class="legend-containers">
                    <div class="legend-item">
                        <div class="checkbox-container checkbox-group">
                            <input type="radio" id="legend-checkbox-behavioral" name="behavioral" class="checkbox">
                            <label for="legend-checkbox-behavioral">
                                <i class="icon">B</i>
                                Behavioral
                            </label>
                        </div>
                    </div>                   
                    <div class="legend-item">
                        <div class="checkbox-container checkbox-group">
                            <input type="radio" id="legend-checkbox-filipino-literacy" name="academic_filipino" class="checkbox">
                            <label for="legend-checkbox-filipino-literacy">
                                <i class="icon">F</i>
                                Academic - Literacy in Filipino
                            </label>
                        </div>
                    </div>
                </div>


                <input type="hidden" id="selected-checkbox" name="selected_checkbox">
            </form>
            <div class="legend-container left-container color">
                <div class="legend-item">
                    <div class="checkbox-container checkbox-groups">
                        <div class="color-indicator" style="background-color: green;"></div>
                        <label for="legend-checkbox-pending">Pending</label>
                    </div>
                </div>

                <div class="legend-item">
                    <div class="checkbox-container checkbox-groups">
                        <div class="color-indicator" style="background-color: yellow;"></div>
                        <label for="legend-checkbox-ongoing">On-going</label>
                    </div>
                </div>

                <div class="legend-item">
                    <div class="checkbox-container checkbox-groups">
                        <div class="color-indicator" style="background-color: red;"></div>
                        <label for="legend-checkbox-resolved">Resolved</label>
                    </div>
                </div>

                <div class="legend-item">
                    <div class="checkbox-container checkbox-groups" >
                        <div class="color-indicator" style="background-color: #333333;"></div>
                        <label for="legend-checkbox-unresolved">Unresolved</label>
                    </div>
                </div>
            </div>


        <!---------------------------------- START ----------------------------------------->
    <!---------------------------------- ALL STUDENTS ----------------------------------------->
<table border="0" id="pupilTable">
<thead>
        <tr>
            <th style='width:25%'>LRN</th>
            <th style='width:35%'>Pupil's Name</th>
            <th style='width:28%'>P.A.R. Identification</th>
            <th style='width:35%'>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php
// Capture the selected quarter from the form submission
$quarter = isset($_POST['quarter']) ? intval($_POST['quarter']) : 1; // Default to Quarter 1

// Your SQL query for LRN results remains unchanged
if ($lrnresult->num_rows > 0) {
    while ($row = $lrnresult->fetch_assoc()) {
        $lrn = $row['lrn'];
        $showE = $showF = $showN = $showB = '';

        // Modify queries to filter based on the selected quarter
        $queryE = "SELECT 1 FROM academic_english WHERE lrn = '$lrn' AND quarter = $quarter LIMIT 1";
        $queryF = "SELECT 1 FROM academic_filipino WHERE lrn = '$lrn' AND quarter = $quarter LIMIT 1";
        $queryN = "SELECT 1 FROM academic_numeracy WHERE lrn = '$lrn' AND quarter = $quarter LIMIT 1";
        $queryB = "SELECT 1 FROM behavioral WHERE lrn = '$lrn' AND quarter = $quarter LIMIT 1";

        if ($conn->query($queryE)->num_rows > 0) {
            $showE = 'E';
        }
        if ($conn->query($queryF)->num_rows > 0) {
            $showF = 'F';
        }
        if ($conn->query($queryN)->num_rows > 0) {
            $showN = 'N';
        }
        if ($conn->query($queryB)->num_rows > 0) {
            $showB = 'B';
        }

        echo "<tr class='sheshable'>";
        echo "<td style='width:25%'>" . $lrn . "</td>";
        echo "<td style='width:35%'>" . $row["fullname"] . "</td>";
        echo "<td style='width:28%' class='act'>";
        echo "<div class='icon-container'>";
        if ($showE) echo $showE . "<i class='vertical-lines'></i>";
        if ($showF) echo $showF . "<i class='vertical-lines'></i>";
        if ($showN) echo $showN . "<i class='vertical-lines'></i>";
        if ($showB) echo $showB;
        echo "</div>";
        echo "</td>";
        echo "<td style='width:35%' class='act'>";
        echo "<a href='par_form.php?file=$filename&employment_number=$employment_number&lrn={$lrn}&school={$row['school']}&grade={$row['grade']}&section={$row['section']}&fullname={$row['fullname']}&quarter=$quarter'><button class='updateRecordButton'>ADD PUPIL AT RISK</button></a>";
        echo "</td>";
        echo "</tr>";
    }
}
?>

    </tbody>
</table>


  <!---------------------------------- FOUR CLASSIFICATIONS ----------------------------------------->
                        <!--------------- ACADEMIC ENGLISH ----------------------->
  <table border="0" id="identification-english" style="display: none;">
  <thead>
        <tr>
            <th style='width:20%'>LRN</th>
            <th style='width:25.7%'>Pupil's Name</th>
            <th style='width:20%'>P.A.R. Identification</th>
            <th style='width:20%'>Status</th>
            <th style='width:25%'>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php
if ($englishresult->num_rows > 0) {
    // Output data of each row
    while ($row = $englishresult->fetch_assoc()) {
        echo "<tr class='sheshable'>";
        echo "<th style='width:20%'>" . $row["lrn"] . "</th>";
        echo "<th style='width:25.7%'>" . $row["fullname"] . "</th>";
        echo "<th style='width:20%' class='act'>";
        echo "<div class='icon-container'>";
        echo "<a href='../adviser_dashboard/classifications/update_record_english.php?lrn=" . htmlspecialchars($row['lrn']) . "&quarter=" . $selectedQuarter . "&school_year=" . $selectedSchoolYear . "' style='color: black;'>
    E<i onclick='showPupilRecordFilipino()'></i>
</a>";
        echo "</div>";
        echo "</th>";
        echo "<th style='width:20%'>" . $row["status"] . "</th>";
        echo "<th style='width:25%' class='act'>";
        // Add a form around the button
        echo "<form method='post'>";
        echo "<input type='hidden' name='lrn' value='" . htmlspecialchars($row["lrn"]) . "'>";
        echo "<button type='submit' name='delete2' style='background-color:#070000' class='updateRecordButtons'>REMOVE PUPIL AT RISK</button>";
        echo "</form>";
        echo "</th>";
        echo "</tr>";
    }
}
?>


             <tr>
                <td colspan="5">
                    <div class="save">
                        <a href="update_all_records/update_literacy_english.php"><button id="save">Update All Records</button></a>
                    </div>
                </td>
            </tr>
        </tbody>
</table>

                        <!--------------- ACADEMIC FILIPINO ----------------------->
    <table border="0" id="identification-filipino" style="display: none;">
    <thead>
        <tr>
            <th style='width:20%'>LRN</th>
            <th style='width:25.7%'>Pupil's Name</th>
            <th style='width:20%'>P.A.R. Identification</th>
            <th style='width:20%'>Status</th>
            <th style='width:25%'>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php
    if ($filipinoresult->num_rows > 0) {
        // Output data of each row
        while ($row = $filipinoresult->fetch_assoc()) {
            echo "<tr class='sheshable'>";
            echo "<th style='width:20%'>" . $row["lrn"] . "</th>";
            echo "<th style='width:25.7%'>" . $row["fullname"] . "</th>";
            echo "<th style='width:20%' class='act'>";
            echo "<div class='icon-container'>";
            echo "<a href='../adviser_dashboard/classifications/update_record_filipino.php?lrn=" . htmlspecialchars($row['lrn']) . "&quarter=" . $selectedQuarter . "&school_year=" . $selectedSchoolYear . "' style='color: black;'>
    F<i onclick='showPupilRecordFilipino()'></i>
</a>";
            echo "</div>";
            echo "</th>";
            echo "<th style='width:20%'>Pending</th>";
            echo "<th style='width:25%' class='act'>";
            echo "<form method='post'>";
            echo "<input type='hidden' name='lrn' value='" . htmlspecialchars($row["lrn"]) . "'>";
            echo "<button type='submit' name='delete3' style=' background-color:#070000' class='updateRecordButtons'>REMOVE PUPIL AT RISK</button>";
            echo "</form>";
            echo "</th>";
            echo "</tr>";
        }
    }    
    ?>
            <tr>
                <td colspan="5">
                    <div class="save">
                        <a href="update_all_records/update_literacy_filipino.php"><button id="save">Update All Records</button></a>
                    </div>
                </td>
            </tr>
            </tbody>
</table>

                        <!--------------- ACADEMIC NUMERACY ----------------------->
    <table border="0" id="identification-numeracy" style="display: none;">
    <thead>
        <tr>
            <th style='width:20%'>LRN</th>
            <th style='width:25.7%'>Pupil's Name</th>
            <th style='width:20%'>P.A.R. Identification</th>
            <th style='width:20%'>Status</th>
            <th style='width:25%'>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
    if ($numeracyresult->num_rows > 0) {
        // Output data of each row
        while ($row = $numeracyresult->fetch_assoc()) {
            echo "<tr class='sheshable'>";
            echo "<th style='width:20%'>" . $row["lrn"] . "</th>";
            echo "<th style='width:25.7%'>" . $row["fullname"] . "</th>";
            echo "<th style='width:20%' class='act'>";
            echo "<div class='icon-container'>";
            echo "<a href='../adviser_dashboard/classifications/update_record_numeracy.php?lrn=" . htmlspecialchars($row['lrn']) . "&quarter=" . $selectedQuarter . "&school_year=" . $selectedSchoolYear . "' style='color: black;'>
            N<i onclick='showPupilRecordFilipino()'></i>
        </a>";
            echo "</div>";
            echo "</th>";
            echo "<th style='width:20%'>" . $row["status"] . "</th>";
            echo "<th style='width:25%' class='act'>";
            echo "<form method='post'>";
            echo "<input type='hidden' name='lrn' value='" . htmlspecialchars($row["lrn"]) . "'>";
            echo "<button type='submit' name='delete4' style=' background-color:#070000' class='updateRecordButtons'>REMOVE PUPIL AT RISK</button>";
            echo "</form>";
            echo "</th>";
            echo "</tr>";
        }
    }
    ?>
            <tr>
                <td colspan="5">
                    <div class="save">
                        <a href="update_all_records/update_numeracy.php"><button id="save">Update All Records</button></a>
                    </div>
                </td>
            </tr>
            </tbody>
</table>

                        <!--------------- BEHAVIORAL ----------------------->
        <table border="0" id="identification-behavioral" style="display: none;">
        <thead>
        <tr>
            <th style='width:20%'>LRN</th>
            <th style='width:25.7%'>Pupil's Name</th>
            <th style='width:20%'>P.A.R. Identification</th>
            <th style='width:20%'>Status</th>
            <th style='width:25%'>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
    if ($behavioalresult->num_rows > 0) {
        // Output data of each row
        while ($row = $behavioalresult->fetch_assoc()) {
            echo "<tr class='sheshable'>";
            echo "<th style='width:20%'>" . $row["lrn"] . "</th>";
            echo "<th style='width:25.7%'>" . $row["fullname"] . "</th>";
            echo "<th style='width:20%' class='act'>";
            echo "<div class='icon-container'>";
            echo "<a href='../adviser_dashboard/classifications/update_record_behavioral.php?lrn=" . htmlspecialchars($row['lrn']) . "&quarter=" . $selectedQuarter . "&school_year=" . $selectedSchoolYear . "' style='color: black;'>
    B<i onclick='showPupilRecordFilipino()'></i>
</a>";
            echo "</div>";
            echo "</th>";
            echo "<th style='width:20%'>" . $row["status"] . "</th>";
            echo "<th style='width:25%' class='act'>";
            echo "<form method='post'>";
            echo "<input type='hidden' name='lrn' value='" . htmlspecialchars($row["lrn"]) . "'>";
            echo "<button type='submit' name='delete5' style=' background-color:#070000' class='updateRecordButtons'>REMOVE PUPIL AT RISK</button>";
            echo "</form>";
            echo "</th>";
            echo "</tr>";
        }
    }
    ?>
            <tr>
                <td colspan="5">
                    <div class="save">
                        <a href="update_all_records/update_behavioral.php"><button id="save">Update All Records</button></a>
                    </div>
                </td>
            </tr>
            </tbody>
</table>

 <!---------------------------------- ALL PAR  ----------------------------------------->    
<form method="post">
<table border="0" id="parlist" style="display: none;">
<thead>
        <tr>
            <th style='width:25%'>LRN</th>
            <th style='width:35%'>Pupil's Name</th>
            <th style='width:28%'>P.A.R. Identification</th>
            <th style='width:35%'>Actions</th>
        </tr>
    </thead>
    <tbody>
<?php
if (isset($_POST['quarter'])) {
    $selected_quarter = $_POST['quarter'];
} else {
    $selected_quarter = 1; // Default to Quarter 1 if not set
}

if ($result_combined->num_rows > 0) {
    while ($row = $result_combined->fetch_assoc()) {
?>
        <tr class='sheshable'>
            <th style='width:25%'><?php echo $row["lrn"]; ?></th>
            <th style='width:35%'><?php echo $row["fullname"]; ?></th>
            <th style='width:28%' class='act'>
                <div class="icon-container">
                    <?php if ($row["english"] === 'E'): ?>
                        <?php
                            $english_color = '';
                            switch ($row["english_status"]) {
                                case 'Pending':
                                    $english_color = 'black';
                                    break;
                                case 'On-Going':
                                    $english_color = 'yellow';
                                    break;
                                case 'Resolved':
                                    $english_color = 'green';
                                    break;
                                case 'Unresolved':
                                    $english_color = 'red';
                                    break;
                                default:
                                    $english_color = 'black'; // Default to black if status is not recognized
                            }
                        ?>
                        <a href="classifications/update_record_english.php?lrn=<?php echo $row['lrn']; ?>&start_year=<?php echo $start_year; ?>&school_year=<?php echo urlencode($school_years[$start_year]); ?>&quarter=<?php echo $selected_quarter; ?>"><span style="color: <?php echo $english_color; ?>; font-weight: bolder; font-style: normal">E</span></a><i onclick="showPupilRecordEnglish()"></i>
                    <?php endif; ?>
                    <?php if ($row["filipino"] === 'F'): ?>
                        <?php
                            $filipino_color = '';
                            switch ($row["filipino_status"]) {
                                case 'Pending':
                                    $filipino_color = 'black';
                                    break;
                                case 'On-Going':
                                    $filipino_color = 'yellow';
                                    break;
                                case 'Resolved':
                                    $filipino_color = 'green';
                                    break;
                                case 'Unresolved':
                                    $filipino_color = 'red';
                                    break;
                                default:
                                    $filipino_color = 'black'; // Default to black if status is not recognized
                            }
                        ?>
                        <a href="classifications/update_record_filipino.php?lrn=<?php echo $row['lrn']; ?>&start_year=<?php echo $start_year; ?>&school_year=<?php echo urlencode($school_years[$start_year]); ?>&quarter=<?php echo $selected_quarter; ?>"><span style="color: <?php echo $filipino_color; ?>; font-weight: bolder; font-style: normal">F</span></a><i onclick="showPupilRecordFilipino()"></i>
                    <?php endif; ?>
                    <?php if ($row["numeracy"] === 'N'): ?>
                        <?php
                            $numeracy_color = '';
                            switch ($row["numeracy_status"]) {
                                case 'Pending':
                                    $numeracy_color = 'black';
                                    break;
                                case 'On-Going':
                                    $numeracy_color = 'yellow';
                                    break;
                                case 'Resolved':
                                    $numeracy_color = 'green';
                                    break;
                                case 'Unresolved':
                                    $numeracy_color = 'red';
                                    break;
                                default:
                                    $numeracy_color = 'black'; // Default to black if status is not recognized
                            }
                        ?>
                        <a href="classifications/update_record_numeracy.php?lrn=<?php echo $row['lrn']; ?>&start_year=<?php echo $start_year; ?>&school_year=<?php echo urlencode($school_years[$start_year]); ?>&quarter=<?php echo $selected_quarter; ?>"><span style="color: <?php echo $numeracy_color; ?>; font-weight: bolder; font-style: normal">N</span></a><i onclick="showPupilRecordNumeracy()"></i>
                    <?php endif; ?>
                    <?php if ($row["behavioral"] === 'B'): ?>
                        <?php
                            $behavioral_color = '';
                            switch ($row["behavioral_status"]) {
                                case 'Pending':
                                    $behavioral_color = 'black';
                                    break;
                                case 'On-Going':
                                    $behavioral_color = 'yellow';
                                    break;
                                case 'Resolved':
                                    $behavioral_color = 'green';
                                    break;
                                case 'Unresolved':
                                    $behavioral_color = 'red';
                                    break;
                                default:
                                    $behavioral_color = 'black'; // Default to black if status is not recognized
                            }
                        ?>
                        <a href="classifications/update_record_behavioral.php?lrn=<?php echo $row['lrn']; ?>&start_year=<?php echo $start_year; ?>&school_year=<?php echo urlencode($school_years[$start_year]); ?>&quarter=<?php echo $selected_quarter; ?>"><span style="color: <?php echo $behavioral_color; ?>; font-weight: bolder; font-style: normal">B</span></a><i onclick="showPupilRecordBehavioral()"></i>
                    <?php endif; ?>
                </div>
            </th>
            <th style='width:35%' class='act'>
                <form method="post" action="">
                    <input type="hidden" name="lrn" value="<?php echo $row['lrn']; ?>">
                    <input type="hidden" name="english" value="<?php echo $row['english']; ?>">
                    <input type="hidden" name="filipino" value="<?php echo $row['filipino']; ?>">
                    <input type="hidden" name="numeracy" value="<?php echo $row['numeracy']; ?>">
                    <input type="hidden" name="behavioral" value="<?php echo $row['behavioral']; ?>">
                    <input type="hidden" name="start_year" value="<?php echo $start_year; ?>">
                    <input type="hidden" name="school_year" value="<?php echo $school_years[$start_year]; ?>">
                    <button type="submit" name="delete1" style="background-color:#070000" class="updateRecordButtons">REMOVE PUPIL AT RISK</button>
                </form>
            </th>
        </tr>
<?php
    }
}
?>
</tbody>




</table>


</form>
 <!-------------------------------------------------- END --------------------------------------------------------------------------------------------------->

 <!---------- INTERVENTION ENGLISH ---------->
 <form action="" method="POST" class="form-container english" style="display: none;" id="englishForm">
            <div class="main-containers">
            <span class="closes" onclick="closeFormEnglish()">&times;</span>
            <h3 class="record_header">ACADEMIC - LITERACY IN ENGLISH RECORD</h3>
                <div class="rows">
                <div class="column">
                <div class="containers" style="background-color: #190572;">
                    <h3 style="margin-left: 7px">S.Y:2023-2024</h3>
                </div>
            </div>
            <div class="column column-right">
                <div class="select-wrapper1">
                    <select id="topdown" name="quarter" class="containerss second" style="background-color: #F3F3F3;">
                        <option value="" disabled selected hidden>Quarter 1</option>
                        <option value="q1">Quarter 1</option>
                        <option value="q2">Quarter 2</option>
                        <option value="q3">Quarter 3</option>
                        <option value="q4">Quarter 4</option>
                    </select>
                </div>
            </div>
                    <div class="columns" style="background:none; margin-left: 538px">
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
 <!---------- INTERVENTION FILIPINO  ---------->
        <form action="" method="POST" class="form-container filipino" style="display: none;" id="filipinoForm">
            <div class="main-containers">
            <span class="closes" onclick="closeFormFilipino()">&times;</span>
            <h3 class="record_header">ACADEMIC - LITERACY IN FILIPINO RECORD</h3>
            <div class="row">
            <div class="column">
                <div class="containers" style="background-color: #190572;">
                    <h3 style="margin-left: 7px">S.Y:2023-2024</h3>
                </div>
            </div>
            <div class="column column-right">
                <div class="select-wrapper1">
                    <select id="topdown" name="quarter" class="containerss second" onchange="redirectToQuarter()" style="background-color: #F3F3F3;">
                        <option value="" disabled selected hidden>Quarter 1</option>
                        <option value="q1">Quarter 1</option>
                        <option value="q2">Quarter 2</option>
                        <option value="q3">Quarter 3</option>
                        <option value="q4">Quarter 4</option>
                    </select>
                </div>
            </div>
                    <div class="columns" style="background:none; margin-left: 538px">
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
 <!---------- INTERVENTION NUMERACY ---------->
        <form action="" method="POST" class="form-container numeracy" style="display: none;" id="numeracyForm">
            <div class="main-containers">
            <span class="closes" onclick="closeFormNumeracy()">&times;</span>
            <h3 class="record_header">ACADEMIC - NUMERACY RECORD</h3>
                <div class="rows">
                <div class="column">
                <div class="containers" style="background-color: #190572;">
                    <h3 style="margin-left: 7px">S.Y:2023-2024</h3>
                </div>
            </div>
            <div class="column column-right">
                <div class="select-wrapper1">
                    <select id="topdown" name="quarter" class="containerss second" onchange="redirectToQuarter()" style="background-color: #F3F3F3;">
                        <option value="" disabled selected hidden>Quarter 1</option>
                        <option value="q1">Quarter 1</option>
                        <option value="q2">Quarter 2</option>
                        <option value="q3">Quarter 3</option>
                        <option value="q4">Quarter 4</option>
                    </select>
                </div>
            </div>
                    <div class="columns" style="background:none; margin-left: 538px">
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
 <!---------- INTERVENTION BEHAVIORAL ---------->
        <form action="" method="POST" class="form-container behavioral" style="display: none;" id="behavioralForm">
            <div class="main-containers">
            <span class="closes" onclick="closeFormBehavioral()">&times;</span>
            <h3 class="record_header"> BEHAVIORAL RECORD</h3>
                <div class="rows">
                <div class="column">
                <div class="containers" style="background-color: #190572;">
                    <h3 style="margin-left: 7px">S.Y:2023-2024</h3>
                </div>
            </div>
            <div class="column column-right">
                <div class="select-wrapper1">
                    <select id="topdown" name="quarter" class="containerss second" onchange="redirectToQuarter()" style="background-color: #F3F3F3;">
                        <option value="" disabled selected hidden>Quarter 1</option>
                        <option value="q1">Quarter 1</option>
                        <option value="q2">Quarter 2</option>
                        <option value="q3">Quarter 3</option>
                        <option value="q4">Quarter 4</option>
                    </select>
                </div>
            </div>
                    <div class="columns" style="background:none; margin-left: 538px">
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

        <div class="save">
            <button id="save">Update All Records</button>
        </div>
        <div class="pagination">
            <button id="prevbutton" onclick="prevPageReportTable()">Previous</button>
            <button id="nextbutton" onclick="nextPageReportTable()">Next</button>
        </div>

    <div class="overlay" id="overlay"></div>


    <div class="login-container" id="login-container">
    <span class="close">&times;</span>
    <h4>Adding <span class="student-name"></span> <br>as Pupil At Risk</h4>

    <form class="login-form" action="" method="post">
        <div class="form-group">
            <label for="lrn">Learner's Reference Number (LRN)</label>
            <input type="text" id="lrn" name="lrn" value="">
        </div>
        <div class="row">
            <div class="columns-group">
            <div class="form-group">
                    <label>Identification</label>
                    <div class="checkbox-group">
                        <input type="checkbox" id="checkbox1" name="identification[]" value="Academic - Literacy in English">
                        <label for="checkbox1">Academic - Literacy in English</label><br>
                        
                        <input type="checkbox" id="checkbox2" name="identification[]" value="Academic - Literacy in Filipino">
                        <label for="checkbox2">Academic - Literacy in Filipino</label><br>
                        
                        <input type="checkbox" id="checkbox3" name="identification[]" value="Academic - Numeracy">
                        <label for="checkbox3">Academic - Numeracy</label><br>
                        
                        <input type="checkbox" id="checkbox4" name="identification[]" value="Behavioral">
                        <label for="checkbox4">Behavioral</label><br>
                    </div>
                </div>
                <div class="form-group">
                    <label for="date-added">Date Added</label>
                    <input type="text" class="date" name="date" value="<?php echo date('Y-m-d'); ?>" readonly>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" name="" class="addPupilButton">ADD PUPIL AT RISK</button>
        </div>
    </form>
</div>
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
//show form-container english-form
function showPupilRecordEnglish() {
        var pupilRecord = document.querySelector(".form-container.english");
        var overlay = document.querySelector(".overlay");
        pupilRecord.style.display = "block";
        overlay.style.display = "block";
    }

    function closeFormEnglish() {
        var pupilRecord = document.querySelector(".form-container.english");
        var overlay = document.querySelector(".overlay");
        pupilRecord.style.display = "none";
        overlay.style.display = "none";
    }

    //show form-container filipino-form
function showPupilRecordFilipino() {
        var pupilRecord = document.querySelector(".form-container.filipino");
        var overlay = document.querySelector(".overlay");
        pupilRecord.style.display = "block";
        overlay.style.display = "block";
    }

    function closeFormFilipino() {
        var pupilRecord = document.querySelector(".form-container.filipino");
        var overlay = document.querySelector(".overlay");
        pupilRecord.style.display = "none";
        overlay.style.display = "none";
    }

    //show form-container numeracy-form
function showPupilRecordNumeracy() {
        var pupilRecord = document.querySelector(".form-container.numeracy");
        var overlay = document.querySelector(".overlay");
        pupilRecord.style.display = "block";
        overlay.style.display = "block";
    }

    function closeFormNumeracy() {
        var pupilRecord = document.querySelector(".form-container.numeracy");
        var overlay = document.querySelector(".overlay");
        pupilRecord.style.display = "none";
        overlay.style.display = "none";
    }

    //show form-container behavioral-form
function showPupilRecordBehavioral() {
        var pupilRecord = document.querySelector(".form-container.behavioral");
        var overlay = document.querySelector(".overlay");
        pupilRecord.style.display = "block";
        overlay.style.display = "block";
    }

    function closeFormBehavioral() {
        var pupilRecord = document.querySelector(".form-container.behavioral");
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


    // one checkbox
    const checkboxes = document.querySelectorAll('.checkbox');

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                checkboxes.forEach(cb => {
                    if (cb !== this) {
                        cb.checked = false;
                    }
                });
            }
        });
    });

    //table display    
    const allStudentsRadio = document.getElementById('legend-checkbox-all');
    const atRiskRadio = document.getElementById('legend-checkbox-at-risk');
    const academicNumeracyRadio = document.getElementById('legend-checkbox-numeracy');
    const BehavioralRadio = document.getElementById('legend-checkbox-behavioral');
    const academicEnglishRadio = document.getElementById('legend-checkbox-english-literacy');
    const academicFilipinoRadio = document.getElementById('legend-checkbox-filipino-literacy');

    const identificationEnglish = document.getElementById('identification-english');
    const identificationFilipino = document.getElementById('identification-filipino');
    const identificationNumeracy = document.getElementById('identification-numeracy');
    const identificationBehavioral = document.getElementById('identification-behavioral');
    const pupilTable = document.getElementById('pupilTable');
    const parTable = document.getElementById('parlist');

    function hideIdentificationTables() {
        identificationEnglish.style.display = 'none';
        identificationFilipino.style.display = 'none';
        identificationNumeracy.style.display = 'none';
        identificationBehavioral.style.display = 'none';
    }

    function uncheckOtherRadios(radioToCheck) {
        [allStudentsRadio, atRiskRadio, academicNumeracyRadio, BehavioralRadio, academicEnglishRadio, academicFilipinoRadio].forEach(radio => {
            if (radio !== radioToCheck) {
                radio.checked = false;
            }
        });
    }

    allStudentsRadio.addEventListener('change', function() {
        if (allStudentsRadio.checked) {
            pupilTable.style.display = 'block';
            hideIdentificationTables();
            parTable.style.display = 'none';
            uncheckOtherRadios(allStudentsRadio);
        }
    });

    academicNumeracyRadio.addEventListener('change', function() {
        if (academicNumeracyRadio.checked) {
            pupilTable.style.display = 'none';
            hideIdentificationTables();
            identificationNumeracy.style.display = 'block';
            parTable.style.display = 'none';
            uncheckOtherRadios(academicNumeracyRadio);
        }
    });

    BehavioralRadio.addEventListener('change', function() {
        if (BehavioralRadio.checked) {
            pupilTable.style.display = 'none';
            hideIdentificationTables();
            identificationBehavioral.style.display = 'block';
            parTable.style.display = 'none';
            uncheckOtherRadios(BehavioralRadio);
        }
    });

    academicEnglishRadio.addEventListener('change', function() {
        if (academicEnglishRadio.checked) {
            pupilTable.style.display = 'none';
            hideIdentificationTables();
            identificationEnglish.style.display = 'block';
            parTable.style.display = 'none';
            uncheckOtherRadios(academicEnglishRadio);
        }
    });

    academicFilipinoRadio.addEventListener('change', function() {
        if (academicFilipinoRadio.checked) {
            pupilTable.style.display = 'none';
            hideIdentificationTables();
            identificationFilipino.style.display = 'block';
            parTable.style.display = 'none';
            uncheckOtherRadios(academicFilipinoRadio);
        }
    });

    atRiskRadio.addEventListener('change', function() {
        if (atRiskRadio.checked) {
            pupilTable.style.display = 'none';
            hideIdentificationTables();
            parTable.style.display = 'block';
            uncheckOtherRadios(atRiskRadio);
        }
    });

    allStudentsRadio.checked = true;
    pupilTable.style.display = 'block';

</script>
<script>
    function submitForm() {
        document.getElementById('quarterForm1').submit();
    }
</script>
<script>
    document.querySelector('.search-input').addEventListener('input', function () {
        const searchText = this.value.toLowerCase();
        const rows = document.querySelectorAll('#pupilTable tr.sheshable');

        rows.forEach(row => {
            const name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            if (name.includes(searchText)) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
</body>
</html>