<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://cdn.emailjs.com/dist/email.min.js"></script>
</head>

<body>
    <div class="connect_all">
        <div class="connect_title">
            <h1>Let's Connect</h1>
        </div>
        <form id="myForm">
            <div class="forms">
                <label>Your Full Name:</label>
                <input type="text" placeholder="Enter your full name" name="full_name" id="full_name">
            </div>

            <div class="forms">
                <label>Your E-mail Address:</label>
                <input type="email" placeholder="Enter your E-mail address" name="email" id="email">
            </div>

            <div class="forms">
                <label>Your Phone Number:</label>
                <input type="number" placeholder="Enter your Phone Number" name="number" id="number" min="0">
            </div>

            <div class="forms">
                <label>Your Message:</label>
                <textarea name="message" placeholder="Enter your message" id="message" cols="30" rows="10"></textarea>
            </div>

            <div class="forms">
                <button type="button"  onclick="sendEmail()">Submit</button>
                <span id="loadingMessage" style="display:none;">Please wait...</span>
            </div>
        </form>

    </div>
    <script src="https://cdn.emailjs.com/dist/email.min.js"></script>
    <script type="text/javascript">
        (function() {
            emailjs.init("FlL_-1AYtWI0nAxHO");
        })();

        function sendEmail() {
            var full_name = document.getElementById('full_name').value;
            var email = document.getElementById('email').value;
            var number = document.getElementById('number').value;
            var message = document.getElementById('message').value;

            // Show loading message
            document.getElementById('loadingMessage').style.display = 'inline';

            var templateParams = {
                full_name: full_name,
                email: email,
                number: number,
                message: message
            };

            emailjs.send('service_pmoq1zq', 'template_cbo5nyc', templateParams)
                .then(function(response) {
                    console.log('Success!', response.status, response.text);
                    alert('Your message has been sent successfully!');
                    // Hide loading message after success
                    document.getElementById('loadingMessage').style.display = 'none';
                }, function(error) {
                    console.log('Failed...', error);
                    alert('There was an error while sending your message. Please try again later.');
                    // Hide loading message after failure
                    document.getElementById('loadingMessage').style.display = 'none';
                });
        }
    </script>
    <script>
        function onSubmit(token) {
            document.getElementById("myForm").submit();
        }
    </script>
</body>

</html>