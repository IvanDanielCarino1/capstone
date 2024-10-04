<?php
include('../database.php');

// Set the content type and filename
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="data_export.csv"');

// Create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// Function to output table data to CSV
function exportTableToCSV($output, $conn, $tableName) {
    $sql = "SELECT * FROM $tableName";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output column headings
        $columns = $result->fetch_fields();
        $headers = [];
        foreach ($columns as $column) {
            $headers[] = $column->name;
        }
        fputcsv($output, $headers);

        // Output each row of the data
        while ($row = $result->fetch_assoc()) {
            fputcsv($output, $row);
        }
        // Add a blank line to separate tables in the CSV
        fputcsv($output, []);
    }
}

// Export each table
exportTableToCSV($output, $conn, 'sdo_admin');
exportTableToCSV($output, $conn, 'executive_committee');
exportTableToCSV($output, $conn, 'school_admin');

// Close the file pointer
fclose($output);

// Close the connection
$conn->close();
exit();
?>
