<!DOCTYPE html>
<html>
<head>
    <title>Contact Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            font-family: 'Times New Roman', serif;
            margin: 0;
            padding: 0;
    
            /* Allow body to scroll if content exceeds the viewport */
            overflow-y: auto;
            overflow-x: hidden;
    
            /* Add padding to avoid the container overlapping the fixed nav */
            padding-top: 5em;
            text-align: center; 
            color: #fff;
        }
    
        .container {
                background-color: rgba(10, 10, 40, 0.9);
                padding: 30px 20px;
                border-radius: 10px;
                width: 90%;
                max-width: 600px;
                margin: 2em auto; /* Center the container and add space from the top */
                text-align: center;
                margin-top: 16em;
            }
    
            .container h1 {
                color: #fff;
                margin-top: 0;
            }
    
            .container p {
                text-align: justify;
                line-height: 1.6;
                color: #fff;
            }
    
            .contact-info {
                margin-bottom: 30px;

            }
            .contact-info p {
                margin: 10px 0;
                line-height: 1.6;
            }
            .contact-form label {
                display: block;
                margin-top: 10px;
            }
            .contact-form input, .contact-form textarea {
                width: 100%;
                padding: 10px;
                margin-top: 5px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }
            .contact-form button {
                background-color: #007BFF;
                color: #fff;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
                margin-top: 20px;
            }
            .contact-form button:hover {
                background-color: #0056b3;
            }
    </style>
</head>
<body>
    <header>
    <h1>Contact Us</h1>
        <nav>
            <a href="index.html">Homepage</a> |
            <a href="student_home.html">Student Homepage</a> |
            <a href="educator_home.html">Educator Homepage</a> |
            <a href="admin_home.html">Administrator Homepage</a> |
            <a href="logout.php">Log Out</a>
        </nav>
    </header>
    <div class="container">
        <div class="contact-info">
            <p><strong>Company Name:</strong> DriveWise</p>
            <p><strong>Email:</strong> <a href="mailto:support@drivewise.com">support@drivewise.com</a></p>
            <p><strong>Telephone:</strong> <a href="tel:+60123456789">+60123456789</a></p>
            <p><strong>Address:</strong> Lab 1, Asia Pacific University of Technology & Innovation (APU), Jalan Teknologi 5, Taman Teknologi Malaysia, 57000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur</p>
            <p><strong>Operating Hours:</strong> 9am-6pm (Mondays to Fridays). Closed on Saturdays, Sundays, and Public Holidays.</p>
        </div>

        <div class="contact-form">
            <h2>Send Us a Message</h2>
            <form id="contact-form">
                <label for="name">Your Name</label>
                <input type="text" id="name" placeholder="Enter your name" required>

                <label for="email">Your Email</label>
                <input type="email" id="email" placeholder="Enter your email" required>

                <label for="subject">Subject</label>
                <input type="text" id="subject" placeholder="Enter the subject" required>

                <label for="message">Message</label>
                <textarea id="message" rows="5" placeholder="Write your message here" required></textarea>

                <button type="button" id="submit-btn">Send Message</button>
            </form>
        </div>
    </div>
    <script src = 'starry.js'></script>
    <script>
        // Handle form submission
        document.getElementById('submit-btn').addEventListener('click', () => {
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const subject = document.getElementById('subject').value;
            const message = document.getElementById('message').value;

            if (!name || !email || !subject || !message) {
                alert('Please fill in all fields.');
                return;
            }

            alert(`Thank you, ${name}. Your message has been sent successfully!`);

            // Clear the form
            document.getElementById('contact-form').reset();
        });
    </script>
</body>
</html>
