<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'meta.php' ?>
    <title> Construction Service - Adabof Steel Complex - Roofing Service, Construction Company, Contractor</title>
    <?php include 'cdn.php' ?>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/about.css">
    <link rel="stylesheet" href="./css/services.css">
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="hero_bg">
        <h1>Construction Service - Adabof Steel Complex</h1>
    </div>


    <section>
        <div class="services_alls">
            <div class="all_title">
                <h1>Construction Service</h1>
            </div>
            <div class="services">
                <p>
                    At Adabof Steel Complex, our construction services redefine excellence in every project. From concept to completion, our skilled team of professionals brings innovation, precision, and a passion for quality to the construction process. Whether it's building your dream home, expanding commercial spaces, or revitalizing existing structures, we are dedicated to delivering superior results. Our commitment to transparent communication, adherence to timelines, and utilization of top-tier materials sets us apart. Choose Adabof Steel Complex for construction services that not only meet but exceed your expectations, shaping spaces that stand as a testament to enduring craftsmanship and visionary design. </p>

            </div>

        </div>
    </section>
    <section>
        <div class="our_projects_all">
            <div class="our_project_title">
                <h1>Our Projects</h1>
            </div>
            <div class="project_grid">
                <div class="project">
                    <a href="./images/1.jpg" data-fancybox="gallery">
                        <img src="./images/1.jpg" alt="Image 1">
                    </a>
                </div>
                <div class="project">
                    <a href="./images/2.jpg" data-fancybox="gallery">
                        <img src="./images/2.jpg" alt="Image 1">
                    </a>
                </div>
                <div class="project">
                    <a href="./images/3.jpg" data-fancybox="gallery">
                        <img src="./images/3.jpg" alt="Image 1">
                    </a>
                </div>
                <div class="project">
                    <a href="./images/4.jpg" data-fancybox="gallery">
                        <img src="./images/4.jpg" alt="Image 1">
                    </a>
                </div>
                <div class="project">
                    <a href="./images/5.jpg" data-fancybox="gallery">
                        <img src="./images/5.jpg" alt="Image 1">
                    </a>
                </div>
                <div class="project">
                    <a href="./images/6.jpg" data-fancybox="gallery">
                        <img src="./images/6.jpg" alt="Image 1">
                    </a>
                </div>

            </div>

            <div class="project_btn">
                <a href="./our_projects.php">See More</a>
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    <?php include 'footer.php' ?>
    <script>
        $(document).ready(function() {
            $('[data-fancybox]').fancybox();
        });
    </script>
    <script src="./js/swiper.js"></script>
    <script src="./js/navbar.js"></script>
</body>

</html>