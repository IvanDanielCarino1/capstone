<?php
// functions.php
function verifyOTP($conn, $otp) {
    $tables = ['adviser', 'principal', 'counselor', 'school_admin', 'sdo_admin', 'executive_committee'];

    foreach ($tables as $table) {
        $query = "SELECT * FROM $table WHERE otp = '$otp'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            return true;
        }
    }

    return false; // OTP is not valid
}
?>
