
<?php
    include('../../database.php');

    $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
    $queryEnglish = "SELECT COUNT(*) AS q1english FROM academic_english WHERE quarter = 1 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultEnglish = $conn->query($queryEnglish);
    $rowEnglish = $resultEnglish->fetch_assoc();
    $q1english = $rowEnglish['q1english'];

    $queryFilipino = "SELECT COUNT(*) AS q1filipino FROM academic_filipino WHERE quarter = 1 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultFilipino = $conn->query($queryFilipino);
    $rowFilipino = $resultFilipino->fetch_assoc();
    $q1filipino = $rowFilipino['q1filipino'];

    $queryNumeracy = "SELECT COUNT(*) AS q1numeracy FROM academic_numeracy WHERE quarter = 1 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultNumeracy = $conn->query($queryNumeracy);
    $rowNumeracy = $resultNumeracy->fetch_assoc();
    $q1numeracy = $rowNumeracy['q1numeracy'];

    $queryBehavioral = "SELECT COUNT(*) AS q1behavioral FROM behavioral WHERE quarter = 1 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultBehavioral = $conn->query($queryBehavioral);
    $rowBehavioral = $resultBehavioral->fetch_assoc();
    $q1behavioral = $rowBehavioral['q1behavioral'];

    $queryEnglishResolved = "SELECT COUNT(*) AS q1englishresolved FROM academic_english WHERE quarter = 1 AND status = 'resolved' AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultEnglishResolved = $conn->query($queryEnglishResolved);
    $rowEnglishResolved = $resultEnglishResolved->fetch_assoc();
    $q1englishresolved = $rowEnglishResolved['q1englishresolved'];

    $queryFilipinoResolved = "SELECT COUNT(*) AS q1filipinoresolved FROM academic_filipino WHERE quarter = 1 AND status = 'resolved' AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultFilipinoResolved = $conn->query($queryFilipinoResolved);
    $rowFilipinoResolved = $resultFilipinoResolved->fetch_assoc();
    $q1filipinoresolved = $rowFilipinoResolved['q1filipinoresolved'];

    $queryNumeracyResolved = "SELECT COUNT(*) AS q1numeracyresolved FROM academic_numeracy WHERE quarter = 1 AND status = 'resolved' AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultNumeracyResolved = $conn->query($queryNumeracyResolved);
    $rowNumeracyResolved = $resultNumeracyResolved->fetch_assoc();
    $q1numeracyresolved = $rowNumeracyResolved['q1numeracyresolved'];

    $queryBehavioralResolved = "SELECT COUNT(*) AS q1behavioralresolved FROM behavioral WHERE quarter = 1 AND status = 'resolved' AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultBehavioralResolved = $conn->query($queryBehavioralResolved);
    $rowBehavioralResolved = $resultBehavioralResolved->fetch_assoc();
    $q1behavioralresolved = $rowBehavioralResolved['q1behavioralresolved'];
    $conn->close();
?>
<?php
    include('../../database.php');

    $queryEnglish = "SELECT COUNT(*) AS q2english FROM academic_english WHERE quarter = 2 AND school = 'Bacayao Sur Elementary School'";
    $resultEnglish = $conn->query($queryEnglish);
    $rowEnglish = $resultEnglish->fetch_assoc();
    $q2english = $rowEnglish['q2english'];

    $queryFilipino = "SELECT COUNT(*) AS q2filipino FROM academic_filipino WHERE quarter = 2 AND school = 'Bacayao Sur Elementary School'";
    $resultFilipino = $conn->query($queryFilipino);
    $rowFilipino = $resultFilipino->fetch_assoc();
    $q2filipino = $rowFilipino['q2filipino'];

    $queryNumeracy = "SELECT COUNT(*) AS q2numeracy FROM academic_numeracy WHERE quarter = 2 AND school = 'Bacayao Sur Elementary School'";
    $resultNumeracy = $conn->query($queryNumeracy);
    $rowNumeracy = $resultNumeracy->fetch_assoc();
    $q2numeracy = $rowNumeracy['q2numeracy'];

    $queryBehavioral = "SELECT COUNT(*) AS q2behavioral FROM behavioral WHERE quarter = 2 AND school = 'Bacayao Sur Elementary School'";
    $resultBehavioral = $conn->query($queryBehavioral);
    $rowBehavioral = $resultBehavioral->fetch_assoc();
    $q2behavioral = $rowBehavioral['q2behavioral'];

    $queryEnglishResolved = "SELECT COUNT(*) AS q2englishresolved FROM academic_english WHERE quarter = 2 AND status = 'resolved' AND school = 'Bacayao Sur Elementary School'";
    $resultEnglishResolved = $conn->query($queryEnglishResolved);
    $rowEnglishResolved = $resultEnglishResolved->fetch_assoc();
    $q2englishresolved = $rowEnglishResolved['q2englishresolved'];

    $queryFilipinoResolved = "SELECT COUNT(*) AS q2filipinoresolved FROM academic_filipino WHERE quarter = 2 AND status = 'resolved' AND school = 'Bacayao Sur Elementary School'";
    $resultFilipinoResolved = $conn->query($queryFilipinoResolved);
    $rowFilipinoResolved = $resultFilipinoResolved->fetch_assoc();
    $q2filipinoresolved = $rowFilipinoResolved['q2filipinoresolved'];

    $queryNumeracyResolved = "SELECT COUNT(*) AS q2numeracyresolved FROM academic_numeracy WHERE quarter = 2 AND status = 'resolved' AND school = 'Bacayao Sur Elementary School'";
    $resultNumeracyResolved = $conn->query($queryNumeracyResolved);
    $rowNumeracyResolved = $resultNumeracyResolved->fetch_assoc();
    $q2numeracyresolved = $rowNumeracyResolved['q2numeracyresolved'];

    $queryBehavioralResolved = "SELECT COUNT(*) AS q2behavioralresolved FROM behavioral WHERE quarter = 2 AND status = 'resolved' AND school = 'Bacayao Sur Elementary School'";
    $resultBehavioralResolved = $conn->query($queryBehavioralResolved);
    $rowBehavioralResolved = $resultBehavioralResolved->fetch_assoc();
    $q2behavioralresolved = $rowBehavioralResolved['q2behavioralresolved'];

    $conn->close();
?>
<?php
    include('../../database.php');

    $queryEnglish = "SELECT COUNT(*) AS q3english FROM academic_english WHERE quarter = 3 AND school = 'Bacayao Sur Elementary School'";
    $resultEnglish = $conn->query($queryEnglish);
    $rowEnglish = $resultEnglish->fetch_assoc();
    $q3english = $rowEnglish['q3english'];

    $queryFilipino = "SELECT COUNT(*) AS q3filipino FROM academic_filipino WHERE quarter = 3 AND school = 'Bacayao Sur Elementary School'";
    $resultFilipino = $conn->query($queryFilipino);
    $rowFilipino = $resultFilipino->fetch_assoc();
    $q3filipino = $rowFilipino['q3filipino'];

    $queryNumeracy = "SELECT COUNT(*) AS q3numeracy FROM academic_numeracy WHERE quarter = 3 AND school = 'Bacayao Sur Elementary School'";
    $resultNumeracy = $conn->query($queryNumeracy);
    $rowNumeracy = $resultNumeracy->fetch_assoc();
    $q3numeracy = $rowNumeracy['q3numeracy'];

    $queryBehavioral = "SELECT COUNT(*) AS q3behavioral FROM behavioral WHERE quarter = 3 AND school = 'Bacayao Sur Elementary School'";
    $resultBehavioral = $conn->query($queryBehavioral);
    $rowBehavioral = $resultBehavioral->fetch_assoc();
    $q3behavioral = $rowBehavioral['q3behavioral'];

    $queryEnglishResolved = "SELECT COUNT(*) AS q3englishresolved FROM academic_english WHERE quarter = 3 AND status = 'resolved' AND school = 'Bacayao Sur Elementary School'";
    $resultEnglishResolved = $conn->query($queryEnglishResolved);
    $rowEnglishResolved = $resultEnglishResolved->fetch_assoc();
    $q3englishresolved = $rowEnglishResolved['q3englishresolved'];

    $queryFilipinoResolved = "SELECT COUNT(*) AS q3filipinoresolved FROM academic_filipino WHERE quarter = 3 AND status = 'resolved' AND school = 'Bacayao Sur Elementary School'";
    $resultFilipinoResolved = $conn->query($queryFilipinoResolved);
    $rowFilipinoResolved = $resultFilipinoResolved->fetch_assoc();
    $q3filipinoresolved = $rowFilipinoResolved['q3filipinoresolved'];

    $queryNumeracyResolved = "SELECT COUNT(*) AS q3numeracyresolved FROM academic_numeracy WHERE quarter = 3 AND status = 'resolved' AND school = 'Bacayao Sur Elementary School'";
    $resultNumeracyResolved = $conn->query($queryNumeracyResolved);
    $rowNumeracyResolved = $resultNumeracyResolved->fetch_assoc();
    $q3numeracyresolved = $rowNumeracyResolved['q3numeracyresolved'];

    $queryBehavioralResolved = "SELECT COUNT(*) AS q3behavioralresolved FROM behavioral WHERE quarter = 3 AND status = 'resolved' AND school = 'Bacayao Sur Elementary School'";
    $resultBehavioralResolved = $conn->query($queryBehavioralResolved);
    $rowBehavioralResolved = $resultBehavioralResolved->fetch_assoc();
    $q3behavioralresolved = $rowBehavioralResolved['q3behavioralresolved'];

    $conn->close();
?>
<?php
    include('../../database.php');

    $queryEnglish = "SELECT COUNT(*) AS q4english FROM academic_english WHERE quarter = 4 AND school = 'Bacayao Sur Elementary School'";
    $resultEnglish = $conn->query($queryEnglish);
    $rowEnglish = $resultEnglish->fetch_assoc();
    $q4english = $rowEnglish['q4english'];

    $queryFilipino = "SELECT COUNT(*) AS q4filipino FROM academic_filipino WHERE quarter = 4 AND school = 'Bacayao Sur Elementary School'";
    $resultFilipino = $conn->query($queryFilipino);
    $rowFilipino = $resultFilipino->fetch_assoc();
    $q4filipino = $rowFilipino['q4filipino'];

    $queryNumeracy = "SELECT COUNT(*) AS q4numeracy FROM academic_numeracy WHERE quarter = 4 AND school = 'Bacayao Sur Elementary School'";
    $resultNumeracy = $conn->query($queryNumeracy);
    $rowNumeracy = $resultNumeracy->fetch_assoc();
    $q4numeracy = $rowNumeracy['q4numeracy'];

    $queryBehavioral = "SELECT COUNT(*) AS q4behavioral FROM behavioral WHERE quarter = 4 AND school = 'Bacayao Sur Elementary School'";
    $resultBehavioral = $conn->query($queryBehavioral);
    $rowBehavioral = $resultBehavioral->fetch_assoc();
    $q4behavioral = $rowBehavioral['q4behavioral'];

    $queryEnglishResolved = "SELECT COUNT(*) AS q4englishresolved FROM academic_english WHERE quarter = 4 AND status = 'resolved' AND school = 'Bacayao Sur Elementary School'";
    $resultEnglishResolved = $conn->query($queryEnglishResolved);
    $rowEnglishResolved = $resultEnglishResolved->fetch_assoc();
    $q4englishresolved = $rowEnglishResolved['q4englishresolved'];

    $queryFilipinoResolved = "SELECT COUNT(*) AS q4filipinoresolved FROM academic_filipino WHERE quarter = 4 AND status = 'resolved' AND school = 'Bacayao Sur Elementary School'";
    $resultFilipinoResolved = $conn->query($queryFilipinoResolved);
    $rowFilipinoResolved = $resultFilipinoResolved->fetch_assoc();
    $q4filipinoresolved = $rowFilipinoResolved['q4filipinoresolved'];

    $queryNumeracyResolved = "SELECT COUNT(*) AS q4numeracyresolved FROM academic_numeracy WHERE quarter = 4 AND status = 'resolved' AND school = 'Bacayao Sur Elementary School'";
    $resultNumeracyResolved = $conn->query($queryNumeracyResolved);
    $rowNumeracyResolved = $resultNumeracyResolved->fetch_assoc();
    $q4numeracyresolved = $rowNumeracyResolved['q4numeracyresolved'];

    $queryBehavioralResolved = "SELECT COUNT(*) AS q4behavioralresolved FROM behavioral WHERE quarter = 4 AND status = 'resolved' AND school = 'Bacayao Sur Elementary School'";
    $resultBehavioralResolved = $conn->query($queryBehavioralResolved);
    $rowBehavioralResolved = $resultBehavioralResolved->fetch_assoc();
    $q4behavioralresolved = $rowBehavioralResolved['q4behavioralresolved'];

    $conn->close();
?>
<?php
    include('../../database.php');

    // Count the total rows in each table
    $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
    $sqlEnglish = "SELECT COUNT(DISTINCT lrn) AS total FROM academic_english WHERE school = 'Bacayao Sur Elementary School' AND year= $school_year";
    $resultEnglish = $conn->query($sqlEnglish);
    $rowEnglish = $resultEnglish->fetch_assoc();
    $totalEnglish = $rowEnglish['total'];


    $sqlFilipino = "SELECT COUNT(DISTINCT lrn) AS total FROM academic_filipino WHERE  school = 'Bacayao Sur Elementary School' AND year= $school_year";
    $resultFilipino = $conn->query($sqlFilipino);
    $rowFilipino = $resultFilipino->fetch_assoc();
    $totalFilipino = $rowFilipino['total'];

    $sqlNumeracy = "SELECT COUNT(DISTINCT lrn) AS total FROM academic_numeracy WHERE  school = 'Bacayao Sur Elementary School' AND year= $school_year";
    $resultNumeracy = $conn->query($sqlNumeracy);
    $rowNumeracy = $resultNumeracy->fetch_assoc();
    $totalNumeracy = $rowNumeracy['total'];

    $sqlBehavioral = "SELECT COUNT(DISTINCT lrn) AS total FROM behavioral WHERE  school = 'Bacayao Sur Elementary School' AND year= $school_year";
    $resultBehavioral = $conn->query($sqlBehavioral);
    $rowBehavioral = $resultBehavioral->fetch_assoc();
    $totalBehavioral = $rowBehavioral['total'];

    $sqlEnglishResolved = "SELECT COUNT(DISTINCT lrn) AS total FROM academic_english WHERE status = 'resolved' AND school = 'Bacayao Sur Elementary School' AND year= $school_year";
    $resultEnglishResolved = $conn->query($sqlEnglishResolved);
    $rowEnglishResolved = $resultEnglishResolved->fetch_assoc();
    $totalEnglishResolved = $rowEnglishResolved['total'];

    $sqlFilipinoResolved = "SELECT COUNT(DISTINCT lrn) AS total FROM academic_filipino WHERE status = 'resolved'AND school = 'Bacayao Sur Elementary School' ";
    $resultFilipinoResolved = $conn->query($sqlFilipinoResolved);
    $rowFilipinoResolved = $resultFilipinoResolved->fetch_assoc();
    $totalFilipinoResolved = $rowFilipinoResolved['total'];

    $sqlNumeracyResolved = "SELECT COUNT(DISTINCT lrn) AS total FROM academic_numeracy WHERE status = 'resolved' AND school = 'Bacayao Sur Elementary School' AND year= $school_year";
    $resultNumeracyResolved = $conn->query($sqlNumeracyResolved);
    $rowNumeracyResolved = $resultNumeracyResolved->fetch_assoc();
    $totalNumeracyResolved = $rowNumeracyResolved['total'];

    $sqlBehavioralResolved = "SELECT COUNT(DISTINCT lrn) AS total FROM behavioral WHERE status = 'resolved' AND school = 'Bacayao Sur Elementary School' AND year= $school_year";
    $resultBehavioralResolved = $conn->query($sqlBehavioralResolved);
    $rowBehavioralResolved = $resultBehavioralResolved->fetch_assoc();
    $totalBehavioralResolved = $rowBehavioralResolved['total'];

    $conn->close();
?>
<?php
    include('../../database.php');
    $tables = ["academic_english", "academic_filipino", "academic_numeracy", "behavioral"];
    $lrnsCounted = [];
    $totalpars = 0;
    $totalresolved = 0; // Initialize total resolved count

    foreach ($tables as $table) {
        $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE school = 'Bacayao Sur Elementary School' AND year = $school_year";
        
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
                    $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
                    $resolvedSql = "SELECT lrn FROM $table WHERE lrn = '$lrn' AND status = 'Resolved' AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
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
<?php
    include('../../database.php');
    // Initialize an array to store results
    $resultsArray = array();

    $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
    $sql_adviser = "SELECT grade, section, fullname FROM adviser WHERE school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $result_adviser = mysqli_query($conn, $sql_adviser);

    if (mysqli_num_rows($result_adviser) > 0) {
        // Fetch each adviser row
        while ($row_adviser = mysqli_fetch_assoc($result_adviser)) {
            $uniqueLRNs = array();

        // Tables to count LRNs from
        $tables = array('academic_english', 'academic_filipino', 'academic_numeracy', 'behavioral');

        
        foreach ($tables as $table) {
            $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
            $sql = "SELECT DISTINCT lrn FROM $table WHERE grade = '{$row_adviser['grade']}' AND section = '{$row_adviser['section']}' AND school = 'Bacayao Sur Elementary School' AND quarter = $selectedQuarter";
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

        // Count LRNs where gname is empty in each table for the current grade and section
        $unupdated = 0;
        foreach ($tables as $table) {
            $sql_unupdated = "SELECT COUNT(DISTINCT lrn) AS unupdated_count FROM $table WHERE grade = '{$row_adviser['grade']}' AND section = '{$row_adviser['section']}' AND school = 'Bacayao Sur Elementary School' AND quarter = 1 AND gname != ''";
            $result_unupdated = mysqli_query($conn, $sql_unupdated);
            if ($result_unupdated) {
                $row_unupdated = mysqli_fetch_assoc($result_unupdated);
                $unupdated += $row_unupdated['unupdated_count'];
                mysqli_free_result($result_unupdated);
            } else {
                echo "Error executing query: " . mysqli_error($conn);
            }
        }

        // Calculate the percentage
        $percentage = 0; // Default value
        if ($totalstudentpar != 0) {
            $percentage = ($unupdated / $totalstudentpar) * 100;
            $percentage = round($percentage); 
        }else {
            $percentage = 0;
        }

        $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;

        $sql_english_non_distinct = "SELECT COUNT(lrn) AS english_count_non_distinct FROM academic_english WHERE grade = '{$row_adviser['grade']}' AND section = '{$row_adviser['section']}' AND school = 'Bacayao Sur Elementary School' AND quarter = $selectedQuarter AND year = $school_year";
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

        $sql_filipino_non_distinct = "SELECT COUNT(lrn) AS filipino_count_non_distinct FROM academic_filipino WHERE grade = '{$row_adviser['grade']}' AND section = '{$row_adviser['section']}' AND school = 'Bacayao Sur Elementary School' AND quarter = $selectedQuarter AND year = $school_year";
        $result_filipino_non_distinct = mysqli_query($conn, $sql_filipino_non_distinct);
        $row_filipino_non_distinct = mysqli_fetch_assoc($result_filipino_non_distinct);
        $filipino_count_non_distinct = $row_filipino_non_distinct['filipino_count_non_distinct'];

        $sql_numeracy_non_distinct = "SELECT COUNT(lrn) AS numeracy_count_non_distinct FROM academic_numeracy WHERE grade = '{$row_adviser['grade']}' AND section = '{$row_adviser['section']}' AND school = 'Bacayao Sur Elementary School' AND quarter = $selectedQuarter AND year = $school_year";
        $result_numeracy_non_distinct = mysqli_query($conn, $sql_numeracy_non_distinct);
        $row_numeracy_non_distinct = mysqli_fetch_assoc($result_numeracy_non_distinct);
        $numeracy_count_non_distinct = $row_numeracy_non_distinct['numeracy_count_non_distinct'];

        $sql_behavioral_non_distinct = "SELECT COUNT(lrn) AS behavioral_count_non_distinct FROM behavioral WHERE grade = '{$row_adviser['grade']}' AND section = '{$row_adviser['section']}' AND school = 'Bacayao Sur Elementary School' AND quarter = $selectedQuarter AND year = $school_year";
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
            'behavioral_count_non_distinct' => $behavioral_count_non_distinct,
            'unupdated' => $unupdated, // Adding unupdated count to the results
            'percentage' => $percentage // Adding percentage to the results
            );
        }
    }

    // Close the connection
    mysqli_close($conn);

?>
<?php
    include('../../database.php');

    $classification = isset($_POST['classification']) ? $_POST['classification'] : 'academic_english';
    $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;

    $sqlKinderEnglish = "SELECT COUNT(LRN) AS count_kinder_english FROM $classification WHERE grade = 'kinder' AND quarter = '1' AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultKinderEnglish = mysqli_query($conn, $sqlKinderEnglish);
    $rowKinderEnglish = mysqli_fetch_assoc($resultKinderEnglish);
    $kinderenglishq1 = $rowKinderEnglish['count_kinder_english'];    

    $sqlKinderFilipino = "SELECT COUNT(LRN) AS count_kinder_filipino FROM $classification WHERE grade = 'kinder' AND quarter = 1 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultKinderFilipino = mysqli_query($conn, $sqlKinderFilipino);
    $rowKinderFilipino = mysqli_fetch_assoc($resultKinderFilipino);
    $kinderfilipinoq1 = $rowKinderFilipino['count_kinder_filipino'];

    $sqlKinderNumeracy = "SELECT COUNT(LRN) AS count_kinder_numeracy FROM $classification WHERE grade = 'kinder' AND quarter = 1 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultKinderNumeracy = mysqli_query($conn, $sqlKinderNumeracy);
    $rowKinderNumeracy = mysqli_fetch_assoc($resultKinderNumeracy);
    $kindernumeracyq1 = $rowKinderNumeracy['count_kinder_numeracy'];

    $sqlKinderBehavioral = "SELECT COUNT(LRN) AS count_kinder_behavioral FROM $classification WHERE grade = 'kinder' AND quarter = 1 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultKinderBehavioral = mysqli_query($conn, $sqlKinderBehavioral);
    $rowKinderBehavioral = mysqli_fetch_assoc($resultKinderBehavioral);
    $kinderbehavioralq1 = $rowKinderBehavioral['count_kinder_behavioral'];

    // Query and variable names for Grade I and quarter 1
    $sqlGradeIEnglish = "SELECT COUNT(LRN) AS count_grade_i_english FROM $classification WHERE grade = 'I' AND quarter = 1 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIEnglish = mysqli_query($conn, $sqlGradeIEnglish);
    $rowGradeIEnglish = mysqli_fetch_assoc($resultGradeIEnglish);
    $oneenglishq1 = $rowGradeIEnglish['count_grade_i_english'];

    $sqlGradeIFilipino = "SELECT COUNT(LRN) AS count_grade_i_filipino FROM $classification WHERE grade = 'I' AND quarter = 1 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIFilipino = mysqli_query($conn, $sqlGradeIFilipino);
    $rowGradeIFilipino = mysqli_fetch_assoc($resultGradeIFilipino);
    $onefilipinoq1 = $rowGradeIFilipino['count_grade_i_filipino'];

    $sqlGradeINumeracy = "SELECT COUNT(LRN) AS count_grade_i_numeracy FROM $classification WHERE grade = 'I' AND quarter = 1 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeINumeracy = mysqli_query($conn, $sqlGradeINumeracy);
    $rowGradeINumeracy = mysqli_fetch_assoc($resultGradeINumeracy);
    $onenumeracyq1 = $rowGradeINumeracy['count_grade_i_numeracy'];

    $sqlGradeIBehavioral = "SELECT COUNT(LRN) AS count_grade_i_behavioral FROM $classification WHERE grade = 'I' AND quarter = 1 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIBehavioral = mysqli_query($conn, $sqlGradeIBehavioral);
    $rowGradeIBehavioral = mysqli_fetch_assoc($resultGradeIBehavioral);
    $onebehavioralq1 = $rowGradeIBehavioral['count_grade_i_behavioral'];

    // Query and variable names for Grade II and quarter 1
    $sqlGradeIIEnglish = "SELECT COUNT(LRN) AS count_grade_ii_english FROM $classification WHERE grade = 'II' AND quarter = 1 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIIEnglish = mysqli_query($conn, $sqlGradeIIEnglish);
    $rowGradeIIEnglish = mysqli_fetch_assoc($resultGradeIIEnglish);
    $twoenglishq1 = $rowGradeIIEnglish['count_grade_ii_english'];

    $sqlGradeIIFilipino = "SELECT COUNT(LRN) AS count_grade_ii_filipino FROM $classification WHERE grade = 'II' AND quarter = 1 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIIFilipino = mysqli_query($conn, $sqlGradeIIFilipino);
    $rowGradeIIFilipino = mysqli_fetch_assoc($resultGradeIIFilipino);
    $twofilipinoq1 = $rowGradeIIFilipino['count_grade_ii_filipino'];

    $sqlGradeIINumeracy = "SELECT COUNT(LRN) AS count_grade_ii_numeracy FROM $classification WHERE grade = 'II' AND quarter = 1 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIINumeracy = mysqli_query($conn, $sqlGradeIINumeracy);
    $rowGradeIINumeracy = mysqli_fetch_assoc($resultGradeIINumeracy);
    $twonumeracyq1 = $rowGradeIINumeracy['count_grade_ii_numeracy'];

    $sqlGradeIIBehavioral = "SELECT COUNT(LRN) AS count_grade_ii_behavioral FROM $classification WHERE grade = 'II' AND quarter = 1 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIIBehavioral = mysqli_query($conn, $sqlGradeIIBehavioral);
    $rowGradeIIBehavioral = mysqli_fetch_assoc($resultGradeIIBehavioral);
    $twobehavioralq1 = $rowGradeIIBehavioral['count_grade_ii_behavioral'];

    // Query and variable names for Grade III and quarter 1
    $sqlGradeIIIEnglish = "SELECT COUNT(LRN) AS count_grade_iii_english FROM $classification WHERE grade = 'III' AND quarter = 1 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIIIEnglish = mysqli_query($conn, $sqlGradeIIIEnglish);
    $rowGradeIIIEnglish = mysqli_fetch_assoc($resultGradeIIIEnglish);
    $threeenglishq1 = $rowGradeIIIEnglish['count_grade_iii_english'];

    $sqlGradeIIIFilipino = "SELECT COUNT(LRN) AS count_grade_iii_filipino FROM $classification WHERE grade = 'III' AND quarter = 1 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIIIFilipino = mysqli_query($conn, $sqlGradeIIIFilipino);
    $rowGradeIIIFilipino = mysqli_fetch_assoc($resultGradeIIIFilipino);
    $threefilipinoq1 = $rowGradeIIIFilipino['count_grade_iii_filipino'];

    $sqlGradeIIINumeracy = "SELECT COUNT(LRN) AS count_grade_iii_numeracy FROM $classification WHERE grade = 'III' AND quarter = 1 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIIINumeracy = mysqli_query($conn, $sqlGradeIIINumeracy);
    $rowGradeIIINumeracy = mysqli_fetch_assoc($resultGradeIIINumeracy);
    $threenumeracyq1 = $rowGradeIIINumeracy['count_grade_iii_numeracy'];

    $sqlGradeIIIBehavioral = "SELECT COUNT(LRN) AS count_grade_iii_behavioral FROM $classification WHERE grade = 'III' AND quarter = 1 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIIIBehavioral = mysqli_query($conn, $sqlGradeIIIBehavioral);
    $rowGradeIIIBehavioral = mysqli_fetch_assoc($resultGradeIIIBehavioral);
    $threebehavioralq1 = $rowGradeIIIBehavioral['count_grade_iii_behavioral'];

    mysqli_close($conn);
?>
<?php
    include('../../database.php');

    $classification = isset($_POST['classification']) ? $_POST['classification'] : 'academic_english';
    $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
    $sqlKinderEnglish = "SELECT COUNT(LRN) AS count_kinder_english FROM $classification WHERE grade = 'kinder' AND quarter =2 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultKinderEnglish = mysqli_query($conn, $sqlKinderEnglish);
    $rowKinderEnglish = mysqli_fetch_assoc($resultKinderEnglish);
    $kinderenglishq2 = $rowKinderEnglish['count_kinder_english'];

    $sqlKinderFilipino = "SELECT COUNT(LRN) AS count_kinder_filipino FROM $classification WHERE grade = 'kinder' AND quarter =2 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultKinderFilipino = mysqli_query($conn, $sqlKinderFilipino);
    $rowKinderFilipino = mysqli_fetch_assoc($resultKinderFilipino);
    $kinderfilipinoq2 = $rowKinderFilipino['count_kinder_filipino'];

    $sqlKinderNumeracy = "SELECT COUNT(LRN) AS count_kinder_numeracy FROM $classification WHERE grade = 'kinder' AND quarter =2 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultKinderNumeracy = mysqli_query($conn, $sqlKinderNumeracy);
    $rowKinderNumeracy = mysqli_fetch_assoc($resultKinderNumeracy);
    $kindernumeracyq2 = $rowKinderNumeracy['count_kinder_numeracy'];

    $sqlKinderBehavioral = "SELECT COUNT(LRN) AS count_kinder_behavioral FROM $classification WHERE grade = 'kinder' AND quarter =2 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultKinderBehavioral = mysqli_query($conn, $sqlKinderBehavioral);
    $rowKinderBehavioral = mysqli_fetch_assoc($resultKinderBehavioral);
    $kinderbehavioralq2 = $rowKinderBehavioral['count_kinder_behavioral'];

    // Query and variable names for Grade I and quarter 1
    $sqlGradeIEnglish = "SELECT COUNT(LRN) AS count_grade_i_english FROM $classification WHERE grade = 'I' AND quarter =2 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIEnglish = mysqli_query($conn, $sqlGradeIEnglish);
    $rowGradeIEnglish = mysqli_fetch_assoc($resultGradeIEnglish);
    $oneenglishq2 = $rowGradeIEnglish['count_grade_i_english'];

    $sqlGradeIFilipino = "SELECT COUNT(LRN) AS count_grade_i_filipino FROM $classification WHERE grade = 'I' AND quarter =2 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIFilipino = mysqli_query($conn, $sqlGradeIFilipino);
    $rowGradeIFilipino = mysqli_fetch_assoc($resultGradeIFilipino);
    $onefilipinoq2 = $rowGradeIFilipino['count_grade_i_filipino'];

    $sqlGradeINumeracy = "SELECT COUNT(LRN) AS count_grade_i_numeracy FROM $classification WHERE grade = 'I' AND quarter =2 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeINumeracy = mysqli_query($conn, $sqlGradeINumeracy);
    $rowGradeINumeracy = mysqli_fetch_assoc($resultGradeINumeracy);
    $onenumeracyq2 = $rowGradeINumeracy['count_grade_i_numeracy'];

    $sqlGradeIBehavioral = "SELECT COUNT(LRN) AS count_grade_i_behavioral FROM $classification WHERE grade = 'I' AND quarter =2 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIBehavioral = mysqli_query($conn, $sqlGradeIBehavioral);
    $rowGradeIBehavioral = mysqli_fetch_assoc($resultGradeIBehavioral);
    $onebehavioralq2 = $rowGradeIBehavioral['count_grade_i_behavioral'];

    // Query and variable names for Grade II and quarter 1
    $sqlGradeIIEnglish = "SELECT COUNT(LRN) AS count_grade_ii_english FROM $classification WHERE grade = 'II' AND quarter =2 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIIEnglish = mysqli_query($conn, $sqlGradeIIEnglish);
    $rowGradeIIEnglish = mysqli_fetch_assoc($resultGradeIIEnglish);
    $twoenglishq2 = $rowGradeIIEnglish['count_grade_ii_english'];

    $sqlGradeIIFilipino = "SELECT COUNT(LRN) AS count_grade_ii_filipino FROM $classification WHERE grade = 'II' AND quarter =2 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIIFilipino = mysqli_query($conn, $sqlGradeIIFilipino);
    $rowGradeIIFilipino = mysqli_fetch_assoc($resultGradeIIFilipino);
    $twofilipinoq2 = $rowGradeIIFilipino['count_grade_ii_filipino'];

    $sqlGradeIINumeracy = "SELECT COUNT(LRN) AS count_grade_ii_numeracy FROM $classification WHERE grade = 'II' AND quarter =2 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIINumeracy = mysqli_query($conn, $sqlGradeIINumeracy);
    $rowGradeIINumeracy = mysqli_fetch_assoc($resultGradeIINumeracy);
    $twonumeracyq2 = $rowGradeIINumeracy['count_grade_ii_numeracy'];

    $sqlGradeIIBehavioral = "SELECT COUNT(LRN) AS count_grade_ii_behavioral FROM $classification WHERE grade = 'II' AND quarter =2 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIIBehavioral = mysqli_query($conn, $sqlGradeIIBehavioral);
    $rowGradeIIBehavioral = mysqli_fetch_assoc($resultGradeIIBehavioral);
    $twobehavioralq2 = $rowGradeIIBehavioral['count_grade_ii_behavioral'];

    // Query and variable names for Grade III and quarter 1
    $sqlGradeIIIEnglish = "SELECT COUNT(LRN) AS count_grade_iii_english FROM $classification WHERE grade = 'III' AND quarter =2 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIIIEnglish = mysqli_query($conn, $sqlGradeIIIEnglish);
    $rowGradeIIIEnglish = mysqli_fetch_assoc($resultGradeIIIEnglish);
    $threeenglishq2 = $rowGradeIIIEnglish['count_grade_iii_english'];

    $sqlGradeIIIFilipino = "SELECT COUNT(LRN) AS count_grade_iii_filipino FROM $classification WHERE grade = 'III' AND quarter =2 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIIIFilipino = mysqli_query($conn, $sqlGradeIIIFilipino);
    $rowGradeIIIFilipino = mysqli_fetch_assoc($resultGradeIIIFilipino);
    $threefilipinoq2 = $rowGradeIIIFilipino['count_grade_iii_filipino'];

    $sqlGradeIIINumeracy = "SELECT COUNT(LRN) AS count_grade_iii_numeracy FROM $classification WHERE grade = 'III' AND quarter =2 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIIINumeracy = mysqli_query($conn, $sqlGradeIIINumeracy);
    $rowGradeIIINumeracy = mysqli_fetch_assoc($resultGradeIIINumeracy);
    $threenumeracyq2 = $rowGradeIIINumeracy['count_grade_iii_numeracy'];

    $sqlGradeIIIBehavioral = "SELECT COUNT(LRN) AS count_grade_iii_behavioral FROM $classification WHERE grade = 'III' AND quarter =2 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIIIBehavioral = mysqli_query($conn, $sqlGradeIIIBehavioral);
    $rowGradeIIIBehavioral = mysqli_fetch_assoc($resultGradeIIIBehavioral);
    $threebehavioralq2 = $rowGradeIIIBehavioral['count_grade_iii_behavioral'];

    mysqli_close($conn);
?>
<?php
    include('../../database.php');

    $classification = isset($_POST['classification']) ? $_POST['classification'] : 'academic_english';
    $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
    $sqlKinderEnglish = "SELECT COUNT(LRN) AS count_kinder_english FROM $classification WHERE grade = 'kinder' AND quarter = 3 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultKinderEnglish = mysqli_query($conn, $sqlKinderEnglish);
    $rowKinderEnglish = mysqli_fetch_assoc($resultKinderEnglish);
    $kinderenglishq3 = $rowKinderEnglish['count_kinder_english'];

    $sqlKinderFilipino = "SELECT COUNT(LRN) AS count_kinder_filipino FROM $classification WHERE grade = 'kinder' AND quarter = 3 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultKinderFilipino = mysqli_query($conn, $sqlKinderFilipino);
    $rowKinderFilipino = mysqli_fetch_assoc($resultKinderFilipino);
    $kinderfilipinoq3 = $rowKinderFilipino['count_kinder_filipino'];

    $sqlKinderNumeracy = "SELECT COUNT(LRN) AS count_kinder_numeracy FROM $classification WHERE grade = 'kinder' AND quarter = 3 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultKinderNumeracy = mysqli_query($conn, $sqlKinderNumeracy);
    $rowKinderNumeracy = mysqli_fetch_assoc($resultKinderNumeracy);
    $kindernumeracyq3 = $rowKinderNumeracy['count_kinder_numeracy'];

    $sqlKinderBehavioral = "SELECT COUNT(LRN) AS count_kinder_behavioral FROM $classification WHERE grade = 'kinder' AND quarter = 3 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultKinderBehavioral = mysqli_query($conn, $sqlKinderBehavioral);
    $rowKinderBehavioral = mysqli_fetch_assoc($resultKinderBehavioral);
    $kinderbehavioralq3 = $rowKinderBehavioral['count_kinder_behavioral'];

    // Query and variable names for Grade I and quarter 1
    $sqlGradeIEnglish = "SELECT COUNT(LRN) AS count_grade_i_english FROM $classification WHERE grade = 'I' AND quarter = 3 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIEnglish = mysqli_query($conn, $sqlGradeIEnglish);
    $rowGradeIEnglish = mysqli_fetch_assoc($resultGradeIEnglish);
    $oneenglishq3 = $rowGradeIEnglish['count_grade_i_english'];

    $sqlGradeIFilipino = "SELECT COUNT(LRN) AS count_grade_i_filipino FROM $classification WHERE grade = 'I' AND quarter = 3 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIFilipino = mysqli_query($conn, $sqlGradeIFilipino);
    $rowGradeIFilipino = mysqli_fetch_assoc($resultGradeIFilipino);
    $onefilipinoq3 = $rowGradeIFilipino['count_grade_i_filipino'];

    $sqlGradeINumeracy = "SELECT COUNT(LRN) AS count_grade_i_numeracy FROM $classification WHERE grade = 'I' AND quarter = 3 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeINumeracy = mysqli_query($conn, $sqlGradeINumeracy);
    $rowGradeINumeracy = mysqli_fetch_assoc($resultGradeINumeracy);
    $onenumeracyq3 = $rowGradeINumeracy['count_grade_i_numeracy'];

    $sqlGradeIBehavioral = "SELECT COUNT(LRN) AS count_grade_i_behavioral FROM $classification WHERE grade = 'I' AND quarter = 3 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIBehavioral = mysqli_query($conn, $sqlGradeIBehavioral);
    $rowGradeIBehavioral = mysqli_fetch_assoc($resultGradeIBehavioral);
    $onebehavioralq3 = $rowGradeIBehavioral['count_grade_i_behavioral'];

    // Query and variable names for Grade II and quarter 1
    $sqlGradeIIEnglish = "SELECT COUNT(LRN) AS count_grade_ii_english FROM $classification WHERE grade = 'II' AND quarter = 3 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIIEnglish = mysqli_query($conn, $sqlGradeIIEnglish);
    $rowGradeIIEnglish = mysqli_fetch_assoc($resultGradeIIEnglish);
    $twoenglishq3 = $rowGradeIIEnglish['count_grade_ii_english'];

    $sqlGradeIIFilipino = "SELECT COUNT(LRN) AS count_grade_ii_filipino FROM $classification WHERE grade = 'II' AND quarter = 3 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIIFilipino = mysqli_query($conn, $sqlGradeIIFilipino);
    $rowGradeIIFilipino = mysqli_fetch_assoc($resultGradeIIFilipino);
    $twofilipinoq3 = $rowGradeIIFilipino['count_grade_ii_filipino'];

    $sqlGradeIINumeracy = "SELECT COUNT(LRN) AS count_grade_ii_numeracy FROM $classification WHERE grade = 'II' AND quarter = 3 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIINumeracy = mysqli_query($conn, $sqlGradeIINumeracy);
    $rowGradeIINumeracy = mysqli_fetch_assoc($resultGradeIINumeracy);
    $twonumeracyq3 = $rowGradeIINumeracy['count_grade_ii_numeracy'];

    $sqlGradeIIBehavioral = "SELECT COUNT(LRN) AS count_grade_ii_behavioral FROM $classification WHERE grade = 'II' AND quarter = 3 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIIBehavioral = mysqli_query($conn, $sqlGradeIIBehavioral);
    $rowGradeIIBehavioral = mysqli_fetch_assoc($resultGradeIIBehavioral);
    $twobehavioralq3 = $rowGradeIIBehavioral['count_grade_ii_behavioral'];

    // Query and variable names for Grade III and quarter 1
    $sqlGradeIIIEnglish = "SELECT COUNT(LRN) AS count_grade_iii_english FROM $classification WHERE grade = 'III' AND quarter = 3 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIIIEnglish = mysqli_query($conn, $sqlGradeIIIEnglish);
    $rowGradeIIIEnglish = mysqli_fetch_assoc($resultGradeIIIEnglish);
    $threeenglishq3 = $rowGradeIIIEnglish['count_grade_iii_english'];

    $sqlGradeIIIFilipino = "SELECT COUNT(LRN) AS count_grade_iii_filipino FROM $classification WHERE grade = 'III' AND quarter = 3 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIIIFilipino = mysqli_query($conn, $sqlGradeIIIFilipino);
    $rowGradeIIIFilipino = mysqli_fetch_assoc($resultGradeIIIFilipino);
    $threefilipinoq3 = $rowGradeIIIFilipino['count_grade_iii_filipino'];

    $sqlGradeIIINumeracy = "SELECT COUNT(LRN) AS count_grade_iii_numeracy FROM $classification WHERE grade = 'III' AND quarter = 3 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIIINumeracy = mysqli_query($conn, $sqlGradeIIINumeracy);
    $rowGradeIIINumeracy = mysqli_fetch_assoc($resultGradeIIINumeracy);
    $threenumeracyq3 = $rowGradeIIINumeracy['count_grade_iii_numeracy'];

    $sqlGradeIIIBehavioral = "SELECT COUNT(LRN) AS count_grade_iii_behavioral FROM $classification WHERE grade = 'III' AND quarter = 3 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIIIBehavioral = mysqli_query($conn, $sqlGradeIIIBehavioral);
    $rowGradeIIIBehavioral = mysqli_fetch_assoc($resultGradeIIIBehavioral);
    $threebehavioralq3 = $rowGradeIIIBehavioral['count_grade_iii_behavioral'];

    mysqli_close($conn);
?>
<?php
    include('../../database.php');

    $classification = isset($_POST['classification']) ? $_POST['classification'] : 'academic_english';
    $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
    $sqlKinderEnglish = "SELECT COUNT(LRN) AS count_kinder_english FROM $classification WHERE grade = 'kinder' AND quarter = 4 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultKinderEnglish = mysqli_query($conn, $sqlKinderEnglish);
    $rowKinderEnglish = mysqli_fetch_assoc($resultKinderEnglish);
    $kinderenglishq4  = $rowKinderEnglish['count_kinder_english'];

    $sqlKinderFilipino = "SELECT COUNT(LRN) AS count_kinder_filipino FROM $classification WHERE grade = 'kinder' AND quarter = 4 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultKinderFilipino = mysqli_query($conn, $sqlKinderFilipino);
    $rowKinderFilipino = mysqli_fetch_assoc($resultKinderFilipino);
    $kinderfilipinoq4  = $rowKinderFilipino['count_kinder_filipino'];

    $sqlKinderNumeracy = "SELECT COUNT(LRN) AS count_kinder_numeracy FROM $classification WHERE grade = 'kinder' AND quarter = 4 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultKinderNumeracy = mysqli_query($conn, $sqlKinderNumeracy);
    $rowKinderNumeracy = mysqli_fetch_assoc($resultKinderNumeracy);
    $kindernumeracyq4  = $rowKinderNumeracy['count_kinder_numeracy'];

    $sqlKinderBehavioral = "SELECT COUNT(LRN) AS count_kinder_behavioral FROM $classification WHERE grade = 'kinder' AND quarter = 4 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultKinderBehavioral = mysqli_query($conn, $sqlKinderBehavioral);
    $rowKinderBehavioral = mysqli_fetch_assoc($resultKinderBehavioral);
    $kinderbehavioralq4  = $rowKinderBehavioral['count_kinder_behavioral'];

    // Query and variable names for Grade I and quarter 1
    $sqlGradeIEnglish = "SELECT COUNT(LRN) AS count_grade_i_english FROM $classification WHERE grade = 'I' AND quarter = 4 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIEnglish = mysqli_query($conn, $sqlGradeIEnglish);
    $rowGradeIEnglish = mysqli_fetch_assoc($resultGradeIEnglish);
    $oneenglishq4  = $rowGradeIEnglish['count_grade_i_english'];

    $sqlGradeIFilipino = "SELECT COUNT(LRN) AS count_grade_i_filipino FROM $classification WHERE grade = 'I' AND quarter = 4 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIFilipino = mysqli_query($conn, $sqlGradeIFilipino);
    $rowGradeIFilipino = mysqli_fetch_assoc($resultGradeIFilipino);
    $onefilipinoq4  = $rowGradeIFilipino['count_grade_i_filipino'];

    $sqlGradeINumeracy = "SELECT COUNT(LRN) AS count_grade_i_numeracy FROM $classification WHERE grade = 'I' AND quarter = 4 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeINumeracy = mysqli_query($conn, $sqlGradeINumeracy);
    $rowGradeINumeracy = mysqli_fetch_assoc($resultGradeINumeracy);
    $onenumeracyq4  = $rowGradeINumeracy['count_grade_i_numeracy'];

    $sqlGradeIBehavioral = "SELECT COUNT(LRN) AS count_grade_i_behavioral FROM $classification WHERE grade = 'I' AND quarter = 4 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIBehavioral = mysqli_query($conn, $sqlGradeIBehavioral);
    $rowGradeIBehavioral = mysqli_fetch_assoc($resultGradeIBehavioral);
    $onebehavioralq4  = $rowGradeIBehavioral['count_grade_i_behavioral'];

    // Query and variable names for Grade II and quarter 1
    $sqlGradeIIEnglish = "SELECT COUNT(LRN) AS count_grade_ii_english FROM $classification WHERE grade = 'II' AND quarter = 4 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIIEnglish = mysqli_query($conn, $sqlGradeIIEnglish);
    $rowGradeIIEnglish = mysqli_fetch_assoc($resultGradeIIEnglish);
    $twoenglishq4  = $rowGradeIIEnglish['count_grade_ii_english'];

    $sqlGradeIIFilipino = "SELECT COUNT(LRN) AS count_grade_ii_filipino FROM $classification WHERE grade = 'II' AND quarter = 4 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIIFilipino = mysqli_query($conn, $sqlGradeIIFilipino);
    $rowGradeIIFilipino = mysqli_fetch_assoc($resultGradeIIFilipino);
    $twofilipinoq4  = $rowGradeIIFilipino['count_grade_ii_filipino'];

    $sqlGradeIINumeracy = "SELECT COUNT(LRN) AS count_grade_ii_numeracy FROM $classification WHERE grade = 'II' AND quarter = 4 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIINumeracy = mysqli_query($conn, $sqlGradeIINumeracy);
    $rowGradeIINumeracy = mysqli_fetch_assoc($resultGradeIINumeracy);
    $twonumeracyq4  = $rowGradeIINumeracy['count_grade_ii_numeracy'];

    $sqlGradeIIBehavioral = "SELECT COUNT(LRN) AS count_grade_ii_behavioral FROM $classification WHERE grade = 'II' AND quarter = 4 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIIBehavioral = mysqli_query($conn, $sqlGradeIIBehavioral);
    $rowGradeIIBehavioral = mysqli_fetch_assoc($resultGradeIIBehavioral);
    $twobehavioralq4  = $rowGradeIIBehavioral['count_grade_ii_behavioral'];

    // Query and variable names for Grade III and quarter 1
    $sqlGradeIIIEnglish = "SELECT COUNT(LRN) AS count_grade_iii_english FROM $classification WHERE grade = 'III' AND quarter = 4 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIIIEnglish = mysqli_query($conn, $sqlGradeIIIEnglish);
    $rowGradeIIIEnglish = mysqli_fetch_assoc($resultGradeIIIEnglish);
    $threeenglishq4  = $rowGradeIIIEnglish['count_grade_iii_english'];

    $sqlGradeIIIFilipino = "SELECT COUNT(LRN) AS count_grade_iii_filipino FROM $classification WHERE grade = 'III' AND quarter = 4 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIIIFilipino = mysqli_query($conn, $sqlGradeIIIFilipino);
    $rowGradeIIIFilipino = mysqli_fetch_assoc($resultGradeIIIFilipino);
    $threefilipinoq4  = $rowGradeIIIFilipino['count_grade_iii_filipino'];

    $sqlGradeIIINumeracy = "SELECT COUNT(LRN) AS count_grade_iii_numeracy FROM $classification WHERE grade = 'III' AND quarter = 4 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIIINumeracy = mysqli_query($conn, $sqlGradeIIINumeracy);
    $rowGradeIIINumeracy = mysqli_fetch_assoc($resultGradeIIINumeracy);
    $threenumeracyq4  = $rowGradeIIINumeracy['count_grade_iii_numeracy'];

    $sqlGradeIIIBehavioral = "SELECT COUNT(LRN) AS count_grade_iii_behavioral FROM $classification WHERE grade = 'III' AND quarter = 4 AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
    $resultGradeIIIBehavioral = mysqli_query($conn, $sqlGradeIIIBehavioral);
    $rowGradeIIIBehavioral = mysqli_fetch_assoc($resultGradeIIIBehavioral);
    $threebehavioralq4  = $rowGradeIIIBehavioral['count_grade_iii_behavioral'];

    mysqli_close($conn);
?>
<?php
    include('../../database.php');

    $classification = isset($_POST['classification']) ? $_POST['classification'] : 'academic_english';
    $sql = "SELECT
                (SELECT COUNT(DISTINCT lrn) FROM (
                    SELECT lrn FROM $classification WHERE grade = 'kinder' AND school = 'Bacayao Sur Elementary School'
                    UNION
                    SELECT lrn FROM $classification WHERE grade = 'kinder' AND school = 'Bacayao Sur Elementary School'
                    UNION
                    SELECT lrn FROM $classification WHERE grade = 'kinder' AND school = 'Bacayao Sur Elementary School'
                    UNION
                    SELECT lrn FROM $classification WHERE grade = 'kinder' AND school = 'Bacayao Sur Elementary School'
                ) AS kinder_lrns) AS totalkinder,
                (SELECT COUNT(DISTINCT lrn) FROM (
                    SELECT lrn FROM $classification WHERE grade = 'I' AND school = 'Bacayao Sur Elementary School'
                    UNION
                    SELECT lrn FROM $classification WHERE grade = 'I' AND school = 'Bacayao Sur Elementary School'
                    UNION
                    SELECT lrn FROM $classification WHERE grade = 'I' AND school = 'Bacayao Sur Elementary School'
                    UNION
                    SELECT lrn FROM $classification WHERE grade = 'I' AND school = 'Bacayao Sur Elementary School'
                ) AS gradeone_lrns) AS totalone,
                (SELECT COUNT(DISTINCT lrn) FROM (
                    SELECT lrn FROM $classification WHERE grade = 'II' AND school = 'Bacayao Sur Elementary School'
                    UNION
                    SELECT lrn FROM $classification WHERE grade = 'II' AND school = 'Bacayao Sur Elementary School'
                    UNION
                    SELECT lrn FROM $classification WHERE grade = 'II' AND school = 'Bacayao Sur Elementary School'
                    UNION
                    SELECT lrn FROM $classification WHERE grade = 'II' AND school = 'Bacayao Sur Elementary School'
                ) AS gradetwo_lrns) AS totaltwo,
                (SELECT COUNT(DISTINCT lrn) FROM (
                    SELECT lrn FROM $classification WHERE grade = 'III' AND school = 'Bacayao Sur Elementary School'
                    UNION
                    SELECT lrn FROM $classification WHERE grade = 'III' AND school = 'Bacayao Sur Elementary School'
                    UNION
                    SELECT lrn FROM $classification WHERE grade = 'III' AND school = 'Bacayao Sur Elementary School'
                    UNION
                    SELECT lrn FROM $classification WHERE grade = 'III' AND school = 'Bacayao Sur Elementary School'
                ) AS gradethree_lrns) AS totalthree";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the total counts and store them in variables
        $row = $result->fetch_assoc();
        $totalkinderq4 = $row['totalkinder'];
        $totaloneq4 = $row['totalone'];
        $totaltwoq4 = $row['totaltwo'];
        $totalthreeq4 = $row['totalthree'];
    }

    // Close connection
    $conn->close();
?>
<?php
    include('../../database.php');
    if(isset($_GET['employment_number'])) {
        $employment_number = $_GET['employment_number'];
        $sql = "SELECT fullname FROM principal WHERE employment_number = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $employment_number);
        $stmt->execute();
        $stmt->bind_result($sdoname);
        if($stmt->fetch()) {
        }
        $stmt->close();
    } 
    $conn->close();
?>
<?php
    include('../../database.php');
    $query = "SELECT start, end FROM school_year ORDER BY start DESC";
    $result = mysqli_query($conn, $query);

    // Array to store all school year options
    $school_years = array();

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $start_year = $row['start'];
            $end_year = $row['end'];
            $school_years[$start_year] = $start_year . ' - ' . $end_year;
        }
    }

    // Close database conn
    mysqli_close($conn);
?>
<?php
    include('../../database.php');
    if(isset($_GET['employment_number'])) {
        $employment_number = $_GET['employment_number'];
        $sql = "SELECT fullname FROM principal WHERE employment_number = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $employment_number);
        $stmt->execute();
        $stmt->bind_result($principalname);
        if($stmt->fetch()) {
        }
        $stmt->close();
    } 
    $conn->close();
?>
<DOCTYPE html>
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
    <title>SDO Superintendent</title>
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
            background-color: white;
            background-size: cover;
            overflow-y: hidden;
        }
        
        .logo {
            width: 75px;
            height: 75px;
            margin: 0 auto 20px;
            background-image: url('../img/logo.png'); 
            background-size: cover;
        }
        
        h2 {
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

        .header-content {
            display: flex;
            align-items: center;
            justify-content: start;
            width: 94%;
        }

        .navbar {
            background-color: #190572;;
            opacity: 80%;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50px;
            width: 100%;
            position: fixed;
            top: 57px; 
        }

        .back-icon {
            font-size: 3rem;
        }

        .navbar a {
            display: inline-block;
            padding: 14px 20px;
            text-decoration: none;
            color: #FFFFFF;
            opacity: 100%;
        }

        nav {
            flex: 1; 
            text-align: center;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
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
        
        .buttons {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 10px;
        }
        
        a .button {
        background-color: #0C052F;
        color: #fff;
        padding: 10px 20px;
        margin: 0 10px;
        border: 1px solid #fff;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        width: 90%;
        }
        
        .button:hover {
        background-color: #ddd;
        border: 1px solid #0C052F;
        color: #190572;
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

        .main-container {
            width: 100%;
            margin-top: 70px;
            height: 85%;
            background-color: white;
            opacity: 80%;
            overflow: hidden;
            padding: 20px;
        }

        .shesh {
            background-color: transparent;
            border-radius: 5px;
            border: 2px solid #919097;
            background: rgba(251, 251, 251, 0.25);
            box-shadow: 0px 7px 7px 0px rgba(0, 0, 0, 0.25) inset, 0px 7px 7px 0px rgba(0, 0, 0, 0.25);
            padding: 10px;
            padding-top: 15px;
            margin-bottom: 20px;  
        }

        .second-section{
            height: 320px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .wide-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between; 
        }

        .column {
            flex: 0 0 calc(16.6667%);
            margin-bottom: 5px;
        }

        .wide-columns {
            flex: 0 0 calc(30% - 10px);
            margin-bottom: 20px;
            margin-top: 10px;
        }

        .wide-column {
            flex: 0 0 calc(12% - 10px);
            margin-bottom: 20px;
            margin-top: 10px;
        }

        .wide-columns .containers, 
        .wide-column .containers{
            background-color: #919097;
            padding: .5px;
        }

        .column-right {
            white-space: nowrap;
            width: fit-content;
            margin-right: auto; 
            margin-left: 0;
        }

        .column-left {
            white-space: nowrap;
            flex: 0 0 calc(15%);
            margin-left: auto; 
            margin-right: 0;
        }

        .row .column:not(:last-child),
        .wide-row .column:not(:last-child) {
            margin-right: 0;
        }

        .row:first-child .column:last-child{
            margin-left: auto;
        }

        .full-width {
            flex: 0 0 calc(30%);
            margin-right: 0;
        }

        .half-width {
            flex: 0 0 calc(15%);
            margin-right: 0;
            margin-left: 0;
        }

        .containers {
            padding: .5px;
        }

        .first{
            border-radius: 3px;
            border: 1px solid #190572;
            background-color: #130550;
            color: #ddd;
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset, 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
            flex-shrink: 0;
            text-align: center;
            font-size: 15px;
            padding-left: 50px;
            padding-right: 50px;
        }

        .select-wrapper {
            position: relative;
            background: #FBFBFB;
            color: #190572;
        }

        #classificationselect,
        #quarterSelect,
        #topdown{
            width: 100%;
            background: #FBFBFB;
            color: #190572;
            text-align: start;
            border: none;
            font-weight: bold;
            font-size: 17px;
            text-align: left;
        }
        #topdown1 {
            padding: 2px;
            width: 100%;
            background: #FBFBFB;
            color: #190572;
            text-align: center;
            border: 1px solid #190572;
            border-radius: 5px;
        }

        #report_type {
            box-shadow: none;
            background: #FBFBFB;
            width: 100%;
            color: #190572;
            padding: 2px;
            text-align: center;
        }

        .second{
            border-radius: 3px;
            text-align: center;
        }

        .second h3{
            color: #FFF;
            letter-spacing: 3px;
        }

        h3 {
            color: #190572;
            margin-left: 10px;
            margin: 0;
        }

        .wide-column h3, 
        .wide-columns h3{
            color: #070000;
            text-align: center;
        }

        .third-column {
            flex: 0 0 calc(30%); 
            margin-right: 0;
            position: relative; 
        }

        .search-box {
            background-color: #F3F3F3;
            border-radius: 5px;
            display: flex;
            align-items: center;
            border: 1px solid #190572;
            padding: 3px;
            width: 400px;
        }

        .search-input {
            border-radius: 5px;
            border: none;
            outline: none;
            width: 100%;
            background-color: #F3F3F3; 
        }

        .search-icon {
            margin-left: auto;
            cursor: pointer;
            color: #190572; 
        }

        table{
            width:100%; 
            border-collapse: collapse
            
        }

        tbody th:first-child{
            text-align: left;
        }

        .school tr:nth-child(odd){
            background-color: #F3F3F3;
        }

        .school tr:nth-child(even){
            background-color: #F3F3F3;
        }

        tr, th{
            border-bottom: 1px solid #0C052F;
        }

        table tr, table th {
            border-bottom: 1px solid #0C052F;
        }

        .table-container {
            overflow-y: hidden; 
            max-height: 400px; 
        }

        .table-container::-webkit-scrollbar {
            display: none;
        }

        table{
            width:100%; 
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table-container {
            overflow-y: hidden; 
        }

        .table-header th {
            background-color: #190572;
            color: #fff;
            font-size: 15px;
            padding: 5px;
        }

        .table-body tr th:first-child{
            text-align: left;
            padding-left: 10px;
        }

        tr:nth-child(even){
            background-color: rgb(242, 242, 244);
        }

        tr:nth-child(odd){
            background-color: #b7b7b7;
        }

        .school:nth-child(even){
            background-color: rgb(242, 242, 244);
        }

        .school:nth-child(odd){
            background-color: rgb(242, 242, 244);
        }

        .school th{
            border-top: 1px solid #0C052F;
            border-bottom: 1px solid #0C052F;
        }

        .pagination {
            position: absolute;
            bottom: 10px;
            right: 20px;
        }

        .pagination button {
            padding: 8px 16px;
            background-color: #0C052F;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 5px;
        }

        .pagination button:hover {
            background-color: #190572;
        }

        thead tr th{
            background-color: #919097;
        }
        
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #130550;
            min-width: 100px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            right: 150px;
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

        @media only screen and (max-width: 800px){
            header{
                height: 40px;
            }
            h4{
                font-size: 0.6rem;
            }
            .logo{
                width: 50px;
                height: 50px;
                margin: 0 auto 10px;
            }
            h2{
                font-size: 0.6rem;
            }
            header {
                padding: .1rem 2%;
            }
            .navbar{
                font-size: 0.6rem;
                margin-top: -14px;
                height: 39px;
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
            .main-container{
                margin: 10px;
                margin-top: 80px;
                height: calc(100vh - 180px);
            }
            .table-header th {
                color: black;
                font-size: 0.6rem;
                padding: 5px;
            }
            tbody{
                font-size: 0.6rem;
            }
            .logs{
                width: 2rem;
                height: 2rem;
            }
            .containers{
                white-space: nowrap;
            }
            #topdown1 {
                padding: 1px;
                width: 150px;
                background-color:#130550;
                color:#ddd;
                text-align: center;
                border: 1px solid #190572;
                border-radius: 5px;
                font-size: 0.6rem;
            }
            .second{
                border-radius: 3px;
                background-color: #2206A0;
                text-align: center;
                width: 160px;
            }
            .second h3{
                color: #FFF;
                letter-spacing: 3px;
                font-size: 0.6rem;
            }
            .column {
                font-size: 0.6rem;
                margin-top: 5px;
            }
            #topdown {
                font-size: 0.6rem;
            }
            .search-box{
                font-size: 0.6rem;
                padding: 0.1px;
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
                <div class='name' onclick="toggleDropdown()"><?php echo $principalname ?></div>
                    <div class="dropdown-content" id="dropdownContent">
                    <a href="../login/Login.php">Log Out</a>
                    <a href="executive_change_password.php?employment_number=<?php echo isset($_GET['employment_number']) ? $_GET['employment_number'] : 'default_value'; ?>&filename=<?php echo $filename ?>" style="border-top: 1px solid #ddd;">Change Password</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    
    <div class="main-container">
        
        <div class="row">
            <div class="column">
                <div class="select-wrapper">
                <form id="school_year_form" method="post" action="">
                        <select id="topdown1" name="school-year" class="containers first">
                            <?php foreach ($school_years as $start_year => $school_year) : ?>
                                <?php $selected = (isset($_POST['school-year']) && $_POST['school-year'] == $start_year) || date('Y') == $start_year ? 'selected="selected"' : ''; ?>
                                <option value="<?php echo $start_year; ?>" <?php echo $selected; ?>><?php echo $school_year; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </form>
                </div>
            </div>
            
            <div class="column">
                <div class="containers second">
                <div class="search-box">
    <input type="text" class="search-input" placeholder="Search Adviser" oninput="filterTable()">
    <i class='bx bx-search search-icon'></i>
</div>
                </div>
            </div>
            <div class="column full-width">
                <div class="column third-column">
                    <div class="select-wrapper">
                        <select id="report_type" name="report-type" class="containers first" style="text-align:left">
                            <option value="quarterly">View Quarterly Reports</option>
                            <option value="summary">View Report Summary</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

    <div id="quarterly_reports">
    <div class="row" style="display: none;">
            <div class="column" >
                <div class="containers" style="background-color: #B7B7B7">
                    <h3 style="margin-left: 7px">School Name</h3>
                </div>
            </div>
            <div class="column column-right">
                <div class="containers" style="background-color: #F3F3F3;">
                    <h3 style="margin-left: 7px">Bacayao Sur Elementary School</h3>
                </div>
            </div>
            <div class="column column-left">
                <div class="containers" style="background-color: #B7B7B7;">
                    <h3 style="margin-left: 7px">Total P.A.R.s</h3>
                </div>
            </div>
            <div class="column half-width">
                <div class="containers" style="background-color: #F3F3F3;">
                    <h3 style="margin-left: 7px"><?php echo $totalpars ?></h3>
                </div>
            </div>
        </div>
    <div class="row">
            <div class="column" >
                <div class="containers" style="background-color: #B7B7B7">
                    <h3 style="margin-left: 7px">School Name</h3>
                </div>
            </div>
            <div class="column column-right">
                <div class="containers" style="background-color: #F3F3F3;">
                    <h3 style="margin-left: 7px">Bacayao Sur Elementary School</h3>
                </div>
            </div>
            <div class="column column-left">
                <div class="containers" style="background-color: #B7B7B7;">
                    <h3 style="margin-left: 7px">Total P.A.R.s</h3>
                </div>
            </div>
            <div class="column half-width">
                <div class="containers" style="background-color: #F3F3F3;">
                    <h3 style="margin-left: 7px"><?php echo $totalpars ?></h3>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="column">
                <div class="containers" style="background-color: #B7B7B7;">
                    <h3 style="margin-left: 7px">Quarter</h3>
                </div>
            </div>
            <div class="column column-right">
            <div class="select-wrapper1">
            <form id="quarterForm1" method="post" action="">
                    <select id="quarterSelect" name="quarter" onchange="submitForm()">
                        <option value="1" <?php if(isset($_POST['quarter']) && $_POST['quarter'] == '1') echo 'selected'; ?>>Quarter 1</option>
                        <option value="2" <?php if(isset($_POST['quarter']) && $_POST['quarter'] == '2') echo 'selected'; ?>>Quarter 2</option>
                        <option value="3" <?php if(isset($_POST['quarter']) && $_POST['quarter'] == '3') echo 'selected'; ?>>Quarter 3</option>
                        <option value="4" <?php if(isset($_POST['quarter']) && $_POST['quarter'] == '4') echo 'selected'; ?>>Quarter 4</option>
                    </select>
                </form>
                </div>
</div>
            <div class="column column-left">
                <div class="containers" style="background-color: #B7B7B7;">
                    <h3 style="margin-left: 7px">Resolved Cases</h3>
                </div>
            </div>
            <div class="column half-width">
                <div class="containers" style="background-color: #F3F3F3;">
                    <h3 style="margin-left: 7px"><?php echo $totalresolved ?> <span>/<?php echo $totalpars ?></span></h3>
                </div>
            </div>
        </div>
        <table border="0" id="data-table">
            <thead class="table-header">
                <tr>
                    <th style="width:14.5%">Grade and Section</th>
                    <th style="width:14.5%">Section Adviser</th>
                    <th style="width:11.5%"># of Students</th>
                    <th style="width:11.5%"># of P.A.R</th>
                    <th style="width:11.5%">A - Literacy (E)</th>
                    <th style="width:11.5%">A - Literacy (F)</th>
                    <th style="width:11.5%">A - Numeracy</th>
                    <th style="width:11.5%">Behavioral</th>
                    <th style="width:11.5%">Progress%</th>
                    
                </tr>
            </thead>

            <tbody class="school">
    <?php foreach ($resultsArray as $result) { ?>
        <tr class="school-row">
            <th style="width:14.5%"><?php echo ucfirst($result['grade']); ?> - <?php echo ucfirst($result['section']); ?></th>
            <th style="width:14.5%"><?php echo $result['fullname']; ?></th>
            <th style="width:11.5%"><?php echo $result['totalstud']; ?></th>
            <th style="width:11.5%"><?php echo $result['totalstudentpar']; ?></th>
            <th style="width:11.5%"><?php echo $result['english_count_non_distinct']; ?></th>
            <th style="width:11.5%"><?php echo $result['filipino_count_non_distinct']; ?></th>
            <th style="width:11.5%"><?php echo $result['numeracy_count_non_distinct']; ?></th>
            <th style="width:11.5%"><?php echo $result['behavioral_count_non_distinct']; ?></th>
            <th style="width:11.5%"><?php echo $result['percentage']; ?></th>
        </tr>
    <?php } ?>
</tbody>
        </table>
        <div class="pagination">
            <button id="prevBtn" onclick="prevPage()">Previous</button>
            <button id="nextBtn" onclick="nextPage()">Next</button>
        </div>
    </div>

    <div style="display: none;" id="report_summary">
    <section class="shesh">
        <div class="row">
            <div class="column" >
                <div class="containers" style="background-color: #B7B7B7; ">
                    <h3 style="margin-left: 7px">Division</h3>
                </div>
            </div>
            <div class="column column-right">
                <div class="containers" style="background-color: #F3F3F3;">
                    <h3 style="margin-left: 7px">Dagupan City Division Elementary Schools</h3>
                </div>
            </div>
            <div class="column">
                <div>
                </div>
            </div>
        </div>

        <table border="0">
            <thead class="table-header">
                <tr>
                    <th style="width:15%">P.A.R. Identification</th>
                    <th style="width:4%">Q1</th>
                    <th style="width:7%">Resolved</th>
                    <th style="width:4%">Q2</th>
                    <th style="width:7%">Resolved</th>
                    <th style="width:4%">Q3</th>
                    <th style="width:7%">Resolved</th>
                    <th style="width:4%">Q4</th>
                    <th style="width:7%">Resolved</th>
                    <th style="width:8%">Total P.A.R.s</th>
                    <th style="width:8%">Total Resolved</th>
                </tr>
            </thead>
            <tbody class="table-body">
                <tr>
                    <tr>
                        <th style="width:15%">Academic - Literacy in English</th>
                        <th style="width:4%"><?php echo $q1english ?></th>
                        <th style="width:7%"><?php echo $q1englishresolved ?></th>
                        <th style="width:4%"><?php echo $q2english ?></th>
                        <th style="width:7%"><?php echo $q2englishresolved ?></th>
                        <th style="width:4%"><?php echo $q3english ?></th>
                        <th style="width:7%"><?php echo $q3englishresolved ?></th>
                        <th style="width:4%"><?php echo $q4english ?></th>
                        <th style="width:7%"><?php echo $q4englishresolved ?></th>
                        <th style="width:8%"><?php echo $totalEnglish ?></th>
                        <th style="width:8%"><?php echo $totalEnglishResolved ?></th>
                    </tr>
                    <tr>
                    <th style="width:15%">Academic - Literacy in Filipino</th>
                        <th style="width:4%"><?php echo $q1filipino ?></th>
                        <th style="width:7%"><?php echo $q1filipinoresolved ?></th>
                        <th style="width:4%"><?php echo $q2filipino ?></th>
                        <th style="width:7%"><?php echo $q2filipinoresolved ?></th>
                        <th style="width:4%"><?php echo $q3filipino ?></th>
                        <th style="width:7%"><?php echo $q3filipinoresolved ?></th>
                        <th style="width:4%"><?php echo $q4filipino ?></th>
                        <th style="width:7%"><?php echo $q4filipinoresolved ?></th>
                        <th style="width:8%"><?php echo $totalFilipino ?></th>
                        <th style="width:8%"><?php echo $totalFilipinoResolved ?></th>
                    </tr>
                    <tr>
                    <th style="width:15%">Academic - Numeracy</th>
                        <th style="width:4%"><?php echo $q1numeracy ?></th>
                        <th style="width:7%"><?php echo $q1numeracyresolved ?></th>
                        <th style="width:4%"><?php echo $q2numeracy ?></th>
                        <th style="width:7%"><?php echo $q2numeracyresolved ?></th>
                        <th style="width:4%"><?php echo $q3numeracy ?></th>
                        <th style="width:7%"><?php echo $q3numeracyresolved ?></th>
                        <th style="width:4%"><?php echo $q4numeracy ?></th>
                        <th style="width:7%"><?php echo $q4numeracyresolved ?></th>
                        <th style="width:8%"><?php echo $totalNumeracy ?></th>
                        <th style="width:8%"><?php echo $totalNumeracyResolved ?></th>
                    <tr>
                    <th style="width:15%">Behavioral</th>
                        <th style="width:4%"><?php echo $q1behavioral ?></th>
                        <th style="width:7%"><?php echo $q1behavioralresolved ?></th>
                        <th style="width:4%"><?php echo $q2behavioral ?></th>
                        <th style="width:7%"><?php echo $q2behavioralresolved ?></th>
                        <th style="width:4%"><?php echo $q3behavioral ?></th>
                        <th style="width:7%"><?php echo $q3behavioralresolved ?></th>
                        <th style="width:4%"><?php echo $q4behavioral ?></th>
                        <th style="width:7%"><?php echo $q4behavioralresolved ?></th>
                        <th style="width:8%"><?php echo $totalBehavioral ?></th>
                        <th style="width:8%"><?php echo $totalBehavioralResolved ?></th>
                </tr>
            </tbody>
        </table>
    </section>

    <section class="shesh" style="margin-top: 40px;">

        <div class="row">
            <div class="column">
                <div class="containers" style="background-color: #B7B7B7;">
                    <h3 style="margin-left: 7px">Quarter</h3>
                </div>
            </div>
            <div class="select-wrapper1">
            <form id="classification" method="POST">
                <select id="classificationselect" name="classification" class="containers second">
                    <option value="academic_english"<?php if(isset($_POST['classification']) && $_POST['classification'] == 'academic_english') echo ' selected'; ?>>Academic - Literacy in English</option>
                    <option value="academic_filipino"<?php if(isset($_POST['classification']) && $_POST['classification'] == 'academic_filipino') echo ' selected'; ?>>Academic - Literacy in Filipino</option>
                    <option value="academic_numeracy"<?php if(isset($_POST['classification']) && $_POST['classification'] == 'academic_numeracy') echo ' selected'; ?>>Academic - Numeracy</option>
                    <option value="behavioral"<?php if(isset($_POST['classification']) && $_POST['classification'] == 'behavioral') echo ' selected'; ?>>Behavioral</option>
                </select>
            </form>

                </div>
        </div>

        <table border="0">
            <thead class="table-header">
                <tr>
                    <th style="width:40%">Grade Level</th>
                    <th style="width:13%">Q1</th>
                    <th style="width:13%">Q2</th>
                    <th style="width:13%">Q3</th>
                    <th style="width:13%">Q4</th>
                    <th style="width:25%">Total P.A.R.s</th>
                </tr>
            </thead>
            <tbody class="school">
                <tr>
                <tr class="school">
                        <th style="width:35%" >Kinder</th>
                        <th style="width:13%"><?php echo $kinderenglishq1 ?></th>
                        <th style="width:13%"><?php echo $kinderenglishq2 ?></th>
                        <th style="width:13%"><?php echo $kinderenglishq3 ?></th>
                        <th style="width:13%"><?php echo $kinderenglishq4 ?></th>
                        <th style="width:13%"><?php echo $totalkinderq4 ?></th>
                    </tr>
                    <tr class="school">
                        <th style="width:35%" >Grade 1</th>
                        <th style="width:13%"><?php echo $oneenglishq1 ?></th>
                        <th style="width:13%"><?php echo $oneenglishq2 ?></th>
                        <th style="width:13%"><?php echo $oneenglishq3 ?></th>
                        <th style="width:13%"><?php echo $oneenglishq4 ?></th>
                        <th style="width:13%"><?php echo $totaloneq4 ?></th>
                    </tr>
                    <tr class="school">
                        <th style="width:35%">Grade 2</th>
                        <th style="width:13%"><?php echo $twoenglishq1 ?></th>
                        <th style="width:13%"><?php echo $twoenglishq2 ?></th>
                        <th style="width:13%"><?php echo $twoenglishq3 ?></th>
                        <th style="width:13%"><?php echo $twoenglishq4 ?></th>
                        <th style="width:13%"><?php echo $totaltwoq4 ?></th>
                    </tr>
                    <tr class="school">
                        <th style="width:35%" >Grade 3</th>
                        <th style="width:13%"><?php echo $threeenglishq1 ?></th>
                        <th style="width:13%"><?php echo $threeenglishq2 ?></th>
                        <th style="width:13%"><?php echo $threeenglishq3 ?></th>
                        <th style="width:13%"><?php echo $threeenglishq4 ?></th>
                        <th style="width:13%"><?php echo $totalthreeq4 ?></th>
                    </tr>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
    </section>
    </div>

    <script src="monitoring_tracking.js"></script>

<script>
        function printPARsList() {
            window.print();
        }
</script>
<script>
        // Define variables
    var currentPage = 1;
    var rowsPerPage = 9; 

    // Function to show/hide rows based on current page
    function showRows() {
        var rows = document.querySelectorAll('#data-table tbody tr');
        var startIndex = (currentPage - 1) * rowsPerPage;
        var endIndex = startIndex + rowsPerPage;

        rows.forEach(function(row, index) {
            if (index >= startIndex && index < endIndex) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    }

    // Function to go to the previous page
    function prevPage() {
        if (currentPage > 1) {
            currentPage;
            showRows();
        }
    }

    // Function to go to the next page
    function nextPage() {
        var rows = document.querySelectorAll('#data-table tbody tr');
        var totalRows = rows.length;
        var totalPages = Math.ceil(totalRows / rowsPerPage);
        
        if (currentPage < totalPages) {
            currentPage++;
            showRows();
        }
    }

    // Initial call to show rows on page load
    showRows();

</script>
<script>
    document.getElementById('classificationselect').addEventListener('change', function() {
        document.getElementById('classification').submit();
    });
</script>
<script>
    function filterTable() {
        var input, filter, table, rows, fullname, i, txtValue;
        input = document.querySelector(".search-input");
        filter = input.value.toUpperCase();
        table = document.querySelector(".school");
        rows = table.querySelectorAll(".school-row");

        rows.forEach(function(row) {
            fullname = row.getElementsByTagName("th")[1];
            txtValue = fullname.textContent || fullname.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }
</script>
<script>
    function submitForm() {
        document.getElementById('quarterForm1').submit();
    }
</script>
<script>
    document.getElementById('topdown1').addEventListener('change', function() {
        if (this.value !== "new-option") {
            document.getElementById('school_year_form').submit();
        }
    });

    // After form submission, re-select the previously selected option
    <?php if(isset($_POST['school-year']) && $_POST['school-year'] !== "new-option"): ?>
        document.getElementById('topdown1').value = "<?php echo $_POST['school-year']; ?>";
    <?php endif; ?>
</script>
</body>
</html>
