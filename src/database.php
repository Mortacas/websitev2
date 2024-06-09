<?php
$db_path = '/home/app/w3s-dynamic-storage/database.db';

try {
    $conn = new PDO("sqlite:$db_path");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "
    CREATE TABLE IF NOT EXISTS entries (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        column1 TEXT NOT NULL,
        column2 TEXT NOT NULL,
        column3 TEXT NOT NULL,
        column4 TEXT NOT NULL,
        column5 TEXT NOT NULL
    )";
    
    $conn->exec($sql);
    echo "Database and table created successfully.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>

