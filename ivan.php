<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save Button Popup</title>
    <style>
        /* Style for the popup */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #f8f9fa;
            border: 2px solid #007bff;
            border-radius: 8px;
            text-align: center;
            z-index: 1000;
        }
    </style>
</head>
<body>

<form id="saveForm">
    <button type="button" id="saveButton">Save</button>
</form>

<!-- Popup message div -->
<div id="popupMessage" class="popup">Data saved</div>

<script>
    document.getElementById('saveButton').addEventListener('click', function() {
        // Optional AJAX request to save data
        fetch('save_data.php', { method: 'POST' })
            .then(response => response.text())
            .then(data => {
                // Show the popup when data is saved
                let popup = document.getElementById('popupMessage');
                popup.style.display = 'block';
                setTimeout(function() {
                    popup.style.display = 'none';
                }, 2000); // Hide after 2 seconds
            })
            .catch(error => console.error('Error:', error));
    });
</script>

</body>
</html>
