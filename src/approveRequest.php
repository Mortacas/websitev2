 <?php
$db_path = '/home/app/w3s-dynamic-storage/database.db';

if (!file_exists(dirname($db_path))) {
    mkdir(dirname($db_path), 0777, true);
}

try {
    $conn = new PDO("sqlite:$db_path");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['bookId'])) {
        $bookId = $_GET['bookId'];

        $stmt = $conn->prepare("UPDATE entries SET student_name = ?, ctc = ?, email = ?, date_signed_out = ?, date_to_return = ? WHERE unit_id = ?");
        $stmt->execute([$_GET['student_name'], $_GET['ctc'], $_GET['email'], $_GET['date_signed_out'], $_GET['date_to_return'], $bookId]);

        echo "Book request approved and updated successfully.";
    } else {
        echo "No book ID provided.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
