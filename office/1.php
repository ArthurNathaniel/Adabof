<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML to PDF</title>
    <link rel="stylesheet" href="./css/base.css">
    <!-- Include html2pdf library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
</head>

<body>

    <div id="content">
        <h1>HTML to PDF</h1>
        <!-- Your HTML content here -->
        <p>This is a sample HTML content.</p>
    </div>
    <button id="downloadBtn">Download PDF</button>

    <script>
        // Function to handle button click event
        document.getElementById('downloadBtn').addEventListener('click', function() {
            // Select the element containing HTML content to be converted
            const element = document.getElementById('content');
            // Options for PDF generation
            const options = {
                filename: 'html_to_pdf.pdf', // Set PDF filename
                image: {
                    type: 'jpeg',
                    quality: 0.98
                }, // Image quality
                html2canvas: {
                    scale: 2
                }, // Scale for better resolution
                jsPDF: {
                    unit: 'in',
                    format: 'letter',
                    orientation: 'portrait'
                } // PDF format options
            };
            // Convert HTML to PDF
            html2pdf().from(element).set(options).save();
        });
    </script>
</body>

</html>