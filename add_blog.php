<?php
// Check if the user is not logged in, redirect to the login page
session_start();
if (!isset($_SESSION["admin_username"])) {
    header("Location: login.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];

    // Check if a file was uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        // Move the uploaded file to a designated folder
        move_uploaded_file($image_tmp, 'uploads/' . $image);
    } else {
        // Handle the case when no file is uploaded
        $image = "";
    }

    $conn = new mysqli("nathstack.tech", "u500921674_adabof", "OnGod@123", "u500921674_adabof");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if a post with the same title already exists
    $check_sql = "SELECT * FROM posts WHERE title = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $title);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        // A post with the same title already exists, handle accordingly
        echo "<script>alert('Error: A post with the same title already exists.');</script>";
    } else {
        // Insert the new post
        $insert_sql = "INSERT INTO posts (title, content, image) VALUES (?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("sss", $title, $content, $image);

        if ($insert_stmt->execute()) {
            // Use JavaScript alert for success
            echo "<script>alert('Blog added successfully');</script>";
        } else {
            // Use JavaScript alert for error
            echo "<script>alert('Error: " . $insert_stmt->error . "');</script>";
        }

        $insert_stmt->close();
    }

    $check_stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'meta.php' ?>
    <title> Add Blog - Adabof Steel Complex - Roofing Service, Construction Company, Contractor</title>
    <?php include 'cdn.php' ?>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/about.css">
    <link rel="stylesheet" href="./css/blog.css">
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="hero_bg">
        <h1>Add Blog - Adabof Steel Complex</h1>

    </div>
    <div class="forms_all">
        <div class="forms_title">
            <h1>Add a blog</h1>

        </div>
        <!-- HTML form for adding a blog post -->
        <form method="post" action="add_blog.php" enctype="multipart/form-data">
            <div class="forms">
                <label>Title: </label>
                <input type="text" placeholder="Enter your title" name="title" required>
            </div>
            <div class="forms">
                <label>Content: </label>
                <div id="editor" style="height: 300px;"></div>
                <input type="hidden" name="content" id="hidden-content">
            </div>

            <div class="forms">
                <label>Add Image:</label>
                <input type="file" name="image" required>
            </div>
            <div class="forms">
                <button type="submit">Add a Blog</button>
            </div>

        </form>

        <p><a href="delete_blog.php" style="color: red;">Delete a blog</a></p>
    </div>

    <?php include 'footer.php' ?>
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

        quill.on('text-change', function() {
            var hiddenInput = document.getElementById('hidden-content');
            hiddenInput.value = quill.root.innerHTML;
        });
    </script>


    <script>
        $(document).ready(function() {
            $('[data-fancybox]').fancybox();
        });
    </script>
    <script src="./js/swiper.js"></script>
    <script src="./js/navbar.js"></script>
</body>

</html>