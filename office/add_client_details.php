<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page
    header("Location: login.php");
    exit();
}
include 'db.php';

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $client_name = $conn->real_escape_string($_POST['client_name']);
    $client_phone_number = $conn->real_escape_string($_POST['client_phone_number']);
    $client_whatsapp = $conn->real_escape_string($_POST['client_whatsapp']);
    $client_email = $conn->real_escape_string($_POST['client_email']);
    $client_location = $conn->real_escape_string($_POST['client_location']);

    // Check if the client already exists
    $check_sql = "SELECT * FROM client_details WHERE client_email = '$client_email' OR client_phone_number = '$client_phone_number'";
    $result = $conn->query($check_sql);

    if ($result->num_rows > 0) {
        echo "<script>alert('Client with the same email or phone number already exists!'); window.location.href = 'add_client_details.php';</script>";
    } else {
        // Attempt insert query execution
        $sql = "INSERT INTO client_details (client_name, client_phone_number, client_whatsapp, client_email, client_location)
        VALUES ('$client_name', '$client_phone_number', '$client_whatsapp', '$client_email', '$client_location')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('New record created successfully'); window.location.href = 'add_client_details.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close connection
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Details</title>
    <?php include 'cdn.php'; ?>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/client.css">
</head>

<body>
    <?php include 'sidebar.php'; ?>
    <div class="admin_all">
        <div class="clients_all_title">
            <h1>Client Details</h1>
        </div>
        <form id="clientForm" action="" method="post" enctype="">

            <div class="clients_grid">
                <div class="clients_forms">
                    <label>Client Name:</label>
                    <input type="text" placeholder="Enter your client name" name="client_name" required>
                </div>
                <div class="clients_forms">
                    <label>Client Phone Number:</label>
                    <input type="number" placeholder="Enter your client phone number" name="client_phone_number" required>
                </div>
                <div class="clients_forms">
                    <label>Client WhatsApp Number:</label>
                    <input type="number" placeholder="Enter your client WhatsApp" name="client_whatsapp" required>
                </div>
                <div class="clients_forms">
                    <label>Client Email Address:</label>
                    <input type="email" placeholder="Enter your client email" name="client_email" required>
                </div>
                <div class="clients_forms">
                    <label>Client Location:</label>
                    <input type="text" placeholder="Enter your client location" name="client_location" required>
                </div>
            </div>

            <div class="clients_grid">
                <div class="clients_forms">
                    <button id="submitButton" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <script src="../js/sidebar.js"></script>
    <script>
        document.getElementById("clientForm").addEventListener("submit", function() {
            document.getElementById("submitButton").innerText = "Please wait...";
        });
    </script>
</body>

</html>