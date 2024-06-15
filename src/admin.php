<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="icon" type="image/jpg" href="images/favicon.png">
    <link rel="stylesheet" href="css/tableStyles.css">
    <script src="scripts/phpscripts.js" defer></script>
    <script src="scripts/jscript.js" type="text/javascript"></script>
    <script src="scripts/buttons.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/8acb3ba4c3.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <h1>
        <a href="index.php"><img src="images/mvpoclogo2.png" alt="OC MVP logo" class="ocicon"></a>
        
        </h1>
        
    </header>

    <main>    
        <table id="entries_table">
            <tr>
                <th>Unit ID</th>
                <th>Book Name</th>
                <th>ISBN</th>
                <th>Student Name</th>
                <th>CTC #</th>
                <th>Email</th>
                <th>Date Signed Out</th>
                <th>Date to Return</th>
                <th>Actions</th>
            </tr>
        </table>

        <div id="form_container">
            <h2>Add/Edit Entry </h2>
            <form id="entry_form">
                <input type="hidden" id="entry_id" name="id">
                <label for=" unit_id">Unit ID:</label>
                <input type="text" id="unit_id" name="unit_id" required>
                <label for="book_name">Book Name:</label>
                <input type="text" id="book_name" name="book_name" required>
                <label for="isbn">ISBN:</label>
                <input type="text" id="isbn" name="isbn" required>
                <label for="student_name">Student Name:</label>
                <input type="text" id="student_name" name="student_name">
                <label for="ctc">CTC #:</label>
                <input type="text" id="ctc" name="ctc">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
                <label for="date_signed_out">Date Signed Out:</label>
                <input type="date" id="date_signed_out" name="date_signed_out">
                <label for="date_to_return">Date to Return:</label>
                <input type="date" id="date_to_return" name="date_to_return">
                <button type="button" id="save_button" onclick="addEntry()">Save</button><br><br>
            </form>
        </div>

        <aside class="right">
        
        <h2>Administrator </h2>
            <div class="button-container">                
                <form id="upload_form" enctype="multipart/form-data">
                    <label for="data_file"> Choose file to Upload:</label>
                    <input type="file" id="data_file" name="data_file" accept=".csv" required>                    
                </form>                
            </div>
            <button type="button" onclick="uploadFile()">Upload</button>
            <button onclick="exportToCSV()">Export to CSV</button>
        </aside>
    </main>

    <footer>        
            <a href="index.php"><i class="fa-solid fa-house"></i></a><a href="#"> Back to Top</a>
            <p>&copy; 2024 Moe O. All rights reserved.</p>        
    </footer>
</body>
</html>
