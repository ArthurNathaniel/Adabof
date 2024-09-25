<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Receipt</title>
    <?php include 'cdn.php' ?>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/print.css">
    <style>
        .print_title {
            text-align: center;
        }

        .nav_logo {
            width: 230px;
            height: 130px;
            background-color: #fff;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="nav_logo">

        </div>
        <div class="navbar_details">
            <div class="nav_one">
                <p><strong>Location: </strong> Kumas Branch - Ahwiaa &
                    <br>
                    <strong>Location: </strong> Accra Branch - Pokuase
                </p>

                <p><strong>Tel: </strong>+233 20 838 5656 /+233 24 667 1778</p>
            </div>
            <div class="nav_two">
                <p><strong>Email: </strong>info@adabofsteel.com</p>
            </div>
        </div>


    </div>
<br>
<br>
    <div class="official">

        <button>OFFICIAL RECEIPT</button>
    </div>

    <div class="content">
        <?php
        include 'db.php';

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM receipts WHERE id=$id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<div class='print_all'>";
                // echo "<br>";
                // echo "<div class='print_title'>";
                // echo "<h2>Receipt Details</h2>";
                // echo "</div>";

                echo "<div class='print_grid'>";
                echo "<p><strong>ID:</strong> " . 'OGCR-2024-000' . $row["id"] . "</p>";
                echo "</div>";

                echo "<div class='print_grid'>";
                echo "<p><strong>Date:</strong> " . $row["date"] . "</p>";
                echo "</div>";

                echo "<div class='print_grid'>";
                echo "<p><strong>Client Name:</strong> " . $row["client_name"] . "</p>";
                echo "</div>";

                echo "<div class='print_grid'>";
                echo "<p><strong>Payment Method:</strong> " . $row["payment_method"] . "</p>";
                echo "</div>";

                echo "<div class='print_grid'>";
                echo "<p><strong>Other Method:</strong> " . $row["other_method"] . "</p>";
                echo "</div>";

                echo "<div class='print_grid'>";
                echo "<p><strong>Payment Type:</strong> " . $row["payment_type"] . "</p>";
                echo "</div>";

                echo "<div class='print_grid'>";
                echo "<p><strong>Amount:</strong> GH₵ " . $row["amount"] . "</p>";
                echo "</div>";

                echo "<div class='print_grid'>";
                echo "<p><strong>Amount Words:</strong> " . $row["amount_words"] . "</p>";
                echo "</div>";

                echo "<div class='print_btn'>";
                echo "<button onclick='window.print()' class='aa'>Print Receipt</button>";
                echo "</div>";
            } else {
                echo "Receipt not found";
            }
        } else {
            echo "No receipt ID provided";
        }
        echo "</div>";
        $conn->close();
        ?>
        <!-- <div class="sign">
            <h1>Signature</h1>
        </div> -->
    </div>

    <!-- Include html2pdf.js library -->
    <script src="path/to/html2pdf.js"></script>

    <script>
        function generatePDF() {
            const element = document.querySelector('.content');
            html2pdf()
                .from(element)
                .save();
        }
    </script>
</body>

</html>