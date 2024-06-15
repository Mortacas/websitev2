<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="icon" type="image/jpg" href="images/favicon.png">
    <link rel="stylesheet" href="css/searchstyles.css">
    <script src="scripts/accountsearchscript.js"></script>
    <link rel="stylesheet" href="css/buttonStyles.css">    
    <script src="scripts/buttons.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/8acb3ba4c3.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
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

        <div class="search-container">
            <a href="index.php"><img src="images/mvpoclogo2.png" alt="OC Logo" class="ocicon"></a>
                <h2><pre>Enter Name and CTC to Search Account </pre></h2>
                <input type="text" id="studentNameInput" placeholder="Enter Student Name, First Name Last Name">
                <input type="text" id="studentCtcInput" placeholder="Must Enter CTC then press Search">
                <button onclick="searchBooks()">Search</button> 
                <br>          
        </div>      

    </header>

    <main>
        <form id="bookRequestForm">
            <table id="data_table">
                <thead>
                    <tr>
                        <th>Unit ID</th>
                        <th>Book Name</th>
                        <th>ISBN</th>
                        <th>Date Signed Out</th>
                        <th>Date to return</th>                        
                      
                    </tr>
                </thead>
                <tbody>
                  
                </tbody>
            </table>
            
        </form>
    </main>
    <footer>        
            <a href="index.php"><i class="fa-solid fa-house"></i></a><a href="#"> Back to Top</a>
            <p>&copy; 2024 Moe O. All rights reserved.</p>        
    </footer>
</body>

</html>