<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perform database connection and authentication (use mysqli or PDO)
    $conn = new mysqli("nathstack.tech", "u500921674_adabof", "OnGod@123", "u500921674_adabof");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM admins WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Authentication successful
            $_SESSION["admin_username"] = $username;
            header("Location: add_blog.php");
            exit();
        } else {
            $error_message = "Invalid username or password";
        }
    } else {
        $error_message = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'meta.php' ?>
    <title> Login - Adabof Steel Complex - Roofing Service, Construction Company, Contractor</title>
    <?php include 'cdn.php' ?>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <div class="login_all">
        <div class="login_swiper">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide about_slide">
                        <img src="./images/5.jpg" alt="">
                    </div>
                    <div class="swiper-slide about_slide">
                        <img src="./images/3.jpg" alt="">
                    </div>
                    <div class="swiper-slide about_slide">
                        <img src="./images/2.jpg" alt="">
                    </div>

                </div>

                <div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="login_forms">
            <div class="title">
                <h2>Admin Login - Adabof Steel Complex</h2>
            </div>
            <?php if (isset($error_message)) { ?>
                <p style="color: red;"><?php echo $error_message; ?></p>
            <?php } ?>
            <form method="post" action="">
                <div class="forms">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required>
                </div>
                <div class="forms">
                    <label for="password">Password:</label>
                    <input type="password" id="password" placeholder="Enter your password" name="password" required>
                </div>
                <div class="forms">
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
    <script src="./js/swiper.js"></script>

</body>

</html>