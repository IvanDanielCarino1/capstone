<?php
    include('database.php');
    $query = "SELECT end FROM school_year ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $endDate = strtotime($row['end']);
        $today = strtotime(date('Y-m-d'));

        if ($today > $endDate) {
            $activationStatus = 'deactivate';
        } else {
            $activationStatus = 'activate';
        }
        $tablesToUpdate = ['executive_committee', 'school_admin', 'adviser', 'counselor', 'principal'];
        foreach ($tablesToUpdate as $table) {
            $updateQuery = "UPDATE $table SET activation = '$activationStatus'";
            mysqli_query($conn, $updateQuery);
        }
    }

    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E.D.G.E</title>
    <link href="https://fonts.googleapis.com/css2?family=Goblin+One&display=swap" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@300&display=swap');
        body {
            background-image: url(img/bg.png); 
            background-size: cover; 
            background-repeat: no-repeat; 
            height: 100vh;
            overflow: hidden; /* This line prevents scrolling */
        }

        .logo {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .logo img {
            width: 13%;
            height: 22%;
        }

        h1 {
            font-size: 4vw;
            font-size: 50px;
            margin-top: 10px;
            font-family: 'Goblin One', cursive;
            color: #2206A0;
            text-shadow:
            -1px -1px 0 #BCB1B1,
            1px -1px 0 #BCB1B1,
            -1px 1px 0 #BCB1B1,
            1px 1px 0 #BCB1B1;
        }

        p {
            font-size: 2vw;
            margin-top: .5rem;
            font-family: 'Darker Grotesque', sans-serif;
            font-weight: 600;
            color: #2206A0;
            text-shadow:
            -1px -1px 0 #BCB1B1,
            1px -1px 0 #BCB1B1,
            -1px 1px 0 #BCB1B1,
            1px 1px 0 #BCB1B1;
        }

        a {
            font-size: 2rem;
            color: #e2d6d6;
            font-family: 'Darker Grotesque', sans-serif;
            text-decoration: none;
        }

        h3 {
            margin-top: 150px;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: .1rem 5%;
            background: #8D090D;
            display: flex;
            align-items: center;
            z-index: 100;
            height: 75px;
        }

        .header.sticky {
            border-bottom: .2rem solid rgba(185, 169, 169, 0.2);
        }

        h4 {
            color: #fff;
            font-family: 'Darker Grotesque', sans-serif;
            font-size: 1.7rem;
            margin-left: 1rem;
        }

        .logs {
            width: 3rem;
            height: 3rem;
        }

        @media screen and (max-width: 768px) {
            h1 {
                font-size: 6vw;
            }

            p {
                font-size: 4vw; 
            }

            .logo img {
                margin-top: 100px;
                height: 18%;
                width: 22%;
            }
        }

    </style>


</head>
<body>
    <div class="logo">
        <img src="img/logo.png" alt="logo">
        <h1>E.D.G.E</h1>
        <h4>Early Detection and Guidance for Education</h4>
        <p>progress beyond your limit</p>
        <h3><a href="login/Login.php">click to continue</h3></a>
    </div>
</body>
<script>
    window.onload = function() {
      history.pushState(null, null, document.URL);
      window.addEventListener('popstate', function() {
        history.pushState(null, null, document.URL);
      });
    }
</script>
</html>
