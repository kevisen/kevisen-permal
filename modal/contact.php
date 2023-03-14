<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set the recipient email address here
    $to = "^pkevisen@gmail.com";
    // Collect the form data
    $name = trim($_POST["name"]);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $telephone = trim($_POST["telephone"]);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);
    // Check if all required fields are filled
    if (!empty($name) && !empty($email) && !empty($telephone) && !empty($subject) && !empty($message)) {
      // Set the email subject and message
      $email_subject = "New contact form submission: $subject";
      $email_message = "Name: $name\nEmail: $email\nTelephone: $telephone\n\nMessage:\n$message";
      // Set the email headers
      $headers = "From: $name <$email>\r\n";
      $headers .= "Reply-To: $email\r\n";
      // Send the email
      if (mail($to, $email_subject, $email_message, $headers)) {
        // Set success status and redirect to index.php
        header("Location: index.php?status=success");
        exit;
      } else {
        // Set failure status and redirect to index.php
        header("Location: index.php?status=failure");
        exit;
      }
    } else {
      // Set failure status and redirect to index.php
      header("Location: index.php?status=failure");
      exit;
    }
  }
?>