<?php

    include('../database.php');

    // Initialize variables for each school count
    $sabanganstudents = 0;
    $bacayaostudents = 0;
    $blissstudents = 0;
    $bolosanstudents = 0;
    $bonuanstudents = 0;
    $calmaystudents = 0;
    $caraelstudents = 0;
    $caranglaanstudents = 0;
    $eastcentralstudents = 0;
    $ceraldeschoolstudents = 0;
    $gregoriodelpilarstudents = 0;
    $siapnostudents = 0;
    $guadizstudents = 0;
    $lasipgrandestudents = 0;
    $leonfranciscostudents = 0;
    $lomboystudents = 0;
    $lucaostudents = 0;
    $maluedstudents = 0;
    $mamalinglingstudents = 0;
    $mangintebengstudents = 0;
    $northcentralstudents = 0;
    $pantalstudents = 0;
    $villamilstudents = 0;
    $pogolasipstudents = 0;
    $pugarostudents = 0;
    $salapingaostudents = 0;
    $salisaystudents = 0;
    $suitstudents = 0;
    $rosariostudents = 0;
    $tambacstudents = 0;
    $tebengstudents = 0;
    $zaratestudents = 0;
    $westcentral1students = 0;
    $westcentral2students = 0;

    $table_query = "SELECT table_name
                FROM information_schema.tables
                WHERE table_schema = '$database'
                AND table_name LIKE '%grade%'";

    $table_result = $conn->query($table_query);

    if ($table_result->num_rows > 0) {
        // Iterate through each table
        while ($table_row = $table_result->fetch_assoc()) {
            $table_name = $table_row["table_name"];
             $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
            
            // For Sabangan Elementary School
            $lrn_sabangan_query = "SELECT COUNT(*) AS lrn_count
                                FROM $table_name
                                WHERE school = 'Sabangan Elementary School' AND year = $school_year";
            $lrn_sabangan_result = $conn->query($lrn_sabangan_query);
            if ($lrn_sabangan_result->num_rows > 0) {
                $lrn_sabangan_row = $lrn_sabangan_result->fetch_assoc();
                $sabanganstudents += $lrn_sabangan_row["lrn_count"];
            }

            // For Bacayao Elementary School
            $lrn_bacayao_query = "SELECT COUNT(*) AS lrn_count
                                FROM $table_name
                                WHERE school = 'Bacayao Sur Elementary School' AND year = $school_year";
            $lrn_bacayao_result = $conn->query($lrn_bacayao_query);
            if ($lrn_bacayao_result->num_rows > 0) {
                $lrn_bacayao_row = $lrn_bacayao_result->fetch_assoc();
                $bacayaostudents += $lrn_bacayao_row["lrn_count"];
            }

            // For Bliss Elementary School
            $lrn_bliss_query = "SELECT COUNT(*) AS lrn_count
                                FROM $table_name
                                WHERE school = 'Bliss Elementary School' AND year = $school_year";
            $lrn_bliss_result = $conn->query($lrn_bliss_query);
            if ($lrn_bliss_result->num_rows > 0) {
                $lrn_bliss_row = $lrn_bliss_result->fetch_assoc();
                $blissstudents += $lrn_bliss_row["lrn_count"];
            }

            // For Bolosan Elementary School
            $lrn_bolosan_query = "SELECT COUNT(*) AS lrn_count
                                FROM $table_name
                                WHERE school = 'Bolosan Elementary School' AND year = $school_year";
            $lrn_bolosan_result = $conn->query($lrn_bolosan_query);
            if ($lrn_bolosan_result->num_rows > 0) {
                $lrn_bolosan_row = $lrn_bolosan_result->fetch_assoc();
                $bolosanstudents += $lrn_bolosan_row["lrn_count"];
            }

            // For Bonuan Boquig Elementary School
            $lrn_bonuan_query = "SELECT COUNT(*) AS lrn_count
                                FROM $table_name
                                WHERE school = 'Bonuan Boquig Elementary School' AND year = $school_year";
            $lrn_bonuan_result = $conn->query($lrn_bonuan_query);
            if ($lrn_bonuan_result->num_rows > 0) {
                $lrn_bonuan_row = $lrn_bonuan_result->fetch_assoc();
                $bonuanstudents += $lrn_bonuan_row["lrn_count"];
            }

            // For Calmay Elementary School
            $lrn_calmay_query = "SELECT COUNT(*) AS lrn_count
                                FROM $table_name
                                WHERE school = 'Calmay Elementary School' AND year = $school_year";
            $lrn_calmay_result = $conn->query($lrn_calmay_query);
            if ($lrn_calmay_result->num_rows > 0) {
                $lrn_calmay_row = $lrn_calmay_result->fetch_assoc();
                $calmaystudents += $lrn_calmay_row["lrn_count"];
            }

            // For Carael Elementary School
            $lrn_carael_query = "SELECT COUNT(*) AS lrn_count
                                FROM $table_name
                                WHERE school = 'Carael Elementary School' AND year = $school_year";
            $lrn_carael_result = $conn->query($lrn_carael_query);
            if ($lrn_carael_result->num_rows > 0) {
                $lrn_carael_row = $lrn_carael_result->fetch_assoc();
                $caraelstudents += $lrn_carael_row["lrn_count"];
            }

            // For Caranglaan Elementary School
            $lrn_caranglaan_query = "SELECT COUNT(*) AS lrn_count
                                    FROM $table_name
                                    WHERE school = 'Caranglaan Elementary School' AND year = $school_year";
            $lrn_caranglaan_result = $conn->query($lrn_caranglaan_query);
            if ($lrn_caranglaan_result->num_rows > 0) {
                $lrn_caranglaan_row = $lrn_caranglaan_result->fetch_assoc();
                $caranglaanstudents += $lrn_caranglaan_row["lrn_count"];
            }

            // For East Central Integrated School
            $lrn_eastcentral_query = "SELECT COUNT(*) AS lrn_count
                                    FROM $table_name
                                    WHERE school = 'East Central Integrated School' AND year = $school_year";
            $lrn_eastcentral_result = $conn->query($lrn_eastcentral_query);
            if ($lrn_eastcentral_result->num_rows > 0) {
                $lrn_eastcentral_row = $lrn_eastcentral_result->fetch_assoc();
                $eastcentralstudents += $lrn_eastcentral_row["lrn_count"];
            }

            // For Federico N. Ceralde School Integrated School
            $lrn_ceralde_query = "SELECT COUNT(*) AS lrn_count
                                FROM $table_name
                                WHERE school = 'Federico N. Ceralde School Integrated School' AND year = $school_year";
            $lrn_ceralde_result = $conn->query($lrn_ceralde_query);
            if ($lrn_ceralde_result->num_rows > 0) {
                $lrn_ceralde_row = $lrn_ceralde_result->fetch_assoc();
                $ceraldeschoolstudents += $lrn_ceralde_row["lrn_count"];
            }

            // For Gen. Gregorio Del Pilar Elementary School
            $lrn_gregorio_query = "SELECT COUNT(*) AS lrn_count
                                FROM $table_name
                                WHERE school = 'Gen. Gregorio Del Pilar Elementary School' AND year = $school_year";
            $lrn_gregorio_result = $conn->query($lrn_gregorio_query);
            if ($lrn_gregorio_result->num_rows > 0) {
                $lrn_gregorio_row = $lrn_gregorio_result->fetch_assoc();
                $gregoriodelpilarstudents += $lrn_gregorio_row["lrn_count"];
            }

            // For Juan L. Siapno Elementary School
            $lrn_siapno_query = "SELECT COUNT(*) AS lrn_count
                                FROM $table_name
                                WHERE school = 'Juan L. Siapno Elementary School' AND year = $school_year";
            $lrn_siapno_result = $conn->query($lrn_siapno_query);
            if ($lrn_siapno_result->num_rows > 0) {
                $lrn_siapno_row = $lrn_siapno_result->fetch_assoc();
                $siapnostudents += $lrn_siapno_row["lrn_count"];
            }

            // For Juan P. Guadiz Elementary School
            $lrn_guadiz_query = "SELECT COUNT(*) AS lrn_count
                                FROM $table_name
                                WHERE school = 'Juan P. Guadiz Elementary School' AND year = $school_year";
            $lrn_guadiz_result = $conn->query($lrn_guadiz_query);
            if ($lrn_guadiz_result->num_rows > 0) {
                $lrn_guadiz_row = $lrn_guadiz_result->fetch_assoc();
                $guadizstudents += $lrn_guadiz_row["lrn_count"];
            }

            // For Lasip Grande Elementary School
            $lrn_lasip_query = "SELECT COUNT(*) AS lrn_count
                                FROM $table_name
                                WHERE school = 'Lasip Grande Elementary School' AND year = $school_year";
            $lrn_lasip_result = $conn->query($lrn_lasip_query);
            if ($lrn_lasip_result->num_rows > 0) {
                $lrn_lasip_row = $lrn_lasip_result->fetch_assoc();
                $lasipgrandestudents += $lrn_lasip_row["lrn_count"];
            }

            // For Leon-Francisco Elementary School
            $lrn_leon_query = "SELECT COUNT(*) AS lrn_count
                            FROM $table_name
                            WHERE school = 'Leon-Francisco Elementary School' AND year = $school_year";
            $lrn_leon_result = $conn->query($lrn_leon_query);
            if ($lrn_leon_result->num_rows > 0) {
                $lrn_leon_row = $lrn_leon_result->fetch_assoc();
                $leonfranciscostudents += $lrn_leon_row["lrn_count"];
            }

            // For Lomboy Elementary School
            $lrn_lomboy_query = "SELECT COUNT(*) AS lrn_count
                                FROM $table_name
                                WHERE school = 'Lomboy Elementary School' AND year = $school_year";
            $lrn_lomboy_result = $conn->query($lrn_lomboy_query);
            if ($lrn_lomboy_result->num_rows > 0) {
                $lrn_lomboy_row = $lrn_lomboy_result->fetch_assoc();
                $lomboystudents += $lrn_lomboy_row["lrn_count"];
            }

            // For Lucao Elementary School
            $lrn_lucao_query = "SELECT COUNT(*) AS lrn_count
                                FROM $table_name
                                WHERE school = 'Lucao Elementary School' AND year = $school_year";
            $lrn_lucao_result = $conn->query($lrn_lucao_query);
            if ($lrn_lucao_result->num_rows > 0) {
                $lrn_lucao_row = $lrn_lucao_result->fetch_assoc();
                $lucaostudents += $lrn_lucao_row["lrn_count"];
            }

            // For Malued Sur Elementary School
            $lrn_malued_query = "SELECT COUNT(*) AS lrn_count
                                FROM $table_name
                                WHERE school = 'Malued Sur Elementary School' AND year = $school_year";
            $lrn_malued_result = $conn->query($lrn_malued_query);
            if ($lrn_malued_result->num_rows > 0) {
                $lrn_malued_row = $lrn_malued_result->fetch_assoc();
                $maluedstudents += $lrn_malued_row["lrn_count"];
            }

            // For Mamalingling Elementary School
            $lrn_mamalingling_query = "SELECT COUNT(*) AS lrn_count
                                    FROM $table_name
                                    WHERE school = 'Mamalingling Elementary School' AND year = $school_year";
            $lrn_mamalingling_result = $conn->query($lrn_mamalingling_query);
            if ($lrn_mamalingling_result->num_rows > 0) {
                $lrn_mamalingling_row = $lrn_mamalingling_result->fetch_assoc();
                $mamalinglingstudents += $lrn_mamalingling_row["lrn_count"];
            }

            // For Mangin-Tebeng Elementary School
            $lrn_mangintebeng_query = "SELECT COUNT(*) AS lrn_count
                                    FROM $table_name
                                    WHERE school = 'Mangin-Tebeng Elementary School' AND year = $school_year";
            $lrn_mangintebeng_result = $conn->query($lrn_mangintebeng_query);
            if ($lrn_mangintebeng_result->num_rows > 0) {
                $lrn_mangintebeng_row = $lrn_mangintebeng_result->fetch_assoc();
                $mangintebengstudents += $lrn_mangintebeng_row["lrn_count"];
            }

            // For North Central Elementary School
            $lrn_northcentral_query = "SELECT COUNT(*) AS lrn_count
                                    FROM $table_name
                                    WHERE school = 'North Central Elementary School' AND year = $school_year";
            $lrn_northcentral_result = $conn->query($lrn_northcentral_query);
            if ($lrn_northcentral_result->num_rows > 0) {
                $lrn_northcentral_row = $lrn_northcentral_result->fetch_assoc();
                $northcentralstudents += $lrn_northcentral_row["lrn_count"];
            }

            // For Pantal Elementary School
            $lrn_pantal_query = "SELECT COUNT(*) AS lrn_count
                                FROM $table_name
                                WHERE school = 'Pantal Elementary School' AND year = $school_year";
            $lrn_pantal_result = $conn->query($lrn_pantal_query);
            if ($lrn_pantal_result->num_rows > 0) {
                $lrn_pantal_row = $lrn_pantal_result->fetch_assoc();
                $pantalstudents += $lrn_pantal_row["lrn_count"];
            }

            // For Pascuala G. Villamil Elementary School
            $lrn_villamil_query = "SELECT COUNT(*) AS lrn_count
                                FROM $table_name
                                WHERE school = 'Pascuala G. Villamil Elementary School' AND year = $school_year";
            $lrn_villamil_result = $conn->query($lrn_villamil_query);
            if ($lrn_villamil_result->num_rows > 0) {
                $lrn_villamil_row = $lrn_villamil_result->fetch_assoc();
                $villamilstudents += $lrn_villamil_row["lrn_count"];
            }

            // For Pogo-Lasip Elementary School
            $lrn_pogolasip_query = "SELECT COUNT(*) AS lrn_count
                                    FROM $table_name
                                    WHERE school = 'Pogo-Lasip Elementary School' AND year = $school_year";
            $lrn_pogolasip_result = $conn->query($lrn_pogolasip_query);
            if ($lrn_pogolasip_result->num_rows > 0) {
                $lrn_pogolasip_row = $lrn_pogolasip_result->fetch_assoc();
                $pogolasipstudents += $lrn_pogolasip_row["lrn_count"];
            }

            // For Pugaro Integrated School
            $lrn_pugaro_query = "SELECT COUNT(*) AS lrn_count
                                FROM $table_name
                                WHERE school = 'Pugaro Integrated School' AND year = $school_year";
            $lrn_pugaro_result = $conn->query($lrn_pugaro_query);
            if ($lrn_pugaro_result->num_rows > 0) {
                $lrn_pugaro_row = $lrn_pugaro_result->fetch_assoc();
                $pugarostudents += $lrn_pugaro_row["lrn_count"];
            }

            // For Sabangan Elementary School
            $lrn_sabangan_query = "SELECT COUNT(*) AS lrn_count
                                FROM $table_name
                                WHERE school = 'Sabangan Elementary School' AND year = $school_year";
            $lrn_sabangan_result = $conn->query($lrn_sabangan_query);
            if ($lrn_sabangan_result->num_rows > 0) {
                $lrn_sabangan_row = $lrn_sabangan_result->fetch_assoc();
                $sabanganstudents += $lrn_sabangan_row["lrn_count"];
            }

            // For Salapingao Elementary School
            $lrn_salapingao_query = "SELECT COUNT(*) AS lrn_count
                                    FROM $table_name
                                    WHERE school = 'Salapingao Elementary School' AND year = $school_year";
            $lrn_salapingao_result = $conn->query($lrn_salapingao_query);
            if ($lrn_salapingao_result->num_rows > 0) {
                $lrn_salapingao_row = $lrn_salapingao_result->fetch_assoc();
                $salapingaostudents += $lrn_salapingao_row["lrn_count"];
            }

            // For Salisay Elementary School
            $lrn_salisay_query = "SELECT COUNT(*) AS lrn_count
                                FROM $table_name
                                WHERE school = 'Salisay Elementary School' AND year = $school_year";
            $lrn_salisay_result = $conn->query($lrn_salisay_query);
            if ($lrn_salisay_result->num_rows > 0) {
                $lrn_salisay_row = $lrn_salisay_result->fetch_assoc();
                $salisaystudents += $lrn_salisay_row["lrn_count"];
            }

            // For Suit Elementary School
            $lrn_suit_query = "SELECT COUNT(*) AS lrn_count
                            FROM $table_name
                            WHERE school = 'Suit Elementary School' AND year = $school_year";
            $lrn_suit_result = $conn->query($lrn_suit_query);
            if ($lrn_suit_result->num_rows > 0) {
                $lrn_suit_row = $lrn_suit_result->fetch_assoc();
                $suitstudents += $lrn_suit_row["lrn_count"];
            }

            // For T. Ayson Rosario Elementary School
            $lrn_rosario_query = "SELECT COUNT(*) AS lrn_count
                                FROM $table_name
                                WHERE school = 'T. Ayson Rosario Elementary School' AND year = $school_year";
            $lrn_rosario_result = $conn->query($lrn_rosario_query);
            if ($lrn_rosario_result->num_rows > 0) {
                $lrn_rosario_row = $lrn_rosario_result->fetch_assoc();
                $rosariostudents += $lrn_rosario_row["lrn_count"];
            }

            // For Tambac Elementary School
            $lrn_tambac_query = "SELECT COUNT(*) AS lrn_count
                                FROM $table_name
                                WHERE school = 'Tambac Elementary School' AND year = $school_year";
            $lrn_tambac_result = $conn->query($lrn_tambac_query);
            if ($lrn_tambac_result->num_rows > 0) {
                $lrn_tambac_row = $lrn_tambac_result->fetch_assoc();
                $tambacstudents += $lrn_tambac_row["lrn_count"];
            }

            // For Tebeng Elementary School
            $lrn_tebeng_query = "SELECT COUNT(*) AS lrn_count
                                FROM $table_name
                                WHERE school = 'Tebeng Elementary School' AND year = $school_year";
            $lrn_tebeng_result = $conn->query($lrn_tebeng_query);
            if ($lrn_tebeng_result->num_rows > 0) {
                $lrn_tebeng_row = $lrn_tebeng_result->fetch_assoc();
                $tebengstudents += $lrn_tebeng_row["lrn_count"];
            }

            // For Victoria Q. Zarate Elementary School
            $lrn_zarate_query = "SELECT COUNT(*) AS lrn_count
                                FROM $table_name
                                WHERE school = 'Victoria Q. Zarate Elementary School' AND year = $school_year";
            $lrn_zarate_result = $conn->query($lrn_zarate_query);
            if ($lrn_zarate_result->num_rows > 0) {
                $lrn_zarate_row = $lrn_zarate_result->fetch_assoc();
                $zaratestudents += $lrn_zarate_row["lrn_count"];
            }
            $lrn_westcentral1_query = "SELECT COUNT(*) AS lrn_count
                                    FROM $table_name
                                    WHERE school = 'West Central I Elementary School' AND year = $school_year";
            $lrn_westcentral1_result = $conn->query($lrn_westcentral1_query);
            if ($lrn_westcentral1_result->num_rows > 0) {
                $lrn_westcentral1_row = $lrn_westcentral1_result->fetch_assoc();
                $westcentral1students += $lrn_westcentral1_row["lrn_count"];
            }
            $lrn_westcentral2_query = "SELECT COUNT(*) AS lrn_count
                                    FROM $table_name
                                    WHERE school = 'West Central II Elementary School' AND year = $school_year";
            $lrn_westcentral2_result = $conn->query($lrn_westcentral2_query);
            if ($lrn_westcentral2_result->num_rows > 0) {
                $lrn_westcentral2_row = $lrn_westcentral2_result->fetch_assoc();
                $westcentral2students += $lrn_westcentral2_row["lrn_count"];
            }
        }
        }
        $conn->close();
?>
<?php
    include('../database.php');

    // Set the default quarter to 1 if it's not already set in $_POST
    $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
    $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;

    // Define each school individually
    $bacayaoSchool = "Bacayao Sur Elementary School";
    $blissSchool = "Bliss Elementary School";
    $bolosanSchool = "Bolosan Elementary School";
    $bonuanBoquigSchool = "Bonuan Boquig Elementary School";
    $calmaySchool = "Calmay Elementary School";
    $caraelSchool = "Carael Elementary School";
    $caranglaanSchool = "Caranglaan Elementary School";
    $eastCentralSchool = "East Central Integrated School";
    $federicoCeraldeSchool = "Federico N. Ceralde School Integrated School";
    $gregorioPilarSchool = "Gen. Gregorio Del Pilar Elementary School";
    $juanSiapnoSchool = "Juan L. Siapno Elementary School";
    $juanGuadizSchool = "Juan P. Guadiz Elementary School";
    $lasipGrandeSchool = "Lasip Grande Elementary School";
    $leonFranciscoSchool = "Leon-Francisco Elementary School";
    $lomboySchool = "Lomboy Elementary School";
    $lucaoSchool = "Lucao Elementary School";
    $maluedSurSchool = "Malued Sur Elementary School";
    $mamalinglingSchool = "Mamalingling Elementary School";
    $manginTebengSchool = "Mangin-Tebeng Elementary School";
    $northCentralSchool = "North Central Elementary School";
    $pantalSchool = "Pantal Elementary School";
    $pascualaVillamilSchool = "Pascuala G. Villamil Elementary School";
    $pogoLasipSchool = "Pogo-Lasip Elementary School";
    $pugaroIntegratedSchool = "Pugaro Integrated School";
    $sabanganSchool = "Sabangan Elementary School";
    $salapingaoSchool = "Salapingao Elementary School";
    $salisaySchool = "Salisay Elementary School";
    $suitSchool = "Suit Elementary School";
    $aysonRosarioSchool = "T. Ayson Rosario Elementary School";
    $tambacSchool = "Tambac Elementary School";
    $tebengSchool = "Tebeng Elementary School";
    $zarateSchool = "Victoria Q. Zarate Elementary School";
    $westCentral1School = "West Central I Elementary School";
    $westCentral2School = "West Central II Elementary School";

    // SQL queries to count LRN for each school and selected quarter
    $sqlBacayaoEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$bacayaoSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlBlissEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$blissSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlBolosanEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$bolosanSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlBonuanBoquigEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$bonuanBoquigSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlCalmayEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$calmaySchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlCaraelEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$caraelSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlCaranglaanEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$caranglaanSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlEastCentralEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$eastCentralSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlFedericoCeraldeEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$federicoCeraldeSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlGregorioPilarEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$gregorioPilarSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlJuanSiapnoEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$juanSiapnoSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlJuanGuadizEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$juanGuadizSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlLasipGrandeEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$lasipGrandeSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlLeonFranciscoEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$leonFranciscoSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlLomboyEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$lomboySchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlLucaoEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$lucaoSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlMaluedSurEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$maluedSurSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlMamalinglingEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$mamalinglingSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlManginTebengEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$manginTebengSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlNorthCentralEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$northCentralSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlPantalEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$pantalSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlPascualaVillamilEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$pascualaVillamilSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlPogoLasipEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$pogoLasipSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlPugaroIntegratedEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$pugaroIntegratedSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlSabanganEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$sabanganSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlSalapingaoEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$salapingaoSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlSalisayEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$salisaySchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlSuitEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$suitSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlAysonRosarioEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$aysonRosarioSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlTambacEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$tambacSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlTebengEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$tebengSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlZarateEnglish = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$zarateSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlWestCentral1English = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$westCentral1School' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlWestCentral2English = "SELECT COUNT(lrn) AS lrn_count FROM academic_english WHERE school = '$westCentral2School' AND quarter = $selectedQuarter AND year = $school_year";

    // Execute queries
    $resultBacayaoEnglish = $conn->query($sqlBacayaoEnglish);
    $resultBlissEnglish = $conn->query($sqlBlissEnglish);
    $resultBolosanEnglish = $conn->query($sqlBolosanEnglish);
    $resultBonuanBoquigEnglish = $conn->query($sqlBonuanBoquigEnglish);
    $resultCalmayEnglish = $conn->query($sqlCalmayEnglish);
    $resultCaraelEnglish = $conn->query($sqlCaraelEnglish);
    $resultCaranglaanEnglish = $conn->query($sqlCaranglaanEnglish);
    $resultEastCentralEnglish = $conn->query($sqlEastCentralEnglish);
    $resultFedericoCeraldeEnglish = $conn->query($sqlFedericoCeraldeEnglish);
    $resultGregorioPilarEnglish = $conn->query($sqlGregorioPilarEnglish);
    $resultJuanSiapnoEnglish = $conn->query($sqlJuanSiapnoEnglish);
    $resultJuanGuadizEnglish = $conn->query($sqlJuanGuadizEnglish);
    $resultLasipGrandeEnglish = $conn->query($sqlLasipGrandeEnglish);
    $resultLeonFranciscoEnglish = $conn->query($sqlLeonFranciscoEnglish);
    $resultLomboyEnglish = $conn->query($sqlLomboyEnglish);
    $resultLucaoEnglish = $conn->query($sqlLucaoEnglish);
    $resultMaluedSurEnglish = $conn->query($sqlMaluedSurEnglish);
    $resultMamalinglingEnglish = $conn->query($sqlMamalinglingEnglish);
    $resultManginTebengEnglish = $conn->query($sqlManginTebengEnglish);
    $resultNorthCentralEnglish = $conn->query($sqlNorthCentralEnglish);
    $resultPantalEnglish = $conn->query($sqlPantalEnglish);
    $resultPascualaVillamilEnglish = $conn->query($sqlPascualaVillamilEnglish);
    $resultPogoLasipEnglish = $conn->query($sqlPogoLasipEnglish);
    $resultPugaroIntegratedEnglish = $conn->query($sqlPugaroIntegratedEnglish);
    $resultSabanganEnglish = $conn->query($sqlSabanganEnglish);
    $resultSalapingaoEnglish = $conn->query($sqlSalapingaoEnglish);
    $resultSalisayEnglish = $conn->query($sqlSalisayEnglish);
    $resultSuitEnglish = $conn->query($sqlSuitEnglish);
    $resultAysonRosarioEnglish = $conn->query($sqlAysonRosarioEnglish);
    $resultTambacEnglish = $conn->query($sqlTambacEnglish);
    $resultTebengEnglish = $conn->query($sqlTebengEnglish);
    $resultZarateEnglish = $conn->query($sqlZarateEnglish);
    $resultWestCentral1English = $conn->query($sqlWestCentral1English);
    $resultWestCentral2English = $conn->query($sqlWestCentral2English);

    // Check if queries executed successfully
    if ($resultBacayaoEnglish && $resultBlissEnglish && $resultBolosanEnglish && $resultBonuanBoquigEnglish && $resultCalmayEnglish && $resultCaraelEnglish && $resultCaranglaanEnglish && $resultEastCentralEnglish && $resultFedericoCeraldeEnglish && $resultGregorioPilarEnglish && $resultJuanSiapnoEnglish && $resultJuanGuadizEnglish && $resultLasipGrandeEnglish && $resultLeonFranciscoEnglish && $resultLomboyEnglish && $resultLucaoEnglish && $resultMaluedSurEnglish && $resultMamalinglingEnglish && $resultManginTebengEnglish && $resultNorthCentralEnglish && $resultPantalEnglish && $resultPascualaVillamilEnglish && $resultPogoLasipEnglish && $resultPugaroIntegratedEnglish && $resultSabanganEnglish && $resultSalapingaoEnglish && $resultSalisayEnglish && $resultSuitEnglish && $resultAysonRosarioEnglish && $resultTambacEnglish && $resultTebengEnglish && $resultZarateEnglish && $resultWestCentral1English && $resultWestCentral2English) {
        // Fetch counts
        $rowBacayaoEnglish = $resultBacayaoEnglish->fetch_assoc();
        $rowBlissEnglish = $resultBlissEnglish->fetch_assoc();
        $rowBolosanEnglish = $resultBolosanEnglish->fetch_assoc();
        $rowBonuanBoquigEnglish = $resultBonuanBoquigEnglish->fetch_assoc();
        $rowCalmayEnglish = $resultCalmayEnglish->fetch_assoc();
        $rowCaraelEnglish = $resultCaraelEnglish->fetch_assoc();
        $rowCaranglaanEnglish = $resultCaranglaanEnglish->fetch_assoc();
        $rowEastCentralEnglish = $resultEastCentralEnglish->fetch_assoc();
        $rowFedericoCeraldeEnglish = $resultFedericoCeraldeEnglish->fetch_assoc();
        $rowGregorioPilarEnglish = $resultGregorioPilarEnglish->fetch_assoc();
        $rowJuanSiapnoEnglish = $resultJuanSiapnoEnglish->fetch_assoc();
        $rowJuanGuadizEnglish = $resultJuanGuadizEnglish->fetch_assoc();
        $rowLasipGrandeEnglish = $resultLasipGrandeEnglish->fetch_assoc();
        $rowLeonFranciscoEnglish = $resultLeonFranciscoEnglish->fetch_assoc();
        $rowLomboyEnglish = $resultLomboyEnglish->fetch_assoc();
        $rowLucaoEnglish = $resultLucaoEnglish->fetch_assoc();
        $rowMaluedSurEnglish = $resultMaluedSurEnglish->fetch_assoc();
        $rowMamalinglingEnglish = $resultMamalinglingEnglish->fetch_assoc();
        $rowManginTebengEnglish = $resultManginTebengEnglish->fetch_assoc();
        $rowNorthCentralEnglish = $resultNorthCentralEnglish->fetch_assoc();
        $rowPantalEnglish = $resultPantalEnglish->fetch_assoc();
        $rowPascualaVillamilEnglish = $resultPascualaVillamilEnglish->fetch_assoc();
        $rowPogoLasipEnglish = $resultPogoLasipEnglish->fetch_assoc();
        $rowPugaroIntegratedEnglish = $resultPugaroIntegratedEnglish->fetch_assoc();
        $rowSabanganEnglish = $resultSabanganEnglish->fetch_assoc();
        $rowSalapingaoEnglish = $resultSalapingaoEnglish->fetch_assoc();
        $rowSalisayEnglish = $resultSalisayEnglish->fetch_assoc();
        $rowSuitEnglish = $resultSuitEnglish->fetch_assoc();
        $rowAysonRosarioEnglish = $resultAysonRosarioEnglish->fetch_assoc();
        $rowTambacEnglish = $resultTambacEnglish->fetch_assoc();
        $rowTebengEnglish = $resultTebengEnglish->fetch_assoc();
        $rowZarateEnglish = $resultZarateEnglish->fetch_assoc();
        $rowWestCentral1English = $resultWestCentral1English->fetch_assoc();
        $rowWestCentral2English = $resultWestCentral2English->fetch_assoc();

        // Store counts in variables
        $bacayaoenglish = $rowBacayaoEnglish['lrn_count'];
        $blissenglish = $rowBlissEnglish['lrn_count'];
        $bolosanenglish = $rowBolosanEnglish['lrn_count'];
        $bonuanBoquigenglish = $rowBonuanBoquigEnglish['lrn_count'];
        $calmayenglish = $rowCalmayEnglish['lrn_count'];
        $caraelenglish = $rowCaraelEnglish['lrn_count'];
        $caranglaanenglish = $rowCaranglaanEnglish['lrn_count'];
        $eastCentralenglish = $rowEastCentralEnglish['lrn_count'];
        $federicoCeraldeenglish = $rowFedericoCeraldeEnglish['lrn_count'];
        $gregorioPilarenglish = $rowGregorioPilarEnglish['lrn_count'];
        $juanSiapnoenglish = $rowJuanSiapnoEnglish['lrn_count'];
        $juanGuadizenglish = $rowJuanGuadizEnglish['lrn_count'];
        $lasipGrandeenglish = $rowLasipGrandeEnglish['lrn_count'];
        $leonFranciscoenglish = $rowLeonFranciscoEnglish['lrn_count'];
        $lomboyenglish = $rowLomboyEnglish['lrn_count'];
        $lucaoenglish = $rowLucaoEnglish['lrn_count'];
        $maluedSurenglish = $rowMaluedSurEnglish['lrn_count'];
        $mamalinglingenglish = $rowMamalinglingEnglish['lrn_count'];
        $manginTebengenglish = $rowManginTebengEnglish['lrn_count'];
        $northCentralenglish = $rowNorthCentralEnglish['lrn_count'];
        $pantalenglish = $rowPantalEnglish['lrn_count'];
        $pascualaVillamilenglish = $rowPascualaVillamilEnglish['lrn_count'];
        $pogoLasipenglish = $rowPogoLasipEnglish['lrn_count'];
        $pugaroIntegratedenglish = $rowPugaroIntegratedEnglish['lrn_count'];
        $sabanganenglish = $rowSabanganEnglish['lrn_count'];
        $salapingaoenglish = $rowSalapingaoEnglish['lrn_count'];
        $salisayenglish = $rowSalisayEnglish['lrn_count'];
        $suitenglish = $rowSuitEnglish['lrn_count'];
        $aysonRosarioenglish = $rowAysonRosarioEnglish['lrn_count'];
        $tambacenglish = $rowTambacEnglish['lrn_count'];
        $tebengenglish = $rowTebengEnglish['lrn_count'];
        $zarateenglish = $rowZarateEnglish['lrn_count'];
        $westCentral1english = $rowWestCentral1English['lrn_count'];
        $westCentral2english = $rowWestCentral2English['lrn_count'];

    }
    $conn->close();
?>
<?php
    include('../database.php');

    // Set the default quarter to 1 if it's not already set in $_POST
    $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
    $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;

    // Define each school individually
    $bacayaoSchool = "Bacayao Sur Elementary School";
    $blissSchool = "Bliss Elementary School";
    $bolosanSchool = "Bolosan Elementary School";
    $bonuanBoquigSchool = "Bonuan Boquig Elementary School";
    $calmaySchool = "Calmay Elementary School";
    $caraelSchool = "Carael Elementary School";
    $caranglaanSchool = "Caranglaan Elementary School";
    $eastCentralSchool = "East Central Integrated School";
    $federicoCeraldeSchool = "Federico N. Ceralde School Integrated School";
    $gregorioPilarSchool = "Gen. Gregorio Del Pilar Elementary School";
    $juanSiapnoSchool = "Juan L. Siapno Elementary School";
    $juanGuadizSchool = "Juan P. Guadiz Elementary School";
    $lasipGrandeSchool = "Lasip Grande Elementary School";
    $leonFranciscoSchool = "Leon-Francisco Elementary School";
    $lomboySchool = "Lomboy Elementary School";
    $lucaoSchool = "Lucao Elementary School";
    $maluedSurSchool = "Malued Sur Elementary School";
    $mamalinglingSchool = "Mamalingling Elementary School";
    $manginTebengSchool = "Mangin-Tebeng Elementary School";
    $northCentralSchool = "North Central Elementary School";
    $pantalSchool = "Pantal Elementary School";
    $pascualaVillamilSchool = "Pascuala G. Villamil Elementary School";
    $pogoLasipSchool = "Pogo-Lasip Elementary School";
    $pugaroIntegratedSchool = "Pugaro Integrated School";
    $sabanganSchool = "Sabangan Elementary School";
    $salapingaoSchool = "Salapingao Elementary School";
    $salisaySchool = "Salisay Elementary School";
    $suitSchool = "Suit Elementary School";
    $aysonRosarioSchool = "T. Ayson Rosario Elementary School";
    $tambacSchool = "Tambac Elementary School";
    $tebengSchool = "Tebeng Elementary School";
    $zarateSchool = "Victoria Q. Zarate Elementary School";
    $westCentral1School = "West Central I Elementary School";
    $westCentral2School = "West Central II Elementary School";

    // SQL queries to count LRN for each school and selected quarter
    $sqlBacayaoFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$bacayaoSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlBlissFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$blissSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlBolosanFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$bolosanSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlBonuanBoquigFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$bonuanBoquigSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlCalmayFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$calmaySchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlCaraelFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$caraelSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlCaranglaanFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$caranglaanSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlEastCentralFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$eastCentralSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlFedericoCeraldeFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$federicoCeraldeSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlGregorioPilarFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$gregorioPilarSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlJuanSiapnoFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$juanSiapnoSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlJuanGuadizFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$juanGuadizSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlLasipGrandeFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$lasipGrandeSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlLeonFranciscoFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$leonFranciscoSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlLomboyFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$lomboySchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlLucaoFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$lucaoSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlMaluedSurFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$maluedSurSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlMamalinglingFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$mamalinglingSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlManginTebengFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$manginTebengSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlNorthCentralFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$northCentralSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlPantalFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$pantalSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlPascualaVillamilFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$pascualaVillamilSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlPogoLasipFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$pogoLasipSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlPugaroIntegratedFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$pugaroIntegratedSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlSabanganFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$sabanganSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlSalapingaoFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$salapingaoSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlSalisayFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$salisaySchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlSuitFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$suitSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlAysonRosarioFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$aysonRosarioSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlTambacFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$tambacSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlTebengFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$tebengSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlZarateFilipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$zarateSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlWestCentral1Filipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$westCentral1School' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlWestCentral2Filipino = "SELECT COUNT(lrn) AS lrn_count FROM academic_filipino WHERE school = '$westCentral2School' AND quarter = $selectedQuarter AND year = $school_year";

    // Execute queries
    $resultBacayaoFilipino = $conn->query($sqlBacayaoFilipino);
    $resultBlissFilipino = $conn->query($sqlBlissFilipino);
    $resultBolosanFilipino = $conn->query($sqlBolosanFilipino);
    $resultBonuanBoquigFilipino = $conn->query($sqlBonuanBoquigFilipino);
    $resultCalmayFilipino = $conn->query($sqlCalmayFilipino);
    $resultCaraelFilipino = $conn->query($sqlCaraelFilipino);
    $resultCaranglaanFilipino = $conn->query($sqlCaranglaanFilipino);
    $resultEastCentralFilipino = $conn->query($sqlEastCentralFilipino);
    $resultFedericoCeraldeFilipino = $conn->query($sqlFedericoCeraldeFilipino);
    $resultGregorioPilarFilipino = $conn->query($sqlGregorioPilarFilipino);
    $resultJuanSiapnoFilipino = $conn->query($sqlJuanSiapnoFilipino);
    $resultJuanGuadizFilipino = $conn->query($sqlJuanGuadizFilipino);
    $resultLasipGrandeFilipino = $conn->query($sqlLasipGrandeFilipino);
    $resultLeonFranciscoFilipino = $conn->query($sqlLeonFranciscoFilipino);
    $resultLomboyFilipino = $conn->query($sqlLomboyFilipino);
    $resultLucaoFilipino = $conn->query($sqlLucaoFilipino);
    $resultMaluedSurFilipino = $conn->query($sqlMaluedSurFilipino);
    $resultMamalinglingFilipino = $conn->query($sqlMamalinglingFilipino);
    $resultManginTebengFilipino = $conn->query($sqlManginTebengFilipino);
    $resultNorthCentralFilipino = $conn->query($sqlNorthCentralFilipino);
    $resultPantalFilipino = $conn->query($sqlPantalFilipino);
    $resultPascualaVillamilFilipino = $conn->query($sqlPascualaVillamilFilipino);
    $resultPogoLasipFilipino = $conn->query($sqlPogoLasipFilipino);
    $resultPugaroIntegratedFilipino = $conn->query($sqlPugaroIntegratedFilipino);
    $resultSabanganFilipino = $conn->query($sqlSabanganFilipino);
    $resultSalapingaoFilipino = $conn->query($sqlSalapingaoFilipino);
    $resultSalisayFilipino = $conn->query($sqlSalisayFilipino);
    $resultSuitFilipino = $conn->query($sqlSuitFilipino);
    $resultAysonRosarioFilipino = $conn->query($sqlAysonRosarioFilipino);
    $resultTambacFilipino = $conn->query($sqlTambacFilipino);
    $resultTebengFilipino = $conn->query($sqlTebengFilipino);
    $resultZarateFilipino = $conn->query($sqlZarateFilipino);
    $resultWestCentral1Filipino = $conn->query($sqlWestCentral1Filipino);
    $resultWestCentral2Filipino = $conn->query($sqlWestCentral2Filipino);

    // Check if queries executed successfully
    if ($resultBacayaoFilipino && $resultBlissFilipino && $resultBolosanFilipino && $resultBonuanBoquigFilipino && $resultCalmayFilipino && $resultCaraelFilipino && $resultCaranglaanFilipino && $resultEastCentralFilipino && $resultFedericoCeraldeFilipino && $resultGregorioPilarFilipino && $resultJuanSiapnoFilipino && $resultJuanGuadizFilipino && $resultLasipGrandeFilipino && $resultLeonFranciscoFilipino && $resultLomboyFilipino && $resultLucaoFilipino && $resultMaluedSurFilipino && $resultMamalinglingFilipino && $resultManginTebengFilipino && $resultNorthCentralFilipino && $resultPantalFilipino && $resultPascualaVillamilFilipino && $resultPogoLasipFilipino && $resultPugaroIntegratedFilipino && $resultSabanganFilipino && $resultSalapingaoFilipino && $resultSalisayFilipino && $resultSuitFilipino && $resultAysonRosarioFilipino && $resultTambacFilipino && $resultTebengFilipino && $resultZarateFilipino && $resultWestCentral1Filipino && $resultWestCentral2Filipino) {
        // Fetch counts
        $rowBacayaoFilipino = $resultBacayaoFilipino->fetch_assoc();
        $rowBlissFilipino = $resultBlissFilipino->fetch_assoc();
        $rowBolosanFilipino = $resultBolosanFilipino->fetch_assoc();
        $rowBonuanBoquigFilipino = $resultBonuanBoquigFilipino->fetch_assoc();
        $rowCalmayFilipino = $resultCalmayFilipino->fetch_assoc();
        $rowCaraelFilipino = $resultCaraelFilipino->fetch_assoc();
        $rowCaranglaanFilipino = $resultCaranglaanFilipino->fetch_assoc();
        $rowEastCentralFilipino = $resultEastCentralFilipino->fetch_assoc();
        $rowFedericoCeraldeFilipino = $resultFedericoCeraldeFilipino->fetch_assoc();
        $rowGregorioPilarFilipino = $resultGregorioPilarFilipino->fetch_assoc();
        $rowJuanSiapnoFilipino = $resultJuanSiapnoFilipino->fetch_assoc();
        $rowJuanGuadizFilipino = $resultJuanGuadizFilipino->fetch_assoc();
        $rowLasipGrandeFilipino = $resultLasipGrandeFilipino->fetch_assoc();
        $rowLeonFranciscoFilipino = $resultLeonFranciscoFilipino->fetch_assoc();
        $rowLomboyFilipino = $resultLomboyFilipino->fetch_assoc();
        $rowLucaoFilipino = $resultLucaoFilipino->fetch_assoc();
        $rowMaluedSurFilipino = $resultMaluedSurFilipino->fetch_assoc();
        $rowMamalinglingFilipino = $resultMamalinglingFilipino->fetch_assoc();
        $rowManginTebengFilipino = $resultManginTebengFilipino->fetch_assoc();
        $rowNorthCentralFilipino = $resultNorthCentralFilipino->fetch_assoc();
        $rowPantalFilipino = $resultPantalFilipino->fetch_assoc();
        $rowPascualaVillamilFilipino = $resultPascualaVillamilFilipino->fetch_assoc();
        $rowPogoLasipFilipino = $resultPogoLasipFilipino->fetch_assoc();
        $rowPugaroIntegratedFilipino = $resultPugaroIntegratedFilipino->fetch_assoc();
        $rowSabanganFilipino = $resultSabanganFilipino->fetch_assoc();
        $rowSalapingaoFilipino = $resultSalapingaoFilipino->fetch_assoc();
        $rowSalisayFilipino = $resultSalisayFilipino->fetch_assoc();
        $rowSuitFilipino = $resultSuitFilipino->fetch_assoc();
        $rowAysonRosarioFilipino = $resultAysonRosarioFilipino->fetch_assoc();
        $rowTambacFilipino = $resultTambacFilipino->fetch_assoc();
        $rowTebengFilipino = $resultTebengFilipino->fetch_assoc();
        $rowZarateFilipino = $resultZarateFilipino->fetch_assoc();
        $rowWestCentral1Filipino = $resultWestCentral1Filipino->fetch_assoc();
        $rowWestCentral2Filipino = $resultWestCentral2Filipino->fetch_assoc();

        // Store counts in variables
        $bacayaoFilipino = $rowBacayaoFilipino['lrn_count'];
        $blissFilipino = $rowBlissFilipino['lrn_count'];
        $bolosanFilipino = $rowBolosanFilipino['lrn_count'];
        $bonuanBoquigFilipino = $rowBonuanBoquigFilipino['lrn_count'];
        $calmayFilipino = $rowCalmayFilipino['lrn_count'];
        $caraelFilipino = $rowCaraelFilipino['lrn_count'];
        $caranglaanFilipino = $rowCaranglaanFilipino['lrn_count'];
        $eastCentralFilipino = $rowEastCentralFilipino['lrn_count'];
        $federicoCeraldeFilipino = $rowFedericoCeraldeFilipino['lrn_count'];
        $gregorioPilarFilipino = $rowGregorioPilarFilipino['lrn_count'];
        $juanSiapnoFilipino = $rowJuanSiapnoFilipino['lrn_count'];
        $juanGuadizFilipino = $rowJuanGuadizFilipino['lrn_count'];
        $lasipGrandeFilipino = $rowLasipGrandeFilipino['lrn_count'];
        $leonFranciscoFilipino = $rowLeonFranciscoFilipino['lrn_count'];
        $lomboyFilipino = $rowLomboyFilipino['lrn_count'];
        $lucaoFilipino = $rowLucaoFilipino['lrn_count'];
        $maluedSurFilipino = $rowMaluedSurFilipino['lrn_count'];
        $mamalinglingFilipino = $rowMamalinglingFilipino['lrn_count'];
        $manginTebengFilipino = $rowManginTebengFilipino['lrn_count'];
        $northCentralFilipino = $rowNorthCentralFilipino['lrn_count'];
        $pantalFilipino = $rowPantalFilipino['lrn_count'];
        $pascualaVillamilFilipino = $rowPascualaVillamilFilipino['lrn_count'];
        $pogoLasipFilipino = $rowPogoLasipFilipino['lrn_count'];
        $pugaroIntegratedFilipino = $rowPugaroIntegratedFilipino['lrn_count'];
        $sabanganFilipino = $rowSabanganFilipino['lrn_count'];
        $salapingaoFilipino = $rowSalapingaoFilipino['lrn_count'];
        $salisayFilipino = $rowSalisayFilipino['lrn_count'];
        $suitFilipino = $rowSuitFilipino['lrn_count'];
        $aysonRosarioFilipino = $rowAysonRosarioFilipino['lrn_count'];
        $tambacFilipino = $rowTambacFilipino['lrn_count'];
        $tebengFilipino = $rowTebengFilipino['lrn_count'];
        $zarateFilipino = $rowZarateFilipino['lrn_count'];
        $westCentral1Filipino = $rowWestCentral1Filipino['lrn_count'];
        $westCentral2Filipino = $rowWestCentral2Filipino['lrn_count'];
    }
    $conn->close();
?>
<?php
    include('../database.php');

    // Set the default quarter to 1 if it's not already set in $_POST
    $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
    $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;

    // Define each school individually
    $bacayaoSchool = "Bacayao Sur Elementary School";
    $blissSchool = "Bliss Elementary School";
    $bolosanSchool = "Bolosan Elementary School";
    $bonuanBoquigSchool = "Bonuan Boquig Elementary School";
    $calmaySchool = "Calmay Elementary School";
    $caraelSchool = "Carael Elementary School";
    $caranglaanSchool = "Caranglaan Elementary School";
    $eastCentralSchool = "East Central Integrated School";
    $federicoCeraldeSchool = "Federico N. Ceralde School Integrated School";
    $gregorioPilarSchool = "Gen. Gregorio Del Pilar Elementary School";
    $juanSiapnoSchool = "Juan L. Siapno Elementary School";
    $juanGuadizSchool = "Juan P. Guadiz Elementary School";
    $lasipGrandeSchool = "Lasip Grande Elementary School";
    $leonFranciscoSchool = "Leon-Francisco Elementary School";
    $lomboySchool = "Lomboy Elementary School";
    $lucaoSchool = "Lucao Elementary School";
    $maluedSurSchool = "Malued Sur Elementary School";
    $mamalinglingSchool = "Mamalingling Elementary School";
    $manginTebengSchool = "Mangin-Tebeng Elementary School";
    $northCentralSchool = "North Central Elementary School";
    $pantalSchool = "Pantal Elementary School";
    $pascualaVillamilSchool = "Pascuala G. Villamil Elementary School";
    $pogoLasipSchool = "Pogo-Lasip Elementary School";
    $pugaroIntegratedSchool = "Pugaro Integrated School";
    $sabanganSchool = "Sabangan Elementary School";
    $salapingaoSchool = "Salapingao Elementary School";
    $salisaySchool = "Salisay Elementary School";
    $suitSchool = "Suit Elementary School";
    $aysonRosarioSchool = "T. Ayson Rosario Elementary School";
    $tambacSchool = "Tambac Elementary School";
    $tebengSchool = "Tebeng Elementary School";
    $zarateSchool = "Victoria Q. Zarate Elementary School";
    $westCentral1School = "West Central I Elementary School";
    $westCentral2School = "West Central II Elementary School";

    // SQL queries to count LRN for each school and selected quarter
    $sqlBacayaoNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$bacayaoSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlBlissNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$blissSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlBolosanNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$bolosanSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlBonuanBoquigNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$bonuanBoquigSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlCalmayNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$calmaySchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlCaraelNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$caraelSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlCaranglaanNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$caranglaanSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlEastCentralNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$eastCentralSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlFedericoCeraldeNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$federicoCeraldeSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlGregorioPilarNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$gregorioPilarSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlJuanSiapnoNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$juanSiapnoSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlJuanGuadizNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$juanGuadizSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlLasipGrandeNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$lasipGrandeSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlLeonFranciscoNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$leonFranciscoSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlLomboyNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$lomboySchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlLucaoNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$lucaoSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlMaluedSurNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$maluedSurSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlMamalinglingNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$mamalinglingSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlManginTebengNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$manginTebengSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlNorthCentralNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$northCentralSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlPantalNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$pantalSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlPascualaVillamilNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$pascualaVillamilSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlPogoLasipNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$pogoLasipSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlPugaroIntegratedNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$pugaroIntegratedSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlSabanganNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$sabanganSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlSalapingaoNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$salapingaoSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlSalisayNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$salisaySchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlSuitNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$suitSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlAysonRosarioNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$aysonRosarioSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlTambacNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$tambacSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlTebengNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$tebengSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlZarateNumeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$zarateSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlWestCentral1Numeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$westCentral1School' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlWestCentral2Numeracy = "SELECT COUNT(lrn) AS lrn_count FROM academic_numeracy WHERE school = '$westCentral2School' AND quarter = $selectedQuarter AND year = $school_year";

    // Execute queries
    $resultBacayaoNumeracy = $conn->query($sqlBacayaoNumeracy);
    $resultBlissNumeracy = $conn->query($sqlBlissNumeracy);
    $resultBolosanNumeracy = $conn->query($sqlBolosanNumeracy);
    $resultBonuanBoquigNumeracy = $conn->query($sqlBonuanBoquigNumeracy);
    $resultCalmayNumeracy = $conn->query($sqlCalmayNumeracy);
    $resultCaraelNumeracy = $conn->query($sqlCaraelNumeracy);
    $resultCaranglaanNumeracy = $conn->query($sqlCaranglaanNumeracy);
    $resultEastCentralNumeracy = $conn->query($sqlEastCentralNumeracy);
    $resultFedericoCeraldeNumeracy = $conn->query($sqlFedericoCeraldeNumeracy);
    $resultGregorioPilarNumeracy = $conn->query($sqlGregorioPilarNumeracy);
    $resultJuanSiapnoNumeracy = $conn->query($sqlJuanSiapnoNumeracy);
    $resultJuanGuadizNumeracy = $conn->query($sqlJuanGuadizNumeracy);
    $resultLasipGrandeNumeracy = $conn->query($sqlLasipGrandeNumeracy);
    $resultLeonFranciscoNumeracy = $conn->query($sqlLeonFranciscoNumeracy);
    $resultLomboyNumeracy = $conn->query($sqlLomboyNumeracy);
    $resultLucaoNumeracy = $conn->query($sqlLucaoNumeracy);
    $resultMaluedSurNumeracy = $conn->query($sqlMaluedSurNumeracy);
    $resultMamalinglingNumeracy = $conn->query($sqlMamalinglingNumeracy);
    $resultManginTebengNumeracy = $conn->query($sqlManginTebengNumeracy);
    $resultNorthCentralNumeracy = $conn->query($sqlNorthCentralNumeracy);
    $resultPantalNumeracy = $conn->query($sqlPantalNumeracy);
    $resultPascualaVillamilNumeracy = $conn->query($sqlPascualaVillamilNumeracy);
    $resultPogoLasipNumeracy = $conn->query($sqlPogoLasipNumeracy);
    $resultPugaroIntegratedNumeracy = $conn->query($sqlPugaroIntegratedNumeracy);
    $resultSabanganNumeracy = $conn->query($sqlSabanganNumeracy);
    $resultSalapingaoNumeracy = $conn->query($sqlSalapingaoNumeracy);
    $resultSalisayNumeracy = $conn->query($sqlSalisayNumeracy);
    $resultSuitNumeracy = $conn->query($sqlSuitNumeracy);
    $resultAysonRosarioNumeracy = $conn->query($sqlAysonRosarioNumeracy);
    $resultTambacNumeracy = $conn->query($sqlTambacNumeracy);
    $resultTebengNumeracy = $conn->query($sqlTebengNumeracy);
    $resultZarateNumeracy = $conn->query($sqlZarateNumeracy);
    $resultWestCentral1Numeracy = $conn->query($sqlWestCentral1Numeracy);
    $resultWestCentral2Numeracy = $conn->query($sqlWestCentral2Numeracy);

    // Check if queries executed successfully
    if ($resultBacayaoNumeracy && $resultBlissNumeracy && $resultBolosanNumeracy && $resultBonuanBoquigNumeracy && $resultCalmayNumeracy && $resultCaraelNumeracy && $resultCaranglaanNumeracy && $resultEastCentralNumeracy && $resultFedericoCeraldeNumeracy && $resultGregorioPilarNumeracy && $resultJuanSiapnoNumeracy && $resultJuanGuadizNumeracy && $resultLasipGrandeNumeracy && $resultLeonFranciscoNumeracy && $resultLomboyNumeracy && $resultLucaoNumeracy && $resultMaluedSurNumeracy && $resultMamalinglingNumeracy && $resultManginTebengNumeracy && $resultNorthCentralNumeracy && $resultPantalNumeracy && $resultPascualaVillamilNumeracy && $resultPogoLasipNumeracy && $resultPugaroIntegratedNumeracy && $resultSabanganNumeracy && $resultSalapingaoNumeracy && $resultSalisayNumeracy && $resultSuitNumeracy && $resultAysonRosarioNumeracy && $resultTambacNumeracy && $resultTebengNumeracy && $resultZarateNumeracy && $resultWestCentral1Numeracy && $resultWestCentral2Numeracy) {
        // Fetch counts
        $rowBacayaoNumeracy = $resultBacayaoNumeracy->fetch_assoc();
        $rowBlissNumeracy = $resultBlissNumeracy->fetch_assoc();
        $rowBolosanNumeracy = $resultBolosanNumeracy->fetch_assoc();
        $rowBonuanBoquigNumeracy = $resultBonuanBoquigNumeracy->fetch_assoc();
        $rowCalmayNumeracy = $resultCalmayNumeracy->fetch_assoc();
        $rowCaraelNumeracy = $resultCaraelNumeracy->fetch_assoc();
        $rowCaranglaanNumeracy = $resultCaranglaanNumeracy->fetch_assoc();
        $rowEastCentralNumeracy = $resultEastCentralNumeracy->fetch_assoc();
        $rowFedericoCeraldeNumeracy = $resultFedericoCeraldeNumeracy->fetch_assoc();
        $rowGregorioPilarNumeracy = $resultGregorioPilarNumeracy->fetch_assoc();
        $rowJuanSiapnoNumeracy = $resultJuanSiapnoNumeracy->fetch_assoc();
        $rowJuanGuadizNumeracy = $resultJuanGuadizNumeracy->fetch_assoc();
        $rowLasipGrandeNumeracy = $resultLasipGrandeNumeracy->fetch_assoc();
        $rowLeonFranciscoNumeracy = $resultLeonFranciscoNumeracy->fetch_assoc();
        $rowLomboyNumeracy = $resultLomboyNumeracy->fetch_assoc();
        $rowLucaoNumeracy = $resultLucaoNumeracy->fetch_assoc();
        $rowMaluedSurNumeracy = $resultMaluedSurNumeracy->fetch_assoc();
        $rowMamalinglingNumeracy = $resultMamalinglingNumeracy->fetch_assoc();
        $rowManginTebengNumeracy = $resultManginTebengNumeracy->fetch_assoc();
        $rowNorthCentralNumeracy = $resultNorthCentralNumeracy->fetch_assoc();
        $rowPantalNumeracy = $resultPantalNumeracy->fetch_assoc();
        $rowPascualaVillamilNumeracy = $resultPascualaVillamilNumeracy->fetch_assoc();
        $rowPogoLasipNumeracy = $resultPogoLasipNumeracy->fetch_assoc();
        $rowPugaroIntegratedNumeracy = $resultPugaroIntegratedNumeracy->fetch_assoc();
        $rowSabanganNumeracy = $resultSabanganNumeracy->fetch_assoc();
        $rowSalapingaoNumeracy = $resultSalapingaoNumeracy->fetch_assoc();
        $rowSalisayNumeracy = $resultSalisayNumeracy->fetch_assoc();
        $rowSuitNumeracy = $resultSuitNumeracy->fetch_assoc();
        $rowAysonRosarioNumeracy = $resultAysonRosarioNumeracy->fetch_assoc();
        $rowTambacNumeracy = $resultTambacNumeracy->fetch_assoc();
        $rowTebengNumeracy = $resultTebengNumeracy->fetch_assoc();
        $rowZarateNumeracy = $resultZarateNumeracy->fetch_assoc();
        $rowWestCentral1Numeracy = $resultWestCentral1Numeracy->fetch_assoc();
        $rowWestCentral2Numeracy = $resultWestCentral2Numeracy->fetch_assoc();

        // Store counts in variables
        $bacayaoNumeracy = $rowBacayaoNumeracy['lrn_count'];
        $blissNumeracy = $rowBlissNumeracy['lrn_count'];
        $bolosanNumeracy = $rowBolosanNumeracy['lrn_count'];
        $bonuanBoquigNumeracy = $rowBonuanBoquigNumeracy['lrn_count'];
        $calmayNumeracy = $rowCalmayNumeracy['lrn_count'];
        $caraelNumeracy = $rowCaraelNumeracy['lrn_count'];
        $caranglaanNumeracy = $rowCaranglaanNumeracy['lrn_count'];
        $eastCentralNumeracy = $rowEastCentralNumeracy['lrn_count'];
        $federicoCeraldeNumeracy = $rowFedericoCeraldeNumeracy['lrn_count'];
        $gregorioPilarNumeracy = $rowGregorioPilarNumeracy['lrn_count'];
        $juanSiapnoNumeracy = $rowJuanSiapnoNumeracy['lrn_count'];
        $juanGuadizNumeracy = $rowJuanGuadizNumeracy['lrn_count'];
        $lasipGrandeNumeracy = $rowLasipGrandeNumeracy['lrn_count'];
        $leonFranciscoNumeracy = $rowLeonFranciscoNumeracy['lrn_count'];
        $lomboyNumeracy = $rowLomboyNumeracy['lrn_count'];
        $lucaoNumeracy = $rowLucaoNumeracy['lrn_count'];
        $maluedSurNumeracy = $rowMaluedSurNumeracy['lrn_count'];
        $mamalinglingNumeracy = $rowMamalinglingNumeracy['lrn_count'];
        $manginTebengNumeracy = $rowManginTebengNumeracy['lrn_count'];
        $northCentralNumeracy = $rowNorthCentralNumeracy['lrn_count'];
        $pantalNumeracy = $rowPantalNumeracy['lrn_count'];
        $pascualaVillamilNumeracy = $rowPascualaVillamilNumeracy['lrn_count'];
        $pogoLasipNumeracy = $rowPogoLasipNumeracy['lrn_count'];
        $pugaroIntegratedNumeracy = $rowPugaroIntegratedNumeracy['lrn_count'];
        $sabanganNumeracy = $rowSabanganNumeracy['lrn_count'];
        $salapingaoNumeracy = $rowSalapingaoNumeracy['lrn_count'];
        $salisayNumeracy = $rowSalisayNumeracy['lrn_count'];
        $suitNumeracy = $rowSuitNumeracy['lrn_count'];
        $aysonRosarioNumeracy = $rowAysonRosarioNumeracy['lrn_count'];
        $tambacNumeracy = $rowTambacNumeracy['lrn_count'];
        $tebengNumeracy = $rowTebengNumeracy['lrn_count'];
        $zarateNumeracy = $rowZarateNumeracy['lrn_count'];
        $westCentral1Numeracy = $rowWestCentral1Numeracy['lrn_count'];
        $westCentral2Numeracy = $rowWestCentral2Numeracy['lrn_count'];
    }
    $conn->close();
?>
<?php
    include('../database.php');

    // Set the default quarter to 1 if it's not already set in $_POST
    $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
    $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;

    // Define each school individually
    $bacayaoSchool = "Bacayao Sur Elementary School";
    $blissSchool = "Bliss Elementary School";
    $bolosanSchool = "Bolosan Elementary School";
    $bonuanBoquigSchool = "Bonuan Boquig Elementary School";
    $calmaySchool = "Calmay Elementary School";
    $caraelSchool = "Carael Elementary School";
    $caranglaanSchool = "Caranglaan Elementary School";
    $eastCentralSchool = "East Central Integrated School";
    $federicoCeraldeSchool = "Federico N. Ceralde School Integrated School";
    $gregorioPilarSchool = "Gen. Gregorio Del Pilar Elementary School";
    $juanSiapnoSchool = "Juan L. Siapno Elementary School";
    $juanGuadizSchool = "Juan P. Guadiz Elementary School";
    $lasipGrandeSchool = "Lasip Grande Elementary School";
    $leonFranciscoSchool = "Leon-Francisco Elementary School";
    $lomboySchool = "Lomboy Elementary School";
    $lucaoSchool = "Lucao Elementary School";
    $maluedSurSchool = "Malued Sur Elementary School";
    $mamalinglingSchool = "Mamalingling Elementary School";
    $manginTebengSchool = "Mangin-Tebeng Elementary School";
    $northCentralSchool = "North Central Elementary School";
    $pantalSchool = "Pantal Elementary School";
    $pascualaVillamilSchool = "Pascuala G. Villamil Elementary School";
    $pogoLasipSchool = "Pogo-Lasip Elementary School";
    $pugaroIntegratedSchool = "Pugaro Integrated School";
    $sabanganSchool = "Sabangan Elementary School";
    $salapingaoSchool = "Salapingao Elementary School";
    $salisaySchool = "Salisay Elementary School";
    $suitSchool = "Suit Elementary School";
    $aysonRosarioSchool = "T. Ayson Rosario Elementary School";
    $tambacSchool = "Tambac Elementary School";
    $tebengSchool = "Tebeng Elementary School";
    $zarateSchool = "Victoria Q. Zarate Elementary School";
    $westCentral1School = "West Central I Elementary School";
    $westCentral2School = "West Central II Elementary School";

    // SQL queries to count LRN for each school and selected quarter
    $sqlBacayaoBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$bacayaoSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlBlissBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$blissSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlBolosanBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$bolosanSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlBonuanBoquigBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$bonuanBoquigSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlCalmayBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$calmaySchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlCaraelBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$caraelSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlCaranglaanBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$caranglaanSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlEastCentralBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$eastCentralSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlFedericoCeraldeBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$federicoCeraldeSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlGregorioPilarBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$gregorioPilarSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlJuanSiapnoBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$juanSiapnoSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlJuanGuadizBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$juanGuadizSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlLasipGrandeBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$lasipGrandeSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlLeonFranciscoBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$leonFranciscoSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlLomboyBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$lomboySchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlLucaoBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$lucaoSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlMaluedSurBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$maluedSurSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlMamalinglingBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$mamalinglingSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlManginTebengBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$manginTebengSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlNorthCentralBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$northCentralSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlPantalBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$pantalSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlPascualaVillamilBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$pascualaVillamilSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlPogoLasipBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$pogoLasipSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlPugaroIntegratedBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$pugaroIntegratedSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlSabanganBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$sabanganSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlSalapingaoBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$salapingaoSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlSalisayBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$salisaySchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlSuitBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$suitSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlAysonRosarioBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$aysonRosarioSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlTambacBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$tambacSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlTebengBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$tebengSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlZarateBehavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$zarateSchool' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlWestCentral1Behavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$westCentral1School' AND quarter = $selectedQuarter AND year = $school_year";
    $sqlWestCentral2Behavioral = "SELECT COUNT(lrn) AS lrn_count FROM behavioral WHERE school = '$westCentral2School' AND quarter = $selectedQuarter AND year = $school_year";

    // Execute queries
    $resultBacayaoBehavioral = $conn->query($sqlBacayaoBehavioral);
    $resultBlissBehavioral = $conn->query($sqlBlissBehavioral);
    $resultBolosanBehavioral = $conn->query($sqlBolosanBehavioral);
    $resultBonuanBoquigBehavioral = $conn->query($sqlBonuanBoquigBehavioral);
    $resultCalmayBehavioral = $conn->query($sqlCalmayBehavioral);
    $resultCaraelBehavioral = $conn->query($sqlCaraelBehavioral);
    $resultCaranglaanBehavioral = $conn->query($sqlCaranglaanBehavioral);
    $resultEastCentralBehavioral = $conn->query($sqlEastCentralBehavioral);
    $resultFedericoCeraldeBehavioral = $conn->query($sqlFedericoCeraldeBehavioral);
    $resultGregorioPilarBehavioral = $conn->query($sqlGregorioPilarBehavioral);
    $resultJuanSiapnoBehavioral = $conn->query($sqlJuanSiapnoBehavioral);
    $resultJuanGuadizBehavioral = $conn->query($sqlJuanGuadizBehavioral);
    $resultLasipGrandeBehavioral = $conn->query($sqlLasipGrandeBehavioral);
    $resultLeonFranciscoBehavioral = $conn->query($sqlLeonFranciscoBehavioral);
    $resultLomboyBehavioral = $conn->query($sqlLomboyBehavioral);
    $resultLucaoBehavioral = $conn->query($sqlLucaoBehavioral);
    $resultMaluedSurBehavioral = $conn->query($sqlMaluedSurBehavioral);
    $resultMamalinglingBehavioral = $conn->query($sqlMamalinglingBehavioral);
    $resultManginTebengBehavioral = $conn->query($sqlManginTebengBehavioral);
    $resultNorthCentralBehavioral = $conn->query($sqlNorthCentralBehavioral);
    $resultPantalBehavioral = $conn->query($sqlPantalBehavioral);
    $resultPascualaVillamilBehavioral = $conn->query($sqlPascualaVillamilBehavioral);
    $resultPogoLasipBehavioral = $conn->query($sqlPogoLasipBehavioral);
    $resultPugaroIntegratedBehavioral = $conn->query($sqlPugaroIntegratedBehavioral);
    $resultSabanganBehavioral = $conn->query($sqlSabanganBehavioral);
    $resultSalapingaoBehavioral = $conn->query($sqlSalapingaoBehavioral);
    $resultSalisayBehavioral = $conn->query($sqlSalisayBehavioral);
    $resultSuitBehavioral = $conn->query($sqlSuitBehavioral);
    $resultAysonRosarioBehavioral = $conn->query($sqlAysonRosarioBehavioral);
    $resultTambacBehavioral = $conn->query($sqlTambacBehavioral);
    $resultTebengBehavioral = $conn->query($sqlTebengBehavioral);
    $resultZarateBehavioral = $conn->query($sqlZarateBehavioral);
    $resultWestCentral1Behavioral = $conn->query($sqlWestCentral1Behavioral);
    $resultWestCentral2Behavioral = $conn->query($sqlWestCentral2Behavioral);

    // Check if queries executed successfully
    if ($resultBacayaoBehavioral && $resultBlissBehavioral && $resultBolosanBehavioral && $resultBonuanBoquigBehavioral && $resultCalmayBehavioral && $resultCaraelBehavioral && $resultCaranglaanBehavioral && $resultEastCentralBehavioral && $resultFedericoCeraldeBehavioral && $resultGregorioPilarBehavioral && $resultJuanSiapnoBehavioral && $resultJuanGuadizBehavioral && $resultLasipGrandeBehavioral && $resultLeonFranciscoBehavioral && $resultLomboyBehavioral && $resultLucaoBehavioral && $resultMaluedSurBehavioral && $resultMamalinglingBehavioral && $resultManginTebengBehavioral && $resultNorthCentralBehavioral && $resultPantalBehavioral && $resultPascualaVillamilBehavioral && $resultPogoLasipBehavioral && $resultPugaroIntegratedBehavioral && $resultSabanganBehavioral && $resultSalapingaoBehavioral && $resultSalisayBehavioral && $resultSuitBehavioral && $resultAysonRosarioBehavioral && $resultTambacBehavioral && $resultTebengBehavioral && $resultZarateBehavioral && $resultWestCentral1Behavioral && $resultWestCentral2Behavioral) {
        // Fetch counts
        $rowBacayaoBehavioral = $resultBacayaoBehavioral->fetch_assoc();
        $rowBlissBehavioral = $resultBlissBehavioral->fetch_assoc();
        $rowBolosanBehavioral = $resultBolosanBehavioral->fetch_assoc();
        $rowBonuanBoquigBehavioral = $resultBonuanBoquigBehavioral->fetch_assoc();
        $rowCalmayBehavioral = $resultCalmayBehavioral->fetch_assoc();
        $rowCaraelBehavioral = $resultCaraelBehavioral->fetch_assoc();
        $rowCaranglaanBehavioral = $resultCaranglaanBehavioral->fetch_assoc();
        $rowEastCentralBehavioral = $resultEastCentralBehavioral->fetch_assoc();
        $rowFedericoCeraldeBehavioral = $resultFedericoCeraldeBehavioral->fetch_assoc();
        $rowGregorioPilarBehavioral = $resultGregorioPilarBehavioral->fetch_assoc();
        $rowJuanSiapnoBehavioral = $resultJuanSiapnoBehavioral->fetch_assoc();
        $rowJuanGuadizBehavioral = $resultJuanGuadizBehavioral->fetch_assoc();
        $rowLasipGrandeBehavioral = $resultLasipGrandeBehavioral->fetch_assoc();
        $rowLeonFranciscoBehavioral = $resultLeonFranciscoBehavioral->fetch_assoc();
        $rowLomboyBehavioral = $resultLomboyBehavioral->fetch_assoc();
        $rowLucaoBehavioral = $resultLucaoBehavioral->fetch_assoc();
        $rowMaluedSurBehavioral = $resultMaluedSurBehavioral->fetch_assoc();
        $rowMamalinglingBehavioral = $resultMamalinglingBehavioral->fetch_assoc();
        $rowManginTebengBehavioral = $resultManginTebengBehavioral->fetch_assoc();
        $rowNorthCentralBehavioral = $resultNorthCentralBehavioral->fetch_assoc();
        $rowPantalBehavioral = $resultPantalBehavioral->fetch_assoc();
        $rowPascualaVillamilBehavioral = $resultPascualaVillamilBehavioral->fetch_assoc();
        $rowPogoLasipBehavioral = $resultPogoLasipBehavioral->fetch_assoc();
        $rowPugaroIntegratedBehavioral = $resultPugaroIntegratedBehavioral->fetch_assoc();
        $rowSabanganBehavioral = $resultSabanganBehavioral->fetch_assoc();
        $rowSalapingaoBehavioral = $resultSalapingaoBehavioral->fetch_assoc();
        $rowSalisayBehavioral = $resultSalisayBehavioral->fetch_assoc();
        $rowSuitBehavioral = $resultSuitBehavioral->fetch_assoc();
        $rowAysonRosarioBehavioral = $resultAysonRosarioBehavioral->fetch_assoc();
        $rowTambacBehavioral = $resultTambacBehavioral->fetch_assoc();
        $rowTebengBehavioral = $resultTebengBehavioral->fetch_assoc();
        $rowZarateBehavioral = $resultZarateBehavioral->fetch_assoc();
        $rowWestCentral1Behavioral = $resultWestCentral1Behavioral->fetch_assoc();
        $rowWestCentral2Behavioral = $resultWestCentral2Behavioral->fetch_assoc();

        // Store counts in variables
        $bacayaoBehavioral = $rowBacayaoBehavioral['lrn_count'];
        $blissBehavioral = $rowBlissBehavioral['lrn_count'];
        $bolosanBehavioral = $rowBolosanBehavioral['lrn_count'];
        $bonuanBoquigBehavioral = $rowBonuanBoquigBehavioral['lrn_count'];
        $calmayBehavioral = $rowCalmayBehavioral['lrn_count'];
        $caraelBehavioral = $rowCaraelBehavioral['lrn_count'];
        $caranglaanBehavioral = $rowCaranglaanBehavioral['lrn_count'];
        $eastCentralBehavioral = $rowEastCentralBehavioral['lrn_count'];
        $federicoCeraldeBehavioral = $rowFedericoCeraldeBehavioral['lrn_count'];
        $gregorioPilarBehavioral = $rowGregorioPilarBehavioral['lrn_count'];
        $juanSiapnoBehavioral = $rowJuanSiapnoBehavioral['lrn_count'];
        $juanGuadizBehavioral = $rowJuanGuadizBehavioral['lrn_count'];
        $lasipGrandeBehavioral = $rowLasipGrandeBehavioral['lrn_count'];
        $leonFranciscoBehavioral = $rowLeonFranciscoBehavioral['lrn_count'];
        $lomboyBehavioral = $rowLomboyBehavioral['lrn_count'];
        $lucaoBehavioral = $rowLucaoBehavioral['lrn_count'];
        $maluedSurBehavioral = $rowMaluedSurBehavioral['lrn_count'];
        $mamalinglingBehavioral = $rowMamalinglingBehavioral['lrn_count'];
        $manginTebengBehavioral = $rowManginTebengBehavioral['lrn_count'];
        $northCentralBehavioral = $rowNorthCentralBehavioral['lrn_count'];
        $pantalBehavioral = $rowPantalBehavioral['lrn_count'];
        $pascualaVillamilBehavioral = $rowPascualaVillamilBehavioral['lrn_count'];
        $pogoLasipBehavioral = $rowPogoLasipBehavioral['lrn_count'];
        $pugaroIntegratedBehavioral = $rowPugaroIntegratedBehavioral['lrn_count'];
        $sabanganBehavioral = $rowSabanganBehavioral['lrn_count'];
        $salapingaoBehavioral = $rowSalapingaoBehavioral['lrn_count'];
        $salisayBehavioral = $rowSalisayBehavioral['lrn_count'];
        $suitBehavioral = $rowSuitBehavioral['lrn_count'];
        $aysonRosarioBehavioral = $rowAysonRosarioBehavioral['lrn_count'];
        $tambacBehavioral = $rowTambacBehavioral['lrn_count'];
        $tebengBehavioral = $rowTebengBehavioral['lrn_count'];
        $zarateBehavioral = $rowZarateBehavioral['lrn_count'];
        $westCentral1Behavioral = $rowWestCentral1Behavioral['lrn_count'];
        $westCentral2Behavioral = $rowWestCentral2Behavioral['lrn_count'];
    }
    $conn->close();
?>
<?php
    include('../database.php');
    $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
    $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;

    // Initialize total LRN counts for each school
    $bacayaototalpar = 0;
    $blisstotalpar = 0;
    $bolosantotalpar = 0;
    $bonuantotalpar = 0;
    $calmaytotalpar = 0;
    $caraeltotalpar = 0;
    $caranglaantotalpar = 0;
    $eastcentraltotalpar = 0;
    $federicototalpar = 0;
    $gregoriodelpilartotalpar = 0;
    $juanltotalpar = 0;
    $juanptotalpar = 0;
    $lasiptotalpar = 0;
    $leonfranciscototalpar = 0;
    $lomboytotalpar = 0;
    $lucaototalpar = 0;
    $maluedsurtotalpar = 0;
    $mamalinglingtotalpar = 0;
    $mangintebengtotalpar = 0;
    $northcentraltotalpar = 0;
    $pantaltotalpar = 0;
    $pascualatotalpar = 0;
    $pogolasiptotalpar = 0;
    $pugarototalpar = 0;
    $sabangantotalpar = 0;
    $salapingaototalpar = 0;
    $salisaytotalpar = 0;
    $suittotalpar = 0;
    $taysonrosariototalpar = 0;
    $tambactotalpar = 0;
    $tebengtotalpar = 0;
    $zaratetotalpar = 0;
    $westcentralItotalpar = 0;
    $westcentralIItotalpar = 0;
        // Query to count LRNs for Bacayao Sur Elementary School
        $sql_bacayao = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'Bacayao Sur Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'Bacayao Sur Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'Bacayao Sur Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'Bacayao Sur Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_bacayao = $conn->query($sql_bacayao);
        $row_bacayao = $result_bacayao->fetch_assoc();
        $bacayaototalpar += $row_bacayao['total_count']; // Update the total count for Bacayao Sur Elementary School

        // Query to count LRNs for Bliss Elementary School
        $sql_bliss = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'Bliss Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'Bliss Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'Bliss Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'Bliss Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_bliss = $conn->query($sql_bliss);
        $row_bliss = $result_bliss->fetch_assoc();
        $blisstotalpar += $row_bliss['total_count'];

        // Query to count LRNs for Bolosan Elementary School
        $sql_bolosan = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'Bolosan Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'Bolosan Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'Bolosan Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'Bolosan Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_bolosan = $conn->query($sql_bolosan);
        $row_bolosan = $result_bolosan->fetch_assoc();
        $bolosantotalpar += $row_bolosan['total_count'];

        // Query to count LRNs for Bonuan Boquig Elementary School
        $sql_bonuan = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'Bonuan Boquig Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'Bonuan Boquig Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'Bonuan Boquig Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'Bonuan Boquig Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_bonuan = $conn->query($sql_bonuan);
        $row_bonuan = $result_bonuan->fetch_assoc();
        $bonuantotalpar += $row_bonuan['total_count'];

        // Query to count LRNs for Calmay Elementary School
        $sql_calmay = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'Calmay Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'Calmay Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'Calmay Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'Calmay Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_calmay = $conn->query($sql_calmay);
        $row_calmay = $result_calmay->fetch_assoc();
        $calmaytotalpar += $row_calmay['total_count'];

        $sql_carael = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'Carael Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'Carael Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'Carael Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'Carael Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_carael = $conn->query($sql_carael);
        $row_carael = $result_carael->fetch_assoc();
        $caraeltotalpar += $row_carael['total_count'];

        $sql_carael = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'Carael Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'Carael Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'Carael Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'Carael Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_carael = $conn->query($sql_carael);
        $row_carael = $result_carael->fetch_assoc();
        $caraeltotalpar += $row_carael['total_count'];

        $sql_carael = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'Carael Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'Carael Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'Carael Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'Carael Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_carael = $conn->query($sql_carael);
        $row_carael = $result_carael->fetch_assoc();
        $caraeltotalpar += $row_carael['total_count'];

        $sql_eastcentral = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'East Central Integrated School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'East Central Integrated School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'East Central Integrated School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'East Central Integrated School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_eastcentral = $conn->query($sql_eastcentral);
        $row_eastcentral = $result_eastcentral->fetch_assoc();
        $eastcentraltotalpar += $row_eastcentral['total_count'];

        $sql_federicoceralde = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'Federico N. Ceralde School Integrated School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'Federico N. Ceralde School Integrated School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'Federico N. Ceralde School Integrated School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'Federico N. Ceralde School Integrated School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_federicoceralde = $conn->query($sql_federicoceralde);
        $row_federicoceralde = $result_federicoceralde->fetch_assoc();
        $federicototalpar += $row_federicoceralde['total_count'];

        $sql_gregoriodelpilar = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'Gen. Gregorio Del Pilar Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'Gen. Gregorio Del Pilar Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'Gen. Gregorio Del Pilar Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'Gen. Gregorio Del Pilar Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_gregoriodelpilar = $conn->query($sql_gregoriodelpilar);
        $row_gregoriodelpilar = $result_gregoriodelpilar->fetch_assoc();
        $gregoriodelpilartotalpar += $row_gregoriodelpilar['total_count'];

        $sql_juansiapno = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'Juan L. Siapno Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'Juan L. Siapno Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'Juan L. Siapno Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'Juan L. Siapno Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_juansiapno = $conn->query($sql_juansiapno);
        $row_juansiapno = $result_juansiapno->fetch_assoc();
        $juanltotalpar += $row_juansiapno['total_count'];

        $sql_juanguadiz = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'Juan P. Guadiz Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'Juan P. Guadiz Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'Juan P. Guadiz Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'Juan P. Guadiz Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_juanguadiz = $conn->query($sql_juanguadiz);
        $row_juanguadiz = $result_juanguadiz->fetch_assoc();
        $juanptotalpar += $row_juanguadiz['total_count'];

        $sql_lasipgrande = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'Lasip Grande Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'Lasip Grande Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'Lasip Grande Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'Lasip Grande Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_lasipgrande = $conn->query($sql_lasipgrande);
        $row_lasipgrande = $result_lasipgrande->fetch_assoc();
        $lasiptotalpar += $row_lasipgrande['total_count'];

        $sql_leon = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'Leon-Francisco Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'Leon-Francisco Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'Leon-Francisco Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'Leon-Francisco Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_leon = $conn->query($sql_leon);
        $row_leon = $result_leon->fetch_assoc();
        $leonfranciscototalpar += $row_leon['total_count'];

        $sql_lomboy = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'Lomboy Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'Lomboy Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'Lomboy Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'Lomboy Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_lomboy = $conn->query($sql_lomboy);
        $row_lomboy = $result_lomboy->fetch_assoc();
        $lomboytotalpar += $row_lomboy['total_count'];

        $sql_lucao = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'Lucao Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'Lucao Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'Lucao Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'Lucao Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_lucao = $conn->query($sql_lucao);
        $row_lucao = $result_lucao->fetch_assoc();
        $lucaototalpar += $row_lucao['total_count'];

        $sql_malued = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'Malued Sur Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'Malued Sur Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'Malued Sur Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'Malued Sur Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_malued = $conn->query($sql_malued);
        $row_malued = $result_malued->fetch_assoc();
        $maluedsurtotalpar += $row_malued['total_count'];

        $sql_mamalingling = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'Mamalingling Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'Mamalingling Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'Mamalingling Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'Mamalingling Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_mamalingling = $conn->query($sql_mamalingling);
        $row_mamalingling = $result_mamalingling->fetch_assoc();
        $mamalinglingtotalpar += $row_mamalingling['total_count'];

        $sql_mangin = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'Mangin-Tebeng Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'Mangin-Tebeng Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'Mangin-Tebeng Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'Mangin-Tebeng Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_mangin = $conn->query($sql_mangin);
        $row_mangin = $result_mangin->fetch_assoc();
        $mangintebengtotalpar += $row_mangin['total_count'];

        $sql_northcentral = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'North Central Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'North Central Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'North Central Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'North Central Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_northcentral = $conn->query($sql_northcentral);
        $row_northcentral = $result_northcentral->fetch_assoc();
        $northcentraltotalpar += $row_northcentral['total_count'];

        $sql_pantal = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'Pantal Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'Pantal Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'Pantal Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'Pantal Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_pantal = $conn->query($sql_pantal);
        $row_pantal = $result_pantal->fetch_assoc();
        $pantaltotalpar += $row_pantal['total_count'];

        $sql_pascuala = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'Pascuala G. Villamil Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'Pascuala G. Villamil Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'Pascuala G. Villamil Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'Pascuala G. Villamil Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_pascuala = $conn->query($sql_pascuala);
        $row_pascuala = $result_pascuala->fetch_assoc();
        $pascualatotalpar += $row_pascuala['total_count'];

        $sql_pogo = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'Pogo-Lasip Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'Pogo-Lasip Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'Pogo-Lasip Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'Pogo-Lasip Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_pogo = $conn->query($sql_pogo);
        $row_pogo = $result_pogo->fetch_assoc();
        $pogolasiptotalpar += $row_pogo['total_count'];

        $sql_pugaro = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'Pugaro Integrated School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'Pugaro Integrated School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'Pugaro Integrated School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'Pugaro Integrated School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_pugaro = $conn->query($sql_pugaro);
        $row_pugaro = $result_pugaro->fetch_assoc();
        $pugarototalpar += $row_pugaro['total_count'];

        $sql_sabangan = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'Sabangan Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'Sabangan Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'Sabangan Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'Sabangan Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_sabangan = $conn->query($sql_sabangan);
        $row_sabangan = $result_sabangan->fetch_assoc();
        $sabangantotalpar += $row_sabangan['total_count'];

        $sql_salapingao = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'Salapingao Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'Salapingao Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'Salapingao Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'Salapingao Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_salapingao = $conn->query($sql_salapingao);
        $row_salapingao = $result_salapingao->fetch_assoc();
        $salapingaototalpar += $row_salapingao['total_count'];

        $sql_salisay = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'Salisay Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'Salisay Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'Salisay Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'Salisay Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_salisay = $conn->query($sql_salisay);
        $row_salisay = $result_salisay->fetch_assoc();
        $salisaytotalpar += $row_salisay['total_count'];

        $sql_suit = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'Suit Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'Suit Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'Suit Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'Suit Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_suit = $conn->query($sql_suit);
        $row_suit = $result_suit->fetch_assoc();
        $suittotalpar += $row_suit['total_count'];

        $sql_ayson = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'T. Ayson Rosario Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'T. Ayson Rosario Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'T. Ayson Rosario Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'T. Ayson Rosario Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_ayson = $conn->query($sql_ayson);
        $row_ayson = $result_ayson->fetch_assoc();
        $taysonrosariototalpar += $row_ayson['total_count'];

        $sql_tambac = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'Tambac Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'Tambac Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'Tambac Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'Tambac Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_tambac = $conn->query($sql_tambac);
        $row_tambac = $result_tambac->fetch_assoc();
        $tambactotalpar += $row_tambac['total_count'];

        $sql_tebeng = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'Tebeng Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'Tebeng Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'Tebeng Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'Tebeng Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_tebeng = $conn->query($sql_tebeng);
        $row_tebeng = $result_tebeng->fetch_assoc();
        $tebengtotalpar += $row_tebeng['total_count'];

        $sql_zarate = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'Victoria Q. Zarate Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'Victoria Q. Zarate Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'Victoria Q. Zarate Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'Victoria Q. Zarate Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_zarate = $conn->query($sql_zarate);
        $row_zarate = $result_zarate->fetch_assoc();
        $zaratetotalpar += $row_zarate['total_count'];

        $sql_westI = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'West Central I Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'West Central I Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'West Central I Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'West Central I Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_westI = $conn->query($sql_westI);
        $row_westI = $result_westI->fetch_assoc();
        $westcentralItotalpar += $row_westI['total_count'];

        $sql_westII = "SELECT COUNT(DISTINCT lrn) AS total_count FROM (
            SELECT lrn FROM academic_english WHERE school = 'West Central II Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_filipino WHERE school = 'West Central II Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM academic_numeracy WHERE school = 'West Central II Elementary School' AND quarter = $selectedQuarter AND year = $school_year
            UNION
            SELECT lrn FROM behavioral WHERE school = 'West Central II Elementary School' AND quarter = $selectedQuarter AND year = $school_year
        ) AS all_lrns";
        $result_westII = $conn->query($sql_westII);
        $row_westII = $result_westII->fetch_assoc();
        $westcentralIItotalpar += $row_westII['total_count'];

    // Close connection
    $conn->close();
?>
<?php
    include('../database.php');

    $classification = isset($_POST['classification']) ? $_POST['classification'] : 'academic_english';
    $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;

    // School names
    $schools = array(
        'Bacayao Sur Elementary School',
        'Bliss Elementary School',
        'Bolosan Elementary School',
        'Bonuan Boquig Elementary School',
        'Calmay Elementary School',
        'Carael Elementary School',
        'Caranglaan Elementary School',
        'East Central Integrated School',
        'Federico N. Ceralde School Integrated School',
        'Gen. Gregorio Del Pilar Elementary School',
        'Juan L. Siapno Elementary School',
        'Juan P. Guadiz Elementary School',
        'Lasip Grande Elementary School',
        'Leon-Francisco Elementary School',
        'Lomboy Elementary School',
        'Lucao Elementary School',
        'Malued Sur Elementary School',
        'Mamalingling Elementary School',
        'Mangin-Tebeng Elementary School',
        'North Central Elementary School',
        'Pantal Elementary School',
        'Pascuala G. Villamil Elementary School',
        'Pogo-Lasip Elementary School',
        'Pugaro Integrated School',
        'Sabangan Elementary School',
        'Salapingao Elementary School',
        'Salisay Elementary School',
        'Suit Elementary School',
        'T. Ayson Rosario Elementary School',
        'Tambac Elementary School',
        'Tebeng Elementary School',
        'Victoria Q. Zarate Elementary School',
        'West Central I Elementary School',
        'West Central II Elementary School'
    );

    $quarters = array(1, 2, 3, 4);

    // Array to store counts for each school
    $school_counts = array();

    foreach ($schools as $school) {
        $school_counts[$school] = array();
        foreach ($quarters as $quarter) {
            $sql = "SELECT COUNT(DISTINCT lrn) AS lrn_count FROM `$classification` WHERE school = '$school' AND quarter = $quarter AND year = $school_year";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $school_counts[$school]["q$quarter"] = $row['lrn_count'];
                mysqli_free_result($result);
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }

    mysqli_close($conn);

    // Assigning variables manually for each school and quarter
    $bacayaoq1 = $school_counts['Bacayao Sur Elementary School']['q1'];
    $bacayaoq2 = $school_counts['Bacayao Sur Elementary School']['q2'];
    $bacayaoq3 = $school_counts['Bacayao Sur Elementary School']['q3'];
    $bacayaoq4 = $school_counts['Bacayao Sur Elementary School']['q4'];

    $blissq1 = $school_counts['Bliss Elementary School']['q1'];
    $blissq2 = $school_counts['Bliss Elementary School']['q2'];
    $blissq3 = $school_counts['Bliss Elementary School']['q3'];
    $blissq4 = $school_counts['Bliss Elementary School']['q4'];

    $bolosanq1 = $school_counts['Bolosan Elementary School']['q1'];
    $bolosanq2 = $school_counts['Bolosan Elementary School']['q2'];
    $bolosanq3 = $school_counts['Bolosan Elementary School']['q3'];
    $bolosanq4 = $school_counts['Bolosan Elementary School']['q4'];

    $bonuanq1 = $school_counts['Bonuan Boquig Elementary School']['q1'];
    $bonuanq2 = $school_counts['Bonuan Boquig Elementary School']['q2'];
    $bonuanq3 = $school_counts['Bonuan Boquig Elementary School']['q3'];
    $bonuanq4 = $school_counts['Bonuan Boquig Elementary School']['q4'];

    $calmayq1 = $school_counts['Calmay Elementary School']['q1'];
    $calmayq2 = $school_counts['Calmay Elementary School']['q2'];
    $calmayq3 = $school_counts['Calmay Elementary School']['q3'];
    $calmayq4 = $school_counts['Calmay Elementary School']['q4'];

    $caraelq1 = $school_counts['Carael Elementary School']['q1'];
    $caraelq2 = $school_counts['Carael Elementary School']['q2'];
    $caraelq3 = $school_counts['Carael Elementary School']['q3'];
    $caraelq4 = $school_counts['Carael Elementary School']['q4'];

    $caranglaanq1 = $school_counts['Caranglaan Elementary School']['q1'];
    $caranglaanq2 = $school_counts['Caranglaan Elementary School']['q2'];
    $caranglaanq3 = $school_counts['Caranglaan Elementary School']['q3'];
    $caranglaanq4 = $school_counts['Caranglaan Elementary School']['q4'];

    $eastq1 = $school_counts['East Central Integrated School']['q1'];
    $eastq2 = $school_counts['East Central Integrated School']['q2'];
    $eastq3 = $school_counts['East Central Integrated School']['q3'];
    $eastq4 = $school_counts['East Central Integrated School']['q4'];

    $federicoq1 = $school_counts['Federico N. Ceralde School Integrated School']['q1'];
    $federicoq2 = $school_counts['Federico N. Ceralde School Integrated School']['q2'];
    $federicoq3 = $school_counts['Federico N. Ceralde School Integrated School']['q3'];
    $federicoq4 = $school_counts['Federico N. Ceralde School Integrated School']['q4'];

    $gregorioq1 = $school_counts['Gen. Gregorio Del Pilar Elementary School']['q1'];
    $gregorioq2 = $school_counts['Gen. Gregorio Del Pilar Elementary School']['q2'];
    $gregorioq3 = $school_counts['Gen. Gregorio Del Pilar Elementary School']['q3'];
    $gregorioq4 = $school_counts['Gen. Gregorio Del Pilar Elementary School']['q4'];

    $juanlq1 = $school_counts['Juan L. Siapno Elementary School']['q1'];
    $juanlq2 = $school_counts['Juan L. Siapno Elementary School']['q2'];
    $juanlq3 = $school_counts['Juan L. Siapno Elementary School']['q3'];
    $juanlq4 = $school_counts['Juan L. Siapno Elementary School']['q4'];

    $juanpgq1 = $school_counts['Juan P. Guadiz Elementary School']['q1'];
    $juanpgq2 = $school_counts['Juan P. Guadiz Elementary School']['q2'];
    $juanpgq3 = $school_counts['Juan P. Guadiz Elementary School']['q3'];
    $juanpgq4 = $school_counts['Juan P. Guadiz Elementary School']['q4'];

    $lasipq1 = $school_counts['Lasip Grande Elementary School']['q1'];
    $lasipq2 = $school_counts['Lasip Grande Elementary School']['q2'];
    $lasipq3 = $school_counts['Lasip Grande Elementary School']['q3'];
    $lasipq4 = $school_counts['Lasip Grande Elementary School']['q4'];

    $leonfq1 = $school_counts['Leon-Francisco Elementary School']['q1'];
    $leonfq2 = $school_counts['Leon-Francisco Elementary School']['q2'];
    $leonfq3 = $school_counts['Leon-Francisco Elementary School']['q3'];
    $leonfq4 = $school_counts['Leon-Francisco Elementary School']['q4'];

    $lomboyq1 = $school_counts['Lomboy Elementary School']['q1'];
    $lomboyq2 = $school_counts['Lomboy Elementary School']['q2'];
    $lomboyq3 = $school_counts['Lomboy Elementary School']['q3'];
    $lomboyq4 = $school_counts['Lomboy Elementary School']['q4'];

    $lucaoq1 = $school_counts['Lucao Elementary School']['q1'];
    $lucaoq2 = $school_counts['Lucao Elementary School']['q2'];
    $lucaoq3 = $school_counts['Lucao Elementary School']['q3'];
    $lucaoq4 = $school_counts['Lucao Elementary School']['q4'];

    $maluedq1 = $school_counts['Malued Sur Elementary School']['q1'];
    $maluedq2 = $school_counts['Malued Sur Elementary School']['q2'];
    $maluedq3 = $school_counts['Malued Sur Elementary School']['q3'];
    $maluedq4 = $school_counts['Malued Sur Elementary School']['q4'];

    $mamalinglingq1 = $school_counts['Mamalingling Elementary School']['q1'];
    $mamalinglingq2 = $school_counts['Mamalingling Elementary School']['q2'];
    $mamalinglingq3 = $school_counts['Mamalingling Elementary School']['q3'];
    $mamalinglingq4 = $school_counts['Mamalingling Elementary School']['q4'];

    $mangintebengq1 = $school_counts['Mangin-Tebeng Elementary School']['q1'];
    $mangintebengq2 = $school_counts['Mangin-Tebeng Elementary School']['q2'];
    $mangintebengq3 = $school_counts['Mangin-Tebeng Elementary School']['q3'];
    $mangintebengq4 = $school_counts['Mangin-Tebeng Elementary School']['q4'];

    $northq1 = $school_counts['North Central Elementary School']['q1'];
    $northq2 = $school_counts['North Central Elementary School']['q2'];
    $northq3 = $school_counts['North Central Elementary School']['q3'];
    $northq4 = $school_counts['North Central Elementary School']['q4'];

    $pantalq1 = $school_counts['Pantal Elementary School']['q1'];
    $pantalq2 = $school_counts['Pantal Elementary School']['q2'];
    $pantalq3 = $school_counts['Pantal Elementary School']['q3'];
    $pantalq4 = $school_counts['Pantal Elementary School']['q4'];

    $pascualaq1 = $school_counts['Pascuala G. Villamil Elementary School']['q1'];
    $pascualaq2 = $school_counts['Pascuala G. Villamil Elementary School']['q2'];
    $pascualaq3 = $school_counts['Pascuala G. Villamil Elementary School']['q3'];
    $pascualaq4 = $school_counts['Pascuala G. Villamil Elementary School']['q4'];

    $pogolasipq1 = $school_counts['Pogo-Lasip Elementary School']['q1'];
    $pogolasipq2 = $school_counts['Pogo-Lasip Elementary School']['q2'];
    $pogolasipq3 = $school_counts['Pogo-Lasip Elementary School']['q3'];
    $pogolasipq4 = $school_counts['Pogo-Lasip Elementary School']['q4'];

    $pugaroq1 = $school_counts['Pugaro Integrated School']['q1'];
    $pugaroq2 = $school_counts['Pugaro Integrated School']['q2'];
    $pugaroq3 = $school_counts['Pugaro Integrated School']['q3'];
    $pugaroq4 = $school_counts['Pugaro Integrated School']['q4'];

    $sabanganq1 = $school_counts['Sabangan Elementary School']['q1'];
    $sabanganq2 = $school_counts['Sabangan Elementary School']['q2'];
    $sabanganq3 = $school_counts['Sabangan Elementary School']['q3'];
    $sabanganq4 = $school_counts['Sabangan Elementary School']['q4'];

    $salapingaoq1 = $school_counts['Salapingao Elementary School']['q1'];
    $salapingaoq2 = $school_counts['Salapingao Elementary School']['q2'];
    $salapingaoq3 = $school_counts['Salapingao Elementary School']['q3'];
    $salapingaoq4 = $school_counts['Salapingao Elementary School']['q4'];

    $salisayq1 = $school_counts['Salisay Elementary School']['q1'];
    $salisayq2 = $school_counts['Salisay Elementary School']['q2'];
    $salisayq3 = $school_counts['Salisay Elementary School']['q3'];
    $salisayq4 = $school_counts['Salisay Elementary School']['q4'];

    $suitq1 = $school_counts['Suit Elementary School']['q1'];
    $suitq2 = $school_counts['Suit Elementary School']['q2'];
    $suitq3 = $school_counts['Suit Elementary School']['q3'];
    $suitq4 = $school_counts['Suit Elementary School']['q4'];

    $taysonq1 = $school_counts['T. Ayson Rosario Elementary School']['q1'];
    $taysonq2 = $school_counts['T. Ayson Rosario Elementary School']['q2'];
    $taysonq3 = $school_counts['T. Ayson Rosario Elementary School']['q3'];
    $taysonq4 = $school_counts['T. Ayson Rosario Elementary School']['q4'];

    $tambacq1 = $school_counts['Tambac Elementary School']['q1'];
    $tambacq2 = $school_counts['Tambac Elementary School']['q2'];
    $tambacq3 = $school_counts['Tambac Elementary School']['q3'];
    $tambacq4 = $school_counts['Tambac Elementary School']['q4'];

    $tebengq1 = $school_counts['Tebeng Elementary School']['q1'];
    $tebengq2 = $school_counts['Tebeng Elementary School']['q2'];
    $tebengq3 = $school_counts['Tebeng Elementary School']['q3'];
    $tebengq4 = $school_counts['Tebeng Elementary School']['q4'];

    $zarateq1 = $school_counts['Victoria Q. Zarate Elementary School']['q1'];
    $zarateq2 = $school_counts['Victoria Q. Zarate Elementary School']['q2'];
    $zarateq3 = $school_counts['Victoria Q. Zarate Elementary School']['q3'];
    $zarateq4 = $school_counts['Victoria Q. Zarate Elementary School']['q4'];

    $west1q1 = $school_counts['West Central I Elementary School']['q1'];
    $west1q2 = $school_counts['West Central I Elementary School']['q2'];
    $west1q3 = $school_counts['West Central I Elementary School']['q3'];
    $west1q4 = $school_counts['West Central I Elementary School']['q4'];

    $west2q1 = $school_counts['West Central II Elementary School']['q1'];
    $west2q2 = $school_counts['West Central II Elementary School']['q2'];
    $west2q3 = $school_counts['West Central II Elementary School']['q3'];
    $west2q4 = $school_counts['West Central II Elementary School']['q4'];

?>
<?php
    include('../database.php');

    $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;

    $queryEnglish = "SELECT COUNT(*) AS q1english FROM academic_english WHERE quarter = 1 AND year = $school_year";
    $resultEnglish = $conn->query($queryEnglish);
    $rowEnglish = $resultEnglish->fetch_assoc();
    $q1english = $rowEnglish['q1english'];

    $queryFilipino = "SELECT COUNT(*) AS q1filipino FROM academic_filipino WHERE quarter = 1 AND year = $school_year";
    $resultFilipino = $conn->query($queryFilipino);
    $rowFilipino = $resultFilipino->fetch_assoc();
    $q1filipino = $rowFilipino['q1filipino'];

    $queryNumeracy = "SELECT COUNT(*) AS q1numeracy FROM academic_numeracy WHERE quarter = 1 AND year = $school_year";
    $resultNumeracy = $conn->query($queryNumeracy);
    $rowNumeracy = $resultNumeracy->fetch_assoc();
    $q1numeracy = $rowNumeracy['q1numeracy'];

    $queryBehavioral = "SELECT COUNT(*) AS q1behavioral FROM behavioral WHERE quarter = 1 AND year = $school_year";
    $resultBehavioral = $conn->query($queryBehavioral);
    $rowBehavioral = $resultBehavioral->fetch_assoc();
    $q1behavioral = $rowBehavioral['q1behavioral'];

    $queryEnglishResolved = "SELECT COUNT(*) AS q1englishresolved FROM academic_english WHERE quarter = 1 AND year = $school_year AND status = 'resolved'";
    $resultEnglishResolved = $conn->query($queryEnglishResolved);
    $rowEnglishResolved = $resultEnglishResolved->fetch_assoc();
    $q1englishresolved = $rowEnglishResolved['q1englishresolved'];

    $queryFilipinoResolved = "SELECT COUNT(*) AS q1filipinoresolved FROM academic_filipino WHERE quarter = 1 AND year = $school_year AND status = 'resolved'";
    $resultFilipinoResolved = $conn->query($queryFilipinoResolved);
    $rowFilipinoResolved = $resultFilipinoResolved->fetch_assoc();
    $q1filipinoresolved = $rowFilipinoResolved['q1filipinoresolved'];

    $queryNumeracyResolved = "SELECT COUNT(*) AS q1numeracyresolved FROM academic_numeracy WHERE quarter = 1 AND year = $school_year AND status = 'resolved'";
    $resultNumeracyResolved = $conn->query($queryNumeracyResolved);
    $rowNumeracyResolved = $resultNumeracyResolved->fetch_assoc();
    $q1numeracyresolved = $rowNumeracyResolved['q1numeracyresolved'];

    $queryBehavioralResolved = "SELECT COUNT(*) AS q1behavioralresolved FROM behavioral WHERE quarter = 1 AND year = $school_year AND status = 'resolved'";
    $resultBehavioralResolved = $conn->query($queryBehavioralResolved);
    $rowBehavioralResolved = $resultBehavioralResolved->fetch_assoc();
    $q1behavioralresolved = $rowBehavioralResolved['q1behavioralresolved'];
    $conn->close();
?>
<?php
    include('../database.php');

    $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;

    $queryEnglish = "SELECT COUNT(*) AS q2english FROM academic_english WHERE quarter = 2 AND year = $school_year";
    $resultEnglish = $conn->query($queryEnglish);
    $rowEnglish = $resultEnglish->fetch_assoc();
    $q2english = $rowEnglish['q2english'];

    $queryFilipino = "SELECT COUNT(*) AS q2filipino FROM academic_filipino WHERE quarter = 2 AND year = $school_year";
    $resultFilipino = $conn->query($queryFilipino);
    $rowFilipino = $resultFilipino->fetch_assoc();
    $q2filipino = $rowFilipino['q2filipino'];

    $queryNumeracy = "SELECT COUNT(*) AS q2numeracy FROM academic_numeracy WHERE quarter = 2 AND year = $school_year";
    $resultNumeracy = $conn->query($queryNumeracy);
    $rowNumeracy = $resultNumeracy->fetch_assoc();
    $q2numeracy = $rowNumeracy['q2numeracy'];

    $queryBehavioral = "SELECT COUNT(*) AS q2behavioral FROM behavioral WHERE quarter = 2 AND year = $school_year";
    $resultBehavioral = $conn->query($queryBehavioral);
    $rowBehavioral = $resultBehavioral->fetch_assoc();
    $q2behavioral = $rowBehavioral['q2behavioral'];

    $queryEnglishResolved = "SELECT COUNT(*) AS q2englishresolved FROM academic_english WHERE quarter = 2 AND year = $school_year AND status = 'resolved'";
    $resultEnglishResolved = $conn->query($queryEnglishResolved);
    $rowEnglishResolved = $resultEnglishResolved->fetch_assoc();
    $q2englishresolved = $rowEnglishResolved['q2englishresolved'];

    $queryFilipinoResolved = "SELECT COUNT(*) AS q2filipinoresolved FROM academic_filipino WHERE quarter = 2 AND year = $school_year AND status = 'resolved'";
    $resultFilipinoResolved = $conn->query($queryFilipinoResolved);
    $rowFilipinoResolved = $resultFilipinoResolved->fetch_assoc();
    $q2filipinoresolved = $rowFilipinoResolved['q2filipinoresolved'];

    $queryNumeracyResolved = "SELECT COUNT(*) AS q2numeracyresolved FROM academic_numeracy WHERE quarter = 2 AND year = $school_year AND status = 'resolved'";
    $resultNumeracyResolved = $conn->query($queryNumeracyResolved);
    $rowNumeracyResolved = $resultNumeracyResolved->fetch_assoc();
    $q2numeracyresolved = $rowNumeracyResolved['q2numeracyresolved'];

    $queryBehavioralResolved = "SELECT COUNT(*) AS q2behavioralresolved FROM behavioral WHERE quarter = 2 AND year = $school_year AND status = 'resolved'";
    $resultBehavioralResolved = $conn->query($queryBehavioralResolved);
    $rowBehavioralResolved = $resultBehavioralResolved->fetch_assoc();
    $q2behavioralresolved = $rowBehavioralResolved['q2behavioralresolved'];

    $conn->close();
?>
<?php
    include('../database.php');
    $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;

    $queryEnglish = "SELECT COUNT(*) AS q3english FROM academic_english WHERE quarter = 3 AND year = $school_year";
    $resultEnglish = $conn->query($queryEnglish);
    $rowEnglish = $resultEnglish->fetch_assoc();
    $q3english = $rowEnglish['q3english'];

    $queryFilipino = "SELECT COUNT(*) AS q3filipino FROM academic_filipino WHERE quarter = 3 AND year = $school_year";
    $resultFilipino = $conn->query($queryFilipino);
    $rowFilipino = $resultFilipino->fetch_assoc();
    $q3filipino = $rowFilipino['q3filipino'];

    $queryNumeracy = "SELECT COUNT(*) AS q3numeracy FROM academic_numeracy WHERE quarter = 3 AND year = $school_year";
    $resultNumeracy = $conn->query($queryNumeracy);
    $rowNumeracy = $resultNumeracy->fetch_assoc();
    $q3numeracy = $rowNumeracy['q3numeracy'];

    $queryBehavioral = "SELECT COUNT(*) AS q3behavioral FROM behavioral WHERE quarter = 3 AND year = $school_year";
    $resultBehavioral = $conn->query($queryBehavioral);
    $rowBehavioral = $resultBehavioral->fetch_assoc();
    $q3behavioral = $rowBehavioral['q3behavioral'];

    $queryEnglishResolved = "SELECT COUNT(*) AS q3englishresolved FROM academic_english WHERE quarter = 3 AND year = $school_year AND status = 'resolved'";
    $resultEnglishResolved = $conn->query($queryEnglishResolved);
    $rowEnglishResolved = $resultEnglishResolved->fetch_assoc();
    $q3englishresolved = $rowEnglishResolved['q3englishresolved'];

    $queryFilipinoResolved = "SELECT COUNT(*) AS q3filipinoresolved FROM academic_filipino WHERE quarter = 3 AND year = $school_year AND status = 'resolved'";
    $resultFilipinoResolved = $conn->query($queryFilipinoResolved);
    $rowFilipinoResolved = $resultFilipinoResolved->fetch_assoc();
    $q3filipinoresolved = $rowFilipinoResolved['q3filipinoresolved'];

    $queryNumeracyResolved = "SELECT COUNT(*) AS q3numeracyresolved FROM academic_numeracy WHERE quarter = 3 AND year = $school_year AND status = 'resolved'";
    $resultNumeracyResolved = $conn->query($queryNumeracyResolved);
    $rowNumeracyResolved = $resultNumeracyResolved->fetch_assoc();
    $q3numeracyresolved = $rowNumeracyResolved['q3numeracyresolved'];

    $queryBehavioralResolved = "SELECT COUNT(*) AS q3behavioralresolved FROM behavioral WHERE quarter = 3 AND year = $school_year AND status = 'resolved'";
    $resultBehavioralResolved = $conn->query($queryBehavioralResolved);
    $rowBehavioralResolved = $resultBehavioralResolved->fetch_assoc();
    $q3behavioralresolved = $rowBehavioralResolved['q3behavioralresolved'];

    $conn->close();
?>
<?php
    include('../database.php');
    $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;

    $queryEnglish = "SELECT COUNT(*) AS q4english FROM academic_english WHERE quarter = 4 AND year = $school_year";
    $resultEnglish = $conn->query($queryEnglish);
    $rowEnglish = $resultEnglish->fetch_assoc();
    $q4english = $rowEnglish['q4english'];

    $queryFilipino = "SELECT COUNT(*) AS q4filipino FROM academic_filipino WHERE quarter = 4 AND year = $school_year";
    $resultFilipino = $conn->query($queryFilipino);
    $rowFilipino = $resultFilipino->fetch_assoc();
    $q4filipino = $rowFilipino['q4filipino'];

    $queryNumeracy = "SELECT COUNT(*) AS q4numeracy FROM academic_numeracy WHERE quarter = 4 AND year = $school_year";
    $resultNumeracy = $conn->query($queryNumeracy);
    $rowNumeracy = $resultNumeracy->fetch_assoc();
    $q4numeracy = $rowNumeracy['q4numeracy'];

    $queryBehavioral = "SELECT COUNT(*) AS q4behavioral FROM behavioral WHERE quarter = 4 AND year = $school_year";
    $resultBehavioral = $conn->query($queryBehavioral);
    $rowBehavioral = $resultBehavioral->fetch_assoc();
    $q4behavioral = $rowBehavioral['q4behavioral'];

    $queryEnglishResolved = "SELECT COUNT(*) AS q4englishresolved FROM academic_english WHERE quarter = 4 AND year = $school_year AND status = 'resolved'";
    $resultEnglishResolved = $conn->query($queryEnglishResolved);
    $rowEnglishResolved = $resultEnglishResolved->fetch_assoc();
    $q4englishresolved = $rowEnglishResolved['q4englishresolved'];

    $queryFilipinoResolved = "SELECT COUNT(*) AS q4filipinoresolved FROM academic_filipino WHERE quarter = 4 AND year = $school_year AND status = 'resolved'";
    $resultFilipinoResolved = $conn->query($queryFilipinoResolved);
    $rowFilipinoResolved = $resultFilipinoResolved->fetch_assoc();
    $q4filipinoresolved = $rowFilipinoResolved['q4filipinoresolved'];

    $queryNumeracyResolved = "SELECT COUNT(*) AS q4numeracyresolved FROM academic_numeracy WHERE quarter = 4 AND year = $school_year AND status = 'resolved'";
    $resultNumeracyResolved = $conn->query($queryNumeracyResolved);
    $rowNumeracyResolved = $resultNumeracyResolved->fetch_assoc();
    $q4numeracyresolved = $rowNumeracyResolved['q4numeracyresolved'];

    $queryBehavioralResolved = "SELECT COUNT(*) AS q4behavioralresolved FROM behavioral WHERE quarter = 4 AND year = $school_year AND status = 'resolved'";
    $resultBehavioralResolved = $conn->query($queryBehavioralResolved);
    $rowBehavioralResolved = $resultBehavioralResolved->fetch_assoc();
    $q4behavioralresolved = $rowBehavioralResolved['q4behavioralresolved'];

    $conn->close();
?>
<?php

    include('../database.php');

    $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
    // Count the total rows in each table
    $sqlEnglish = "SELECT COUNT(DISTINCT lrn) AS total FROM academic_english WHERE year = $school_year";
    $resultEnglish = $conn->query($sqlEnglish);
    $rowEnglish = $resultEnglish->fetch_assoc();
    $totalEnglish = $rowEnglish['total'];

    $sqlFilipino = "SELECT COUNT(DISTINCT lrn) AS total FROM academic_filipino WHERE year = $school_year";
    $resultFilipino = $conn->query($sqlFilipino);
    $rowFilipino = $resultFilipino->fetch_assoc();
    $totalFilipino = $rowFilipino['total'];

    $sqlNumeracy = "SELECT COUNT(DISTINCT lrn) AS total FROM academic_numeracy WHERE year = $school_year";
    $resultNumeracy = $conn->query($sqlNumeracy);
    $rowNumeracy = $resultNumeracy->fetch_assoc();
    $totalNumeracy = $rowNumeracy['total'];

    $sqlBehavioral = "SELECT COUNT(DISTINCT lrn) AS total FROM behavioral WHERE year = $school_year";
    $resultBehavioral = $conn->query($sqlBehavioral);
    $rowBehavioral = $resultBehavioral->fetch_assoc();
    $totalBehavioral = $rowBehavioral['total'];

    $sqlEnglishResolved = "SELECT COUNT(DISTINCT lrn) AS total FROM academic_english WHERE status = 'resolved' AND year = $school_year";
    $resultEnglishResolved = $conn->query($sqlEnglishResolved);
    $rowEnglishResolved = $resultEnglishResolved->fetch_assoc();
    $totalEnglishResolved = $rowEnglishResolved['total'];

    $sqlFilipinoResolved = "SELECT COUNT(DISTINCT lrn) AS total FROM academic_filipino WHERE status = 'resolved' AND year = $school_year";
    $resultFilipinoResolved = $conn->query($sqlFilipinoResolved);
    $rowFilipinoResolved = $resultFilipinoResolved->fetch_assoc();
    $totalFilipinoResolved = $rowFilipinoResolved['total'];

    $sqlNumeracyResolved = "SELECT COUNT(DISTINCT lrn) AS total FROM academic_numeracy WHERE status = 'resolved' AND year = $school_year";
    $resultNumeracyResolved = $conn->query($sqlNumeracyResolved);
    $rowNumeracyResolved = $resultNumeracyResolved->fetch_assoc();
    $totalNumeracyResolved = $rowNumeracyResolved['total'];

    $sqlBehavioralResolved = "SELECT COUNT(DISTINCT lrn) AS total FROM behavioral WHERE status = 'resolved' AND year = $school_year";
    $resultBehavioralResolved = $conn->query($sqlBehavioralResolved);
    $rowBehavioralResolved = $resultBehavioralResolved->fetch_assoc();
    $totalBehavioralResolved = $rowBehavioralResolved['total'];

    $conn->close();
?>
<?php
    include('../database.php');
    if(isset($_GET['employment_number'])) {
        $employment_number = $_GET['employment_number'];
        $sql = "SELECT fullname FROM executive_committee WHERE employment_number = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $employment_number);
        $stmt->execute();
        $stmt->bind_result($executivename);
        if($stmt->fetch()) {
        }
        $stmt->close();
    } 
    $conn->close();
?>
<?php
    include('../database.php');
    $tables = array(
        "academic_english",
        "academic_filipino",
        "academic_numeracy",
        "behavioral"
    );
        $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    // Bacayao Sur Elementary School
    foreach ($tables as $table) {
        $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Bacayao Sur Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Bacayao Sur Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $bacayaopar = $total_count;
        $bacayaoupdate = $total_count1;

        // Calculate the bacayaopercentage
        $bacayaopercentage = ($bacayaoupdate / $bacayaopar) * 100;
        $bacayaopercentage = round($bacayaopercentage);
    } else {
        $bacayaopercentage = 0;
    }

    // Bliss Elementary School
        $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) {
        $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Bliss Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Bliss Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $blisspar = $total_count;
        $blissupdate = $total_count1;

        // Calculate the blisspercentage
        $blisspercentage = ($blissupdate / $blisspar) * 100;
        $blisspercentage = round($blisspercentage);
    } else {
        $blisspercentage = 0;
    }

        $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) {
        $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Bolosan Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Bolosan Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $bolosanpar = $total_count;
        $bolosanupdate = $total_count1;

        // Calculate the bolosanpercentage
        $bolosanpercentage = ($bolosanupdate / $bolosanpar) * 100;
        $bolosanpercentage = round($bolosanpercentage);
    } else {
        $bolosanpercentage = 0;
    }

        $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) {
        $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Bonuan Boquig Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Bonuan Boquig Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $bonuanpar = $total_count;
        $bonuanupdate = $total_count1;

        // Calculate the bonuanpercentage
        $bonuanpercentage = ($bonuanupdate / $bonuanpar) * 100;
        $bonuanpercentage = round($bonuanpercentage);
    } else {
        $bonuanpercentage = 0;
    }

        $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) {
        $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Calmay Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Calmay Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $calmaypar = $total_count;
        $calmayupdate = $total_count1;

        // Calculate the calmaypercentage
        $calmaypercentage = ($calmayupdate / $calmaypar) * 100;
        $calmaypercentage = round($calmaypercentage);
    } else {
        $calmaypercentage = 0;
    }

        $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) {
        $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Carael Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Carael Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $caraelpar = $total_count;
        $caraelupdate = $total_count1;

        // Calculate the caraelpercentage
        $caraelpercentage = ($caraelupdate / $caraelpar) * 100;
        $caraelpercentage = round($caraelpercentage);
    } else {
        $caraelpercentage = 0;
    }

        $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) {
        $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Caranglaan Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Caranglaan Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $caranglaanpar = $total_count;
        $caranglaanupdate = $total_count1;

        // Calculate the caranglaanpercentage
        $caranglaanpercentage = ($caranglaanupdate / $caranglaanpar) * 100;
        $caranglaanpercentage = round($caranglaanpercentage);
    } else {
        $caranglaanpercentage = 0;
    }

        $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) {
        $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'East Central Integrated School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'East Central Integrated School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $eastpar = $total_count;
        $eastupdate = $total_count1;

        // Calculate the eastpercentage
        $eastpercentage = ($eastupdate / $eastpar) * 100;
        $eastpercentage = round($eastpercentage);
    } else {
        $eastpercentage = 0;
    }

        $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) {
        $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Federico N. Ceralde School Integrated School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Federico N. Ceralde School Integrated School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $federicopar = $total_count;
        $federicoupdate = $total_count1;

        // Calculate the federicopercentage
        $federicopercentage = ($federicoupdate / $federicopar) * 100;
        $federicopercentage = round($federicopercentage);
    } else {
        $federicopercentage = 0;
    }

        $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) {
        $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Gen. Gregorio Del Pilar Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Gen. Gregorio Del Pilar Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $genpar = $total_count;
        $genupdate = $total_count1;

        // Calculate the genpercentage
        $genpercentage = ($genupdate / $genpar) * 100;
        $genpercentage = round($genpercentage);
    } else {
        $genpercentage = 0;
    }

        $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) {
        $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Juan L. Siapno Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Juan L. Siapno Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $juanlpar = $total_count;
        $juanlupdate = $total_count1;

        // Calculate the juanlpercentage
        $juanlpercentage = ($juanlupdate / $juanlpar) * 100;
        $juanlpercentage = round($juanlpercentage);
    } else {
        $juanlpercentage = 0;
    }

        $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) {
        $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Juan P. Guadiz Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Juan P. Guadiz Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $juanppar = $total_count;
        $juanpupdate = $total_count1;

        // Calculate the juanppercentage
        $juanppercentage = ($juanpupdate / $juanppar) * 100;
        $juanppercentage = round($juanppercentage);
    } else {
        $juanppercentage = 0;
    }

        $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) {
        $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Lasip Grande Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Lasip Grande Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $lasippar = $total_count;
        $lasipupdate = $total_count1;

        // Calculate the lasippercentage
        $lasippercentage = ($lasipupdate / $lasippar) * 100;
        $lasippercentage = round($lasippercentage);
    } else {
        $lasippercentage = 0;
    }

        $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) {
        $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Leon-Francisco Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Leon-Francisco Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $leonpar = $total_count;
        $leonupdate = $total_count1;

        // Calculate the leonpercentage
        $leonpercentage = ($leonupdate / $leonpar) * 100;
        $leonpercentage = round($leonpercentage);
    } else {
        $leonpercentage = 0;
    }

        $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) {
        $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Lomboy Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Lomboy Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $lomboypar = $total_count;
        $lomboyupdate = $total_count1;

        // Calculate the lomboypercentage
        $lomboypercentage = ($lomboyupdate / $lomboypar) * 100;
        $lomboypercentage = round($lomboypercentage);
    } else {
        $lomboypercentage = 0;
    }

        $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) {
        $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Lucao Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Lucao Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $lucaopar = $total_count;
        $lucaoupdate = $total_count1;

        // Calculate the lucaopercentage
        $lucaopercentage = ($lucaoupdate / $lucaopar) * 100;
        $lucaopercentage = round($lucaopercentage);
    } else {
        $lucaopercentage = 0;
    }

        $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) {
        $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Malued Sur Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Malued Sur Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $maluedpar = $total_count;
        $maluedupdate = $total_count1;

        // Calculate the maluedpercentage
        $maluedpercentage = ($maluedupdate / $maluedpar) * 100;
        $maluedpercentage = round($maluedpercentage);
    } else {
        $maluedpercentage = 0;
    }

        $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) {
        $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Mamalingling Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Mamalingling Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $mamalinglingpar = $total_count;
        $mamalinglingupdate = $total_count1;

        // Calculate the mamalinglingpercentage
        $mamalinglingpercentage = ($mamalinglingupdate / $mamalinglingpar) * 100;
        $mamalinglingpercentage = round($mamalinglingpercentage);
    } else {
        $mamalinglingpercentage = 0;
    }

        $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) { 
        $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Mangin-Tebeng Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Mangin-Tebeng Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $manginpar = $total_count;
        $manginupdate = $total_count1;

        // Calculate the manginpercentage
        $manginpercentage = ($manginupdate / $manginpar) * 100;
        $manginpercentage = round($manginpercentage);
    } else {
        $manginpercentage = 0;
    }

        $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) {
         $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
         $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'North Central Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'North Central Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $northpar = $total_count;
        $northupdate = $total_count1;

        // Calculate the northpercentage
        $northpercentage = ($northupdate / $northpar) * 100;
        $northpercentage = round($northpercentage);
    } else {
        $northpercentage = 0;
    }

        $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) { 
        $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Pantal Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Pantal Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $pantalpar = $total_count;
        $pantalupdate = $total_count1;

        // Calculate the pantalpercentage
        $pantalpercentage = ($pantalupdate / $pantalpar) * 100;
        $pantalpercentage = round($pantalpercentage);
    } else {
        $pantalpercentage = 0;
    }

        $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) { 
        $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Pascuala G. Villamil Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Pascuala G. Villamil Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $pascualapar = $total_count;
        $pascualaupdate = $total_count1;

        // Calculate the pascualapercentage
        $pascualapercentage = ($pascualaupdate / $pascualapar) * 100;
        $pascualapercentage = round($pascualapercentage);
    } else {
        $pascualapercentage = 0;
    }

        $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) { 
        $selectedQuarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Pogo-Lasip Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Pogo-Lasip Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $pogopar = $total_count;
        $pogoupdate = $total_count1;

        // Calculate the pogopercentage
        $pogopercentage = ($pogoupdate / $pogopar) * 100;
        $pogopercentage = round($pogopercentage);
    } else {
        $pogopercentage = 0;
    }

        $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) { $selectedQuarter= isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Pugaro Integrated School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Pugaro Integrated School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $pugaropar = $total_count;
        $pugaroupdate = $total_count1;

        // Calculate the pugaropercentage
        $pugaropercentage = ($pugaroupdate / $pugaropar) * 100;
        $pugaropercentage = round($pugaropercentage);
    } else {
        $pugaropercentage = 0;
    }

        $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) { $selectedQuarter= isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Sabangan Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Sabangan Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $sabanganpar = $total_count;
        $sabanganupdate = $total_count1;
    
        // Calculate the sabanganpercentage
        $sabanganpercentage = ($sabanganupdate / $sabanganpar) * 100;
        $sabanganpercentage = round($sabanganpercentage);
    } else {
        $sabanganpercentage = 0;
    }

    $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) { $selectedQuarter= isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Salapingao Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Salapingao Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $salipangaopar = $total_count;
        $salipangaoupdate = $total_count1;

        // Calculate the salipangaopercentage
        $salipangaopercentage = ($salipangaoupdate / $salipangaopar) * 100;
        $salipangaopercentage = round($salipangaopercentage);
    } else {
        $salipangaopercentage = 0;
    }

    $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) { $selectedQuarter= isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Salisay Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Salisay Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $salisaypar = $total_count;
        $salisayupdate = $total_count1;

        // Calculate the salisaypercentage
        $salisaypercentage = ($salisayupdate / $salisaypar) * 100;
        $salisaypercentage = round($salisaypercentage);
    } else {
        $salisaypercentage = 0;
    }

    $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) { $selectedQuarter= isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Suit Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Suit Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $suitpar = $total_count;
        $suitupdate = $total_count1;

        // Calculate the suitpercentage
        $suitpercentage = ($suitupdate / $suitpar) * 100;
        $suitpercentage = round($suitpercentage);
    } else {
        $suitpercentage = 0;
    }

    $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) { $selectedQuarter= isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'T. Ayson Rosario Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'T. Ayson Rosario Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $aysonpar = $total_count;
        $aysonupdate = $total_count1;

        // Calculate the aysonpercentage
        $aysonpercentage = ($aysonupdate / $aysonpar) * 100;
        $aysonpercentage = round($aysonpercentage);
    } else {
        $aysonpercentage = 0;
    }

    $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) { $selectedQuarter= isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Tambac Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Tambac Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $tambacpar = $total_count;
        $tambacupdate = $total_count1;

        // Calculate the tambacpercentage
        $tambacpercentage = ($tambacupdate / $tambacpar) * 100;
        $tambacpercentage = round($tambacpercentage);
    } else {
        $tambacpercentage = 0;
    }

    $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) { $selectedQuarter= isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Tebeng Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Tebeng Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $tebengpar = $total_count;
        $tebengupdate = $total_count1;

        // Calculate the tebengpercentage
        $tebengpercentage = ($tebengupdate / $tebengpar) * 100;
        $tebengpercentage = round($tebengpercentage);
    } else {
        $tebengpercentage = 0;
    }

    $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) { $selectedQuarter= isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Victoria Q. Zarate Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'Victoria Q. Zarate Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $victoriapar = $total_count;
        $victoriaupdate = $total_count1;

        // Calculate the victoriapercentage
        $victoriapercentage = ($victoriaupdate / $victoriapar) * 100;
        $victoriapercentage = round($victoriapercentage);
    } else {
        $victoriapercentage = 0;
    }

    $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) { $selectedQuarter= isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'West Central II Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'West Central II Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $westpar = $total_count;
        $westupdate = $total_count1;

        // Calculate the westpercentage
        $westpercentage = ($westupdate / $westpar) * 100;
        $westpercentage = round($westpercentage);
    } else {
        $westpercentage = 0;
    }

        $lrn_counted = array();
    $lrn_counted1 = array();
    $total_count = 0;
    $total_count1 = 0;

    foreach ($tables as $table) { $selectedQuarter= isset($_POST['quarter']) ? $_POST['quarter'] : 1;
        $sql = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'West Central I Elementary School' AND year = $school_year";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted)) {
                    $total_count++;
                    $lrn_counted[] = $row['lrn'];
                }
            }
        }
        $sql1 = "SELECT DISTINCT lrn FROM $table WHERE quarter = $selectedQuarter AND school = 'West Central I Elementary School' AND gname <> '' AND year = $school_year";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                if (!in_array($row['lrn'], $lrn_counted1)) {
                    $total_count1++;
                    $lrn_counted1[] = $row['lrn'];
                }
            }
        }
    }
    if ($total_count > 0) {
        $westpar = $total_count;
        $west1update = $total_count1;

        // Calculate the west1percentage
        $west1percentage = ($west1update / $westpar) * 100;
        $west1percentage = round($west1percentage);
    } else {
        $west1percentage = 0;
    }
    // Close connection
    $conn->close();
?>
<?php
    include('../database.php');
    $tables = array(
        "academic_english",
        "academic_filipino",
        "academic_numeracy",
        "behavioral"
    );

    $totalpar = 0; 
    $resolved = 0;
    $encounteredLRNs = array(); // Array to store LRNs encountered

    // Loop through each table
    foreach ($tables as $table) {
        $sql = "SELECT lrn, COUNT(DISTINCT lrn) AS count, SUM(CASE WHEN status = 'resolved' THEN 1 ELSE 0 END) AS resolved_count FROM $table GROUP BY lrn";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $lrn = $row["lrn"];
                // Check if LRN has been encountered before
                if (!in_array($lrn, $encounteredLRNs)) {
                    $totalpar += $row["count"];
                    $resolved += $row["resolved_count"];
                    // Add LRN to encountered list
                    $encounteredLRNs[] = $lrn;
                }
            }
        }
    }

    $conn->close();
?>
<?php
    include('../database.php');
    // Schools array
    $schools = [
        'Bacayao Sur Elementary School',
        'Bliss Elementary School',
        'Bolosan Elementary School',
        'Bonuan Boquig Elementary School',
        'Calmay Elementary School',
        'Carael Elementary School',
        'Caranglaan Elementary School',
        'East Central Integrated School',
        'Federico N. Ceralde School Integrated School',
        'Gen. Gregorio Del Pilar Elementary School',
        'Juan L. Siapno Elementary School',
        'Juan P. Guadiz Elementary School',
        'Lasip Grande Elementary School',
        'Leon-Francisco Elementary School',
        'Lomboy Elementary School',
        'Lucao Elementary School',
        'Malued Sur Elementary School',
        'Mamalingling Elementary School',
        'Mangin-Tebeng Elementary School',
        'North Central Elementary School',
        'Pantal Elementary School',
        'Pascuala G. Villamil Elementary School',
        'Pogo-Lasip Elementary School',
        'Pugaro Integrated School',
        'Sabangan Elementary School',
        'Salapingao Elementary School',
        'Salisay Elementary School',
        'Suit Elementary School',
        'T. Ayson Rosario Elementary School',
        'Tambac Elementary School',
        'Tebeng Elementary School',
        'Victoria Q. Zarate Elementary School',
        'West Central I Elementary School',
        'West Central II Elementary School'
    ];

    // Associative array to store results
    $school_counts = [];

    $classification = isset($_POST['classification']) ? $_POST['classification'] : 'academic_english';
    $school_year = isset($_POST['school-year']) ? $_POST['school-year'] : 2024;
    foreach ($schools as $school) {
        $sql = "SELECT COUNT(DISTINCT lrn) AS distinct_lrns 
                FROM $classification 
                WHERE school = '$school' AND year = '$school_year'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Fetch the count and store it
            $row = $result->fetch_assoc();
            $school_counts[$school] = $row["distinct_lrns"];
        } else {
            // If no results, store 0
            $school_counts[$school] = 0;
        }
    }

    // Close connection
    $conn->close();
    $bacayaoCount = $school_counts['Bacayao Sur Elementary School'];
    $blissElementaryCount = $school_counts['Bliss Elementary School'];
    $bolosanElementaryCount = $school_counts['Bolosan Elementary School'];
    $bonuanBoquigElementaryCount = $school_counts['Bonuan Boquig Elementary School'];
    $calmayElementaryCount = $school_counts['Calmay Elementary School'];
    $caralElementaryCount = $school_counts['Carael Elementary School'];
    $caranglaanElementaryCount = $school_counts['Caranglaan Elementary School'];
    $eastCentralIntegratedCount = $school_counts['East Central Integrated School'];
    $federicoNCeraldeCount = $school_counts['Federico N. Ceralde School Integrated School'];
    $genGregorioDelPilarCount = $school_counts['Gen. Gregorio Del Pilar Elementary School'];
    $juanLSiapnoCount = $school_counts['Juan L. Siapno Elementary School'];
    $juanPGuadizCount = $school_counts['Juan P. Guadiz Elementary School'];
    $lasipGrandeCount = $school_counts['Lasip Grande Elementary School'];
    $leonFranciscoCount = $school_counts['Leon-Francisco Elementary School'];
    $lomboyCount = $school_counts['Lomboy Elementary School'];
    $lucaoCount = $school_counts['Lucao Elementary School'];
    $maluedSurCount = $school_counts['Malued Sur Elementary School'];
    $mamalinglingCount = $school_counts['Mamalingling Elementary School'];
    $manginTebengCount = $school_counts['Mangin-Tebeng Elementary School'];
    $northCentralCount = $school_counts['North Central Elementary School'];
    $pantalCount = $school_counts['Pantal Elementary School'];
    $pascualaGVillamilCount = $school_counts['Pascuala G. Villamil Elementary School'];
    $pogoLasipCount = $school_counts['Pogo-Lasip Elementary School'];
    $pugaroIntegratedCount = $school_counts['Pugaro Integrated School'];
    $sabanganCount = $school_counts['Sabangan Elementary School'];
    $salapingaoCount = $school_counts['Salapingao Elementary School'];
    $salisayCount = $school_counts['Salisay Elementary School'];
    $suitCount = $school_counts['Suit Elementary School'];
    $tAysonRosarioCount = $school_counts['T. Ayson Rosario Elementary School'];
    $tambacCount = $school_counts['Tambac Elementary School'];
    $tebengCount = $school_counts['Tebeng Elementary School'];
    $victoriaQZarateCount = $school_counts['Victoria Q. Zarate Elementary School'];
    $westCentralICount = $school_counts['West Central I Elementary School'];
    $westCentralIICount = $school_counts['West Central II Elementary School'];

?>
<?php
    include('../database.php');
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
                <img src="../img/logo.png" class="logs">
                <h4>E.D.G.E | P.A.R. Early Detection and Guidance for Education</h4>
                <i class="vertical-line"></i>
                <div class="dropdown">
                <div class='name' onclick="toggleDropdown()"><?php echo $executivename ?></div>
                    <div class="dropdown-content" id="dropdownContent">
                    <a href="../login/Login.php">Log Out</a>
                    <a href="executive_change_password.php?employment_number=<?php echo isset($_GET['employment_number']) ? $_GET['employment_number'] : 'default_value'; ?>" style="border-top: 1px solid #ddd;">Change Password</a>
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
                    <input type="text" class="search-input" placeholder="Search School" oninput="filterTable()">
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
                    <h3 style="margin-left: 7px">Division</h3>
                </div>
            </div>
            <div class="column column-right">
                <div class="containers" style="background-color: #F3F3F3;">
                    <h3 style="margin-left: 7px; margin-right: 7px">Dagupan City Division Elementary Schools</h3>
                </div>
            </div>
            <div class="column column-left">
                <div class="containers" style="background-color: #B7B7B7;">
                    <h3 style="margin-left: 7px">Total P.A.R.s</h3>
                </div>
            </div>
            <div class="column half-width">
                <div class="containers" style="background-color: #F3F3F3;">
                    <h3 style="margin-left: 7px"></h3>
                </div>
            </div>
        </div>

        <div class="row" >
            <div class="column" >
                <div class="containers" style="background-color: #B7B7B7">
                    <h3 style="margin-left: 7px">Division</h3>
                </div>
            </div>
            <div class="column column-right">
                <div class="containers" style="background-color: #F3F3F3;">
                    <h3 style="margin-left: 7px; margin-right: 7px">Dagupan City Division Elementary Schools</h3>
                </div>
            </div>
            <div class="column column-left">
                <div class="containers" style="background-color: #B7B7B7;">
                    <h3 style="margin-left: 7px">Total P.A.R.s</h3>
                </div>
            </div>
            <div class="column half-width">
                <div class="containers" style="background-color: #F3F3F3;">
                    <h3 style="margin-left: 7px"><?php echo $totalpar ?></h3>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="column">
                <div class="containers" style="background-color: #B7B7B7;">
                    <h3 style="margin-left: 7px">Quarter</h3>
                </div>
            </div>
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
            <div class="column column-left">
                <div class="containers" style="background-color: #B7B7B7;">
                    <h3 style="margin-left: 7px">Resolved Cases</h3>
                </div>
            </div>
            <div class="column half-width">
                <div class="containers" style="background-color: #F3F3F3;">
                    <h3 style="margin-left: 7px"><?php echo $resolved ?></h3>
                </div>
            </div>
        </div>

        <div class="table-container">
        <table border="0" id="data-table">
    <thead class="table-header">
        <tr>
            <th style="width:29%">Elementary School Name</th>
            <th style="width:12%"># of Students</th>
            <th style="width:12%"># of P.A.R</th>
            <th style="width:12%">Literacy (E)</th>
            <th style="width:12%">Literacy (F)</th>
            <th style="width:12%">Numeracy</th>
            <th style="width:12%">Behavioral</th>
            <th style="width:12%">Progress%</th>
        </tr>
    </thead>

    <tbody class="school" id="data-table1">
        <tr>
            <th style="width:29%">Bacayao Sur Elementary School</th>
            <th style="width:12%"><?php echo $bacayaostudents ?></th>
            <th style="width:12%"><?php echo $bacayaototalpar ?></th>
            <th style="width:12%"><?php echo $bacayaoenglish ?></th>
            <th style="width:12%"><?php echo $bacayaoFilipino ?></th>
            <th style="width:12%"><?php echo $bacayaoNumeracy ?></th>
            <th style="width:12%"><?php echo $bacayaoBehavioral ?></th>
            <th style="width:12%"><?php echo $bacayaopercentage ?></th>
        </tr>
        <tr>
            <th style="width:29%">Bliss Elementary School</th>
            <th style="width:12%"><?php echo $blissstudents ?></th>
            <th style="width:12%"><?php echo $blisstotalpar ?></th>
            <th style="width:12%"><?php echo $blissenglish ?></th>
            <th style="width:12%"><?php echo $blissFilipino ?></th>
            <th style="width:12%"><?php echo $blissNumeracy ?></th>
            <th style="width:12%"><?php echo $blissBehavioral ?></th>
            <th style="width:12%"><?php echo $blisspercentage ?></th>
        </tr>
        <tr>
            <th style="width:29%">Bolosan Elementary School</th>
            <th style="width:12%"><?php echo $bolosanstudents ?></th>
            <th style="width:12%"><?php echo $bolosantotalpar ?></th>
            <th style="width:12%"><?php echo $bolosanenglish ?></th>
            <th style="width:12%"><?php echo $bolosanFilipino ?></th>
            <th style="width:12%"><?php echo $bolosanNumeracy ?></th>
            <th style="width:12%"><?php echo $bolosanBehavioral ?></th>
            <th style="width:12%"><?php echo $bolosanpercentage ?></th>
        </tr>
            <tr>
                <th style="width:29%">Bonuan Boquig Elementary School</th>
                <th style="width:12%"><?php echo $bonuanstudents ?></th>
                <th style="width:12%"><?php echo $bonuantotalpar ?></th>
                <th style="width:12%"><?php echo $bonuanBoquigenglish ?></th>
                <th style="width:12%"><?php echo $bonuanBoquigFilipino ?></th>
                <th style="width:12%"><?php echo $bonuanBoquigNumeracy ?></th>
                <th style="width:12%"><?php echo $bonuanBoquigBehavioral ?></th>
                <th style="width:12%"><?php echo $bonuanpercentage ?></th>
            </tr>
            <tr>
                <th style="width:29%">Calmay Elementary School</th>
                <th style="width:12%"><?php echo $calmaystudents ?></th>
                <th style="width:12%"><?php echo $calmaytotalpar ?></th>
                <th style="width:12%"><?php echo $calmayenglish ?></th>
                <th style="width:12%"><?php echo $calmayFilipino ?></th>
                <th style="width:12%"><?php echo $calmayNumeracy ?></th>
                <th style="width:12%"><?php echo $calmayBehavioral ?></th>
                <th style="width:12%"><?php echo $calmaypercentage ?></th>
            </tr>
            <tr>
                <th style="width:29%">Carael Elementary School</th>
                <th style="width:12%"><?php echo $caraelstudents ?></th>
                <th style="width:12%"><?php echo $caraeltotalpar ?></th>
                <th style="width:12%"><?php echo $caraelenglish ?></th>
                <th style="width:12%"><?php echo $caraelFilipino ?></th>
                <th style="width:12%"><?php echo $caraelNumeracy ?></th>
                <th style="width:12%"><?php echo $caraelBehavioral ?></th>
                <th style="width:12%"><?php echo $caraelpercentage ?></th>
            </tr>
            <tr>
                <th style="width:29%">Caranglaan Elementary School</th>
                <th style="width:12%"><?php echo $caranglaanstudents ?></th>
                <th style="width:12%"><?php echo $caranglaantotalpar ?></th>
                <th style="width:12%"><?php echo $caranglaanenglish ?></th>
                <th style="width:12%"><?php echo $caranglaanFilipino ?></th>
                <th style="width:12%"><?php echo $caranglaanNumeracy ?></th>
                <th style="width:12%"><?php echo $caranglaanBehavioral ?></th>
                <th style="width:12%"><?php echo $caranglaanpercentage ?></th>
            </tr>
            <tr>
                <th style="width:29%">East Central Integrated School</th>
                <th style="width:12%"><?php echo $eastcentralstudents ?></th>
                <th style="width:12%"><?php echo $eastcentraltotalpar ?></th>
                <th style="width:12%"><?php echo $eastCentralenglish ?></th>
                <th style="width:12%"><?php echo $eastCentralFilipino ?></th>
                <th style="width:12%"><?php echo $eastCentralNumeracy ?></th>
                <th style="width:12%"><?php echo $eastCentralBehavioral ?></th>
                <th style="width:12%"><?php echo $eastpercentage ?></th>
            </tr>
            <tr>
                <th style="width:29%">Federico N. Ceralde School Integrated School</th>
                <th style="width:12%"><?php echo $ceraldeschoolstudents ?></th>
                <th style="width:12%"><?php echo $federicototalpar ?></th>
                <th style="width:12%"><?php echo $federicoCeraldeenglish ?></th>
                <th style="width:12%"><?php echo $federicoCeraldeFilipino ?></th>
                <th style="width:12%"><?php echo $federicoCeraldeNumeracy ?></th>
                <th style="width:12%"><?php echo $federicoCeraldeBehavioral ?></th>
                <th style="width:12%"><?php echo $federicopercentage ?></th>
            </tr>
            <tr>
                <th style="width:29%">Gen. Gregorio Del Pilar Elementary School</th>
                <th style="width:12%"><?php echo $gregoriodelpilarstudents ?></th>
                <th style="width:12%"><?php echo $gregoriodelpilartotalpar ?></th>
                <th style="width:12%"><?php echo $gregorioPilarenglish ?></th>
                <th style="width:12%"><?php echo $gregorioPilarFilipino ?></th>
                <th style="width:12%"><?php echo $gregorioPilarNumeracy ?></th>
                <th style="width:12%"><?php echo $gregorioPilarBehavioral ?></th>
                <th style="width:12%"><?php echo $genpercentage ?></th>
            </tr>
            <tr>
                <th style="width:29%">Juan L. Siapno Elementary School</th>
                <th style="width:12%"><?php echo $siapnostudents ?></th>
                <th style="width:12%"><?php echo $juanltotalpar ?></th>
                <th style="width:12%"><?php echo $juanSiapnoenglish ?></th>
                <th style="width:12%"><?php echo $juanSiapnoFilipino ?></th>
                <th style="width:12%"><?php echo $juanSiapnoNumeracy ?></th>
                <th style="width:12%"><?php echo $juanSiapnoBehavioral ?></th>
                <th style="width:12%"><?php echo $juanlpercentage ?></th>
            </tr>
            <tr>
                <th style="width:29%">Juan P. Guadiz Elementary School</th>
                <th style="width:12%"><?php echo $guadizstudents ?></th>
                <th style="width:12%"><?php echo $juanptotalpar ?></th>
                <th style="width:12%"><?php echo $juanGuadizenglish ?></th>
                <th style="width:12%"><?php echo $juanGuadizFilipino ?></th>
                <th style="width:12%"><?php echo $juanGuadizNumeracy ?></th>
                <th style="width:12%"><?php echo $juanGuadizBehavioral ?></th>
                <th style="width:12%"><?php echo $juanppercentage ?></th>
            </tr>
            <tr>
                <th style="width:29%">Lasip Grande Elementary School</th>
                <th style="width:12%"><?php echo $lasipgrandestudents ?></th>
                <th style="width:12%"><?php echo $lasiptotalpar ?></th>
                <th style="width:12%"><?php echo $lasipGrandeenglish ?></th>
                <th style="width:12%"><?php echo $lasipGrandeFilipino ?></th>
                <th style="width:12%"><?php echo $lasipGrandeNumeracy ?></th>
                <th style="width:12%"><?php echo $lasipGrandeBehavioral ?></th>
                <th style="width:12%"><?php echo $lasippercentage ?></th>
            </tr>
            <tr>
                <th style="width:29%">Leon-Francisco Elementary School</th>
                <th style="width:12%"><?php echo $leonfranciscostudents ?></th>
                <th style="width:12%"><?php echo $leonfranciscototalpar ?></th>
                <th style="width:12%"><?php echo $leonFranciscoenglish ?></th>
                <th style="width:12%"><?php echo $leonFranciscoFilipino ?></th>
                <th style="width:12%"><?php echo $leonFranciscoNumeracy ?></th>
                <th style="width:12%"><?php echo $leonFranciscoBehavioral ?></th>
                <th style="width:12%"><?php echo $leonpercentage ?></th>
            </tr>
            <tr>
                <th style="width:29%">Lomboy Elementary School</th>
                <th style="width:12%"><?php echo $lomboystudents ?></th>
                <th style="width:12%"><?php echo $lomboytotalpar ?></th>
                <th style="width:12%"><?php echo $lomboyenglish ?></th>
                <th style="width:12%"><?php echo $lomboyFilipino ?></th>
                <th style="width:12%"><?php echo $lomboyNumeracy ?></th>
                <th style="width:12%"><?php echo $lomboyBehavioral ?></th>
                <th style="width:12%"><?php echo $lomboypercentage ?></th>
            </tr>
            <tr>
                <th style="width:29%">Lucao Elementary School</th>
                <th style="width:12%"><?php echo $lucaostudents ?></th>
                <th style="width:12%"><?php echo $lucaototalpar ?></th>
                <th style="width:12%"><?php echo $lucaoenglish ?></th>
                <th style="width:12%"><?php echo $lucaoFilipino ?></th>
                <th style="width:12%"><?php echo $lucaoNumeracy ?></th>
                <th style="width:12%"><?php echo $lucaoBehavioral ?></th>
                <th style="width:12%"><?php echo $lucaopercentage ?></th>
            </tr>
            <tr>
                <th style="width:29%">Malued Sur Elementary School</th>
                <th style="width:12%"><?php echo $maluedstudents ?></th>
                <th style="width:12%"><?php echo $maluedsurtotalpar ?></th>
                <th style="width:12%"><?php echo $maluedSurenglish ?></th>
                <th style="width:12%"><?php echo $maluedSurFilipino ?></th>
                <th style="width:12%"><?php echo $maluedSurNumeracy ?></th>
                <th style="width:12%"><?php echo $maluedSurBehavioral ?></th>
                <th style="width:12%"><?php echo $maluedpercentage ?></th>
            </tr>
            <tr>
                <th style="width:29%">Mamalingling Elementary School</th>
                <th style="width:12%"><?php echo $mamalinglingstudents ?></th>
                <th style="width:12%"><?php echo $mamalinglingtotalpar ?></th>
                <th style="width:12%"><?php echo $mamalinglingenglish ?></th>
                <th style="width:12%"><?php echo $mamalinglingFilipino ?></th>
                <th style="width:12%"><?php echo $mamalinglingNumeracy ?></th>
                <th style="width:12%"><?php echo $mamalinglingBehavioral ?></th>
                <th style="width:12%"><?php echo $mamalinglingpercentage ?></th>
            </tr>
            <tr>
                <th style="width:29%">Mangin-Tebeng Elementary School</th>
                <th style="width:12%"><?php echo $mangintebengstudents ?></th>
                <th style="width:12%"><?php echo $mangintebengtotalpar ?></th>
                <th style="width:12%"><?php echo $manginTebengenglish ?></th>
                <th style="width:12%"><?php echo $manginTebengFilipino ?></th>
                <th style="width:12%"><?php echo $manginTebengNumeracy ?></th>
                <th style="width:12%"><?php echo $manginTebengBehavioral ?></th>
                <th style="width:12%"><?php echo $manginpercentage ?></th>
            </tr>
            <tr>
                <th style="width:29%">North Central Elementary School</th>
                <th style="width:12%"><?php echo $northcentralstudents ?></th>
                <th style="width:12%"><?php echo $northcentraltotalpar ?></th>
                <th style="width:12%"><?php echo $northCentralenglish ?></th>
                <th style="width:12%"><?php echo $northCentralFilipino ?></th>
                <th style="width:12%"><?php echo $northCentralNumeracy ?></th>
                <th style="width:12%"><?php echo $northCentralBehavioral ?></th>
                <th style="width:12%"><?php echo $northpercentage ?></th>
            </tr>
            <tr>
                <th style="width:29%">Pantal Elementary School</th>
                <th style="width:12%"><?php echo $pantalstudents ?></th>
                <th style="width:12%"><?php echo $pantaltotalpar ?></th>
                <th style="width:12%"><?php echo $pantalenglish ?></th>
                <th style="width:12%"><?php echo $pantalFilipino ?></th>
                <th style="width:12%"><?php echo $pantalNumeracy ?></th>
                <th style="width:12%"><?php echo $pantalBehavioral ?></th>
                <th style="width:12%"><?php echo $pantalpercentage ?></th>
            </tr>

            <tr>
                <th style="width:29%">Pascuala G. Villamil Elementary School</th>
                <th style="width:12%"><?php echo $villamilstudents ?></th>
                <th style="width:12%"><?php echo $pascualatotalpar ?></th>
                <th style="width:12%"><?php echo $pascualaVillamilenglish ?></th>
                <th style="width:12%"><?php echo $pascualaVillamilFilipino ?></th>
                <th style="width:12%"><?php echo $pascualaVillamilNumeracy ?></th>
                <th style="width:12%"><?php echo $pascualaVillamilBehavioral ?></th>
                <th style="width:12%"><?php echo $pascualapercentage ?></th>
            </tr>
            <tr>
                <th style="width:29%">Pogo-Lasip Elementary School</th>
                <th style="width:12%"><?php echo $pogolasipstudents ?></th>
                <th style="width:12%"><?php echo $pogolasiptotalpar ?></th>
                <th style="width:12%"><?php echo $pogoLasipenglish ?></th>
                <th style="width:12%"><?php echo $pogoLasipFilipino ?></th>
                <th style="width:12%"><?php echo $pogoLasipNumeracy ?></th>
                <th style="width:12%"><?php echo $pogoLasipBehavioral ?></th>
                <th style="width:12%"><?php echo $pogopercentage ?></th>
            </tr>
            <tr>
                <th style="width:29%">Pugaro Integrated School</th>
                <th style="width:12%"><?php echo $pugarostudents ?></th>
                <th style="width:12%"><?php echo $pugarototalpar ?></th>
                <th style="width:12%"><?php echo $pugaroIntegratedenglish ?></th>
                <th style="width:12%"><?php echo $pugaroIntegratedFilipino ?></th>
                <th style="width:12%"><?php echo $pugaroIntegratedNumeracy ?></th>
                <th style="width:12%"><?php echo $pugaroIntegratedBehavioral ?></th>
                <th style="width:12%"><?php echo $pugaropercentage ?></th>
            </tr>
            <tr>
                <th style="width:29%">Sabangan Elementary School</th>
                <th style="width:12%"><?php echo $sabanganstudents ?></th>
                <th style="width:12%"><?php echo $sabangantotalpar ?></th>
                <th style="width:12%"><?php echo $sabanganenglish ?></th>
                <th style="width:12%"><?php echo $sabanganFilipino ?></th>
                <th style="width:12%"><?php echo $sabanganNumeracy ?></th>
                <th style="width:12%"><?php echo $sabanganBehavioral ?></th>
                <th style="width:12%"><?php echo $sabanganpercentage ?></th>
            </tr>

            <tr>
                <th style="width:29%">Salapingao Elementary School</th>
                <th style="width:12%"><?php echo $salapingaostudents ?></th>
                <th style="width:12%"><?php echo $salapingaototalpar ?></th>
                <th style="width:12%"><?php echo $salapingaoenglish ?></th>
                <th style="width:12%"><?php echo $salapingaoFilipino ?></th>
                <th style="width:12%"><?php echo $salapingaoNumeracy ?></th>
                <th style="width:12%"><?php echo $salapingaoBehavioral ?></th>
                <th style="width:12%"><?php echo $salipangaopercentage ?></th>
            </tr>
            <tr>
                <th style="width:29%">Salisay Elementary School</th>
                <th style="width:12%"><?php echo $salisaystudents ?></th>
                <th style="width:12%"><?php echo $salisaytotalpar ?></th>
                <th style="width:12%"><?php echo $salisayenglish ?></th>
                <th style="width:12%"><?php echo $salisayFilipino ?></th>
                <th style="width:12%"><?php echo $salisayNumeracy ?></th>
                <th style="width:12%"><?php echo $salisayBehavioral ?></th>
                <th style="width:12%"><?php echo $salisaypercentage ?></th>
            </tr>
            <tr>
                <th style="width:29%">Suit Elementary School</th>
                <th style="width:12%"><?php echo $suitstudents ?></th>
                <th style="width:12%"><?php echo $suittotalpar ?></th>
                <th style="width:12%"><?php echo $suitenglish ?></th>
                <th style="width:12%"><?php echo $suitFilipino ?></th>
                <th style="width:12%"><?php echo $suitNumeracy ?></th>
                <th style="width:12%"><?php echo $suitBehavioral ?></th>
                <th style="width:12%"><?php echo $suitpercentage ?></th>
            </tr>
            <tr>
                <th style="width:29%">T. Ayson Rosario Elementary School</th>
                <th style="width:12%"><?php echo $rosariostudents ?></th>
                <th style="width:12%"><?php echo $taysonrosariototalpar ?></th>
                <th style="width:12%"><?php echo $aysonRosarioenglish ?></th>
                <th style="width:12%"><?php echo $aysonRosarioFilipino ?></th>
                <th style="width:12%"><?php echo $aysonRosarioNumeracy ?></th>
                <th style="width:12%"><?php echo $aysonRosarioBehavioral ?></th>
                <th style="width:12%"><?php echo $aysonpercentage ?></th>
            </tr>
            <tr>
                <th style="width:29%">Tambac Elementary School</th>
                <th style="width:12%"><?php echo $tambacstudents ?></th>
                <th style="width:12%"><?php echo $tambactotalpar ?></th>
                <th style="width:12%"><?php echo $tambacenglish ?></th>
                <th style="width:12%"><?php echo $tambacFilipino ?></th>
                <th style="width:12%"><?php echo $tambacNumeracy ?></th>
                <th style="width:12%"><?php echo $tambacBehavioral ?></th>
                <th style="width:12%"><?php echo $tambacpercentage ?></th>
            </tr>
            <tr>
                <th style="width:29%">Tebeng Elementary School</th>
                <th style="width:12%"><?php echo $tebengstudents ?></th>
                <th style="width:12%"><?php echo $tebengtotalpar ?></th>
                <th style="width:12%"><?php echo $tebengenglish ?></th>
                <th style="width:12%"><?php echo $tebengFilipino ?></th>
                <th style="width:12%"><?php echo $tebengNumeracy ?></th>
                <th style="width:12%"><?php echo $tebengBehavioral ?></th>
                <th style="width:12%"><?php echo $tebengpercentage ?></th>
            </tr>
            <tr>
                <th style="width:29%">Victoria Q. Zarate Elementary School</th>
                <th style="width:12%"><?php echo $zaratestudents ?></th>
                <th style="width:12%"><?php echo $zaratetotalpar ?></th>
                <th style="width:12%"><?php echo $zarateenglish ?></th>
                <th style="width:12%"><?php echo $zarateFilipino ?></th>
                <th style="width:12%"><?php echo $zarateNumeracy ?></th>
                <th style="width:12%"><?php echo $zarateBehavioral ?></th>
                <th style="width:12%"><?php echo $victoriapercentage ?></th>
            </tr>
            <tr>
                <th style="width:29%">West Central I Elementary School</th>
                <th style="width:12%"><?php echo $westcentral1students ?></th>
                <th style="width:12%"><?php echo $westcentralItotalpar ?></th>
                <th style="width:12%"><?php echo $westCentral1english ?></th>
                <th style="width:12%"><?php echo $westCentral1Filipino ?></th>
                <th style="width:12%"><?php echo $westCentral1Numeracy ?></th>
                <th style="width:12%"><?php echo $westCentral1Behavioral ?></th>
                <th style="width:12%"><?php echo $west1percentage ?></th>
            </tr>
            <tr>
                <th style="width:29%">West Central II Elementary School</th>
                <th style="width:12%"><?php echo $westcentral2students ?></th>
                <th style="width:12%"><?php echo $westcentralIItotalpar ?></th>
                <th style="width:12%"><?php echo $westCentral2english ?></th>
                <th style="width:12%"><?php echo $westCentral2Filipino ?></th>
                <th style="width:12%"><?php echo $westCentral2Numeracy ?></th>
                <th style="width:12%"><?php echo $westCentral2Behavioral ?></th>
                <th style="width:12%"><?php echo $westpercentage ?></th>
            </tr>
        </table>

        </div>
        <div class="pagination">
            <button id="prevBtn" onclick="prevPage()">Previous</button>
            <button id="nextBtn" onclick="nextPage()">Next</button>
        </div>
    </div>

    <div style="display: none;" id="report_summary">
        <section class="shesh">
        <div class="row">
            <div class="column" >
                <div class="containers" style="background-color: #B7B7B7">
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
                    <tr >
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
                    <tr >
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
                    <tr >
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
                    </tr>
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
                </tr>
            </tbody>
        </table>
    </section>

    <section class="shesh second-section">
        <div class="row">
            <div class="column">
                <div class="containers" style="background-color: #B7B7B7;">
                    <h3 style="margin-left: 7px">Identification</h3>
                </div>
            </div>
            <div class="select-wrapper">
                <form id="classification" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <select id="classificationselect" name="classification" class="containers second">
                    <option value="academic_english"<?php if(isset($_POST['classification']) && $_POST['classification'] == 'academic_english') echo ' selected'; ?>>Academic - Literacy in English</option>
                    <option value="academic_filipino"<?php if(isset($_POST['classification']) && $_POST['classification'] == 'academic_filipino') echo ' selected'; ?>>Academic - Literacy in Filipino</option>
                    <option value="academic_numeracy"<?php if(isset($_POST['classification']) && $_POST['classification'] == 'academic_numeracy') echo ' selected'; ?>>Academic - Numeracy</option>
                    <option value="behavioral"<?php if(isset($_POST['classification']) && $_POST['classification'] == 'behavioral') echo ' selected'; ?>>Behavioral</option>
                </select>
            </form>
            </div>
        </div>

        <div class="table-container">
        <table border="0" id="report-table">
            <thead class="table-header">
                <tr>
                    <th style="width:35%">School Name</th>
                    <th style="width:13%">Q1</th>
                    <th style="width:13%">Q2</th>
                    <th style="width:13%">Q3</th>
                    <th style="width:13%">Q4</th>
                    <th style="width:25%">Total P.A.R.s</th>
                </tr>
            </thead>
            <tbody class="school">
            <tr>
                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">Bacayao Sur Elementary School</th>  
                        <th style="width:13%"><?php echo $bacayaoq1 ?></th>
                        <th style="width:13%"><?php echo $bacayaoq2 ?></th>
                        <th style="width:13%"><?php echo $bacayaoq3 ?></th>
                        <th style="width:13%"><?php echo $bacayaoq4 ?></th>
                        <th style="width:13%"><?php echo $bacayaoCount ?></th>
                    </tr>

                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">Bliss Elementary School</th>
                        <th style="width:13%"><?php echo $blissq1 ?></th>
                        <th style="width:13%"><?php echo $blissq2 ?></th>
                        <th style="width:13%"><?php echo $blissq3 ?></th>
                        <th style="width:13%"><?php echo $blissq4 ?></th>
                        <th style="width:13%"><?php echo $blissElementaryCount ?></th>
                        
                    </tr>

                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">Bolosan Elementary School</th>
                        <th style="width:13%"><?php echo $bolosanq1 ?></th>
                        <th style="width:13%"><?php echo $bolosanq2 ?></th>
                        <th style="width:13%"><?php echo $bolosanq3 ?></th>
                        <th style="width:13%"><?php echo $bolosanq4 ?></th>
                        <th style="width:13%"><?php echo $bolosanElementaryCount ?></th>
                        
                    </tr>

                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">Bonuan Boquig Elementary School</th>
                        <th style="width:13%"><?php echo $bonuanq1 ?></th>
                        <th style="width:13%"><?php echo $bonuanq2 ?></th>
                        <th style="width:13%"><?php echo $bonuanq3 ?></th>
                        <th style="width:13%"><?php echo $bonuanq4 ?></th>
                        <th style="width:13%"><?php echo $bonuanBoquigElementaryCount ?></th>
                        
                    </tr>

                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">Calmay Elementary School</th>
                        <th style="width:13%"><?php echo $calmayq1 ?></th>
                        <th style="width:13%"><?php echo $calmayq2 ?></th>
                        <th style="width:13%"><?php echo $calmayq3 ?></th>
                        <th style="width:13%"><?php echo $calmayq4 ?></th>
                        <th style="width:13%"><?php echo $calmayElementaryCount ?></th>
                        
                    </tr>

                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">Carael Elementary School</th>
                        <th style="width:13%"><?php echo $caraelq1 ?></th>
                        <th style="width:13%"><?php echo $caraelq2 ?></th>
                        <th style="width:13%"><?php echo $caraelq3 ?></th>
                        <th style="width:13%"><?php echo $caraelq4 ?></th>
                        <th style="width:13%"><?php echo $caralElementaryCount ?></th>
                        
                    </tr>

                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">Caranglaan Elementary School</th>
                        <th style="width:13%"><?php echo $caranglaanq1 ?></th>
                        <th style="width:13%"><?php echo $caranglaanq2 ?></th>
                        <th style="width:13%"><?php echo $caranglaanq3 ?></th>
                        <th style="width:13%"><?php echo $caranglaanq4 ?></th>
                        <th style="width:13%"><?php echo $caranglaanElementaryCount ?></th>
                        
                    </tr>

                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">East Central Integrated School</th>
                        <th style="width:13%"><?php echo $eastq1 ?></th>
                        <th style="width:13%"><?php echo $eastq2 ?></th>
                        <th style="width:13%"><?php echo $eastq3 ?></th>
                        <th style="width:13%"><?php echo $eastq4 ?></th>
                        <th style="width:13%"><?php echo $eastCentralIntegratedCount ?></th>
                        
                    </tr>

                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">Federico N. Ceralde School Integrated School</th>
                        <th style="width:13%"><?php echo $federicoq1 ?></th>
                        <th style="width:13%"><?php echo $federicoq2 ?></th>
                        <th style="width:13%"><?php echo $federicoq3 ?></th>
                        <th style="width:13%"><?php echo $federicoq4 ?></th>
                        <th style="width:13%"><?php echo $federicoNCeraldeCount ?></th>
                        
                    </tr>

                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">Gen. Gregorio Del Pilar Elementary School</th>
                        <th style="width:13%"><?php echo $gregorioq1 ?></th>
                        <th style="width:13%"><?php echo $gregorioq2 ?></th>
                        <th style="width:13%"><?php echo $gregorioq3 ?></th>
                        <th style="width:13%"><?php echo $gregorioq4 ?></th>
                        <th style="width:13%"><?php echo $genGregorioDelPilarCount ?></th>
                        
                    </tr>

                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">Juan L. Siapno Elementary School</th>
                        <th style="width:13%"><?php echo $juanlq1 ?></th>
                        <th style="width:13%"><?php echo $juanlq2 ?></th>
                        <th style="width:13%"><?php echo $juanlq3 ?></th>
                        <th style="width:13%"><?php echo $juanlq4 ?></th>
                        <th style="width:13%"><?php echo $juanLSiapnoCount ?></th>
                        
                    </tr>

                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">Juan P. Guadiz Elementary School</th>
                        <th style="width:13%"><?php echo $juanpgq1 ?></th>
                        <th style="width:13%"><?php echo $juanpgq2 ?></th>
                        <th style="width:13%"><?php echo $juanpgq3 ?></th>
                        <th style="width:13%"><?php echo $juanpgq4 ?></th>
                        <th style="width:13%"><?php echo $juanPGuadizCount ?></th>
                        
                    </tr>

                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">Lasip Grande Elementary School</th>
                        <th style="width:13%"><?php echo $lasipq1 ?></th>
                        <th style="width:13%"><?php echo $lasipq2 ?></th>
                        <th style="width:13%"><?php echo $lasipq3 ?></th>
                        <th style="width:13%"><?php echo $lasipq4 ?></th>
                        <th style="width:13%"><?php echo $lasipGrandeCount ?></th>
                        
                    </tr>

                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">Leon-Francisco Elementary School</th>
                        <th style="width:13%"><?php echo $leonfq1 ?></th>
                        <th style="width:13%"><?php echo $leonfq2 ?></th>
                        <th style="width:13%"><?php echo $leonfq3 ?></th>
                        <th style="width:13%"><?php echo $leonfq4 ?></th>
                        <th style="width:13%"><?php echo $leonFranciscoCount ?></th>
                        
                    </tr>
                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">Lomboy Elementary School</th>
                        <th style="width:13%"><?php echo $lomboyq1 ?></th>
                        <th style="width:13%"><?php echo $lomboyq2 ?></th>
                        <th style="width:13%"><?php echo $lomboyq3 ?></th>
                        <th style="width:13%"><?php echo $lomboyq4 ?></th>
                        <th style="width:13%"><?php echo $lomboyCount ?></th>
                        
                    </tr>
                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">Lucao Elementary School</th>
                        <th style="width:13%"><?php echo $lucaoq1 ?></th>
                        <th style="width:13%"><?php echo $lucaoq2 ?></th>
                        <th style="width:13%"><?php echo $lucaoq3 ?></th>
                        <th style="width:13%"><?php echo $lucaoq4 ?></th>
                        <th style="width:13%"><?php echo $lucaoCount ?></th>
                        
                    </tr>
                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">Malued Sur Elementary School</th>
                        <th style="width:13%"><?php echo $maluedq1 ?></th>
                        <th style="width:13%"><?php echo $maluedq2 ?></th>
                        <th style="width:13%"><?php echo $maluedq3 ?></th>
                        <th style="width:13%"><?php echo $maluedq4 ?></th>
                        <th style="width:13%"><?php echo $maluedSurCount ?></th>
                        
                    </tr>
                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">Mamalingling Elementary School</th>
                        <th style="width:13%"><?php echo $mamalinglingq1 ?></th>
                        <th style="width:13%"><?php echo $mamalinglingq2 ?></th>
                        <th style="width:13%"><?php echo $mamalinglingq3 ?></th>
                        <th style="width:13%"><?php echo $mamalinglingq4 ?></th>
                        <th style="width:13%"><?php echo $mamalinglingCount ?></th>
                        
                    </tr>
                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">Mangin-Tebeng Elementary School</th>
                        <th style="width:13%"><?php echo $mangintebengq1 ?></th>
                        <th style="width:13%"><?php echo $mangintebengq2 ?></th>
                        <th style="width:13%"><?php echo $mangintebengq3 ?></th>
                        <th style="width:13%"><?php echo $mangintebengq4 ?></th>
                        <th style="width:13%"><?php echo $manginTebengCount ?></th>
                        
                    </tr>
                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">North Central Elementary School</th>
                        <th style="width:13%"><?php echo $northq1 ?></th>
                        <th style="width:13%"><?php echo $northq2 ?></th>
                        <th style="width:13%"><?php echo $northq3 ?></th>
                        <th style="width:13%"><?php echo $northq4 ?></th>
                        <th style="width:13%"><?php echo $northCentralCount ?></th>
                        
                    </tr>
                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">Pantal Elementary School</th>
                        <th style="width:13%"><?php echo $pantalq1 ?></th>
                        <th style="width:13%"><?php echo $pantalq2 ?></th>
                        <th style="width:13%"><?php echo $pantalq3 ?></th>
                        <th style="width:13%"><?php echo $pantalq4 ?></th>
                        <th style="width:13%"><?php echo $pantalCount ?></th>
                        
                    </tr>
                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">Pascuala G. Villamil Elementary School</th>
                        <th style="width:13%"><?php echo $pascualaq1 ?></th>
                        <th style="width:13%"><?php echo $pascualaq2 ?></th>
                        <th style="width:13%"><?php echo $pascualaq3 ?></th>
                        <th style="width:13%"><?php echo $pascualaq4 ?></th>
                        <th style="width:13%"><?php echo $pascualaGVillamilCount ?></th>
                        
                    </tr>
                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">Pogo-Lasip Elementary School</th>
                        <th style="width:13%"><?php echo $pogolasipq1 ?></th>
                        <th style="width:13%"><?php echo $pogolasipq2 ?></th>
                        <th style="width:13%"><?php echo $pogolasipq3 ?></th>
                        <th style="width:13%"><?php echo $pogolasipq4 ?></th>
                        <th style="width:13%"><?php echo $pogoLasipCount ?></th>
                        
                    </tr>
                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">Pugaro Integrated School</th>
                        <th style="width:13%"><?php echo $pugaroq1 ?></th>
                        <th style="width:13%"><?php echo $pugaroq2 ?></th>
                        <th style="width:13%"><?php echo $pugaroq3 ?></th>
                        <th style="width:13%"><?php echo $pugaroq4 ?></th>
                        <th style="width:13%"><?php echo $pugaroIntegratedCount ?></th>
                        
                    </tr>
                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">Sabangan Elementary School</th>
                        <th style="width:13%"><?php echo $sabanganq1 ?></th>
                        <th style="width:13%"><?php echo $sabanganq2 ?></th>
                        <th style="width:13%"><?php echo $sabanganq3 ?></th>
                        <th style="width:13%"><?php echo $sabanganq4 ?></th>
                        <th style="width:13%"><?php echo $sabanganCount ?></th>
                        
                    </tr>
                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">Salapingao Elementary School</th>
                        <th style="width:13%"><?php echo $salapingaoq1 ?></th>
                        <th style="width:13%"><?php echo $salapingaoq2 ?></th>
                        <th style="width:13%"><?php echo $salapingaoq3 ?></th>
                        <th style="width:13%"><?php echo $salapingaoq4 ?></th>
                        <th style="width:13%"><?php echo $salapingaoCount ?></th>
                        
                    </tr>
                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">Salisay Elementary School</th>
                        <th style="width:13%"><?php echo $salisayq1 ?></th>
                        <th style="width:13%"><?php echo $salisayq2 ?></th>
                        <th style="width:13%"><?php echo $salisayq3 ?></th>
                        <th style="width:13%"><?php echo $salisayq4 ?></th>
                        <th style="width:13%"><?php echo $salisayCount ?></th>
                        
                    </tr>

                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">Suit Elementary School</th>
                        <th style="width:13%"><?php echo $suitq1 ?></th>
                        <th style="width:13%"><?php echo $suitq2 ?></th>
                        <th style="width:13%"><?php echo $suitq3 ?></th>
                        <th style="width:13%"><?php echo $suitq4 ?></th>
                        <th style="width:13%"><?php echo $suitCount ?></th>
                        
                    </tr>
                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">T. Ayson Rosario Elementary School</th>
                        <th style="width:13%"><?php echo $taysonq1 ?></th>
                        <th style="width:13%"><?php echo $taysonq2 ?></th>
                        <th style="width:13%"><?php echo $taysonq3 ?></th>
                        <th style="width:13%"><?php echo $taysonq4 ?></th>
                        <th style="width:13%"><?php echo $tAysonRosarioCount ?></th>
                        
                    </tr>
                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">Tambac Elementary School</th>
                        <th style="width:13%"><?php echo $tambacq1 ?></th>
                        <th style="width:13%"><?php echo $tambacq2 ?></th>
                        <th style="width:13%"><?php echo $tambacq3 ?></th>
                        <th style="width:13%"><?php echo $tambacq4 ?></th>
                        <th style="width:13%"><?php echo $tambacCount ?></th>
                        
                    </tr>
                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">Tebeng Elementary School</th>
                        <th style="width:13%"><?php echo $tebengq1 ?></th>
                        <th style="width:13%"><?php echo $tebengq2 ?></th>
                        <th style="width:13%"><?php echo $tebengq3 ?></th>
                        <th style="width:13%"><?php echo $tebengq4 ?></th>
                        <th style="width:13%"><?php echo $tebengCount ?></th>
                        
                    </tr>

                    <tr class="school" >
                        <th style="width:35%; text-align: left; padding-left: 10px">Victoria Q. Zarate Elementary School</th>
                        <th style="width:13%"><?php echo $zarateq1 ?></th>
                        <th style="width:13%"><?php echo $zarateq2 ?></th>
                        <th style="width:13%"><?php echo $zarateq3 ?></th>
                        <th style="width:13%"><?php echo $zarateq4 ?></th>
                        <th style="width:13%"><?php echo $victoriaQZarateCount ?></th>
                        
                    </tr>
                    <tr class="school" >
                        <th style="width:30%; text-align: left; padding-left: 10px">West Central I Elementary School</th>
                        <th style="width:13%"><?php echo $west1q1 ?></th>
                        <th style="width:13%"><?php echo $west1q2 ?></th>
                        <th style="width:13%"><?php echo $west1q3 ?></th>
                        <th style="width:13%"><?php echo $west1q4 ?></th>
                        <th style="width:13%"><?php echo $westCentralICount ?></th>
                        
                    </tr>
                    <tr class="school" >
                        <th style="width:30%; text-align: left; padding-left: 10px">West Central II Elementary School</th>
                        <th style="width:13%"><?php echo $west2q1 ?></th>
                        <th style="width:13%"><?php echo $west2q2 ?></th>
                        <th style="width:13%"><?php echo $west2q3 ?></th>
                        <th style="width:13%"><?php echo $west2q4 ?></th>
                        <th style="width:13%"><?php echo $westCentralIICount ?></th>
                        
                    </tr>

                </tr>
            </tbody>
        </table>
        <div class="pagination">
            <button id="prevbutton" onclick="prevPageReportTable()">Previous</button>
            <button id="nextbutton" onclick="nextPageReportTable()">Next</button>
        </div>
        </div>
    </div>
    </section>
    </div>

    <script src="executive_tracking.js"></script>

    <script>
        function printPARsList() {
            window.print();
        }
</script>
<script>
    function submitForm() {
        var form = document.getElementById("quarterForm");
        var formData = new FormData(form);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", form.action, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
            }
        };
        xhr.send(formData);
    }

    function handleSubmit(event) {
        event.preventDefault(); 
        submitForm(); 
    }

    var form = document.getElementById("quarterForm");
    form.addEventListener("submit", handleSubmit);
</script>
<script>
    function filterTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.querySelector('.search-input');
        filter = input.value.toUpperCase();
        table = document.getElementById("data-table1");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("th")[0]; 
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
<script>
document.getElementById("classification").addEventListener("submit", function(event) {
    event.preventDefault();
    
    var selectedValue = document.getElementById("classificationselect").value;
    console.log("Selected value:", selectedValue);
    submitForm(selectedValue); 
});

function submitForm(selectedValue) {
    var formData = new FormData();
    formData.append('classification', selectedValue); 

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.getElementById("result").innerHTML = xhr.responseText;
            } else {
                console.error('Request failed: ' + xhr.status);
            }
        }
    };
    xhr.open("POST", "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(formData);
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
