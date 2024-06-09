<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title> 
    <link rel="icon" type="image/jpg" href="images/favicon.png">       
    <link rel="stylesheet" href="css/login.css">

</head>

<body>

    <header class="header">
        <h1>
            <a href="index.php"><img src="images/mvpoclogo2.png" alt="Button 1" class="ocicon"></a>
        </h1>
    </header>


    <div class="loginmain">
        <main>
            <div class="login-container">
                <h2>Admin Login</h2>
                <br><br>

                <form id="login-form">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <button type="submit">Login</button>
                </form>
            </div>            
        </main>

        
            
    </div>
    <script src="scripts/logjava.js" type="text/javascript"></script>
</body>

<footer>    
        <h3>&copy; 2024 Moe O. All rights reserved.</h3>
</footer>


</html>


