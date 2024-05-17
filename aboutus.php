<?php
   include 'connect.php';
?>


<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>About Us</title>
    <link rel="stylesheet" href="css/AboutUs_style.css"/>
</head>
<body>
    <div class="heading">
        <h1>About us</h1>
        <p>
            "Vibra: Where Visuals Meet Vibes – Your Creative Hub!"
        </p>
    </div>
    <div class="container">
        <section class="about">
            <div class="about-image">
                <img src="/f2hudar/images/lance.png" />
            </div>
            <div class="about-content">
                <h2>FOUNDER</h2>
                <p>
                    I'm Lynnon Lance Antor, a dedicated and
                    enthusiastic student committed to
                    academic excellence and personal growth.
                    With a passion for learning and a drive to succeed,
                    I strive to make the most of my educational journey.
                    I am currently enrolled in BS Computer Science at Cebu Institute Techonology - University
                    , where I have been actively pursuing my academic interests in programming
                    . My coursework has provided me with a solid foundation in programming, and I consistently seek opportunities to expand my understanding and expertise.
                </p>
                <a href="" class="read-more">Read more</a>
            </div>
        </section>
    </div>
    <div class="container">
        <section class="about">
            <div class="about-image">
                <img src="/f2hudar/images/darwin.jpg" />
            </div>
            <div class="about-content">
                <h2>FOUNDER</h2>
                <p>
                    Greetings! I am Charles Darwin Hudar, an engaged and
                    motivated student dedicated to academic excellence and
                    personal development. Through my educational pursuits, I
                    am committed to both expanding my knowledge and refining my skills to become a
                    well-rounded individual.As a student, I pride myself on possessing a diverse skill set that enhances my academic performance and contributes to my overall growth. I am adept at [mention skills such as critical thinking, problem-solving, research, communication, etc.], allowing me to approach challenges with confidence and creativity.


                </p>
                <a href="" class="read-more">Read more</a>
            </div>
        </section>
    </div>
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