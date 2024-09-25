<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adabof Steel Complex</title>
    <?php include 'cdn.php'; ?>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/index.css">
    <!-- Include anime.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
</head>

<body>
    <?php include 'sidebar.php'; ?>

    <div class="home">
        <div class="logo" id="animated-logo"></div>
        <h1 id="typed-text">Welcome to <span id="typed"></span></h1>
      
        <div class="butt">
            <a href="login.php">Get Started</a>
        </div>
        <div class="powered">
            <p>This system is Powered by <a href="https://wa.link/uhvnz5" target="_blank">Nathstack Tech</a></p>
        </div>
    </div>

    <script>
        // Anime.js animation for logo
        anime({
            targets: '#animated-logo',
            translateX: 250,
            easing: 'easeInOutQuad',
            direction: 'alternate',

        });

        // Initialize typing effect for h1
        var typed = new Typed('#typed', {
            strings: ["Adabof Steel Complex"], // Text to be animated
            typeSpeed: 50, // Typing speed in milliseconds
            showCursor: false // Hide the cursor
        });
    </script>
</body>

</html>