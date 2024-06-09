<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="icon" type="image/jpg" href="images/favicon.png">
    <link rel="stylesheet" href="css/tableStyles.css">
    <script src="scripts/accountsearchscript.js" defer></script>
</head>

<body>
    <header>

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
                  <!--This will be auto filled-->
                </tbody>
            </table>
            
        </form>
    </main>

    <footer>
        <p>&copy; 2024 Library. All rights reserved.</p>
    </footer>
</body>

</html>