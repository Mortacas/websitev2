 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Layout</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/8acb3ba4c3.js" crossorigin="anonymous"></script>
</head>

<body>

    <header>
        <div class="leftheader">
            <a href="index.php" class="no-link-style">
                <p>OLYMPIC COLLEGE</p>
            </a>
        </div>

        <div class="centerheader">
            <div class="content-box1">Military & Veterans Service </div>
            <div class="content-box2"> Free Lending Library</div>
        </div>

        <div class="rightheader">
            <a href="index.php" class="no-link-style">
            <button class="button button1">HOME</button></a>
            <a href="index.php" class="no-link-style">
            <button class="button button2">CONTACT US</button></a>
            <a href="index.php" class="no-link-style">
            <button class="button button3">ABOUT US</button></a>
        </div>
    </header>

    <div class="topmain">
        <aside class="leftbody">
            <div class="sidebar-box">1</div>
            <div class="sidebar-box">2</div>
            <div class="sidebar-box">3</div>
        </aside>

        <main class="centerbody">
            <div class="content-box">12</div>
            <div class="content-box">13</div>
            <div class="content-box">14</div>
            <div class="content-box">15</div>
            <div class="content-box">16</div>
        </main>
        <!--this needs to be moved to as script file-->
<script>
const divToRemove = document.querySelector('.centerheader');
if (window.innerWidth < 445) {
  divToRemove.remove();
}
</script>
            <!--this needs to be moved to as script file-->

        <aside class="rightbody">
            <div class="sidebar-box">1</div>
            <div class="sidebar-box">2</div>
            <div class="sidebar-box">3</div>
        </aside>

        <div class="bottommain"></div>
    </div>

    <footer>
        <div class="footer-content">
            <p>&copy; Moises Orta - 2024</p>
            <div class="social-icons">
                <a href="https://www.facebook.com" class="no-link-style" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.youtube.com" class="no-link-style" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                <a href="https://www.instagram.com" class="no-link-style" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://www.linkedin.com" class="no-link-style" target="_blank"><i class="fa-brands fa-linkedin"></i></a>

            </div>
        </div>
    </footer>
</body>
</html>


<!--<a href="default.asp">
<img src="smiley.gif" alt="HTML tutorial" style="width:42px;height:42px;">
</a>>