<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            .cont{
                margin: 10% 0 10% 0;
                text-align: center;
            }
            .cont h1{
                font-size: 80px;
            }
        </style>
    <link rel="stylesheet" href="css/style_userpage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
<body>

    <header>
        <div class="header-container">
            <div class="header-wrapper">
                <div class="iconBox1">
                    <i class="fa-solid fa-arrow-left" id="menu"></i>
                </div>
                <div class="iconBox2">
                    <i class="fa-solid fa-house"></i>
                    <i class="fa-solid fa-gear"></i>
                    <i class="fa-solid fa-user" id="profile"></i>
                    <i class="fa-solid fa-circle-half-stroke" id="darkTheme"></i>
                </div>
            </div>
        </div>
    </header>

    <div class="cont">
        <h1> 
        <?php
        session_start();
        if(isset($_SESSION['firstname']) && isset($_SESSION['lastname'])) {
            // Display the username instead of "USER PAGE"
            echo $_SESSION['firstname'] . " " . $_SESSION['lastname'] . "'s Page";
        } else {
            // Display a default message if the username is not set
            echo "USER PAGE";
        }
        ?>
        </h1>
    </div>



    <script src="js/index.js"></script>
</body>
</html>