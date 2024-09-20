<?php
include('../../database.php');
$currentFileName2 = basename(__FILE__,'_Q1.php');
// Initialize an array to store results
$resultsArray = array();

// Query to retrieve data from the adviser table
$sql_adviser = "SELECT grade, section, fullname FROM adviser WHERE school = 'Bacayao Sur Elementary School'";
$result_adviser = mysqli_query($conn, $sql_adviser);

if (mysqli_num_rows($result_adviser) > 0) {
    // Fetch each adviser row
    while ($row_adviser = mysqli_fetch_assoc($result_adviser)) {
        $uniqueLRNs = array();

        // Tables to count LRNs from
        $tables = array('academic_english', 'academic_filipino', 'academic_numeracy', 'behavioral');

        // Iterate through each table to fetch unique LRNs
        foreach ($tables as $table) {
            $sql = "SELECT DISTINCT lrn FROM $table WHERE grade = '{$row_adviser['grade']}' AND section = '{$row_adviser['section']}' AND school = 'Bacayao Sur Elementary School' AND quarter = 1";
            $result = mysqli_query($conn, $sql);

            // Check if the query was successful
            if ($result) {
                // Fetch each row and add LRN to the uniqueLRNs array
                while ($row = mysqli_fetch_assoc($result)) {
                    $uniqueLRNs[$row['lrn']] = true; // Using LRN as key to ensure uniqueness
                }
                // Free result set
                mysqli_free_result($result);
            } else {
                echo "Error executing query: " . mysqli_error($conn);
            }
        }

        // Count the number of unique LRNs
        $totalstudentpar = count($uniqueLRNs);

        // Count LRNs in each table for the current grade and section
        $sql_english_non_distinct = "SELECT COUNT(lrn) AS english_count_non_distinct FROM academic_english WHERE grade = '{$row_adviser['grade']}' AND section = '{$row_adviser['section']}' AND school = 'Bacayao Sur Elementary School' AND quarter = 1";
        $result_english_non_distinct = mysqli_query($conn, $sql_english_non_distinct);
        $row_english_non_distinct = mysqli_fetch_assoc($result_english_non_distinct);
        $english_count_non_distinct = $row_english_non_distinct['english_count_non_distinct'];

        // Store $newvalue based on grade and section
        $grade = strtolower($row_adviser['grade']);
        $section = strtolower($row_adviser['section']);
        $newvalue = "grade_$grade" . "_section_$section";

        // Count all LRNs in $newvalue table and store as $totalstud
        $sql_totalstud = "SELECT COUNT(lrn) AS totalstud FROM $newvalue";
        $result_totalstud = mysqli_query($conn, $sql_totalstud);
        $row_totalstud = mysqli_fetch_assoc($result_totalstud);
        $totalstud = $row_totalstud['totalstud'];

        $sql_filipino_non_distinct = "SELECT COUNT(lrn) AS filipino_count_non_distinct FROM academic_filipino WHERE grade = '{$row_adviser['grade']}' AND section = '{$row_adviser['section']}' AND school = 'Bacayao Sur Elementary School' AND quarter = 1";
        $result_filipino_non_distinct = mysqli_query($conn, $sql_filipino_non_distinct);
        $row_filipino_non_distinct = mysqli_fetch_assoc($result_filipino_non_distinct);
        $filipino_count_non_distinct = $row_filipino_non_distinct['filipino_count_non_distinct'];

        $sql_numeracy_non_distinct = "SELECT COUNT(lrn) AS numeracy_count_non_distinct FROM academic_numeracy WHERE grade = '{$row_adviser['grade']}' AND section = '{$row_adviser['section']}' AND school = 'Bacayao Sur Elementary School' AND quarter = 1";
        $result_numeracy_non_distinct = mysqli_query($conn, $sql_numeracy_non_distinct);
        $row_numeracy_non_distinct = mysqli_fetch_assoc($result_numeracy_non_distinct);
        $numeracy_count_non_distinct = $row_numeracy_non_distinct['numeracy_count_non_distinct'];

        $sql_behavioral_non_distinct = "SELECT COUNT(lrn) AS behavioral_count_non_distinct FROM behavioral WHERE grade = '{$row_adviser['grade']}' AND section = '{$row_adviser['section']}' AND school = 'Bacayao Sur Elementary School' AND quarter = 1";
        $result_behavioral_non_distinct = mysqli_query($conn, $sql_behavioral_non_distinct);
        $row_behavioral_non_distinct = mysqli_fetch_assoc($result_behavioral_non_distinct);
        $behavioral_count_non_distinct = $row_behavioral_non_distinct['behavioral_count_non_distinct'];

        // Add results to the results array
        $resultsArray[] = array(
            'grade' => $grade,
            'section' => $section,
            'fullname' => $row_adviser['fullname'],
            'totalstudentpar' => $totalstudentpar,
            'english_count_non_distinct' => $english_count_non_distinct,
            'totalstud' => $totalstud,
            'filipino_count_non_distinct' => $filipino_count_non_distinct,
            'numeracy_count_non_distinct' => $numeracy_count_non_distinct,
            'behavioral_count_non_distinct' => $behavioral_count_non_distinct
        );
    }
}

// Close the connection
mysqli_close($conn);

?>

<?php
include('../../database.php');
$tables = ["academic_english", "academic_filipino", "academic_numeracy", "behavioral"];
$lrnsCounted = [];
$totalpars = 0;
$totalresolved = 0; // Initialize total resolved count

foreach ($tables as $table) {
    $sql = "SELECT DISTINCT lrn FROM $table WHERE school = 'Bacayao Sur Elementary School'";
    
    $result = $conn->query($sql);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $lrn = $row['lrn'];
            if (!in_array($lrn, $lrnsCounted)) {
                // Increment total count
                $totalpars++;
                // Mark LRN as counted
                $lrnsCounted[] = $lrn;
                // Check if LRN is resolved
                $resolvedSql = "SELECT lrn FROM $table WHERE lrn = '$lrn' AND status = 'Resolved' AND school = 'Bacayao Sur Elementary School'";
                $resolvedResult = $conn->query($resolvedSql);
                if ($resolvedResult && $resolvedResult->num_rows > 0) {
                    // Increment resolved count
                    $totalresolved++;
                }
            }
        }
    } else {
        echo "Error in table $table: " . $conn->error;
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
    <title>PRINT</title>
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
            align-items: center;
            justify-content: flex-start;
        }
        header img {
            margin-right: 15px;
        }

        header h2{
            font-size: 15px;
        }
        .update{
            margin-top: 20px;
            width: 550px;
            display: grid;
            grid-template-columns: auto auto;
            gap: 2px;
        }
        .details{
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
        th{
            text-align: center;
        }
        th {
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

    button{
            background-color: transparent;
            border: none;
        }


        .back-icon {
            left: 10px;
            font-size: 30px;
            color:black;
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
    </header>
    <div class="update">
        <a href="Principal_tracking_reports_Q1.php?employment_number=<?php echo isset($_GET['employment_number']) ? $_GET['employment_number'] : 'default_value'; ?>" > <button class="back-icon"><i class='bx bxs-chevron-left'></i></button></a>
        <button class="print-button" onclick="printContent()">Print Content</button>
       
        <p class="label">School Year</p>
        <input class="response" type="text" value="S.Y. 2023 - 2024" readonly>
    </div>
    <div class="details">
    <div class="update-record">
        <p class="label">School Name</p>
        <input class="response" type="text" value="Bacayao Sur Elementary School"readonly>
        
        <p class="label">Quarter</p>
        <input class="response" type="text" value="1"readonly>
    </div>
    <div class="update-record2">
        <p class="label">Total P.A.Rs</p>
        <input class="response" type="text" value="<?php echo $totalpars ?>"readonly>
        <p class="label">Resolved Cases</p>
        <input class="response" type="text" value="<?php echo $totalresolved ?>/<?php echo $totalpars ?>"readonly>
    </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>Grade & Section</th>
                <th>Section Adviser</th>
                <th># of Students</th>
                <th># of P.A.R</th>
                <th>A - Literacy (E)</th>
                <th>A - Literacy (F)</th>
                <th>A - Numeracy</th>
                <th>Behavioral</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($resultsArray as $result) { ?>
            <tr>
            <td><?php echo ucfirst($result['grade']); ?> - <?php echo $result['section']; ?></td>
            <td ><?php echo $result['fullname']; ?></td>
            <td><?php echo $result['totalstud']; ?></td>
            <td><?php echo $result['totalstudentpar']; ?></td>
            <td><?php echo $result['english_count_non_distinct']; ?></td>
            <td><?php echo $result['filipino_count_non_distinct']; ?></td>
            <td><?php echo $result['numeracy_count_non_distinct']; ?></td>
            <td><?php echo $result['behavioral_count_non_distinct']; ?></td>
        </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
<script>
    function printContent() {
        window.print();
    }
</script>
</html>