<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate data
    if (empty($name) || empty($email) || empty($message)) {
        echo "All fields are required.";
        exit;
    }

    // Set the recipient email address
    $to = "adityanair.m4063@gmail.com"; // Change to your email address

    // Set the email subject
    $subject = "New Contact Message from $name";

    // Build the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Set the email headers
    $headers = "From: $name <$email>";

    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        $response['success'] = true;
        $response['message'] = "Message sent successfully!";
    } else {
        $response['message'] = "Error sending message. Please try again.";
    }
    echo json_encode($response);
} else {
    echo "Invalid request.";
}
?>