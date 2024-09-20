<?php
include('../../../database.php');

$currentFileName = basename(__FILE__, '.php');

$tableExistsQuery = "SHOW TABLES LIKE '$currentFileName'";
$tableExistsResult = $conn->query($tableExistsQuery);

$result = null; // Initialize $result outside the if condition

if ($tableExistsResult->num_rows > 0) {
    $fetchQuery = "SELECT lrn, fullname, gender FROM $currentFileName WHERE school = 'Bacayao Sur Elementary School'";
    $result = $conn->query($fetchQuery);
}

?>
<?php
$currentFileName = basename(__FILE__, '.php');
$words = explode('_', $currentFileName);

if (count($words) >= 4) {
    $grade = $words[1];
    $section = ucfirst($words[3]);

    // Convert $grade to uppercase if it's "i", "ii", or "iii"
    if (in_array(strtolower($grade), ['i', 'ii', 'iii'])) {
        $grade = strtoupper($grade);
    }
}

?>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        // Get form data
        $lrn = $_POST["lrn"];
        $fullname = $_POST["fullname"];
        $gender = $_POST["gender"];
        $school = "Bacayao Sur Elementary School";

        // Your existing code to get filename, grade, and section
        $filename = basename($_SERVER["SCRIPT_FILENAME"]);
        $filename = str_replace('.php', '', $filename);
        $words = explode('_', $filename);

        if (count($words) >= 4) {
            $grade = $words[1];
            $section = $words[3];
        } 

        include('../../../database.php');

        // Prepare and execute the SQL query to insert data into the table
        $sql = "INSERT INTO $filename (lrn, fullname, gender, grade, section, school) VALUES (?,?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $lrn, $fullname, $gender, $grade, $section, $school);

        if ($stmt->execute()) {
        } else {
        }
        $stmt->close();
    }
?>
<?php
$errorMsg = "";
include('../../../database.php');
$tableNameKeyword = "grade";
$sectionKeyword = "section";

$sql = "SHOW TABLES LIKE '%$tableNameKeyword%$sectionKeyword%'";
$result1 = $conn->query($sql);
$sectionOptions = '';
$gradeOptions = [];
$uniqueGrades = [];

if ($result1->num_rows > 0) { 
    while ($row = $result1->fetch_assoc()) { 
        $tableName = reset($row);

        $tableWords = explode('_', $tableName); 
        if (count($tableWords) >= 4) {
            $fourthWord = ucfirst($tableWords[3]); // Capitalize the first letter
            $secondWord = ucfirst($tableWords[1]); // Capitalize the first letter
        
            // Check if the grade is not in the list of unique grades
            if (!in_array($secondWord, $uniqueGrades)) {
                // Check if the grade is 'i', 'ii', or 'iii' and convert to uppercase
                $gradeOptionValue = ($secondWord == 'I' || $secondWord == 'Ii' || $secondWord == 'Iii') ? strtoupper($secondWord) : $secondWord;
        
                // Append the option tag to the options string
                $gradeOptions[] = "<option value=\"$gradeOptionValue\">$gradeOptionValue</option>";
        
                // Add the grade to the list of unique grades
                $uniqueGrades[] = $secondWord;
            }
        
            // Append the option tag to the options string for section
            $sectionOptions .= "<option value=\"$fourthWord\">$fourthWord</option>";
        }
        
        
        
    }
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
    <title>School Administrator</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
            body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-size: cover;
        }
        
        .logo {
            width: 70px;
            height: 70px;
            margin: 0 auto 20px;
            background-image: url('../../img/logo.png'); 
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

        .login-container {
            background-color: rgba(25, 5, 114, 0.80); 
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
            text-align: center;
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

        .navbar {
            background-color: #190572;;
            opacity: 80%;
            display: flex;
            justify-content: center;
            height: 50px;
            width: 100%;
            position: fixed;
            top: 57px; 
        }

        nav {
            display: flex;
            align-items: center;
        }

        nav a {
            display: inline-block;
            padding: 14px 40px;
            text-decoration: none;
            color: FFFFFF;
            opacity: 100%;
        }

        nav a:hover {
            background-color:#F3F3F3;
            color:#190572;
        }

        h3{
        color: #fff;
        text-align: center;
        }

        ::-webkit-scrollbar {
            width: 10px;
            visibility: hidden;
        }
    
        ::-webkit-scrollbar-thumb {
            background-color: #190572;
            border-radius: 20px;
            visibility: hidden;
        }
    
        ::-webkit-scrollbar-track {
            background-color: #E2DFEE;
            border-radius: 20px;
            visibility: hidden;
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

        .main-container {
            width: 100%;
            display: flex;
            margin-top: 10px;
            background-color: #fff;
        }

        .navbar-container {
            height: calc(100vh - 140px);
            width: 15%; 
            border-right: 1px solid #ddd; 
            padding-right: 10px; 
            background-color: #190572; 
            color: #fff; 
            padding: 5px;
        }

        .navbar-content {
            height: 100%;
            overflow-y: auto; 
            padding-right: 5px; 
        }

        .navbar-item {
            padding: 10px 0; 
            margin-bottom: 10px; 
            padding-left: 10px;
        }

        .navbar-item-text {
            margin-left: 10px;
        }

        .navbar-item a {
            display: block;
            color: inherit;
            text-decoration: none;
            cursor: pointer;
        }

        .navbar-item:hover {
            background-color:#F3F3F3;
            color:#130550;
        }

        .title a{
            font-weight: 600;
        }
        #gradeSectionSelection {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            margin-top: 20px;
            margin-left: 20px;
        }

        #gradeDropdown{
            margin-right: 20px;
        }

        .dropdown-container {
            display: flex;
            align-items: center;
        }

        label {
            margin-right: 5px;
            background-color: #190572;
            color:#ddd;
            padding: 5px;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }

        .dropdowns {
            background-color: #fff;
            color: #000;
            padding: 5px 10px;
            width: 150px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            border: 1px solid #ccc;
            cursor: pointer;
        }


        .dropdowns:hover {
            background-color: #f3f3f3;
        }

        .dropdowns:focus {
            outline: none;
        }

        .main-container {
            width: 100%;
            display: flex;
            margin-top: 115px;
            background-color: #fff;
        }

        .main-content {
            flex: 1;
            background: #fff;
            overflow-y: auto;
            height: calc(100vh - 140px);
        }

        .main-content h3 {
            color: #130550;
            background-color: #D4D4D4; 
            padding: 10px;
            padding-left: 50px;
            margin: 0;
        }

        .main-content table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .main-content th,
        .main-content td {
            padding: 4px;
            text-align: left;
            padding-left: 15px;
        }

        .main-content th:first-child,
        .main-content td:first-child {
            padding-left: 0;
            text-align: center; 
        }

        .main-content th {
            border: 2px solid #ddd;
            background-color: #190572;
            color: #fff; 
        }

        .main-content tr:nth-child(even) {
            background-color: #E2DFEECC;
        }

        .main-content tr:nth-child(odd) {
            background-color: #B7B7B7CC; 
        }

        .main-content th:nth-child(1),
        .main-content td:nth-child(1) {
            width: 5%; 
        }

        .main-content th:nth-child(2),
        .main-content td:nth-child(2) {
            width: 32%; /
        }

        .main-content th:nth-child(3),
        .main-content td:nth-child(3) {
            width: 63%; 
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

        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); 
            z-index: 999; 
            display: none; 
        }
        .modal {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #190572;
            opacity: 90%;
            z-index: 1000; 
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            display: none; 
            color: #ddd;
            width: 24rem;
        }

        .modal h2{
            top: 0;
            text-align: center;
            font-size: 25px;
            font-weight: 400;
        }

        .modal-logo {
            height: 75px;
            width: 75px;
            margin: 20px auto; 
            display: block;
        }

        #studentForm input,
        #studentForm select{
            height: 30px;
            border-radius: 5px;
            width: 100%;
        }

        #studentForm label{
            font-family: 'Darker Grotesque', sans-serif;
            font-weight: 500;
            font-size: 15px;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 20px;
        }

        button{
            width: 100%;
            background-color: #0C052F;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 7px 30px;
            cursor: pointer;
            margin-top: 20px; 
        }

        button:hover {
            background-color: #DDDAE7;
            color: #0C052F;
        }

        #gradeSectionSelection span{
            padding: 5px;
            background-color: transparent;
            color: #190572;
            padding: 5px;
            border-radius: 5px;
            display: inline-block;
            font-weight: bold;
         }

        .grade, .section {
            color: #130550;
            background-color: transparent;
        }
        .errorMessage {
            text-align: center;
            font-weight: bold;
            color: red;
            margin-left: auto;
            margin-right: auto;
        }
        .grades {
            margin-left: auto;
        }
        .back-icon{
            color: #190572;
            top: 10px;
            font-size: 30px;
            left: 10px;
            text-decoration: none;
        }
        .back-icon i {
            margin-right: 5px;
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

            .navbar{
                font-size: 0.6rem;
                margin-top: -14px;
                height: 39px;
            }
        }
    </style>
</head>
<body>

    <header>
        <div class="container">
            <div class="header-content">
                <img src="../../../img/logo.png" class="logs">
                <h4>E.D.G.E | P.A.R. Early Detection and Guidance for Education</h4>
                <i class="vertical-line"></i>
                <div class="dropdown">
                <div class='name' onclick="toggleDropdown()">Stephanie Mislang</div>
                    <div class="dropdown-content" id="dropdownContent">
                    <a href="../../login/Login.php">Log Out</a>
                        <a href="../../button_options/school_admin_change_password.php?employment_number=<?php echo isset($_GET['employment_number']) ? $_GET['employment_number'] : 'default_value'; ?>" style="border-top: 1px solid #ddd;">Change Password</a>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="main-container" >
        <div class="main-content">

       

            <div id="gradeSectionSelection">
            <div class="dropdown-container">
            <a href="" class="back-icon"><i class="bx bxs-chevron-left"></i></a>
                <label for="gradeDropdown">Grade:</label>
                <select id="gradeDropdown" class="dropdowns" onchange="filterStudents()">
                    <option value="" disabled selected hidden>Grade</option>
                    <?php echo implode('', $gradeOptions); ?>
                </select>
            </div>
            <div class="dropdown-container">
                <label for="sectionDropdown">Section:</label>
                <select id="sectionDropdown" class="dropdowns" onchange="filterStudents()">
                    <option value="" disabled selected hidden>Section</option>
                    <?php echo $sectionOptions; ?>
                </select>
            </div>
            <div class="errorMessage">
        <?php echo isset($errorMsg) ? $errorMsg : ''; ?>
        </div>
            <span class="grade grades">You are viewing <?php echo "Grade: " ?></span><span style="font-weight: bold; font-style:italic"><?php echo ucfirst($grade) ?></span>
            <span class="section"><?php echo "Section: " ?></span><span style="font-weight: bold; font-style:italic"><?php echo $section ?></span>
        </div>

        <div id="section1Content">
            <h3>Male</h3>
            <table>
                <tr>
                    <th>#</th>
                    <th>Learner's Reference Number (LRN)</th>
                    <th>Student's Name</th>
                </tr>
                <?php
        if ($result && $result->num_rows > 0) {
            $counter = 1;

            while ($row = $result->fetch_assoc()) {
                $gender = strtolower($row['gender']);

                if ($gender === 'male') {
                    echo "<tr>";
                    echo "<td>{$counter}</td>";
                    echo "<td>{$row['lrn']}</td>";
                    echo "<td>{$row['fullname']}</td>";
                    echo "</tr>";

                    $counter++;
                }
            }
        } 
        ?>

            </table>
            
        </div>
        <div id="section2Content">
            <h3>Female</h3>
            <table>
                <tr>
                    <th>#</th>
                    <th>Learner's Reference Number (LRN)</th>
                    <th>Student's Name</th>
                </tr>
                <?php
        // Re-fetch the records since the pointer is at the end of the result set
        $result = $conn->query($fetchQuery);

        if ($result && $result->num_rows > 0) {
            $counter = 1;

            while ($row = $result->fetch_assoc()) {
                $gender = strtolower($row['gender']);

                if ($gender === 'female') {
                    echo "<tr>";
                    echo "<td>{$counter}</td>";
                    echo "<td>{$row['lrn']}</td>";
                    echo "<td>{$row['fullname']}</td>";
                    echo "</tr>";

                    $counter++;
                }
            }
        } 
        ?>

            </table>

        </div>
    </div>

    <div class="plus-button">
        <button id="addRecordButton" class="add-button" onclick="togglePopupForm()"><i class='bx bx-plus'></i></button>
    </div>
    </div>

    <div id="overlay"></div>


    <div id="popupForm" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <img src="../../../img/logo.png" class="modal-logo" alt="Logo">
            <h2>Add Student</h2>
            <form id="studentForm" method="post" action="" enctype="multipart/form-data">
                <label for="name">Name:</label>
                <input type="text" id="name" name="fullname" ><br><br>
                <label for="lrn">LRN:</label>
                <input type="number" id="lrn" name="lrn"  ><br><br>
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" >
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

                <button type="submit" name="submit">Add Student</button>
            </form>
        </div>
    </div>

    <script src="../view_studentlist2.js"></script>
    <script>
    // Function to handle dropdown change event
    function filterStudents() {
    // Get selected grade and section values
    var selectedGrade = document.getElementById("gradeDropdown").value.toLowerCase();
    var selectedSection = document.getElementById("sectionDropdown").value.toLowerCase();

    // Construct the PHP file URL
    var phpFileUrl = "grade_" + selectedGrade + "_section_" + selectedSection + ".php?employment_number=<?php echo isset($_GET['employment_number']) ? $_GET['employment_number'] : 'default_value'; ?>";

    // Check if the PHP file exists before navigating
    fetch(phpFileUrl)
        .then(response => {
            if (response.ok) {
                // PHP file exists, navigate to the corresponding URL
                window.location.href = phpFileUrl;
            } else {
                // PHP file not found, show an error message
                showError("Grade and Section Doesn't Exist");
            }
        })
        .catch(error => {
            console.error("Error checking PHP file:", error);
            // Handle other errors if needed
            showError("");
        });
}


    // Function to display error message
    function showError(message) {
        // Display an error message to the user (you can customize this based on your needs)
        var errorMessageDiv = document.querySelector(".errorMessage");
        errorMessageDiv.innerHTML = message;
    }

    // Function to parse URL parameters
    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return "";
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

    // Get grade and section values from the URL
    var urlGrade = getParameterByName("grade");
    var urlSection = getParameterByName("section");

    // Set the dropdown values based on the URL parameters
    if (urlGrade && urlSection) {
        document.getElementById("gradeDropdown").value = urlGrade;
        document.getElementById("sectionDropdown").value = urlSection;
    }

    // Add event listeners to the dropdowns
    document.getElementById("gradeDropdown").addEventListener("change", filterStudents);
    document.getElementById("sectionDropdown").addEventListener("change", filterStudents);
</script>


    
</body>
</html>