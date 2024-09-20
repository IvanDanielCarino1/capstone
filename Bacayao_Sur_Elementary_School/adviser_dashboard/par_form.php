<?php
    include('../../database.php');

    if(isset($_POST['submit1'])) {
        $lrn = $_POST['lrn'];
        $date = $_POST['date'];

        $school = $_GET['school'] ?? '';
        $grade = $_GET['grade'] ?? ''; 
        $section = $_GET['section'] ?? ''; 
        $fullname = $_GET['fullname'] ?? '';
        $quarter = $_GET['quarter'] ?? '';
        $status = "Pending";

        // Get the current year
        $current_year = date('Y');

        $checkbox_classifications = array(
            'academic_english' => 'Academic - Literacy in English',
            'academic_filipino' => 'Academic - Literacy in Filipino',
            'academic_numeracy' => 'Academic - Literacy in Numeracy',
            'behavioral' => 'Behavioral'
        );

        foreach ($checkbox_classifications as $checkbox => $classification) {
            if(isset($_POST[$checkbox])) {
                // Modify the SQL query to include additional fields
                $sql = "INSERT INTO $checkbox (lrn, date, school, grade, section, fullname, year, classification, quarter, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('ssssssisss', $lrn, $date, $school, $grade, $section, $fullname, $current_year, $classification, $quarter, $status);
                $stmt->execute();
            }
        }
    }
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
    $file = $_GET['file'];
    $employment_number = $_GET['employment_number'];

    // Assuming $file contains the file name and $employment_number is part of the path
    $path = $file . '?employment_number=' . $employment_number;
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

        .top-container {
            height: 42px; 
            background-color: #0C052F7A;
            position: fixed;
            top: 245px; 
            width: 82.7%;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        .column input[type="text"]{
            width: 90%;
        }

        .column,
        input[type="date"] {
            flex: 1;
            padding: 5px;
            border-radius: 3px;
            margin-right: 5px;
        }

        input[type="text"],
        input[type="date"],
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
    
        .formatting-buttons {
            position: absolute;
            bottom: 5px;
            right: 5px;
            display: flex;
        }
    
        .formatting-buttons button {
            background-color: #b3adcb;
            color:#190572;
            font-weight: bold;
            border: 1px solid #190572;
            padding: 5px 10px;
            margin-left: 2px;
            border-radius: 3px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
    
        .formatting-buttons button:hover {
            background-color: #190572;
            color: #ddd;
        }

        .add-button {
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

        .add-button:hover {
            background-color: #130550;
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
        .error-message {
            color: white;
            font-weight: bold;
            text-align: center;
            margin: 0 auto;
        }
        .error-message1 {
            color: red;
            font-weight: bold;
            text-align: center;
            margin: 0 auto;
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

        .back-button {
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            text-align: left;
            margin-bottom: 0px;
        }

        .back-icon {
            font-size: 2rem;
            color: #fff;
            text-decoration: none;
            margin-right: 10px;
        }

        .login-container {
            background-color: rgba(25, 5, 114); 
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
        }

        .login-container h4{
            margin-top: 0;
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

        .form-group input[type="text"] {
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

        .checkbox-group{
        text-align: left;
        margin-left: 5px;
    }

    .checkbox-group input[type="checkbox"] {
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

    .checkbox-group input[type="checkbox"]:checked + label:before {
        content: '\2713';
        font-size: 16px;
        color: white; 
        background-color: #130550; 
        text-align: center;
        line-height: 20px;
        margin-bottom: 5px;
    }


    .columns-group input[type="text"]{
            width: 95%;
        }

        .columns-group{
            padding: 5px;
            border-radius: 3px;
        }

        .columns-group input[type="text"]{
            border: none;
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
                        <a href="../../change_password/change_password.php?employment_number=<!?php echo isset($_GET['employment_number']) ? $_GET['employment_number'] : 'default_value'; ?>" style="border-top: 1px solid #ddd;">Change Password</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="login-container" >
        <div class="back-button">
            <a href="<?php echo $path ?>" class="back-icon"><i class='bx bx-chevron-left'></i></a>
        </div>
        <h4>Adding Pupil At Risk</h4>

    <form class="login-form" action="" method="post">
        <div class="form-group">
            <label for="lrn">Learner's Reference Number (LRN)</label>
            <input type="text" id="lrn" name="lrn" value="<?php echo isset($_GET['lrn']) ? htmlspecialchars($_GET['lrn']) : ''; ?>">
        </div>
        <div class="row">
            <div class="columns-group">
            <div class="form-group">
                    <label>Identification</label>
                    <div class="checkbox-group">
                        <input type="checkbox" id="checkbox1" name="academic_english" value="Academic - Literacy in English">
                        <label for="checkbox1">Academic - Literacy in English</label><br>
                        
                        <input type="checkbox" id="checkbox2" name="academic_filipino" value="Academic - Literacy in Filipino">
                        <label for="checkbox2">Academic - Literacy in Filipino</label><br>
                        
                        <input type="checkbox" id="checkbox3" name="academic_numeracy" value="Academic - Numeracy">
                        <label for="checkbox3">Academic - Numeracy</label><br>
                        
                        <input type="checkbox" id="checkbox4" name="behavioral" value="Behavioral">
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
            <button type="submit" name="submit1" class="addPupilButton">ADD PUPIL AT RISK</button>
        </div>
    </form>
</div>

</body>
</html>