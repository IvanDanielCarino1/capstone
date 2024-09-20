<?php
$errorMsg = "";
$errorMsg1 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == UPLOAD_ERR_OK) {
        $grade = strtolower($_POST["grade"]); // Updated here
        $section = strtolower($_POST["section"]); // Updated here

        $tableName = "grade_" . $grade . "_section_" . $section;
        $fileName = "grade_" . $grade . "_section_" . $section . ".php";
        $filePath = "grade_sections/" . $fileName;

        include("../../database.php");

        $checkTableQuery = "SHOW TABLES LIKE '$tableName'";
        $result = $conn->query($checkTableQuery);

        if ($result->num_rows > 0) {
            // Table already exists, insert data into existing table
            $file = $_FILES["file"]["tmp_name"];
            $csvData = array_map("str_getcsv", file($file));
            array_shift($csvData);

            foreach ($csvData as $row) {
                $lrn = $row[0];
                $fullname = $row[1];
                $gender = $row[2];
                $grade = $grade;
                $section = $section;
                $school = "Bacayao Sur Elementary School";
                $insertQuery = "INSERT INTO $tableName (lrn, fullname, gender, grade, section, school)
                                VALUES ('$lrn', '$fullname', '$gender', '$grade', '$section', '$school')";

                if ($conn->query($insertQuery) === FALSE) {
                    $errorMsg1 = "Error inserting data: " . $conn->error;
                    break;
                }
            }

            // Create PHP file in grade_sections folder (if needed)
            if (!file_exists($filePath)) {
                $templateContent = file_get_contents("template.php");
                $templateContent = str_replace("{GRADE}", $grade, $templateContent);
                $templateContent = str_replace("{SECTION}", $section, $templateContent);

                file_put_contents($filePath, $templateContent);
            }

            $errorMsg = "Data inserted into existing table";
        } else {
            // Table does not exist, create a new table as before
            $createTableQuery = "CREATE TABLE $tableName (
                                    id INT AUTO_INCREMENT PRIMARY KEY,
                                    lrn VARCHAR(255) NOT NULL,
                                    fullname VARCHAR(255) NOT NULL,
                                    gender VARCHAR(255) NOT NULL,
                                    section VARCHAR(255) NOT NULL,
                                    grade VARCHAR(255) NOT NULL,
                                    school VARCHAR(255) NOT NULL,
                                    year VARCHAR(255) NOT NULL
                                )";

            if ($conn->query($createTableQuery) === FALSE) {
                $errorMsg1 = "Error creating table: " . $conn->error;
            } else {
                // Insert data into the newly created table
                $file = $_FILES["file"]["tmp_name"];
                $csvData = array_map("str_getcsv", file($file));
                array_shift($csvData);

                foreach ($csvData as $row) {
                    $lrn = $row[0];
                    $fullname = $row[1];
                    $gender = $row[2];
                    $grade = $grade;
                    $section = $section;
                    $school = "Bacayao Sur Elementary School";
                    $year = date('Y');
                    $insertQuery = "INSERT INTO $tableName (lrn, fullname, gender, grade, section, school, year)
                                    VALUES ('$lrn', '$fullname', '$gender', '$grade', '$section', '$school', '$year')";

                    if ($conn->query($insertQuery) === FALSE) {
                        $errorMsg1 = "Error inserting data: " . $conn->error;
                        break;
                    }
                }

                // Create PHP file in grade_sections folder
                $templateContent = file_get_contents("template.php");
                $templateContent = str_replace("{GRADE}", $grade, $templateContent);
                $templateContent = str_replace("{SECTION}", $section, $templateContent);

                file_put_contents($filePath, $templateContent);

                $errorMsg = "File Upload Successful";
            }
        }

        $conn->close();
    } else {
        $errorMsg1 = "Error uploading file.";
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
        }
        h3 {
            color: green;
            font-family: 'Darker Grotesque', sans-serif;
            font-size: 20px;
            font-weight: bold;
        }
        
        .logo {
            width: 75px;
            height: 75px;
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
            margin-top: 120px;
            background-color: rgba(25, 5, 114, 0.80); 
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
            text-align: center;
            position: relative;
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
            background-color: #ddd;
            color: black;
        }

        h3{
        color: #fff;
        }
        
        .file-upload-container {
            margin-top: 20px;
            border: 2px dashed #fff;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            color: #fff;
        }

        .file-upload-container p {
            margin-bottom: 20px;
        }

        .file-upload-container .form-group {
            margin-bottom: 20px;
        }

        .file-upload-container label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }

        .file-upload-container select, 
        .file-upload-container option,
        .file-upload-container input[type="file"],
        .file-upload-container input[type="text"] {
            width: 80%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #130550;
            background-color: #ddd;
            opacity: 80%;
            color: #130550;
        }

        .file-upload-container select, 
        .file-upload-container option{
            width: 85%;
        }

        .file-upload-container button {
            background-color: #D9D9D9;
            color: #190572;
            padding: 10px 20px;
            border: 1px solid #fff;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .file-upload-container button:hover {
            background-color: #0C052F; 
            border: 1px solid #190572;
            color:#D9D9D9;
        }

        .blue-text{
            color: green;
            font-family: 'Darker Grotesque', sans-serif;
            font-size: 200px;
            font-weight: bold;
        }
        .error-message{
            color: green;
            font-weight:bold ;
          }
          .error-message1{
            color: red;
            font-weight:bold ;
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
        .back-icon {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 30px;
            color: #fff;
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
                <div class='name' onclick="toggleDropdown()">Stephanie Mislang</div>
                    <div class="dropdown-content" id="dropdownContent">
                    <a href="../../login/Login.php">Log Out</a>
                        <a href="../button_options/school_admin_change_password.php?employment_number=<?php echo isset($_GET['employment_number']) ? $_GET['employment_number'] : 'default_value'; ?>" style="border-top: 1px solid #ddd;">Change Password</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

 
    <div class="login-container">
        <a href="../schooladmin_manage_account/schadmin_manage_accounts.php?employment_number=<?php echo isset($_GET['employment_number']) ? $_GET['employment_number'] : 'default_value'; ?>" class="back-icon"><i class='bx bxs-chevron-left'></i></a>
        <div class="logo"></div>
        <h3>Import Data File</h3>

        <div class="error-message">
            <?php echo $errorMsg; ?>
        </div>
        <div class="error-message1">
            <?php echo $errorMsg1; ?>
        </div>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="file-upload-container">
        <p>Upload CSV file only</p>
        <div class="form-group">
            <label for="file">Choose File:</label>
            <input type="file" id="file" name="file" accept=".csv" required>
        </div>
        <div class="form-group">
            <label for="grade">Grade:</label>
            <select id="grade" name="grade">
                <option value="kinder">Kinder</option>
                <option value="I">1</option>
                <option value="II">2</option>
                <option value="III">3</option>
            </select>
        </div>
        <div class="form-group">
                <label for="section">Section:</label>
                <input type="text" id="section" name="section" value="" required>

        </div>
        <button type="submit" class="import-button">Import</button>
    </div>
    </form>
    </div>

    <script src="manage_student.js"></script>
</body>
</html>
