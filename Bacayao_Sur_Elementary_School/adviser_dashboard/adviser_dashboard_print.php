<?php
    // Get the parameters from the URL
    $employment_number = $_GET['employment_number'];
    $grade = $_GET['grade'];
    $section = $_GET['section'];

    include('../../database.php');

    // Prepare the SQL statement
    $sql = "SELECT fullname FROM adviser WHERE employment_number = ?";

    // Prepare and bind
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $employment_number);

    // Execute the statement
    $stmt->execute();

    // Bind the result
    $stmt->bind_result($fullname);

    // Fetch the result
    if ($stmt->fetch()) {
    }   
    $stmt->close();
    $conn->close();
?>
<?php
    include('../../database.php');
    $grade = $_GET['grade'];
    $section = strtolower($_GET['section']); // Convert section to lowercase
    $tables = ['academic_english', 'academic_filipino', 'academic_numeracy', 'behavioral'];
    $count = 0;
    $lrnCounted = array(); // Array to keep track of LRNs already counted

    foreach ($tables as $table) {
        $sql = "SELECT lrn FROM $table WHERE grade = '$grade' AND LOWER(section) = '$section' AND school = 'Bacayao Sur Elementary School'";
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
// Retrieve the values from the URL
$grade = $_GET['grade'] ?? null;  // Use null coalescing operator to avoid undefined index
$section = $_GET['section'] ?? null;

// Check if both grade and section are set
if ($grade !== null && $section !== null) {
    // Create the filename
    $filename = "grade_{$grade}_section_{$section}.php";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>&nbsp;</title>
    <style>
        body {
            background-color: white;
            font-family: Arial, sans-serif;
            font-size: 15px;
        }
        header {
            padding: 5px;
            color: black;
            display: flex;
            flex-direction: column;
            align-items: flex-start; /* Align the first header to the left */
            justify-content: flex-start;
        }
        header h2 {
            font-size: 15px;
            margin: 0;
        }
        .school-name {
    text-align: center; /* Center the school name */
    font-size: 30px; /* Larger font size for the school name */
    font-weight: bold;
    margin-top: 5px; /* Space between the two headers */
    width: 100%; /* Make the school name take full width for centering */
    background-color: #170C59; /* Background color for the school name */
    padding: 10px; /* Padding for the background color */
    border-radius: 5px; /* Optional: add rounded corners */
    color: white; /* Change font color to white */
    display: flex; /* Use flexbox for alignment */
    align-items: center; /* Center items vertically */
    justify-content: center; /* Center items horizontally */
}

.school-logo {
    width: 80px; /* Set the width of the logo to make it larger */
    height: auto; /* Maintain aspect ratio */
    margin-right: 10px; /* Space between the image and text */
}




        .update {
            margin-top: 20px;
            width: 550px;
            display: grid;
            grid-template-columns: auto auto;
            gap: 2px;
        }
        .details {
            display: grid;
            grid-template-columns: auto auto;
            gap: 5px;
            margin-top: -20px;
        }
        .update-record,
        .update-record2 {
            margin-top: 20px;
            margin-bottom: 20px;
            width: 550px;
            display: grid;
            grid-template-columns: auto auto;
            gap: 2px;
        }
        .label {
            color: black;
            padding: 5px 10px;
            margin: 5px 0;
            grid-column: 1;
            width: 200px;
            text-align: left;
            font-weight: bold;
            border: 1px solid #dddddd;
        }
        .response {
            margin: 5px 0;
            padding: 5px 10px;
            border: 1px solid #dddddd;
            grid-column: 2;
            width: 400px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            text-align: center;
            color: black;
        }
        tr:nth-child(even) {
            background-color: transparent;
        }
        tr:nth-child(odd) {
            background-color: transparent;
        }
        .print-button {
            background-color: white;
            color: black;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
            transition: background-color 0.3s ease;
        }

        button {
            background-color: transparent;
            border: none;
        }

        .back-icon {
            left: 10px;
            font-size: 30px;
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .back-icon i {
            margin-right: 5px;
        }

        .print-button {
            width: fit-content;
            background-color: white;
            letter-spacing: 1.2px;
            font-size: 15px;
            color: black;
            border: none;
            padding: 10px 35px;
            border-radius: 5px;
            cursor: pointer;
            margin-left: -180px;
        }
    </style>
</head>
<body>
<header>
    <h2>E.D.G.E | P.A.R. Education Detection and Guidance for Education</h2>
    <div class="school-name">
        <img src="school_image/bacayao_sur.png" alt="School Logo" class="school-logo"> <!-- Replace with the actual path to your image -->
        Bacayao Sur Elementary School
    </div> <!-- Centered school name with background color -->
</header>
    <div class="update">
        <a href="<?php echo $filename ?>?employment_number=<?php echo isset($_GET['employment_number']) ? $_GET['employment_number'] : 'default_value'; ?>"> 
            <button class="back-icon"><i class='bx bxs-chevron-left'></i></button>
        </a>
        <button class="print-button" onclick="printContent()">Print Content</button>
    </div>
    <div class="details">
        <div class="update-record">
            <p class="label">Employee Number</p>
            <input class="response" type="text" value="<?php echo $employment_number ?>" readonly>
            
            <p class="label">Adviser</p>
            <input class="response" type="text" value="<?php echo $fullname ?>" readonly>
        </div>
        <div class="update-record2">
            <p class="label">Grade & Section</p>
            <input class="response" type="text" value="<?php echo ucfirst($grade) . ' - ' . ucfirst($section); ?>" readonly>
            
            <p class="label">Total P.A.Rs</p>
            <input class="response" type="text" value="<?php echo $count ?>" readonly>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>LRN</th>
                <th>Pupil's Name</th>
                <th>P.A.R. Identification</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        if ($result_combined->num_rows > 0) {
            while($row = $result_combined->fetch_assoc()) {
        ?>
            <tr class='sheshable'>
                <th style='width:20%'><?php echo $row["lrn"]; ?></th>
                <th style='width:25.7%'><?php echo $row["fullname"]; ?></th>
                <th style='width:20%' class='act'>
                    <div class="icon-container">
                        <?php if ($row["english"] === 'E'): ?>
                            E
                        <?php endif; ?>
                        <?php if ($row["filipino"] === 'F'): ?>
                            F
                        <?php endif; ?>
                        <?php if ($row["numeracy"] === 'N'): ?>
                            N
                        <?php endif; ?>
                        <?php if ($row["behavioral"] === 'B'): ?>
                            B
                        <?php endif; ?>
                    </div>
                </th>
                <th style='width:20%'><?php echo $row["status"]; ?></th>
            </tr>
        <?php
            }
        }
        ?>
        </tbody>
    </table>
</body>
<script>
    function printContent() {
        window.print();
    }
</script>
</html>
