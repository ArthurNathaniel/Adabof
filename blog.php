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
    <div class="hero_bg">
        <h1>Blog - Adabof Steel Complex</h1>
    </div>

    <section>
        <div class="blog_all">
            <div class="blog_title">
                <h1>NEWS/ BLOG</h1>
            </div>

            <?php
    // Fetch blog posts from the database
    $conn = new mysqli("nathstack.tech", "u500921674_adabof", "OnGod@123", "u500921674_adabof");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT id, title, image FROM posts ORDER BY id DESC"; // Order by ID in descending order
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<div class='blog_grid'>";
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='blog-card blog_card' onclick='showContent(" . $row['id'] . ")'>";
                    echo "<img class='blog_image' src='uploads/" . $row['image'] . "' alt='" . $row['title'] . "'>";
                    echo "<div class='blog_info'>";
                    echo "<p>" . $row['title'] . "</p>";
                    echo "</div>";
                    echo "</div>";
                }
                echo "</div>";
            } else {
                echo "No news/ blog available at the moment";
            }

            $conn->close();
            ?>

        </div>
    </section>

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