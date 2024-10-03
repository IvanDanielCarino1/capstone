<form method="post">
    <button type="submit" name="save">Download Table</button>
</form>

<?php
// Check if the "save" button was clicked
if (isset($_POST['save'])) {
    // Database connection
    include ('../database.php');

    // Query to fetch data from sdo_admin table
    $sql = "SELECT * FROM sdo_admin";
    $result = $conn->query($sql);

    // Check if any records were returned
    if ($result->num_rows > 0) {
        // Open output buffer for CSV file
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="sdo_admin.csv"');

        // Output file pointer connected to output buffer
        $output = fopen('php://output', 'w');

        // Fetch field names and write to the file as header row
        $fields = $result->fetch_fields();
        $headers = [];
        foreach ($fields as $field) {
            $headers[] = $field->name;
        }
        fputcsv($output, $headers);

        // Write each row of data to the CSV file
        while ($row = $result->fetch_assoc()) {
            fputcsv($output, $row);
        }

        fclose($output);
        exit();
    } else {
        echo "No records found!";
    }

    // Close connection
    $conn->close();
}
?>
