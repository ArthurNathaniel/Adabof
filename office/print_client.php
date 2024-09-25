<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page
    header("Location: login.php");
    exit();
}
// Include database connection
include 'db.php';

// Check if client ID is provided in the URL
if (isset($_GET['id'])) {
    // Get client ID
    $client_id = $_GET['id'];

    // Query to retrieve client details
    $sql = "SELECT * FROM client_details WHERE id = $client_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch client details
        $client = $result->fetch_assoc();

        // Close the database connection
        $conn->close();
    } else {
        echo "Client not found.";
        exit; // Stop further execution
    }
} else {
    echo "Client ID not provided.";
    exit; // Stop further execution
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Client Details</title>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/client.css">
    <link rel="stylesheet" href="./css/invoice.css">
</head>

<body>
    <div class="navbar_top">
        <div class="nav_logo"></div>
        <div class="nav_title">
            <h1>CLIENT DETAILS</h1>
        </div>
    </div>
    <div class="print_client_all">
        <h1>Client Details</h1>
        <p><strong>Client Name:</strong> <?php echo $client['client_name']; ?></p>
        <p><strong>Phone Number:</strong> <?php echo $client['client_phone_number']; ?></p>
        <p><strong>WhatsApp Number:</strong> <?php echo $client['client_whatsapp']; ?></p>
        <p><strong>Email Address:</strong> <?php echo $client['client_email']; ?></p>
        <p><strong>Location:</strong> <?php echo $client['client_location']; ?></p>
    </div>
    <script>
        // JavaScript to trigger the print dialog when the page loads
        window.onload = function() {
            window.print();
        };
    </script>

    <div class="last_details">
        <div class="nav_logo"></div>
        <div class="location">
            <h2>CONTACT US:</h2>
            <br>
            <p><i class="fa-solid fa-location-dot"></i> Airport Roundabout, Opposite DVLA, Ksi</p>
            <p><i class="fa-solid fa-phone"></i> +233 24 910 3331 / +233 59 636 8628</p>
        </div>
    </div>
</body>

</html>