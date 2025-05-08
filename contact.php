  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name = strip_tags(trim($_POST['name']));
      $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
      $subject = strip_tags(trim($_POST['subject']));
      $message = trim($_POST['message']);
  
      $to = "info@jobdassh.com"; // Replace with your receiving email
      $headers = "From: $name <$email>\r\n";
      $headers .= "Reply-To: $email\r\n";
      $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
  
      $body = "You have received a new message from the contact form:\n\n";
      $body .= "Name: $name\n";
      $body .= "Email: $email\n";
      $body .= "Subject: $subject\n";
      $body .= "Message:\n$message\n";
  
      if (mail($to, $subject, $body, $headers)) {
          echo "<script>alert('Message sent successfully!'); window.location.href='contact.html';</script>";
      } else {
          echo "<script>alert('Message sending failed. Please try again.');</script>";
      }
  }
  ?>