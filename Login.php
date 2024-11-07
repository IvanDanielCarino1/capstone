<?php
include('database.php');
$errorMsg = "";

function sanitizeInput($data) {
    return htmlspecialchars(strip_tags($data));
}

if (isset($_POST['submit'])) {
    $employment_number = sanitizeInput($_POST['employment_number']);
    $password = sanitizeInput($_POST['password']);

    $tables = array('adviser', 'principal', 'counselor', 'school_admin', 'sdo_admin', 'executive_committee');

    foreach ($tables as $table) {
        $query = "SELECT * FROM $table WHERE employment_number = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $employment_number);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashedPasswordInDB = $row['password'];
            $verifiedStatus = $row['verified'];
            $activationStatus = $row['activation']; // Added to fetch activation status

            if (password_verify($password, $hashedPasswordInDB)) {
                if ($activationStatus == 'activate') { // Check activation status
                    switch ($table) {
                        case 'adviser':
                            if ($verifiedStatus == 'yes') {
                                $grade = $row['grade'];
                                $section = $row['section'];
                                $school = str_replace(' ', '_', $row['school']);
                                header("Location: $school/adviser_dashboard/grade_$grade" . "_section_$section" . ".php?employment_number=$employment_number");
                                exit();
                            } else {
                                header("Location: enter_email_logging_in.php?employment_number=$employment_number&table=$table");
                                exit();
                            }
                            break;

                        case 'principal':
                            if ($verifiedStatus == 'yes') {
                                $school = str_replace(' ', '_', $row['school']);
                                header("Location:$school/monitoring_tracking/Principal_tracking_reports_Q1.php?employment_number=$employment_number");
                                exit();
                            } else {
                                header("Location: enter_email_logging_in.php?employment_number=$employment_number&table=$table");
                                exit();
                            }
                            break;

                        case 'counselor':
                            if ($verifiedStatus == 'yes') {
                                $school = str_replace(' ', '_', $row['school']);
                                header("Location: $school/guidance_dashboard/template_guidance.php?employment_number=$employment_number");
                                exit();
                            } else {
                                header("Location: enter_email_logging_in.php?employment_number=$employment_number&table=$table");
                                exit();
                            }
                            break;

                        case 'school_admin':
                            if ($verifiedStatus == 'yes') {
                                $school = str_replace(' ', '_', $row['school']);
                                header("Location: $school/schooladmin_manage_account/schadmin_manage_accounts.php?employment_number=$employment_number");
                                exit();
                            } else {
                                header("Location: enter_email_logging_in.php?employment_number=$employment_number&table=$table");
                                exit();
                            }
                            break;

                        case 'sdo_admin':
                            if ($verifiedStatus == 'yes') {
                                header("Location: SDO_manage_account/SDO_manage_accounts.php?employment_number=$employment_number");
                                exit();
                            } else {
                                header("Location: enter_email_logging_in.php?employment_number=$employment_number&table=$table");
                                exit();
                            }
                            break;

                        case 'executive_committee':
                            if ($verifiedStatus == 'yes') {
                                header("Location: ../executive_tracking_monitoring/executive_tracking_monitoring_reports.php?employment_number=$employment_number");
                                exit();
                            } else {
                                header("Location: enter_email_logging_in.php?employment_number=$employment_number&table=$table");
                                exit();
                            }
                            break;

                        default:
                            break;
                    }
                } elseif ($activationStatus == 'deactivate') { // Account deactivated
                    $errorMsg = "This account is Deactivated";
                    break; // Exit loop
                }
            }
        }
    }
    if (empty($errorMsg)) {
        $errorMsg = "Invalid login credentials";
    }
    $stmt->close();
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script>
        function preventBack(){window.history.forward()};
        setTimeout("preventBack()",0);
        window.onunload=function(){null;}
    </script>
    <title>LogIn</title>
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
            background: url(img/bg.png);
            background-size: cover;
        }

        .login-container {
            background-color: #190572;
            opacity: 1;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 18.5rem;
        }

        .logo {
            width: 75px;
            height: 75px;
            margin: 0 auto 20px;
            background-image: url('/logo.png');
            background-size: cover;   
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 92%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            align-items: center;
        }

        .login-form button {
            background-color: #0C052F;
            width: 98%;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 7px 30px;
            cursor: pointer;
            margin-top: 10px; 
            justify-content: center;
        }

        .login-form button:hover {
            background-color: #DDDAE7;
            color: #0C052F;
        }

        .login-form{
            align-items: center;
        }

        h2 {
            font-family: 'Darker Grotesque', sans-serif;
            font-weight: 500;
            align-items: start;
            color: #fff;
        }

        .login-container {
            background-color: rgba(25, 5, 114, 0.80);
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 18.5rem;
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

        .header.sticky {
            border-bottom: .2rem solid rgba(185, 169, 169, 0.2);
        }

        h4 {
            color: #fff;
            font-family: 'Darker Grotesque', sans-serif;
            font-weight: 300;
            font-size: 1.3rem;
            margin-left: 1rem;
            letter-spacing: 2px;
            white-space: nowrap; 
            overflow: hidden; 
            text-overflow: ellipsis;
        }

        .logs {
            width: 3.5rem;
            height: 3.5rem;
        }

        .login-container {
            position: relative;
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

        .login-container .forgot{
            background-color: #0C052F;
            width: 98%;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 7px 30px;
            cursor: pointer;
            margin-top: 5px; 
            justify-content: center;
        }

        .login-container .forgot:hover {
            background-color: #DDDAE7;
            color: #0C052F;
        }
        .errorMessage{
            color: red;
            font-weight:bold ;
            text-align: center;
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

            .login-container {
                width: 90%; 
            }

            .login-container .forgot,
            .login-form button{
                width: 97%;
            }

            .password-toggle{
                display: none;
            }
        }

        .password-container {
            position: relative;
            width: 100%;
        }

        .password-toggle {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            cursor: pointer;
        }

    </style>
</head>
<body>

<header>
    <img src="img/logo.png" class="logs">
    <div class="container">
        <h4>E.D.G.E | P.A.R. Early Detection and Guidance for Education</h4>
    </div>
</header>

<div class="login-container">
    <a href="../index.php" class="back-icon"><i class='bx bxs-chevron-left'></i></a>
    <div class="logo"></div>
    <h2>Sign in to E.D.G.E.</h2>

    <div class="errorMessage">
        <?php echo $errorMsg ?>
    </div>

    <form class="login-form" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <input type="text" id="idnum" name="employment_number" placeholder="Enter Employee Number ">
        
        <div class="password-container">
            <input type="password" id="password" name="password" placeholder="Enter Password">
            <div class="password-toggle" onclick="togglePasswordVisibility()">
                <i id="eye-icon" class='bx bx-show'></i>
            </div>
        </div>

        <button type="submit" name="submit">Log In</button>
    </form>
    
    <a href="../forgot_password/employee_number_Forgot_Pass.php"> <button class="forgot" type="">Forgot Password</button></a>
</div>

<script>
    function togglePasswordVisibility() {
        var passwordField = document.getElementById("password");
        var eyeIcon = document.getElementById("eye-icon");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            eyeIcon.classList.remove("bx-show");
            eyeIcon.classList.add("bx-hide");
        } else {
            passwordField.type = "password";
            eyeIcon.classList.remove("bx-hide");
            eyeIcon.classList.add("bx-show");
        }
    }
</script>
</body>

</html>