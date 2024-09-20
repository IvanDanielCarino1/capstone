<?php
$errorMsg = "";
$errorMsg1 = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employmentNumber = $_POST["employment_number"];
    $newPassword = $_POST["new_password"];
    $repeatPassword = $_POST["repeat_password"];

    if ($newPassword == $repeatPassword) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        include("../database.php");

        $tables = ['adviser', 'principal', 'counselor', 'school_admin', 'sdo_admin', 'executive_committee'];

        foreach ($tables as $table) {
            $query = "SELECT * FROM $table WHERE employment_number = '$employmentNumber'";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                $updateQuery = "UPDATE $table SET password = '$hashedPassword' WHERE employment_number = '$employmentNumber'";
                if ($conn->query($updateQuery) === TRUE) {
                  $errorMsg = "Password Updated Successfully";
                  echo '<script>
                            setTimeout(function() {
                                window.location.href = "../login/Login.php";
                            }, 2000);
                          </script>';
                } else {
                    echo "Error updating password: " . $conn->error;
                }
                break;
            }
        }

        $conn->close();

    } else {
      $errorMsg1 = "Password Do Not Match";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Change Password</title>
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
            text-align: left;
            font-weight: bold;

          }

          p{
            text-align: left;
            font-weight: 500;
          }

          .login-container {
            background-color: rgba(25, 5, 114, 0.80); 
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
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
            p {
                color: #fff;
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
        .error-message{
          color: green;
          font-weight: bold;
        }
        .error-message1{
          color: red;
          font-weight: bold;
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

            .password-toggle{
                display: none;
            }

        }
    </style>
</head>
<body>

  <header>
    <img src="../img/logo.png" class="logs">
    <div class="container">
        <h4>E.D.G.E | P.A.R Early Detection and Guidance for Education</h4>
    </div>
  </header>

    <div class="login-container">
    <a href="forgot_pass_Enter_OTP.php" class="back-icon"><i class='bx bxs-chevron-left'></i></a>
        <div class="logo"></div>
        <h2>Reset Password</h2>
        <p>Set the new password for your account so you can login and access E.D.G.E</p>
          

        <div class="error-message">
            <?php echo $errorMsg; ?>
        </div>
        <div class="error-message1">
            <?php echo $errorMsg1; ?>
        </div>

        <form class="login-form" action="" method="post">
            <input type="text" id="employment_number" name="employment_number"  placeholder="Employment Number " required>

            <div class="password-container">
          <input type="password" id="password" name="new_password"  placeholder="New Password" required>
              <div class="password-toggle" onclick="togglePasswordVisibility()">
                  <i id="eye-icon" class='bx bx-show'></i>
              </div>
          </div>

          <div class="password-container">
          <input type="password" id="password1" name="repeat_password"  placeholder="Confirm Password" >
            <div class="password-toggle" onclick="togglePasswordVisibility1()">
                <i id="eye-icon1" class='bx bx-show'></i>
            </div>
        </div>

            <button type="submit" value="Login">Reset Password</button>
        </form>

  
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


          function togglePasswordVisibility1() {
        var passwordField = document.getElementById("password1");
        var eyeIcon = document.getElementById("eye-icon1");

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