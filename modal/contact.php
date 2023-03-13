<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];
  
  $to = "your-email@example.com";
  $subject = "New Contact Form Submission";
  $body = "Name: $name\nEmail: $email\nMessage: $message";
  
  if (mail($to, $subject, $body)) {
    echo "<div class='returnmessage' data-success='Your message has been received, We will contact you soon.'></div>";
  } else {
    echo "<div class='returnmessage' data-error='There was an error sending your message. Please try again later.'></div>";
  }
}
?>
