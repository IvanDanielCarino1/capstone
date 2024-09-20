<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

function sendOTP($toEmail, $otp) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'edge.developers1234@gmail.com'; 
        $mail->Password = 'rlhe negz baut bnps'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('edge.developers1234@gmail.com', 'EDGE');
        $mail->addAddress($toEmail);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Your OTP Code';
        $mail->Body = 'Your OTP code is: ' . $otp;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if (isset($_POST['continue'])) {
    $employmentNumber = $_POST['employment_number'];

    include('../database.php');
    $tables = ['adviser', 'principal', 'counselor', 'school_admin', 'sdo_admin', 'executive_committee'];

    foreach ($tables as $table) {
        $sql = "SELECT * FROM $table WHERE employment_number = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $employmentNumber);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row) {
            $userEmail = $row['email'];
            $otpCode = generateOTP();
            $updateSql = "UPDATE $table SET otp = ? WHERE employment_number = ?";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bind_param('ss', $otpCode, $employmentNumber);
            $updateStmt->execute();
            sendOTP($userEmail, $otpCode);
            header("location: forgot_pass_Enter_OTP.php");
            break;
        }
    }
    $conn->close();
}

function generateOTP() {
    return rand(100000, 999999);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Forgot Password</title>
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

          .login-form input[type="number"],
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
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            justify-content: center;
            width: 98%;
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
        <h2>Employee Number</h2>
        <p class="ngi">You are one step away from resetting your password</p>

          
        <form class="login-form" action=" " method="post">
            <input type="number" id="employment_number" name="employment_number"  placeholder="enter your employee number " required>
            <button type="submit" name="continue" value="continue" class="log">Continue</button>
        </form>
    </div>
</body>
</html>