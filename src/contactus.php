<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="icon" type="image/jpg" href="images/favicon.jpg">
    <script src="scripts/jscript.js" type="text/javascript"></script>
    <script src="scripts/buttons.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/buttonStyles.css">
</head>

<body>

    <header class="header">
        <h1>
            <a href="index.php"><img src="images/mvpoclogo2.png" alt="Button 1" class="ocicon"></a>
        </h1>
    </header>

    <div class="main">
        <aside class="left">
            <div class="dropdown">
                <button onclick="mydropFunction()" class="dropbtn">Main_Menu</button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="index.php">Home</a>
                    <a href="search.php">Search</a>
                    <a href="account.php">Account</a>
                    <a href="aboutus.php">About</a>
                    <a href="contactus.php">Contact</a>
                    <a href="loginpage.php">Admin</a>
                </div>
            </div>
        </aside>

        <main>
            <h1>Contact Us</h1>
            <br><br>
            <form action="submit_form.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea><br><br>

                <button type="submit">Send</button>
            </form>
            <br><br>
            <footer>
                <h1>
                    <p>&copy; 2024 Moe O. All rights reserved.</p>
                </h1>
            </footer>
        </main>

        <aside class="right">
            <div class="right-images">
                <a href="https://studentveterans.org/chapters/student-resources/" target="_blank"><img src="images/SVA_Seal_Transparent_Backgroundresized.png" alt="Search button" class="small-image"></a>
            </div>

            <p><strong>Join SVA</strong></p>
        </aside>
    </div>
</body>

</html>
