<?php
   include 'connect.php';
?>﻿

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>ContactUs</title>
    <link rel="stylesheet" href="css/ContactUs_style.css"/>
</head>
<body>
    <section>
        <div class="container">
            <div class="contact-form">
                <h3>Send us a message</h3>
            </div>
            <form>
                <div class="form-group">
                    <input type="text" name="name" placeholder="Name" />
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email Address" />
                </div>
                <div class="form-group">
                    <input type="message" placeholder="Your Message" />
                </div>
                <button type="submit">Send Message</button>
            </form>
        </div>
        <div class="contact-info">
            <h3>Contact Information</h3>
            <p>123-213- 213</p>
            <p>info@example.com</p>
            <p>123 NewYork</p>
        </div>
    </section>

        <footer class="loglink">
			<input type="submit" id="indexPage" value="Go Back to Menu">
		</footer>
</body>
    
    <script>
        const ind = document.getElementById("indexPage");
        ind.onclick = goIndex;

        function goIndex(){
        window.location.href = "index.php";
		}
		</script>

</html>

<?php include_once("includes/footer.php"); ?>