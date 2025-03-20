<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lead Gathering Form</title>
  <link rel="stylesheet" href="styles.css">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body>
  <div class="form-holder">
    <form action="script.php" method="post">

      <div class="title">
        <h1>Lead Gathering Form</h1>
      </div>

      <div class="input-area">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Name">
      </div>

      <div class="input-area">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Email">
      </div>

      <div class="input-area">
        <label for="message">Message</label>
        <textarea id="message" name="message" placeholder="Message"></textarea>
      </div>

        <input type="submit" value="submit" class="button">
    </form>
  </div>
  
</body>
</html>

<?php

    echo '<script type="text/javascript">
       window.onload = function () { alert("Form submission successful"); } 
</script>'; 





  $name = trim(filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS));
  $email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
  $message = trim(filter_input(INPUT_POST, "message", FILTER_SANITIZE_SPECIAL_CHARS));

  // Validate email format
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      die("Invalid email format.");
  }

  $error = false;

  if (empty($name) || empty($email) || empty($message)) {
    $error = true;
  }
  echo "{$name}, {$email}, {$message}, {$error}";
  
