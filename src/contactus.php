<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TempMessage</title>
    <style>
        body, h1, p {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Helvetica Neue', sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative;
        }

        .home-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #007BFF;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }

        .home-button:hover {
            background-color: #0056b3;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .message-box {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .message-box h1 {
            font-size: 2.5em;
            color: #333333;
            margin-bottom: 20px;
        }

        .message-box p {
            font-size: 1.2em;
            color: #666666;
        }
    </style>
</head>
<body>
    <a href="index.php" class="home-button">Home</a>
    <div class="container">
        <div class="message-box">
            <h1>Thank You!</h1>
            <p>Thank you for contacting us, we will get back to you shortly.</p>
        </div>
    </div>
</body>
</html>
