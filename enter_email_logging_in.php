<?php
include('database.php');

$employmentNumber = '';
$tableName = '';
$school = '';

if (isset($_GET['employment_number'], $_GET['table'])) {
    $employmentNumber = $_GET['employment_number'];
    $tableName = $_GET['table'];
} else {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $query = "UPDATE $tableName SET email = '$email', verified = 'yes' WHERE employment_number = '$employmentNumber'";

    if ($conn->query($query) === TRUE) {
        echo "Email updated successfully! User verified.";

        // Additional logic to check grade, section, and school
        if ($tableName === 'adviser') {
            $selectQuery = "SELECT grade, section, school FROM $tableName WHERE employment_number = '$employmentNumber'";
            $result = $conn->query($selectQuery);

            if ($result !== false && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $grade = $row['grade'];
                $section = $row['section'];
                $school = str_replace(' ', '_', $row['school']);

                header("Location: ../$school/adviser_dashboard/grade_" . $grade . "_section_" . $section .".php?employment_number=$employmentNumber");
                exit();
            } 
        } elseif ($tableName === 'counselor' || $tableName === 'principal' || $tableName === 'school_admin') {
            $selectQuery = "SELECT school FROM $tableName WHERE employment_number = '$employmentNumber'";
            $result = $conn->query($selectQuery);

            if ($result !== false && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $school = str_replace(' ', '_', $row['school']);

                if ($tableName === 'counselor') {
                    header("Location: ../$school/guidance_dashboard/template_guidance.php?employment_number=$employmentNumber");
                } elseif ($tableName === 'principal') {
                    header("Location: ../$school/monitoring_tracking/principal_tracking_monitoring.php?employment_number=$employmentNumber");
                } elseif ($tableName === 'school_admin') {
                    header("Location: ../$school/schooladmin_manage_account/schadmin_manage_accounts.php?employment_number=$employmentNumber");
                }
                exit();
            } else {
            }
        } elseif ($tableName === 'executive_committee') {
            header("Location: ../executive_tracking_monitoring/executive_tracking_monitoring_reports.php?employment_number=$employmentNumber");
            exit();
        } elseif ($tableName === 'sdo_admin') {
            header("Location: ../SDO_manage_account/SDO_manage_accounts.php?employment_number=$employmentNumber");
            exit();
        } 
    } 
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Email</title>
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
            background: url(../img/bg.png);
            background-size: cover;
          }

          .alert1-success{
                color: red;
                font-weight: bold;
            }
          .login-container {
            background-color: #190572;
            opacity: 1;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
          }

          .logo {
            width: 75px;
            height: 75px;
            margin: 0 auto 20px;
            background-image: url('../img/logo.png'); 
            background-size: cover;
          }

          .login-form input[type="text"],
          .login-form input[type="password"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
          }

          .login-form button {
            background-color: #0C052F;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
          }

          .login-form button:hover {
            background-color: #DDDAE7;
            color: #0C052F;
          }

          h2 {
            color: #fff;

          }

          .login-container {
            background-color: rgba(25, 5, 114, 0.80); 
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: left;
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

        .header-content {
            display: flex;
            align-items: center;
        }

          .logs{
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

            .fpassword {
            background-color: #0C052F;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            margin-top: 10px;
            }

            .fpassword:hover {
                  background-color: #DDDAE7;
                  color: #0C052F;
            }
            .fpassword, .log {
        width: 10rem;
      }
      .ngi{
        color: #fff;
        font-size: 15px;
        text-align: left;
      }

      .login-form button[type="submit"]{
            background-color: #0C052F;
            width: 18.5rem;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 7px 30px;
            cursor: pointer;
            margin-top: 5px; 
        }

        .login-form button[type="submit"]:hover {
            background-color: #DDDAE7;
            color: #0C052F;
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

            .login-container .log,
            .login-form button,
            .login-form button[type="submit"]{
                width: 97%;
            }

            h2{
              font-size: 1.1rem;
            }

            p{
              font-size: 0.8rem;
            }

        }

    </style>
</head>
<body>

  <header>
    <img src="../img/logo.png" class="logs">
    <div class="container">
        <h4>E.D.G.E | P.A.R. Early Detection and Guidance for Education</h4>
    </div>
  </header>

    <div class="login-container">
    <a href="../login/Login.php" class="back-icon"><i class='bx bxs-chevron-left'></i></a>
        <div class="logo"></div>
        <h2>Enter Your Email Address</h2>
        <p class="ngi">To ensure a seamless experience, please provide your email address below to access your account and unlock the full potential of E.D.G.E.</p>

          
        <form class="login-form" action="" method="post">
            <input type="text" name="employment_number" value="<?php echo $employmentNumber; ?>" readonly>
            <input type="text" id="email" name="email"  placeholder="enter your email " required>
            <button type="submit" name="" value="continue" class="log">Continue</button>
        </form>
    </div>
</body>
</html>