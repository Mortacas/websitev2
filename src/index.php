<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="icon" type="image/jpg" href="images/favicon.png">
    <script src="scripts/jscript.js" type="text/javascript"></script>
    <script src="scripts/buttons.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/8acb3ba4c3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/buttonStyles.css">
</head>

<body>

    <header class="header">
        <h1>
        <a href="index.php"><img src="images/mvpoclogo2.png" alt="OC MVP logo" class="ocicon"></a>
        </h1>
    </header>


    <div class="main">
        <aside class="left">

            <div class="dropdown">
                <button onclick="mydropFunction()" class="dropbtn"><i class="fa-solid fa-bars"></i> Menu</button>
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
            <h1><strong>Welcome to Our Military Education and Veterans Service Free Lending Library!</strong></h1>
            <br>
            <div class="button-container">
                <div class="searchbutton"><a href="search.php"><img src="thumbnails/tsearchbutton.png"
                            alt="Search button" class="searchicon"></a></div>
                <div class="accountbutton"><a href="account.php"><img src="thumbnails/taccount.png"
                            alt="Account button" class="acconticon"></a></div>
                <div class="aboutbutton"><a href="aboutus.php"><img src="thumbnails/taboutus.png" alt="About Us button"
                            class="abouticon"></a></div>
                <div class="contactbutton"><a href="contactus.php"><img src="thumbnails/tcontactus.png"
                            alt="Contact us button" class="contacticon"></a></div>
                <div class="adminbutton"><a href="loginpage.php"><img src="thumbnails/tadmin.png" alt="admin button"
                            class="adminicon"></a></div>
            </div>
            <br>
            <p>Welcome and thank you for dropping by! We're excited to present a special collection of books tailored
                for military-connected students like ourselves, who are giving back to the school community and
                supporting those in need. Whether you're seeking resources to enhance your studies, explore career
                pathways, or simply unwind with a good book, our library is here to assist you — completely free of
                charge. Take a look at our selection, choose what resonates with you, and let these pages inspire and
                empower your journey. We appreciate your commitment, and may your reading bring both enjoyment and
                growth!
            </p>
            <br>
            <footer>
                <h3>
                    <p>&copy; 2024 Moe O. All rights reserved.</p>
                </h3>
            </footer>
        </main>

        <aside class="right">
            <div class="right-images">
                <a href="https://studentveterans.org/chapters/student-resources/" target="_blank"><img
                        src="images/SVA_Seal_Transparent_Backgroundresized.png" alt="Search buttomn"
                        class="small-image"></a>
                <p><strong>Join SVA</strong></p>
                <p>Click SVA logo </p>
                <p>above to see great</p>
                <p>benefits offered!</p>
            </div>


        </aside>
    </div>
</body>




</html>