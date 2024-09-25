<?php
session_start();

// Check if the user is not logged in or is not an admin, redirect to the login page


if (!isset($_SESSION["admin_username"])) {
    header("Location: login.php");
    exit();
}

// Continue with the rest of your code for deleting a blog post
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_blog_id"])) {
    $blog_id = $_POST["delete_blog_id"];

    $conn = new mysqli("nathstack.tech", "u500921674_adabof", "OnGod@123", "u500921674_adabof");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Delete the blog post
    $delete_sql = "DELETE FROM posts WHERE id = ?";
    $delete_stmt = $conn->prepare($delete_sql);
    $delete_stmt->bind_param("i", $blog_id);

    if ($delete_stmt->execute()) {
        // Blog post deleted successfully
        echo "<script>alert('Blog post deleted successfully');</script>";
    } else {
        // Error deleting blog post
        echo "<script>alert('Error: " . $delete_stmt->error . "');</script>";
    }

    $delete_stmt->close();
    $conn->close();
}

// Fetch and display the list of blog posts
$conn = new mysqli("nathstack.tech", "u500921674_adabof", "OnGod@123", "u500921674_adabof");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$select_sql = "SELECT * FROM posts";
$result = $conn->query($select_sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'meta.php' ?>
    <title> Delete Blog - Adabof Steel Complex - Roofing Service, Construction Company, Contractor</title>
    <?php include 'cdn.php' ?>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/about.css">
    <link rel="stylesheet" href="./css/blog.css">
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="hero_bg">
        <h1>Delete Blog - Adabof Steel Complex</h1>
    </div>
    <div class="blog_list">
        <h2>List of Blog Posts</h2>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<div class='blog_item'>";
            echo "<h3>" . $row["title"] . "</h3>";
            echo "<p>" . $row["content"] . "</p>";
            echo "<form method='post' action='delete_blog.php'>";
            echo "<input type='hidden' name='delete_blog_id' value='" . $row["id"] . "'>";
            echo "<button type='submit'>Delete</button>";
            echo "</form>";
            echo "</div>";
        }
        ?>
    </div>

    <?php include 'footer.php' ?>
    <!-- Add any additional scripts or stylesheets as needed -->
    <script src="./js/navbar.js"></script>
</body>

</html>