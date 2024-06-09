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

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $action = $_POST['action'];
        
        if ($action == 'add') {
            $stmt = $conn->prepare("INSERT INTO entries (unit_id, book_name, isbn, student_name, ctc, email, date_signed_out, date_to_return) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([
                $_POST['unit_id'], 
                $_POST['book_name'], 
                $_POST['isbn'], 
                $_POST['student_name'], 
                $_POST['ctc'], 
                $_POST['email'], 
                $_POST['date_signed_out'] ?? null, 
                $_POST['date_to_return'] ?? null
            ]);
            echo "Entry added successfully.";
        } elseif ($action == 'edit') {
            $stmt = $conn->prepare("UPDATE entries SET unit_id = ?, book_name = ?, isbn = ?, student_name = ?, ctc = ?, email = ?, date_signed_out = ?, date_to_return = ? WHERE id = ?");
            $stmt->execute([
                $_POST['unit_id'], 
                $_POST['book_name'], 
                $_POST['isbn'], 
                $_POST['student_name'], 
                $_POST['ctc'], 
                $_POST['email'], 
                $_POST['date_signed_out'] ?? null, 
                $_POST['date_to_return'] ?? null, 
                $_POST['id']
            ]);
            echo "Entry edited successfully.";
        } elseif ($action == 'delete') {
            $stmt = $conn->prepare("DELETE FROM entries WHERE id = ?");
            $stmt->execute([$_POST['id']]);
            echo "Entry deleted successfully.";
        } elseif ($action == 'upload') {
            if (isset($_FILES['data_file']) && $_FILES['data_file']['error'] == 0) {
                $file = fopen($_FILES['data_file']['tmp_name'], 'r');
                while (($row = fgetcsv($file)) !== false) {
                    // Ensure the row has exactly 8 columns (unit_id, book_name, isbn, student_name, ctc, email, date_signed_out, date_to_return)
                    if (count($row) < 8) {
                        $row = array_pad($row, 8, null);
                    }
                    $stmt = $conn->prepare("INSERT INTO entries (unit_id, book_name, isbn, student_name, ctc, email, date_signed_out, date_to_return) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt->execute($row);
                }
                fclose($file);
                echo "File uploaded and data inserted successfully.";
            } else {
                echo "Error uploading file.";
            }
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] == 'export') {
        $stmt = $conn->query("SELECT unit_id, book_name, isbn, student_name, ctc, email, date_signed_out, date_to_return FROM entries");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=entries.csv');
        
        $output = fopen('php://output', 'w');
        fputcsv($output, array('Unit ID', 'Book Name', 'ISBN', 'Student Name', 'CTC #', 'Email', 'Date Signed Out', 'Date to Return'));
        foreach ($data as $row) {
            fputcsv($output, $row);
        }
        fclose($output);
        exit;
    } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $stmt = $conn->query("SELECT * FROM entries");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
