<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'meta.php' ?>
    <title> Blog - Adabof Steel Complex - Roofing Service, Construction Company, Contractor</title>
    <?php include 'cdn.php' ?>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/about.css">
    <link rel="stylesheet" href="./css/blog.css">
</head>

<body>
    <?php include 'navbar.php' ?>
  

    <?php
    if (isset($_GET['id'])) {
        $blogId = $_GET['id'];

        // Fetch the blog post from the database
        $conn = new mysqli("nathstack.tech", "u500921674_adabof", "OnGod@123", "u500921674_adabof");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT title, content, image FROM posts WHERE id = $blogId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<div class='blog_gridss'>";
            echo "<h1>" . $row['title'] . "</h1>";
            echo "<img class='blog_image bbb' src='uploads/" . $row['image'] . "' alt='" . $row['title'] . "'>";
            echo "<p>" . $row['content'] . "</p>";
            echo "</div>";
        } else {
            echo "Blog not found";
        }

        $conn->close();
    } else {
        echo "Invalid blog ID";
    }
?>
    <?php include 'footer.php' ?>
    <script>
        function showContent(id) {
            window.location.href = "view_blog.php?id=" + id;
        }
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


