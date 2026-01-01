<?php
// process_order.php
header('Content-Type: application/json');

// Helper function to sanitize input
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Sanitize Inputs
    $name = sanitize_input($_POST['name'] ?? '');
    $email = sanitize_input($_POST['email'] ?? '');
    $message = sanitize_input($_POST['message'] ?? '');

    // 2. Validate Inputs
    $errors = [];
    if (empty($name)) {
        $errors[] = "Name is required.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required.";
    }
    
    // 3. Security Headers (Best Practices)
    // Prevent XSS in modern browsers
    header("X-XSS-Protection: 1; mode=block");
    // Prevent MIME-sniffing
    header("X-Content-Type-Options: nosniff");

    if (empty($errors)) {
        // In a real app, you would save to DB or send email here.
        // For now, we return a success response.
        echo json_encode([
            "status" => "success",
            "message" => "Thank you, $name. We have received your message securely."
        ]);
    } else {
        http_response_code(400);
        echo json_encode([
            "status" => "error",
            "errors" => $errors
        ]);
    }
} else {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Method Not Allowed"]);
}
?>
