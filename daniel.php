<?php
// Check if 'textbox' is in the URL and if its value is 'readonly'
$readonly = (isset($_GET['textbox']) && $_GET['textbox'] === 'readonly') ? 'readonly' : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP GET Readonly Example</title>
</head>
<body>
    <!-- Textbox will be readonly if $readonly is set to 'readonly' -->
    <form action="" method="">
        <label for="textbox">Textbox:</label>
        <input type="text" name="textbox" id="textbox" <?php echo $readonly; ?>>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
