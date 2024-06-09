 <?php
$db_path = '/home/app/w3s-dynamic-storage/database.db';

if (!file_exists(dirname($db_path))) {
    mkdir(dirname($db_path), 0777, true);
}

try {
    $conn = new PDO("sqlite:$db_path");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $action = $_POST['action'];

        if ($action == 'load') {
            $stmt = $conn->query("SELECT unit_id, book_name, isbn, student_name, ctc, email, date_signed_out, date_to_return FROM entries");
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($data);
        } elseif ($action == 'save') {
            $data = json_decode($_POST['data'], true);
            $conn->exec("DELETE FROM entries");
            $stmt = $conn->prepare("INSERT INTO entries (unit_id, book_name, isbn, student_name, ctc, email, date_signed_out, date_to_return) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            foreach ($data as $row) {
                $stmt->execute($row);
            }
            echo "Data saved successfully.";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
