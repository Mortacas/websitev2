<?php
$db_path = '/home/app/w3s-dynamic-storage/database.db';

// Ensure the directory exists
if (!file_exists(dirname($db_path))) {
    mkdir(dirname($db_path), 0777, true);
}

try {
    $conn = new PDO("sqlite:$db_path");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "
    CREATE TABLE IF NOT EXISTS entries (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        unit_id TEXT NOT NULL,
        book_name TEXT NOT NULL,
        isbn TEXT NOT NULL,
        student_name TEXT,
        ctc TEXT,
        email TEXT,
        date_signed_out TEXT,
        date_to_return TEXT 
    )";
    
    $conn->exec($sql);
    echo "Database path: " . realpath($db_path) . "<br>";
    echo "Database and table created successfully.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>

