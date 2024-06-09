 <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $bookIds = $data['bookIds'];

    if (empty($bookIds)) {
        echo "No books selected.";
        exit;
    }

    $to = "admin@example.com";
    $subject = "Book Borrow Request";
    $message = "The following books have been requested to borrow:\n\n";
    foreach ($bookIds as $bookId) {
        $message .= "Book ID: $bookId\n";
    }
    $message .= "\nPlease approve or deny the request.";

    $headers = "From: library@example.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "Request sent successfully.";
    } else {
        echo "Error sending request.";
    }
} else {
    echo "Invalid request method.";
}
